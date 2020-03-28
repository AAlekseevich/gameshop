@extends('admin.layouts.admin')

@section('title', 'Главная')

@section('content')
    Всего пользователей: {{$countUsers}}<br>
    Всего категорий: {{$countCategory}}<br>
    Всего товаров: {{$countProducts}}<br>
    Всего заказов: {{ $countOrders }}
@endsection