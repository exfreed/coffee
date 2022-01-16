@extends('layout')

@section('title')Корзина@endsection

@section('main_content')
<div class="starter-template">
    <h1 class="h3 mb-3 fw-normal text-center">Корзина</h1>
    <div class="panel">
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
                        <img height="70px" src="{{$product->image}}">
                        {{$product->name}}
                    </td>
                    <td valign="middle">
                        <div class="btn-group">
                            <form action="{{route('basket-remove', $product)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-danger" href="">-</button>
                            </form>
                            <span class="h5 fw-normal">{{$product->pivot->count}}</span>
                            <form action="{{route('basket-add', $product)}}" method="POST">
                                @csrf
                                <button type="submit" class="btn btn-sm btn-success">+</button>
                            </form>
                        </div>
                    </td>
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
        <br>
        <div class="btn-group pull-right" role="group">
            <a type="button" class="btn btn-success" href="{{route('basket-place')}}">Оформить заказ</a>
        </div>
    </div>
</div>
<style>
    button {
        width: 30px;
    }
    .starter-template{
        width: 100%;
        max-width: 800px;
        margin: auto;
    }
</style>
@endsection