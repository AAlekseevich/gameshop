@extends('admin.layouts.admin')

@section('title', 'Добавить категорию')

@section('content')
    <form action="{{route('category.create')}}" method="post">
        {{csrf_token()}}
        <label>Название</label><input type="text" name="name">
    </form>
@endsection