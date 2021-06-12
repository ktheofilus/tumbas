<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;
use App\Models\Orderlist;
use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\DB;
use App\Models\Transaction;
use Illuminate\Support\Arr;

class TransactionController extends Controller
{
    //
    public function add($id)
    {
        //
        session()->push('cart', $id);

        return redirect('/');
    }

    public function buy($id)
    {
        //
        session()->push('cart', $id);

        return redirect('/cart');
    }

    public function delete($id)
    {
        //
        $cart = session()->get('cart');

        if (($key = array_search($id, $cart)) !== false) {
            unset($cart[$key]);
        }

        session()->put('cart', $cart);

        return redirect('/cart');
    }

    public function checkout()
    {
        //
        if (!Auth::check()) return redirect("/");
        $cart = [];
        foreach (session()->get('cart') as $item) {
            $item = DB::table('items')
                ->where('id', $item)
                ->get();
            // $array = Arr::add($array, 'item', $item);
            array_push($cart, $item);
        }

        // dd($array);
        $pay = 0;

        foreach ($cart as $item) {
            foreach ($item as $price) {
                $pay += $price->price;
            }
        }

        $balance = Auth::user()->balance;

        if ($balance >= $pay) {

            $transactionid = Transaction::create([
                "user_id" => Auth::user()->id,
            ]);

            foreach (session()->get('cart') as $item) {
                Orderlist::create([
                    'transaction_id' => $transactionid->id,
                    'item_id' => $item,
                ]);

                $itemseller
                    = DB::table('items')
                    ->select('seller', 'price')
                    ->where('id', $item)
                    ->first();

                $sellermoney
                    = DB::table('users')
                    ->select('balance')
                    ->where('id', $itemseller->seller)
                    ->first();

                $test = DB::table('users')
                    ->where('id', $itemseller->seller)
                    ->update(['balance' => $sellermoney->balance + $itemseller->price]);
            }

            $money = DB::table('users')
                ->where('id', Auth::user()->id)
                ->first();

            DB::table('users')
                ->where('id', Auth::user()->id)
                ->update(['balance' => $money->balance - $pay]);

            session()->forget('cart');
            session()->put('cart', []);

            return redirect('/cart')->withErrors(['Mantap']);
        }

        return redirect('/cart')->withErrors(['Saldo tidak Mencukupi']);
    }

    public function complete()
    {
        //

        // $transactions = DB::table('transactions')
        //     ->select('transaction_id', 'item_id', 'itemname', 'photo', 'price')
        //     ->join('orderlists', 'transactions.id', '=', 'orderlists.transaction_id')
        //     ->join('items', 'orderlists.item_id', '=', 'items.id')
        //     ->where('user_id', Auth::user()->id)
        //     ->get();

        // dd($transactions);

        // $array = [];
        // $item=[];

        // // foreach ($transactions as $transaction) {
        // //     $array = Arr::add($array, $transaction->transaction_id, array_push(
        // //             $item,
        // //             [
        // //                 'id' => $transaction->id,
        // //                 'name' => $transaction->name,
        // //             ]

        // //     )

        // // );

        //     // $array = Arr::add(
        //     //     $array, $transaction->transaction_id, $transaction->item
        //     //     );
        // }

        // // dd($array);




        // return view('/profile/transaction');
    }
}
