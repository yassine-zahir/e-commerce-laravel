<?php

namespace App\Http\Controllers;

use App\Product;
use Illuminate\Http\Request;



class ProductController extends Controller
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
        return view('products.show');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('products.create');
        
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $data = request()->validate([
            'title' => ['required','string'],
            'description' => ['required','string'],
            'price' => ['required','string'],
            'category' => ['required','string'],
            'image' => ['required','image']
            ]);

        $imagePath = request('image')->store('uploads','public');

       

        auth()->user()->products()->create([
            'title' => $data['title'],
            'description' => $data['description'],
            'price' => $data['price'],
            'collection' => 0,
            'category_id' => $data['category'],
            'image' => $imagePath

        ]);

        $products = Product::all();
        return view('welcome',compact('products'));
    }

    /**
     * Display the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function show(Product $product)
    {
        return view('products.show', compact('product'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function edit(Product $product)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Product $product)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Product  $product
     * @return \Illuminate\Http\Response
     */
    public function destroy(Product $product)
    {
        //
    }

    public function search()
    {
        $search = request()->input('search');

       $products= Product::where('title', 'LIKE', "%$search%")->orWhere('description', 'LIKE', "%$search%")->get();

    //    dd($products->toSql());

       return view('products.search',compact('products'));      
    }

}
