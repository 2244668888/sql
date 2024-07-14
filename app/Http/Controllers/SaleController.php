<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\Category;
use App\Models\Sale;
use Illuminate\Http\Request;

class SaleController extends Controller
{
    public function create(User $user, $categoryId)
    {
       
        $category = $categoryId ? Category::find($categoryId) : null;

        return view('sales.create', [
            'user' => $user,
            'category' => $category
        ]);
    }

    public function store(Request $request)
    {
        $request->validate([
            'quantity' => 'required|integer|min:0',
            'total_price' => 'required|numeric|min:0',
        ]);
    
        $sale = new Sale();
        $sale->product_id = $request->product_id;
        $sale->price = $request->price;
        $sale->quantity = $request->quantity;
        $sale->total_price = $request->total_price;
        $sale->save();
    
        return redirect()->route('categories.index')->with('success', 'Product saved successfully!');
    }
    
    
}
