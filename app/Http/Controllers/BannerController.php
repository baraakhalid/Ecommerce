<?php

namespace App\Http\Controllers;

use App\Models\Banner;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\Response;

class BannerController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $banners=Banner::filter()->orderBy('id', 'desc')->get();

        return view('admin.banners.home',['banners'=>$banners]); 
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.banners.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $roles = [
            'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
        $this->validate($request, $roles);

        $banner= new Banner();

        if ($request->hasFile('image')) {
            $imagetitle =  time() . '_'. str_replace(' ','',$banner->name).'.'. $request->file('image')->extension();
            $request->file('image')->storePubliclyAs('banners', $imagetitle,['disk'=>'public']);
            $banner->image = 'banners/'.$imagetitle;
        }
       
        $banner->status = $request->status;
        $banner->save();

        return redirect()->back()->with('status', __('cp.create')); 
    
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function show(Banner $banner)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function edit(Banner $banner)
    {
        return response()->view('admin.banners.edit',['banner'=>$banner]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Banner $banner)
    {
        $roles = [
            'image' => 'image|mimes:jpeg,jpg,png,gif',
        ];

        $this->validate($request, $roles);


        if ($request->hasFile('image')) {
            $imagetitle =  time() . '_'. str_replace(' ','',$banner->name).'.'. $request->file('image')->extension();
            $request->file('image')->storePubliclyAs('banners', $imagetitle,['disk'=>'public']);
            $banner->image = 'banners/'.$imagetitle;
        }
      
        $banner->status = $request->status;
        $banner->save();
        return redirect()->back()->with('status', __('cp.update'));    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Banner  $banner
     * @return \Illuminate\Http\Response
     */
    public function destroy(Banner $banner)
    {
        $isDeleted = $banner->delete();
        if ($isDeleted) {
            Storage::delete($banner->image);
            return "success";


           
        }
        return "fail";

    }
}
