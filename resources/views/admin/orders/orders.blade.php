@extends('admin.layouts.admin')

@section('title', 'Главная')

@section('content')
    <h2>Таблица заказов:</h2>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Имя</th>
            <th>Email</th>
            <th>ID продукта</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        @foreach($orders as $order)
            <tr>
                <td>{{$order->id}}</td>
                <td>{{$order->name}}</td>
                <td>{{$order->email}}</td>
                <td>{{$order->product_id}}</td>
                <td><a href="{{route('orders.edit', $order->id)}}">Редактировать</a></td>
                <td><a href="{{route('orders.remove', $order->id)}}">Удалить</a></td>
            </tr>
        @endforeach
    </table>
@endsection