<?php namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Category;
use Illuminate\Support\Facades\File;

class ProductController extends Controller
{
    public function index()
    {
        $categories = Category::all();
        $product = Product::with('categories')->get();

        $categoryColors = [
            1 => '#FF5733',
            2 => '#33FF57',
            3 => '#3357FF',
            4 => '#F3C300',
            5 => '#C70039',
            6 => '#1E90FF',
            7 => '#FFD700',
            8 => '#DA70D6',
        ];

        $badgeColors = [
            1 => '#5d5d5d',
            2 => '#FF5733',
            3 => '#33FF57',
            4 => '#3357FF',
            5 => '#F3C300',
            6 => '#1E90FF',
            7 => '#FFD700',
            8 => '#DA70D6',
        ];

        return view('product.index', compact('product', 'categories', 'categoryColors', 'badgeColors'));
    }

    public function create()
    {
        $categories = Category::all();
        return view('product.create', compact('categories'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = new Product();
        $product->product_name = $request->name;
        $product->quantity = $request->quantity;
        $product->price = $request->price;

        if ($request->hasFile('image')) {
            $file = $request->file('image');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $fileExtension;
            $file->move('public/images/', $filename);
            $product->image = $filename;
        }

        $product->save();
        $product->categories()->attach($request->category_id);

        return redirect()->route('products.index');
    }

    public function show($id)
    {
        $product = Product::find($id);
        return view('product.view', compact('product'));
    }

    public function edit($id)
    {
        $product = Product::with('categories')->findOrFail($id);
        $categories = Category::all();

        $categoryColors = [
            1 => '#FF5733',
            2 => '#33FF57',
            3 => '#3357FF',
            4 => '#F3C300',
            5 => '#C70039',
            6 => '#1E90FF',
            7 => '#FFD700',
            8 => '#DA70D6',
        ];

        $badgeColors = [
            1 => '#C70039',
            2 => '#FF5733',
            3 => '#33FF57',
            4 => '#3357FF',
            5 => '#F3C300',
            6 => '#1E90FF',
            7 => '#FFD700',
            8 => '#DA70D6',
        ];

        return view('product.edit', compact('product', 'categories', 'categoryColors', 'badgeColors'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'category_id' => 'required|array',
            'category_id.*' => 'exists:categories,id',
            'name' => 'required|string|max:255',
            'quantity' => 'required|integer|min:1',
            'price' => 'required|numeric|min:0.01',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        $product = Product::find($id);
        if (!$product) {
            return redirect()->route('products.index')->with('error', 'Product not found.');
        }

        $product->product_name = $request->input('name');
        $product->quantity = $request->input('quantity');
        $product->price = $request->input('price');

        if ($request->hasFile('image')) {
            $destination = 'public/images/' . $product->image;
            if (File::exists($destination)) {
                File::delete($destination);
            }
            $file = $request->file('image');
            $fileExtension = $file->getClientOriginalExtension();
            $filename = time() . '.' . $fileExtension;
            $file->move('public/images/', $filename);
            $product->image = $filename;
        }

        $product->save();
        $product->categories()->sync($request->input('category_id'));

        return redirect()->route('products.index')->with('success', 'Product updated successfully.');
    }

    public function destroy($id)
    {
        $product = Product::find($id);
        $product->delete();
        return redirect()->route('products.index');
    }
}
