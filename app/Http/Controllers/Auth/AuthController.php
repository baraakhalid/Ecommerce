<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rules\Password as RulesPassword;
use Symfony\Component\HttpFoundation\Response;

class AuthController extends Controller
{
    
    public function profilePersonalInformation(Request $request)
    {
        $user = auth('admin')->user();
        // dd($user->name);
        return response()->view('admin.auth.profile.personal-information', ['user' => $user]);
    }






    public function updateProfilePersonalInformation(Request $request)
    {
        // $guard = auth('admin')->check() ? 'admin' : 'store';
        $user = auth('admin')->user();

        $validator = Validator($request->all(), [
            'name' => 'required|string|min:3',
            'mobile' => 'required|regex:/^([0-9\s\-\+\(\)]*)$/|min:10',
            'email' => "required|string|email|unique:admins,email," . $user->id,
        ]);

        if (!$validator->fails()) {
            $user->name = $request->get('name');
            $user->mobile = $request->get('mobile');
            $user->email = $request->get('email');
            $isSaved = $user->save();
            return response()->json(['message' => $isSaved ? __('cp.update_success') : __('cp.update_failed')], $isSaved ? Response::HTTP_CREATED : Response::HTTP_BAD_REQUEST);
        } else {
            return response()->json(['message' => $validator->getMessageBag()->first()], Response::HTTP_BAD_REQUEST);
        }
    }

  
}
