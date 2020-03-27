@extends('layouts.app')

@section('title', 'Результаты поиска')

@section('page-title', 'Результаты поиска')

@section('content')
    <h2>Результаты поиска по запросу: <?php echo $_POST['search'] ?></h2>

    <div class="content-main__container">
        <div class="products-columns">
            @foreach($results as $result)
                <div class="products-columns__item">
                    <div class="products-columns__item__title-product"><a href="#" class="products-columns__item__title-product__link">{{ $result->name }}</a></div>
                    <div class="products-columns__item__thumbnail"><a href="#" class="products-columns__item__thumbnail__link"><img src="{{ $result->image }}" alt="Preview-image" class="products-columns__item__thumbnail__img"></a></div>
                    <div class="products-columns__item__description"><span class="products-price">{{ $result->price }}</span><a href="#" class="btn btn-blue">Купить</a></div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $results->links() }}
@endsection

