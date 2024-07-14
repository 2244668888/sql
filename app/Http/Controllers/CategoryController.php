<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the categories.
    
    public function index()
    {
        $categories = Category::with('user')->get();
        return view('categories.index', compact('categories'));
    }
         */

        

      public function index()
      {
        $categories = Category::all();
        return view('category', compact('categories'));
      }
    public function store(Request $request)
    {
        $category = new Category();
        $category->name = $request->name;
        $category->save();

        return redirect()->route('category.list');
    }

    public function list()
    {
        $categories = Category::all();
        return view('catetable',compact('categories'));
    }
    public function destroy($id)
    {
        $category = Category::find($id);
        $category->delete();

        return redirect()->route('category.list');
    }
    public function edit($id)
    {
        $categories = Category::find($id);
        return view('catedit',compact('categories'));
    }
    public function view($id)
    {
        $categories = Category::find($id);
        return view('cateview',compact('categories'));
    }
    public function update(Request $request, $id)
    {
        $categories = Category::find($id);
        $categories->name = $request->input('name');
        $categories->update();
    
        return redirect()->route('category.list');
    }

}



   

   


