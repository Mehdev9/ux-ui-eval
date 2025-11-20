# Explication des Fonctionnalités Backend et Architecture des Données

Ce document décrit les fonctionnalités backend clés de l'application Shopera, ainsi qu'une mini-architecture de sa base de données. Le projet est basé sur le framework PHP Laravel.

## 1. Fonctionnalités Backend

Le backend de l'application est organisé autour des fonctionnalités suivantes :

### a. Authentification des Utilisateurs

-   **Contrôleur** : `app/Http/Controllers/AuthController.php`
-   **Logique** : Ce contrôleur gère l'inscription de nouveaux utilisateurs, la connexion des utilisateurs existants et leur déconnexion. Les mots de passe sont hachés avant d'être stockés en base de données pour des raisons de sécurité.
-   **Routes** : Les routes associées (`/login`, `/register`, `/logout`) sont définies dans `routes/web.php`.
-   **Modèle** : `app/Models/User.php` représente un utilisateur dans la base de données.

### b. Gestion des Produits

-   **Contrôleur** : `app/Http/Controllers/ProductController.php`
-   **Logique** : Ce contrôleur est responsable de l'affichage des produits. Il permet de lister tous les produits sur la page "Nos produits" et d'afficher la page de détail pour un produit spécifique. Il intègre également des fonctionnalités de filtrage (par nom, prix, type, marque) et de tri.
-   **Modèle** : `app/Models/Product.php` représente un produit.
-   **Données initiales** : Le fichier `database/seeders/ProductSeeder.php` est utilisé pour remplir la base de données avec un jeu de produits de démonstration.

### c. Gestion du Panier d'Achat

-   **Contrôleur** : `app/Http/Controllers/CartController.php`
-   **Logique** : La gestion du panier est entièrement basée sur la **session de l'utilisateur**. Cela signifie que le panier n'est pas stocké en base de données, mais dans la session de l'utilisateur côté serveur. Le contrôleur gère :
    -   L'ajout d'un produit au panier.
    -   La mise à jour de la quantité d'un produit.
    -   La suppression d'un produit du panier.
    -   L'affichage du contenu du panier.
-   **Routes** : Les routes (`/cart/add/{id}`, `/cart/update/{id}`, etc.) permettent d'interagir avec le panier.

### d. Gestion du Profil Utilisateur

-   **Contrôleur** : `app/Http/Controllers/ProfileController.php`
-   **Logique** : Permet à un utilisateur connecté de consulter ses informations personnelles (nom, email) et de les mettre à jour. Gère également la modification du mot de passe.
-   **Routes** : Les routes (`/profil`, `/profil/edit`, etc.) sont sécurisées pour garantir que seul l'utilisateur authentifié peut accéder à ses propres informations.

## 2. Mini Architecture des Données

La structure de la base de données est définie par les fichiers de migration dans le dossier `database/migrations`. Voici les deux tables principales :

### a. Table `users`

Cette table stocke les informations des utilisateurs inscrits.

-   **Schéma** (`database/migrations/0001_01_01_000000_create_users_table.php`):
    -   `id` : Clé primaire auto-incrémentée.
    -   `name` : Nom de l'utilisateur (chaîne de caractères).
    -   `email` : Adresse e-mail unique pour chaque utilisateur (chaîne de caractères).
    -   `password` : Mot de passe haché (chaîne de caractères).
    -   `created_at` / `updated_at` : Timestamps pour le suivi des dates de création et de modification.

### b. Table `products`

Cette table contient tous les produits disponibles à la vente.

-   **Schéma** (`database/migrations/2025_11_17_135740_create_products_table.php`):
    -   `id` : Clé primaire auto-incrémentée.
    -   `name` : Nom du produit (chaîne de caractères).
    -   `description` : Description détaillée du produit (texte).
    -   `price` : Prix du produit (décimal).
    -   `image_url` : URL de l'image du produit (chaîne de caractères).
    -   `created_at` / `updated_at` : Timestamps.

### c. Relations et Fonctionnalités Futures

-   **Relation implicite** : Il n'y a pas de relation directe (clé étrangère) entre les tables `users` et `products`. La logique de commande n'est pas encore implémentée.
-   **Commandes (feature future)** : La présence d'une section "Mes Commandes" sur la page de profil suggère qu'une fonctionnalité de commande est prévue. Cela nécessiterait probablement l'ajout de nouvelles tables comme `orders` et `order_items` pour lier les utilisateurs aux produits qu'ils achètent. La table `orders` aurait une clé étrangère `user_id`, et `order_items` lierait un produit à une commande avec une quantité et un prix.

