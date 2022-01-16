@extends('layout')

@section('title')Меню@endsection

@section('main_content')
    <h1 class="h3 mb-3 fw-normal text-center">Меню</h1>
    
    @foreach($products as $product)
        @include('card', compact('product'))
    @endforeach

<style>
    figure {
    width: 100%;
    max-width: 320px;
    padding: 15px;
    margin: auto;
    }
    img {
    display: block;
    max-width: 200px;
    max-height: 200px;
    margin: auto;
    }
</style>
@endsection