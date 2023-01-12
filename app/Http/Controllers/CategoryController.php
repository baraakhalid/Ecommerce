<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Language;
use App\Traits\imageTrait;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;


class CategoryController extends Controller
{
    
    use imageTrait;

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories=Category::filter()->orderBy('id', 'desc')->get();
        return response()->view('admin.category.home',['categories'=>$categories]);    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // $educations = Education::all();

        return response()->view('admin.category.create'); 
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
                // 'status'=> 'required | boolean',
                'image' => 'required|image|mimes:png,jpg,jpeg',



            ];
            $locales = Language::all()->pluck('lang');
            foreach ($locales as $locale) {
                $roles['name_' . $locale] = 'required';
            }
          
    
            $this->validate($request, $roles);
    
            $item= new Category();
            $item->status='active';

            // if ($request->hasFile('image')) {
            //     $item->image =  $this->storeImage( $request->file('image'), 'categories',null,512);
            // }    
            if ($request->hasFile('image')) {
                $imagetitle =  time() . '_'. str_replace(' ','',$item->name).'.'. $request->file('image')->extension();
                $request->file('image')->storePubliclyAs('categories', $imagetitle,['disk'=>'public']);
                $item->image = 'categories/'.$imagetitle;
            }
            foreach ($locales as $locale)
            {
                $item->translateOrNew($locale)->name = $request->get('name_' . $locale);
            }
       
    
            $item->save();
            
            return redirect()->back()->with('status', __('cp.create'));
    
    
    
        }   
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return response()->view('admin.category.edit',['category'=>$category]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $roles = [
            // 'status' => 'required|boolean',
            // 'image' => 'image|mimes:png,jpg,jpeg',

           

        ];
        $locales = Language::all()->pluck('lang');
        foreach ($locales as $locale) {
            $roles['name_' . $locale] = 'required';
        }
     
        $this->validate($request, $roles);


        if ($request->hasFile('image')) {
            Storage::delete($category->image);
            $imagetitle =  time() . '_'. str_replace(' ','',$category->name).'.'. $request->file('image')->extension();
            $request->file('image')->storePubliclyAs('categories', $imagetitle,['disk'=>'public']);
            $category->image = 'categories/'.$imagetitle;
        }

        foreach ($locales as $locale)
        {
            $category->translateOrNew($locale)->name = $request->get('name_' . $locale);
        }
       

        $isSaved = $category->save();
    
        return redirect()->back()->with('status', __('cp.update'));

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy(Category $category)
    {
        $isDeleted = $category->delete();
        if ($isDeleted) {
            Storage::delete('public/category/' .$category->image);


           
        }
        return response()->json(
            [
                'title' => $isDeleted ? 'Deleted!' : 'Delete Failed!',
                'text' => $isDeleted ? 'category deleted successfully' : 'category deleting failed!',
                'icon' => $isDeleted ? 'success' : 'error'
            ],
            $isDeleted ? Response::HTTP_OK : Response::HTTP_BAD_REQUEST);
    }
}