## 3. Explications Détaillées des Fonctionnalités

### a. Comment le filtre par prix fonctionne-t-il ?

Le filtrage par prix est géré côté serveur dans le `ProductController.php`.

-   **Récupération des données** : Le contrôleur récupère les valeurs `min_price` et `max_price` envoyées par le formulaire de la page produit via la requête HTTP.
-   **Construction de la requête** : En utilisant l'ORM Eloquent de Laravel, le code ajoute des conditions à la requête de base de données.
    -   Si `min_price` est fourni, une condition `WHERE price >= ?` est ajoutée.
    -   Si `max_price` est fourni, une condition `WHERE price <= ?` est ajoutée.
-   **Exemple de code** (`ProductController.php`) :
    ```php
    if ($request->filled('min_price')) {
        $query->where('price', '>=', $request->input('min_price'));
    }

    if ($request->filled('max_price')) {
        $query->where('price', '<=', $request->input('max_price'));
    }
    ```
-   **Résultat** : La base de données retourne uniquement les produits dont le prix se situe dans la fourchette spécifiée.

### b. Comment les résultats similaires sont-ils générés ?

Actuellement, la section "Vous aimerez aussi" sur la page de détail d'un produit **n'est pas dynamique**. Elle affiche des produits statiques (hardcodés) directement dans le fichier de la vue `detailProduct.blade.php`.

-   **Suggestion d'amélioration** : Pour rendre cette fonctionnalité dynamique, on pourrait modifier la méthode `show` dans le `ProductController.php` pour :
    1.  Récupérer le produit principal.
    2.  Identifier une caractéristique commune (par exemple, le `type` ou la `brand` du produit).
    3.  Effectuer une deuxième requête pour trouver d'autres produits partageant cette caractéristique, en excluant le produit principal.
    4.  Passer ces produits "similaires" à la vue.

### c. Comment la recherche est-elle effectuée ?

La recherche est une recherche textuelle simple, et non une recherche "fuzzy" (floue) ou avancée.

-   **Logique** : Elle est implémentée dans le `ProductController.php`. La recherche s'effectue sur la colonne `name` de la table `products`.
-   **Opérateur SQL** : La requête utilise l'opérateur `LIKE` avec des jokers (`%`), ce qui permet de trouver des produits dont le nom contient la chaîne de caractères recherchée.
-   **Exemple de code** :
    ```php
    if ($request->filled('search')) {
        $query->where('name', 'like', '%' . $request->input('search') . '%');
    }
    ```
-   **Limites** : Cette méthode est simple mais moins performante et moins flexible qu'un système de recherche full-text dédié comme Elasticsearch ou Algolia, qui offrirait de meilleures performances et une pertinence accrue (gestion des fautes de frappe, synonymes, etc.).

### d. Relations entre les entités (Produit, Catégories, etc.)

L'architecture actuelle des données est simple et pourrait être améliorée en formalisant les relations.

-   **Produit → Catégories/Types** :
    -   **Actuellement** : Il n'y a **pas de table `categories` ou `types`**. Les filtres pour le type et la marque sur la page produit sont présents dans le code du contrôleur (`whereIn('type', ...)`), mais les colonnes `type` and `brand` correspondantes **sont manquantes** dans la migration de la table `products`. Cette fonctionnalité est donc **non-opérationnelle** en l'état.
    -   **Suggestion** : Il faudrait créer des tables `categories` et `brands`. La table `products` aurait alors une clé étrangère (`category_id`, `brand_id`) pointant vers ces tables. Cela permettrait une gestion plus robuste et évolutive des catégories et des marques.

-   **Utilisateur → Favoris** :
    -   **Actuellement** : Cette fonctionnalité n'existe pas dans l'application.
    -   **Suggestion** : Pour l'implémenter, on pourrait créer une table pivot `favorites` (ou `user_product`) avec deux colonnes : `user_id` et `product_id`. Une entrée dans cette table signifierait qu'un utilisateur a ajouté un produit à ses favoris. Cela correspond à une relation "many-to-many" entre les utilisateurs et les produits.
