@extends('layout')

@section('title')Оформление заказа@endsection

@section('main_content')
<div class="starter-template">
    <h1 class="h3 mb-3 fw-normal text-center">Подтвердите заказ:</h1>
    <div class="container">
            <p class="h5 mb-3 fw-normal text-center">Общая стоимость: <b class="h5 mb-3 fw-bold text-center">{{$order->getFullPrice()}} ₽.</b></p>
            <form action="{{route('basket-confirm')}}" method="POST">
                @csrf
                <p class="h5 mb-3 fw-normal text-center">Укажите свои данные для доставки:</p>
                <div class="container2">
                    <div class="form-group mb-2">
                        <label for="street" class="control-label col-lg-offset-3 col-lg-2">Улица: </label>
                        <div class="col-lg-4">
                            <input type="text" name="street" id="street" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="building" class="control-label col-lg-offset-3 col-lg-2">Дом: </label>
                        <div class="col-lg-4">
                            <input type="text" name="building" id="building" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="apartment" class="control-label col-lg-offset-3 col-lg-2">Квартира/Офис: </label>
                        <div class="col-lg-4">
                            <input type="text" name="apartment" id="apartment" value="" class="form-control">
                        </div>
                    </div>
                    <div class="form-group mb-2">
                        <label for="phone" class="control-label col-lg-offset-3 col-lg-2">Телефон: </label>
                        <div class="col-lg-4">
                            <input type="text" name="phone" id="phone" value="" class="form-control">
                        </div>
                    </div>
                        <input type="submit" class="btn btn-success" value="Подтвердите заказ">
                    </div>
            </form>
    </div>
</div>
<style>
    .container2{
        margin-left: 34%;
        width: 100%;
    }
</style>
@endsection