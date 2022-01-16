@extends('layout')

@section('title')Главная@endsection

@section('main_content')
<div class="welcome">
    <h1 class="h1 fw-normal">Добро пожаловать!</h1>
    <style>
        .welcome {
            height: 80vh;
        }
        .h1{
            position: absolute;
            top: 40%;
            left: 39%;
        }
    </style>
</div>
@endsection