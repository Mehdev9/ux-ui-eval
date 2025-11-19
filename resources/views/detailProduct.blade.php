@extends('layouts.app')

@section('header_title', $product->name)
@section('header_subtitle', 'Détails du produit')
@section('header_height', 'height: 300px;')

@section('content')
    <p>Prix : {{ $product->price }} €</p>
    <p>{{ $product->description }}</p>
    <img src="{{ $product->image_url }}" class="img-fluid w-50 mx-auto d-block" alt="{{ $product->name }}">

    <a href="{{ route('products.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection
