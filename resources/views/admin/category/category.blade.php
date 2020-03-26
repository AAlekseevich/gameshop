@extends('admin.layouts.admin')

@section('title', 'Категории')

@section('content')
    <a href="{{route('category.add')}}">Добавить категорию</a>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Название</th>
        <th>Описание</th>
        <th>Редактировать</th>
        <th>Удалить</th>
    </tr>
    @foreach($categories as $category)
        <tr>
            <td>{{$category->id}}</td>
            <td>{{$category->name}}</td>
            <td>{{$category->description}}</td>
            <td><a href="{{route('category.edit', $category->id)}}">Редактировать</a></td>
            <td><a href="{{route('category.remove', $category->id)}}">Удалить</a></td>
        </tr>
    @endforeach
</table>
@endsection