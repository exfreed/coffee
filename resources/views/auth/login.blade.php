@extends('layout')

@section('title')Вход@endsection

@section('main_content')
<main class="form-signin">
    <form method="post" action="{{route('login')}}">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Вход</h1>

        <div class="form-floating">
        <input type="email" class="form-control mb-2" id="email" name="email" placeholder="">
        <label for="email">Email</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control mb-2" id="password" name="password" placeholder="">
        <label for="password">Пароль</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Войти</button>
    </form>
</main>
<style>
    .form-signin {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
    }
</style>
@endsection