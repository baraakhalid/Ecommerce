<?php

namespace App\Http\Controllers;

use App\Exports\ProductsExportForAdmin;
use App\Models\Cart;
use App\Models\Category;
use App\Models\Color;
use App\Models\FavoritProduct;
use App\Models\Image as ModelsImage;
// use App\Models\Image;
use App\Models\Language;
use App\Models\Product;
use App\Models\ProductColorSize;
use App\Models\Size;
use Illuminate\Http\Request;
use App\Traits\imageTrait;
use Intervention\Image\Facades\Image;


use Illuminate\Http\UploadedFile;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Maatwebsite\Excel\Facades\Excel;

use Symfony\Component\HttpFoundation\Response;

class ProductController extends Controller
{

    use imageTrait;
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        if (Auth::guard('admin')->check()){

        $categories=Category::all();
        $products=Product::filter()->orderBy('id', 'desc')->get();
        $productOffers=Product::has('offers')->orderBy('id', 'desc')->get();
        // dd($productOffers);

        return response()->view('admin.products.home',['categories'=>$categories  ,'products'=>$products]);  
    }
    else{

        $products = Product::all();

        if($request->has('category_id')){
            $products =Product::with('sizes')->distinct()->with('colors')->distinct()->where('category_id','=',$request->input('category_id'))->get();
           
        }
        $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
        $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
            



    return response()->view('front.product', ['products' => $products,'numOfProductsFavorite'=>$numOfProductsFavorite,'numOfProductsCart'=>$numOfProductsCart ]);}

    }


    public function exportExcel(Request $request)
    {
        activity()->causedBy(auth('admin')->user())->log(' تصدير ملف إكسل لبيانات الوجبات ');
        return Excel::download(new ProductsExportForAdmin($request), 'products.xlsx');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();
        $sizes=Size::all();
        $colors=Color::all();

        return response()->view('admin.products.create',['categories'=>$categories,'sizes'=>$sizes,'colors'=>$colors]); 
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        {
        
            $roles = [
                'price' => 'required|numeric|min:1',
                'category_id' => 'required|numeric|exists:categories,id',
                'colors' => 'required',      
                // 'sizes' => 'required',
            ];
            $locales = Language::all()->pluck('lang');
            foreach ($locales as $locale) {
                $roles['name_' . $locale] = 'required';
            }
            foreach ($locales as $locale) {
                $roles['info_' . $locale] = 'required';
            }
          
    
            $this->validate($request, $roles);
    
            $product= new Product();
            $product->status='active';
            $product->category_id = $request->get('category_id');
            $product->price = $request->get('price');
            foreach ($locales as $locale)
            {
                $product->translateOrNew($locale)->name = $request->get('name_' . $locale);
            }
            foreach ($locales as $locale)
            {
                $product->translateOrNew($locale)->info = $request->get('info_' . $locale);
            }
       
            $isSaved=$product->save();

            if($request->has('filename')  && !empty($request->filename))
            {

                
                foreach($request->filename as $one)
                {

                    if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = "" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                    $attachType = 0;
                    if (in_array($fileType, ['jpg','jpeg','png','pmb'])){
                        $newName = $name. ".jpg";
                        $attachType = 1;
                        Image::make($one)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/images/products/$newName");
                    }
                    // $request->file('all_images')->storePubliclyAs('products', $newName, ['disk' => 'public']);


                    //  {{dd(count($request->filename));}}
                    $image = new ModelsImage();
                    // dd(1);
                    $image->name = $newName;
                    $image->url = 'products/' . $newName;
                    $product->images()->save($image);
                    // $image->save();
                   
                    
                }
                   
                }
            }
      
 
            if ($request->colors != null) {
                foreach ($request->colors as $color_id) {
                  $color_sizes = $request->input("sizes_for_color_$color_id");
                  if ($color_sizes != null) {
                    foreach ($color_sizes as $size_id){
                      $quantity = $request->input("quantities_for_color_$color_id" . "_size_" . "$size_id");
                      $values[] = [
                        'product_id' => $product->id,
                        'color_id' => $color_id,
                        'size_id' => $size_id,
                        'quantity' => $quantity,
                      ];
                    }
                  }
                }
                ProductColorSize::insert($values);
              }
              
                  
            return redirect()->back()->with('status', __('cp.create'));
    
    
         
        }     
      }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        
    
    
            $product =Product::with('sizes')->distinct()->with('colors')->with('images')->distinct()->find($product->id);
            //  dd(11);
            
              
    
                return response()->json(['message'=>'success' , 'data' => $product ,'colors'=>$product->colors->unique() ,'sizes'=>$product->sizes->unique()->sortBy('id')]);
    
        // return response()->view('front.product', ['product' => $product ]);
    }
    
    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        $categories=Category::all();
        $sizes=Size::all();
        $colors=Color::all();
        $product->load('images');

        return response()->view('admin.products.edit',['product'=>$product ,'categories'=>$categories ,'sizes'=>$sizes,'colors'=>$colors]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        
        
            $roles = [
                'price' => 'required|numeric|min:1',
                'category_id' => 'required|numeric|exists:categories,id',
                // 'colors' => 'required',      
                // 'sizes' => 'required',
                // 'quantity'=>'nullable'
            ];
            $locales = Language::all()->pluck('lang');
            foreach ($locales as $locale) {
                $roles['name_' . $locale] = 'required';
            }
            foreach ($locales as $locale) {
                $roles['info_' . $locale] = 'required';
            }
          
            $this->validate($request, $roles);
            $product->category_id = $request->category_id;
            $product->price = $request->price;
            // $product->quantity = $request->quantity;

            foreach ($locales as $locale)
            {
                $product->translateOrNew($locale)->name = $request->get('name_' . $locale);
                $product->translateOrNew($locale)->info = $request->get('info_' . $locale);
            }
            $product->save();

       
        
    
            
            $imgsIds = $product->images->pluck('id')->toArray();
            $newImgsIds = ($request->has('oldImages'))? $request->oldImages:[];
            $diff = array_diff($imgsIds,$newImgsIds);
            ModelsImage::whereIn('id',$diff)->delete();
    
            if($request->has('filename')  && !empty($request->filename))
            {
                foreach($request->filename as $one)
                {
                    if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                        $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                        $name = "" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                        $attachType = 0;
                        if (in_array($fileType, ['jpg','jpeg','png','pmb'])){
                            $newName = $name. ".jpg";
                            $attachType = 1;
                            Image::make($one)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/images/products/$newName");
                        }
                        $image=new ModelsImage();
                       
                        $image->name = $newName;
                        $image->url = 'products/' . $newName;
                        $product->images()->save($image);
                    }
                }
            }
            ProductColorSize::where('product_id', $product->id)->delete();

            if ($request->colors != null) {
                foreach ($request->colors as $color_id) {
                  $color_sizes = $request->input("sizes_for_color_$color_id");
                  if ($color_sizes != null) {
                    foreach ($color_sizes as $size_id){
                      $quantity = $request->input("quantities_for_color_$color_id" . "_size_" . "$size_id");
                      $values[] = [
                        'product_id' => $product->id,
                        'color_id' => $color_id,
                        'size_id' => $size_id,
                        'quantity' => $quantity,
                      ];
                    }
                  }
                }
                ProductColorSize::insert($values);
              }
    
            return redirect()->back()->with('status', __('cp.update'));



    
    
            
      
 
          
     
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
  
        if ($product) {
            $isDeleted=$product->delete();
            if($isDeleted){
                $this->deleteImages($product);
                $this->deleteColorsSizes($product);
                return "success";

            }

        }
        return "fail";
        }

    private function deleteImages(Product $product)
    {
        foreach ($product->images as $image) {
            Storage::delete('public/products/' .$image->name);
            $image->delete();
        }
    }
    private function deleteColorsSizes(Product $product)
    {
        $productColorsSizes= ProductColorSize::where('product_id' , $product->id)->get();

        foreach ($productColorsSizes as $productColorSize) {
           
            $productColorSize->delete();
        }
    }
    
    // private function saveImages(Request $request, Product $product, String $key, bool $update = false)
    // {
    //     if ($request->hasFile($key)) {
    //         if ($update) {
    //             foreach ($product->images as $image) {
    //                 if (str_contains($image->name, $key)) {
    //                     Storage::delete('public/products/' . $image->name);

    //                     $image->delete();
    //                 }
    //             }
    //         }
    //         $imageName = time() . '' . str_replace(' ', '', $product->name) . "_product_$key." . $request->file($key)->extension();
    //         $request->file($key)->storePubliclyAs('products', $imageName, ['disk' => 'public']);

    //         $image = new Image();
    //         $image->name = $imageName;
    //         $image->url = 'products/' . $imageName;
    //         $product->images()->save($image);
    //     }
    // }

}
