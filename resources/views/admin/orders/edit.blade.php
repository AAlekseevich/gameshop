@extends('admin.layouts.admin')

@section('title', 'Редактировать категорию')

@section('content')
    <form action="{{route('orders.update')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$order->id}}">
        <label>Имя: </label><input type="text" name="name" value="{{$order->name}}"><br>
        <label>Email: </label><input type="text" name="email" value="{{$order->email}}"><br>
        <label>ID товара: </label><input type="text" name="product_id" value="{{$order->id}}">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection