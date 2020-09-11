<?php

namespace App\Http\Controllers;

use App\Product;
use Gloudemans\Shoppingcart\Facades\Cart;


use Illuminate\Http\Request;

class CartController extends Controller
{

    public function __construct()
    {   
        $this->middleware('auth');//se connecter pour avoir acces au fonctions crud
        
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('cart.index');
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
        

        $duplicata = Cart::search(function ($cartItem, $rowId) use($request) {
            return $cartItem->id === $request->product_id;
        });

        if ($duplicata->isNotEmpty()){
            $products = Product::all()->sortDesc();
            return view('welcome',compact('products'))->with('success','le produit a bien été ajouté');
        }

        $product = Product::find($request->product_id);  

        Cart::add($product->id, $product->title, 1, $product->price)
        ->associate('App\Product');

        $products = Product::all()->sortDesc();
            return back();
       
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $rowId)
    {
        Cart::update($rowId, $request->qty);

        return back();
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($rowid)
    {
        Cart::remove($rowid);
        return back();
    }

    public function delete()
    {
        Cart::destroy();
        return back();
    }
}
