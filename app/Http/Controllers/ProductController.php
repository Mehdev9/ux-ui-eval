<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    public function index(Request $request)
    {
        $query = Product::query();

        if ($request->filled('search')) {
            $query->where('name', 'like', '%' . $request->input('search') . '%');
        }

        if ($request->filled('min_price')) {
            $query->where('price', '>=', $request->input('min_price'));
        }

        if ($request->filled('max_price')) {
            $query->where('price', '<=', $request->input('max_price'));
        }

        if ($request->filled('type')) {
            $query->whereIn('type', $request->input('type'));
        }

        if ($request->filled('brands')) {
            $query->whereIn('brand', $request->input('brands'));
        }

        if ($request->input('sort') == 'price_asc') {
            $query->orderBy('price', 'asc');
        } elseif ($request->input('sort') == 'price_desc') {
            $query->orderBy('price', 'desc');
        }

        $products = $query->paginate(12)->appends($request->query());

        return view('product', compact('products'));
    }

    public function show($id)
    {
         // Trouve le produit par son ID
        $product = Product::findOrFail($id);

        // Retourne la vue 'detailProduct' et passe le produit à la vue
        return view('detailProduct', compact('product'));
    }

    public function create()
    {
        return view('products.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|max:255',
            'price' => 'required|numeric',
            'description' => 'nullable|string',
            'image_url' => 'nullable|url',
        ]);

        Product::create($request->all());
        return redirect()->route('products.index')->with('success', 'Produit ajouté');
    }
}
