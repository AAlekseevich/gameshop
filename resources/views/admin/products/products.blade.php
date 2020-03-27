@extends('admin.layouts.admin')

@section('title', 'Товары')

@section('content')
    <a href="{{route('products')}}">Добавить товар</a>
    <table border="1">
        <tr>
            <th>ID</th>
            <th>Название</th>
            <th>Категория</th>
            <th>Описание</th>
            <th>Цена</th>
            <th>Количество</th>
            <th>Редактировать</th>
            <th>Удалить</th>
        </tr>
        @foreach($products as $product)
            <tr>
                <td>{{$product->id}}</td>
                <td>{{$product->name}}</td>
                <td>{{$product->category}}</td>
                <td>{{substr($product->description, 0, 300)}}</td>
                <td>{{$product->price}}</td>
                <td>{{$product->count}}</td>
                <td><a href="{{route('products.edit', $product->id)}}">Редактировать</a></td>
                <td><a href="{{route('products.remove', $product->id)}}">Удалить</a></td>
            </tr>
        @endforeach
    </table>
@endsection