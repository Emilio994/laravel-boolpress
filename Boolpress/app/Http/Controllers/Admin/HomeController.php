<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    public function index()
    {
        return view('admin.home');
    }

    public function profile()
    {
        return view('admin.user.profile');
    }

    public function generateToken() {
        $api_token = Str::random(80);
        $user = Auth::user();
        $user->api_token = $api_token;
        $user->save();


        return redirect()->route('admin-profile');
    }
}
