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
    $productModel = Product::findOrFail($id);

    // Récupère les produits du panier
    $cart = session('cart', []);
    $found = false;

    // Si le produit est déjà dans le panier, on incrémente la quantité
    foreach ($cart as &$item) {
        if ($item['id'] == $id) {
            $item['quantity'] += 1;
            $found = true;
            break;
        }
    }

    // Si le produit n'est pas dans le panier, on l'ajoute
    if (!$found) {
        $cart[] = [
            'id' => $productModel->id,
            'name' => $productModel->name,
            'price' => $productModel->price,
            'quantity' => 1,
            'image' => $productModel->image_url
        ];
    }

    // Sauvegarde du panier dans la session
    session(['cart' => $cart]);

    // Retourne la réponse JSON avec le nombre d'articles dans le panier
    return response()->json([
        'success' => true,
        'cartCount' => count($cart) // Nombre d'articles dans le panier
    ]);
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
    // Récupère les produits du panier dans la session
    $cart = session('cart', []);

    // Recherche le produit dans le panier et met à jour la quantité
    foreach ($cart as &$item) {
        if ($item['id'] == $id) {
            // Si la quantité est valide (doit être un entier positif)
            $item['quantity'] = max(1, (int) $request->quantity); // Empêche la quantité d'être inférieure à 1
            break;
        }
    }

    // Si le produit a été mis à jour, on enregistre les modifications dans la session
    session(['cart' => $cart]);

    // Calcul du nouveau total
    $total = 0;
    foreach ($cart as $item) {
        $total += $item['price'] * $item['quantity'];
    }

    // Retourne la réponse JSON avec le nouveau total et la nouvelle quantité
    return response()->json([
        'success' => true,
        'newQuantity' => $item['quantity'],
        'newTotal' => number_format($total, 2, ',', ' ') // Formatté en Euro
    ]);
}


}
