<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use App\Http\Controllers\Login;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Arr;
use PhpParser\Node\Stmt\Foreach_;

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

    public function profile()
    {

        if (Auth::check()) return view('/profile/profile');;
        return redirect("/");
    }

    public function topup()
    {
        if (Auth::check()) return view('/profile/topup');;
        return redirect("/");
    }

    public function cart()
    {

        // dd($request);
        $array = [];
        foreach (session()->get('cart') as $item) {
            $item = DB::table('items')
                ->where('id', $item)
                ->first();
            // $array = Arr::add($array, 'item', $item);
            array_push($array, $item);
        }

        if (Auth::check()) return view('/profile/cart', ['items' => $array]);;
        return redirect("/");
    }
}
