@extends('admin.layouts.admin')

@section('title', 'Редактировать категорию')

@section('content')
    <form action="{{route('category.edit')}}" method="post">
        {{ csrf_field() }}
        <label>Название</label><input type="text" name="name">
        <label>Описание</label><input type="text" name="description">
        <button type="submit" class="btn btn-primary">Добавить</button>
    </form>
@endsection