<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Image;
use App\Models\Language;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $products=Product::all();
        $categories=Category::all();

        return response()->view('admin.products.home',['products'=>$products,'categories '=>$categories ]);        }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $categories=Category::all();

        return response()->view('admin.products.create',['categories'=>$categories]); 
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
                'image' => 'required|image|mimes:png,jpg,jpeg',
                'price' => 'required|numeric|min:1',
                'category_id' => 'required|numeric|exists:categories,id',
                            // 'image' => 'nullable|image|mimes:jpg,png|max:2048',
            // 'image_1' => 'required|image|mimes:jpg,png|max:2048',
            // 'image_2' => 'nullable|image|mimes:jpg,png|max:2048',
            // 'image_3' => 'nullable|image|mimes:jpg,png|max:2048',





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

                
                // dd(count($request->filename));
                foreach($request->filename as $one)
                {
                    // dd($request->filename[0]);


                    if (isset(explode('/', explode(';', explode(',', $one)[0])[0])[1])) {
                    $fileType = strtolower(explode('/', explode(';', explode(',', $one)[0])[0])[1]);
                    $name = "" .str_random(8) . "" .  "" . time() . "" . rand(1000000, 9999999);
                    $attachType = 0;
                    if (in_array($fileType, ['jpg','jpeg','png','pmb'])){
                        $newName = $name. ".jpg";
                        $attachType = 1;
                        // Image::make($one)->resize(800, null, function ($constraint) {$constraint->aspectRatio();})->save("uploads/images/meals/$newName");
                    }
                    // echo $newName ;


                    $this->saveImages($request, $product, 'all_images');

                    
                }
                   
                }
            }
            // if ($isSaved) {
            //     $this->saveImages($request, $product, 'image');
              
            // }
            
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
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
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
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }
    private function saveImages(Request $request, Product $product, String $key, bool $update = false)
    {
        if ($request->hasFile($key)) {
            if ($update) {
                foreach ($product->images as $image) {
                    if (str_contains($image->name, $key)) {
                        Storage::delete('products/' . $image->name);
                        $image->delete();
                    }
                }
            }
            // dd(22);
            $imageName = time() . '' . str_replace(' ', '', $product->name) . "_product_$key." . $request->file($key)->extension();
            $request->file($key)->storePubliclyAs('products', $imageName, ['disk' => 'public']);

            $image = new Image();
            $image->name = $imageName;
            $image->url = 'products/' . $imageName;
            $product->images()->save($image);
        }
        }

}
