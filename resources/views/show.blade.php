@extends('layout')

@section('title')Заказы@endsection

@section('main_content')
<div class="starter-template">
    <h1 class="h4 mb-3 fw-normal text-center">Заказ № {{$order->id}}</h1>
    <p class="h5 mb-3 fw-normal text-center">Номер телефона: {{$order->phone}}</p>
    <p class="h5 mb-3 fw-normal text-center">Улица: {{$order->street}}</p>
    <p class="h5 mb-3 fw-normal text-center">Дом: {{$order->building}}</p>
    <p class="h5 mb-3 fw-normal text-center">Квартира/Офис: {{$order->apartment}}</p>
    <table class="table">
        <thead>
            <tr>
                <th class="h5 fw-normal">Название</th>
                <th class="h5 fw-normal">Кол-во</th>
                <th class="h5 fw-normal">Цена</th>
                <th class="h5 fw-normal">Стоимость</th>
            </tr>
        </thead>
        <tbody>
        @foreach($order->products as $product)
        <tr>
            <td>
                {{$product->name}}
            </td>
            <td valign="middle" class="h5 fw-normal">{{$product->pivot->count}}</td>
            <td valign="middle" class="h5 fw-normal">{{$product->price}}</td>
            <td valign="middle" class="h5 fw-normal">{{$product->getPriceForCount()}}</td>
        </tr>
        @endforeach
        <tr>
            <td colspan="3" class="h5 fw-bold">Общая стоимость:</td>
            <td class="h5 fw-bold">{{$order->getFullPrice()}} ₽</td>
        </tr>
        </tbody>
    </table>
</div>
<style>
    .starter-template{
        width: 100%;
        max-width: 800px;
        margin: auto;
    }
</style>
@endsection