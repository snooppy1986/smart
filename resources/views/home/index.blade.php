@extends('layout.app')

@section('content')
    <a href="https://github.com/snooppy1986/smart.git">
        Git repository
    </a>
    <hr>
    <ul class="list-group ">
        <li class="list-group-item">
            <p>Жанры</p>
            <p>Панель управления</p>
            <a href="{{route('dashboard.genres.index')}}">Список всех жанров</a><br>
            <a href="{{route('genre.create')}}">Создать жанр</a>

            <p>API запросы</p>
            <p>Жанры ( выводит список всех жанров)</p>
            <p>{{route('api.genres.index')}}</p>
            <a href="{{route('api.genres.index')}}">Все  жанры</a><br>
            <p>Жанры/id (выводит список всех фильмов в данном жанре с разбивкой на страницы)(id=5)</p>
            <p>{{route('api.genre.show', ['id' => 5])}}</p>
            <a href="{{route('api.genre.show', ['id' => 5])}}">Фильмы жанра</a>
        </li>
        <li class="list-group-item">
            <p>Фильмы</p>
            <p>Панель управления</p>
            <a href="{{route('dashboard.films.index')}}">Список всех фильмов</a><br>
            <a href="{{route('film.create')}}">Создать фильм</a>

            <p>API запросы</p>
            <p>Получить все фильмы с разбивкой на страницы</p>
            <p>{{route('api.films.index')}}</p>
            <a href="{{route('api.films.index')}}">Все фильмы</a><br>
            <p>Выводит определенный фильм по ID (id=5)</p>
            <p>{{route('api.film.show', ['id' => 5])}}</p>
            <a href="{{route('api.film.show', ['id' => 5])}}">Фильм по ID</a>
        </li>
    </ul>
@endsection
