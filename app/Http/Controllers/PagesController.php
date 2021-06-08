<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\DB;


class PagesController extends Controller
{


    public function index()
    {

        $item = DB::table('items')->orderBy('id', 'DESC')->get();
        // $item = DB::table('items')->paginate(1);

        return view('index', ['items' => $item]);
        // return view('welcome');
    }

    public function register()
    {

        if (Auth::check()) return redirect('/');
        return view('register');
    }
}
