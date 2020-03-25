@extends('layouts.app')

@section('title', 'Главная')

@section('page-title', 'Последние товары')

@section('content')
    <div class="content-main__container">
        <div class="products-columns">
            @foreach($products as $product)
            <div class="products-columns__item">
                <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">{{ $product->name }}</a></div>
                <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="{{ $product->image }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                <div class="products-columns__item__description"><span class="products-price">{{ $product->price }}</span><a href="#" class="btn btn-blue">Купить</a></div>
            </div>
            @endforeach
        </div>
    </div>
    {{ $products->links() }}
@endsection

@section('rand-product')
    <div class="random-product-container__head">Случайный товар</div>
    <div class="random-product-container__content">
        <div class="item-product">
            <div class="item-product__title-product"><a href="#" class="item-product__title-product__link">{{ $randProduct->name }}</a></div>
            <div class="item-product__thumbnail"><a href="#" class="item-product__thumbnail__link"><img src="{{ $randProduct->image }}" alt="Preview-image" class="item-product__thumbnail__link__img"></a></div>
            <div class="item-product__description">
                <div class="item-product__description__products-price"><span class="products-price">{{ $randProduct->price }} руб</span></div>
                <div class="item-product__description__btn-block"><a href="#" class="btn btn-blue">Купить</a></div>
            </div>
        </div>
    </div>
@endsection