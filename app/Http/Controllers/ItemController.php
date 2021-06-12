<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
        $items = DB::table('items')
            ->where('seller', Auth::user()->id)
            ->where('status', 1)
            ->get();

        return view('/profile/itemlist')->with(['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
        $request->validate([
            'itemname' => "required",
            'price' => "required|numeric",
            'description' => "required",
            'photo' => "required",
        ]);

        $file = $request->file('photo');

        $filename = $file->getClientOriginalName();

        $request->file('photo')->move('images', $filename);

        $item = Item::create([
            "itemname" => $request->itemname,
            "price" => $request->price,
            "description" => $request->description,
            "photo" => $filename,
            "seller" => Auth::user()->id,
        ]);

        return redirect('/');
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
        $item = DB::table('items')
            ->where('id', $id)
            ->where('status', 1)
            ->first();

        if ($item == null) {
            return redirect('/');
        }

        return view('/item', ['item' => $item]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Item $item)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
        DB::table('items')
            ->where('id', $id)
            ->update(['status' => 0]);

        $items = DB::table('items')
            ->where('seller', Auth::user()->id)
            ->where('status', 1)
            ->get();

        return view('/profile/itemlist')->with(['items' => $items]);
    }
}
