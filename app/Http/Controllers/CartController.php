<?php

namespace App\Http\Controllers;

use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // Affichage du panier
    public function index()
    {
        // Récupère les produits du panier stockés dans la session
        $cart = session('cart', []);
        $total = 0;

        // Calcul du total
        foreach ($cart as $item) {
            $total += $item['price'] * $item['quantity'];
        }

        // Retourne la vue avec le panier et le total
        return view('cart', compact('cart', 'total'));
    }

    // Ajouter un produit au panier
    public function add(Request $request, $id)
    {
        $productModel = Product::findOrFail($id); // Fetch the product from the database

        // Récupérer les produits du panier existants dans la session
        $cart = session('cart', []);

        // Vérifier si l'article est déjà dans le panier
        $found = false;
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] += 1; // Si trouvé, on incrémente la quantité
                $found = true;
                break;
            }
        }

        // Si l'article n'est pas trouvé, on l'ajoute
        if (!$found) {
            $product = [
                'id' => $productModel->id,
                'name' => $productModel->name,
                'price' => $productModel->price,
                'quantity' => 1,
                'image' => $productModel->image_url
            ];
            $cart[] = $product;
        }

        // Sauvegarde le panier dans la session
        session(['cart' => $cart]);

        return redirect()->route('products.index');
    }

    // Supprimer un produit du panier
    public function remove($id)
    {
        $cart = session('cart', []);

        // Recherche et supprime l'article du panier
        foreach ($cart as $key => $item) {
            if ($item['id'] == $id) {
                unset($cart[$key]);
                break;
            }
        }

        // Sauvegarde du panier modifié dans la session
        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }

    // Mettre à jour la quantité d'un produit dans le panier
    public function update(Request $request, $id)
    {
        $cart = session('cart', []);

        // Mise à jour de la quantité de l'article
        foreach ($cart as &$item) {
            if ($item['id'] == $id) {
                $item['quantity'] = $request->quantity; // On récupère la nouvelle quantité
                break;
            }
        }

        // Sauvegarde la nouvelle session du panier
        session(['cart' => $cart]);

        return redirect()->route('cart.index');
    }
}
