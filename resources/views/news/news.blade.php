@extends('layouts.app')

@section('title', 'Новости')

@section('page-title', 'Новости')

@section('content')
    <div class="content-main__container">
        <div class="news-list__container">
            @foreach($news as $item)
                <div class="news-list__item">
                    <div class="news-list__item__thumbnail"><img src="{{ $item->image }}"></div>
                    <div class="news-list__item__content">
                        <div class="news-list__item__content__news-title">{{ $item->title }}</div>
                        <div class="news-list__item__content__news-date">04.12.2016</div>
                        <div class="news-list__item__content__news-content">{{ substr($item->description, 0, 300)}}</div>
                    </div>
                    <div class="news-list__item__content__news-btn-wrap"><a href="{{route('single-news', ['id' => $item->id])}}" class="btn btn-brown">Подробнее</a></div>
                </div>
            @endforeach
        </div>
    </div>
    {{ $news->links() }}
@endsection
