@extends('admin.layouts.admin')

@section('title', 'Добавить категорию')

@section('content')
    <form action="{{route('products.create')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <label>Название</label><input type="text" name="name"><br>
        <lable>Категория</lable>
        <select name="category" id="category">
            @foreach($categories as $category)
            <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        <label>Цена</label><input type="text" name="price"><br>
        <label>количество</label><input type="text" name="count"><br>
        <label>Описание</label><input type="text" name="description"><br>
        <label>Изображение</label><input type="file" name="image"><br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection