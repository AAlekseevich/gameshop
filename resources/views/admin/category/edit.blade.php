@extends('admin.layouts.admin')

@section('title', 'Редактировать категорию')

@section('content')
    <form action="{{route('category.update')}}" method="post">
        {{ csrf_field() }}
        <input type="hidden" name="id" value="{{$category->id}}">
        <label>Название</label><input type="text" name="name" value="{{$category->name}}"><br>
        <label>Описание</label><textarea type="text" name="description" rows="5" cols="50">{{$category->description}}</textarea><br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection