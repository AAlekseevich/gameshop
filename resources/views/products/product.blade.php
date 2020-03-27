@extends('layouts.app')

@section('title', 'Страница товара')

@section('page-title', 'Товар')

@section('content')
    <div class="content-main__container">
        <div class="product-container">
            <div class="product-container__image-wrap"><img src="{{$product->image}}" class="image-wrap__image-product"></div>
            <div class="product-container__content-text">
                <div class="product-container__content-text__title">{{$product->name}}</div>
                <div class="product-container__content-text__price">
                    <div class="product-container__content-text__price__value">
                        Цена: <b>{{$product->price}}</b>
                        руб
                    </div><a href="#" class="btn btn-blue">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    {{$product->description}}
                </div>
            </div>
        </div>
    </div>
@endsection