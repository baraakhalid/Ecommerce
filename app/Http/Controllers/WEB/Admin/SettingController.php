<?php

namespace App\Http\Controllers\WEB\Admin;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\FavoritProduct;
use App\Models\Language;
use App\Models\Setting;
use App\Models\SettingCopy;
use App\Traits\imageTrait;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Route;
use Intervention\Image\Facades\Image;

class SettingController extends Controller
{
    use imageTrait;

    public function index()
    {
        $settings=Setting::all();
        // dd($settings);
        // $languages = Language::all();
        return view('admin.settings.index',['settings'=>$settings]);
    }
    public function showAboutPage(Request $request)
    {
        if(auth('user')->check()){
        $numOfProductsFavorite=FavoritProduct::where('user_id' , $request->user()->id)->count();
        $numOfProductsCart=Cart::where('user_id' , $request->user()->id)->count();
        return view('front.about',['numOfProductsFavorite'=>$numOfProductsFavorite ,'numOfProductsCart'=>$numOfProductsCart]);

        }
        return view('front.about');
    }

    public function create()
    {
        // $languages = Language::all();
        $settings = Setting::all();
        return view('admin.settings.create');


        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */


     
    public function store(Request $request)
    {


    }




    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function show(Setting $setting)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function edit(Setting $setting)
    {
        // dd(11);
        // $languages = Language::all();

        return response()->view('admin.settings.edit',['setting'=>$setting]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Setting $setting)
    {
        // dd(11);
        $roles = [
            // 'image' => 'required|image|mimes:jpeg,jpg,png,gif',
        ];
        $locales = Language::all()->pluck('lang');
        foreach ($locales as $locale) {
            $roles['description_home_' . $locale] = 'required|string|min:3';
        }
        foreach ($locales as $locale) {
            $roles['description_contact_' . $locale] = 'required|string|min:3';
        }
        foreach ($locales as $locale) {
            $roles['description_about_' . $locale] = 'required|string|min:3';
        }
        foreach ($locales as $locale) {
            $roles['description_portfolio_' . $locale] = 'required|string|min:3';
        }
        $this->validate($request, $roles);

        if ($request->hasFile('image')) {
            $setting->background_img =  $this->storeImage( $request->file('image'), 'settings',$setting->background_img ,512);
        }
   

        foreach ($locales as $locale)
        {
            $setting->translateOrNew($locale)->description_home = $request->get('description_home_' . $locale);
        }
        foreach ($locales as $locale)
        {
            $setting->translateOrNew($locale)->description_contact = $request->get('description_contact_' . $locale);
        }
        foreach ($locales as $locale)
        {
            $setting->translateOrNew($locale)->description_about = $request->get('description_about_' . $locale);
        }
        foreach ($locales as $locale)
        {
            $setting->translateOrNew($locale)->description_portfolio = $request->get('description_portfolio_' . $locale);
        }

        $setting->save();
        // activity($item->name)->causedBy(auth('admin')->user())->log(' إضافة تصنيف جديد ');
        return redirect()->back()->with('status', __('cp.update'));
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Setting  $setting
     * @return \Illuminate\Http\Response
     */
    public function destroy(Setting $setting)
    {
        //
    }


}
