<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Order;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Gate;

class CategoryController extends Controller
{

    public function __construct()
    {
//        if (!Gate::denies('admin-only', auth()->user()))
//        {
//            abort(403);
//        }
        // to allow non authenticated user to access only the following
//        $this->middleware(['auth', 'isAdmin']);
         $this->middleware(['auth', 'isAdmin'], ['except' => ['index', 'show']]);
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        return view('category.index')
            ->with('categories', Category::orderBy('updated_at', 'DESC')->get());
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
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
            'title' => 'required'
        ]);

        Category::create([
            'title' => $request->input('title')
        ]);
        return redirect('/category')->with('message', 'New Category has been successfully added!');

    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        return view('category.show')->with('category', Category::where('id', $id)->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        return view('category.edit')->with('category', Category::where('id', $id)->first());
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
            'title' => 'required'
        ]);

        Category::where('id', $id)->update([
            'title' => $request->input('title')
        ]);
        return redirect('/category')->with('message', 'Category has been successfully updated!');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $cat = Category::where('id', $id);
        $cat->delete();
        return redirect('/category')->with('message', 'Category has been successfully deleted');

    }

   public function adminDashboard()
    {

        return view('dashboard', [
            'products_count' => DB::table('products')->count(),
            'categories_count' => Category::count(),
            'users_count' => User::count(),
            'orders_count' => Order::count()
        ]);
    }
}
