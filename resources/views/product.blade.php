@extends('layouts.app')

@section('title', 'Страница товара')

@section('page-title', 'Страница товара')

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
                    </div><a href="#ex1" rel="modal:open" class="btn btn-blue">Купить</a>
                </div>
                <div class="product-container__content-text__description">
                    {{$product->description}}
                </div>
            </div>
        </div>
    </div>

    <div class="content-bottom">
        <div class="line"></div>
        <div class="content-head__container">
            <div class="content-head__title-wrap">
                <div class="content-head__title-wrap__title bcg-title">Посмотрите наши товары</div>
            </div>
        </div>
        <div class="content-main__container">
            <div class="products-columns">
                @foreach($products as $item)
                    <div class="products-columns__item">
                        <div class="products-columns__item__title-product"><a href="{{route('product', ['id' => $item->id])}}" class="products-columns__item__title-product__link">{{$item->name}}</a></div>
                        <div class="products-columns__item__thumbnail"><a href="{{route('product', ['id' => $item->id])}}" class="products-columns__item__thumbnail__link"><img src="{{$item->image}}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                        <div class="products-columns__item__description"><span class="products-price">{{$item->price}} руб</span><a href="{{route('product', ['id' => $item->id])}}" class="btn btn-blue">Купить</a></div>
                    </div>
                @endforeach
            </div>
        </div>
    </div>

    <div id="ex1" class="modal">
        <center><h3>Для связи с нашим менеджером оставьте пожалуйста свои данные</h3></center>
        <form action="{{route('order.create')}}" method="post">
            {{csrf_field()}}
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <label>Email: </label><input type="text" name="email" value="{{Auth::user()->email}}"><br>
            <label>Введите Ваше имя: </label><input type="text" name="name" value="{{Auth::user()->name}}"><br>
            <input type="submit">
        </form>
    </div>
@endsection