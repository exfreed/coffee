@extends('layout')

@section('title')Регистрация@endsection

@section('main_content')
<main class="form-signup">
    @if($errors->any())
        <div class="alert alert-danger">
            <ul>
                @foreach($errors->all() as $error)
                    <li>{{$error}}</li>
                @endforeach
            </ul>
        </div>
    @endif
    <form method="post" action="{{route('register')}}">
        @csrf
        <h1 class="h3 mb-3 fw-normal text-center">Регистрация</h1>

        <div class="form-floating">
        <input type="email" class="form-control mb-2" id="email" name="email" placeholder="">
        <label for="email">Email</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control mb-2" id="password" name="password" placeholder="">
        <label for="password">Пароль</label>
        </div>
        <div class="form-floating">
        <input type="password" class="form-control mb-2" id="password-confirm" name="password_confirmation" placeholder="">
        <label for="password-confirm">Повторите пароль</label>
        </div>

        <button class="w-100 btn btn-lg btn-primary" type="submit">Зарегистрироваться</button>
    </form>
</main>
<style>
    .form-signup {
    width: 100%;
    max-width: 330px;
    padding: 15px;
    margin: auto;
    }
</style>
@endsection