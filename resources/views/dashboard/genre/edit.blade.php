@extends('layout.dashboard')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-flex align-items-center justify-content-center mt-3">
        <form class="w-50" method="post" action="{{route('genre.update', ['id' => $genre->id])}}">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название жанра</label>
                <input
                    name="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    value="{{$genre->title}}"
                >
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection
