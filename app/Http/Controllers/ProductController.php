<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth', 'isAdmin'], ['except' => [ 'show', 'search', 'checkout', 'categories']]);
         $this->middleware('auth', ['except' => ['show', 'search','categories']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('product.index')
            ->with('products', Product::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('product.create')
            ->with('categories', Category::orderBy('id', 'ASC')->get());
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'image' => 'required',
            'category' => 'required',
        ]);

        $newImageName = uniqid() . '-' . $request->name . '.' . $request->image->extension();

        $request->image->move(public_path('images'), $newImageName);

        Product::create([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'image_path' => $newImageName,
            'description' => $request->input('description'),
            'category' => $request->input('category')
        ]);
        return redirect('/product')->with('message', 'New Product has been successfully added!');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Request $request, $id)
    {
        $product = Product::where('id', $id)->first();
         $request->session()->put('product', $product);


        return view('product.show')->with('product',$product);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('product.edit', [
            'product' => Product::where('id', $id)->first(),
            'categories' => Category::all()]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => 'required',
            'price' => 'required',
            'description' => 'required',
            'category' => 'required',
        ]);

        Product::where('id', $id)->update([
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'description' => $request->input('description'),
            'category' => $request->input('category')
        ]);
        return redirect('/product')->with('message', 'Product has been successfully updated!');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $product = Product::where('id', $id);
        $product->delete();
        return redirect('/product')->with('message', 'Product has been successfully deleted');

    }

    public function checkout(Request $request)
    {
        $product = $request->session()->get('product');
        $fee = 0;
        if ($request->input('state') == 'Osun')
        {
            $fee = 500;
        }
        else
        {
            $fee = 1000;
        }
        $total = $fee + $product->price;
        $address = $request->input('address');
        $data = ["fee" => $fee, "total" => $total, "address" => $address];
        $request->session()->put('data', $data);

        if ($request->session()->get('product'))
            return view('payment.checkout', ['product'=>$product, 'data' => $data]);

        else
            abort('404');
    }

    public function search(Request $request)
    {
        $request->validate([
            'search' => 'required'
        ]);
        $products = Product::where('name', 'LIKE', "%{$request->input('search')}%")->get();

        if ($products != null)
        {
            return view('search')->with('products',$products);
        }
            abort('404');


    }
    /**
     * Remove the specified resource from storage.
     *
     * @param  string  $cat
     * @return \Illuminate\Http\Response
     *
     */

    public function categories($cat)
    {
        $products = Product::where('category', $cat)->get();

        return view('categories')->with('products',$products);
    }


}
