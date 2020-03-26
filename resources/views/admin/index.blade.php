@extends('admin.layouts.admin')

@section('title', 'Главная')

@section('content')
    Всего пользователей: <?php echo $countUsers ?><br>
    Всего категорий: <?php echo $countCategory ?><br>
    Всего товаров: <?php echo $countProducts ?><br>
    Всего заказов: <br>
@endsection