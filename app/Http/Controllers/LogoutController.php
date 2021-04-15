<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use Auth;

class ProductController extends Controller
{
    public function logout(Request $request) {
        //Auth::logout();
        return route('admin.login');
    }
}
