@extends('admin.layouts.admin')

@section('title', 'Редактировать товар')

@section('content')
    <form action="{{route('products.update')}}" method="post" enctype="multipart/form-data">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$product->id}}">
        <label>Название</label><input type="text" name="name" value="{{$product->name}}"><br>
        <lable>Категория</lable>
        <select name="category" id="category">
            @foreach($categories as $category)
                <option value="{{$category->id}}">{{$category->name}}</option>
            @endforeach
        </select><br>
        <label>Цена</label><input type="text" name="price" value="{{$product->price}}"><br>
        <label>количество</label><input type="text" name="count" value="{{$product->count}}"><br>
        <label>Описание</label><textarea type="text" name="description" rows="10" cols="120" >{{$product->description}}</textarea><br>
        <label>Изображение</label><input type="file" name="image" value="{{$product->image}}"><br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection