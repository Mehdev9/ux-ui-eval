@extends('layouts.app')

@section('content')
    <h1>{{ $product->name }}</h1>
    <p>Prix : {{ $product->price }} €</p>
    <p>{{ $product->description }}</p>
    <img src="{{ $product->image_url }}" alt="{{ $product->name }}">

    <a href="{{ route('products.index') }}" class="btn btn-primary">Retour à la liste</a>
@endsection
