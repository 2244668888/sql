<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Practice;
use Illuminate\Support\Facades\Storage;



class PracticeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $practices = Practice::all();
        // Pass the practices to the index view
        return view('practices.index', compact('practices'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('practices.create'); // Point to the create view for the form
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'email' => 'required|email|unique:practices,email',
            'password' => 'required|string|min:6',
            'images.*' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048'
        ]);
    
        $imagePaths = [];
        if ($request->hasFile('images')) {
            foreach ($request->file('images') as $image) {
                $imagePaths[] = $image->store('images', 'public');
            }
        }
    
        Practice::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'images' => json_encode($imagePaths), 
        ]);
    
        return redirect()->route('practices.index')->with('success', 'Practice created successfully!');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $practice = Practice::findOrFail($id); 
        return view('practices.show', compact('practice')); 
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $practices = Practice::findOrFail($id); 
        return view('practices.edit', compact('practices')); 
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $practice = Practice::findOrFail($id);
        
        $practice->name = $request->input('name');
        $practice->email = $request->input('email');
        if ($request->filled('password')) {
            $practice->password = bcrypt($request->input('password'));
        }
    
        $removeImages = $request->input('remove_images', []);
        $existingImages = json_decode($practice->images) ?? [];
    
        foreach ($removeImages as $image) {
            if (($key = array_search($image, $existingImages)) !== false) {
                unset($existingImages[$key]);
                Storage::delete('public/' . $image);
            }
        }
    
        $practice->images = json_encode(array_values($existingImages)); 
    
        
        if ($request->hasFile('images')) {
            $uploadedImages = [];
            foreach ($request->file('images') as $image) {
                $path = $image->store('images', 'public');
                $uploadedImages[] = $path;
            }
            $practice->images = json_encode(array_merge($existingImages, $uploadedImages));
        }
    
        $practice->save();
    
        return redirect()->route('practices.index')->with('success', 'Practice updated successfully');
    }
    

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $practice = Practice::findOrFail($id); 
        
        $imagePaths = json_decode($practice->images, true);
        foreach ($imagePaths as $path) {
            \Storage::disk('public')->delete($path);
        }

        $practice->delete(); 

        return redirect()->route('practices.index')->with('success', 'Practice deleted successfully!');
    }
}
