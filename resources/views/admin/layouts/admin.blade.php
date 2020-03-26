<!DOCTYPE html>
<html lang="ru">
<head>
    <title>@yield('title') - Админ панель - ГеймсМаркет</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

    <script>
        window.Laravel = <?php echo json_encode([
            'csrfToken' => csrf_token(),
        ]); ?>
    </script>
</head>
<body>
<nav>
    <ul>
        <li><a href="{{route('category')}}">Категории</a></li>
        <li><a href="{{route('products')}}">Товары</a></li>
        <li><a href="{{route('orders')}}">Заказы</a></li>
        <li><a href="{{route('changemail')}}">Изменить email</a></li>
    </ul>
</nav>
@yield('content')
</body>
</html>