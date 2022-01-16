@extends('layout')

@section('title')Заказы@endsection

@section('main_content')
<div class="starter-template">
    <div class="col-md-12">
        <h1 class="h3 mb-3 fw-normal text-center">Заказы</h1>
        <table class="table">
            <thead>
                <tr align="center">
                    <th class="h5 fw-normal">#</th>
                    <th class="h5 fw-normal">Телефон</th>
                    <th class="h5 fw-normal">Дата</th>
                    <th class="h5 fw-normal">Сумма</th>
                    <th class="h5 fw-normal">Действия</th>
                </tr>
            </thead>
            <tbody>
                @foreach($orders as $order)
                <tr align="center">
                    <td valign="middle">{{$order->id}}</td>
                    <td valign="middle">{{$order->phone}}</td>
                    <td valign="middle">{{$order->updated_at->format('d.m.Y H:i')}}</td>
                    <td valign="middle">{{$order->getFullPrice()}}</td>
                    <td valign="middle">
                        <div class="btn-group" role="group">
                            <a @admin href="{{route('show', $order)}}" @else href="{{route('user-show', $order)}}" @endadmin class="btn btn-success" type="button">Открыть</a>
                        </div>
                    </td>
                </tr>
                @endforeach
            </tbody>
        </table>
    </div>
</div>
<style>
    .starter-template{
        width: 100%;
        max-width: 800px;
        margin: auto;
    }
</style>
@endsection