<!DOCTYPE html>
<html lang="ru">
<html>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Coffee: @yield('title')</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    </head>
    <body>
        <header class="p-2 bg-dark text-white mb-3">
            <div class="container">
                <div class="d-flex flex-wrap align-items-center justify-content-center justify-content-lg-start">

                    <ul class="nav col-12 col-lg-auto me-lg-auto mb-2 justify-content-center mb-md-0">
                    </ul>

                    <div class="text-center">
                        @guest
                        <a href="{{route('login')}}" role="button" class="btn btn-outline-primary">Войти</a>
                        <a href="{{route('register')}}" role="button" class="btn btn-outline-warning">Регистрация</a>
                        @endguest
                        <a href="{{route('product')}}" role="button" class="btn btn-outline-light">Меню</a>
                        <a href="{{route('basket')}}" role="button" class="btn btn-outline-light">Корзина</a>
                        @auth
                        <a @admin href="{{route('orders')}}" @else href="{{route('user-orders')}}" @endadmin role="button" class="btn btn-outline-light">Заказы</a>
                        <a href="{{route('get-logout')}}" role="button" class="btn btn-outline-danger">Выйти</a>
                        @endauth
                    </div>
                </div>
            </div>
        </header>
        <div class="container">
        @if($errors->any())
            <div class="alert alert-danger text-center">
                <ul>
                    @foreach($errors->all() as $error)
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
            @if (session()->has('success'))
                <p class="alert alert-success text-center">{{session()->get('success')}}</p>
            @endif
            @if (session()->has('warning'))
                <p class="alert alert-warning text-center">{{session()->get('warning')}}</p>
            @endif
            @yield('main_content')
        </div>
    </body>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        body {
        align-items: center;
        padding-bottom: 40px;
        background-color: #f5f5f5;
        }
    </style>
</html>