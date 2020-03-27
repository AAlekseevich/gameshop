@extends('admin.layouts.admin')

@section('title', 'Добавить категорию')

@section('content')
    <form action="{{route('category.create')}}" method="post">
        {{ csrf_field() }}
        <label>Название</label><input type="text" name="name"><br>
        <label>Описание</label><input type="text" name="description"><br>
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection