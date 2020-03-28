@extends('layouts.app')

@section('title', 'Мои заказы')

@section('page-title', 'Мои заказы')

@section('content')
    <div class="cart-product-list">
    @foreach($products as $product)
            <div class="cart-product-list__item">
                <div class="cart-product__item__product-photo"><img src="{{$product->image}}" class="cart-product__item__product-photo__image"></div>
                <div class="cart-product__item__product-name">
                    <div class="cart-product__item__product-name__content"><a href="#">{{$product->name}}</a></div>
                </div>
                <div class="cart-product__item__cart-date">
                    <div class="cart-product__item__cart-date__content">{{$product->created_at->format('d.m.Y')}}</div>
                </div>
                <div class="cart-product__item__product-price"><span class="product-price__value">{{$product->price}} рублей</span></div>
            </div>
    @endforeach
    </div>
    <div class="cart-product-list__result-item">
        <div class="cart-product-list__result-item__text">Итого</div>
        <div class="cart-product-list__result-item__value">{{$sum}} рублей</div>
    </div>
    <div class="content-footer__container">
        <div class="btn-buy-wrap"><a href="#" class="btn-buy-wrap__btn-link">Перейти к оплате</a></div>
    </div>
@stop