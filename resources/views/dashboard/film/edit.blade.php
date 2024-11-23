@extends('layout.dashboard')

@section('content')
    @if (session('message'))
        <div class="alert alert-success">{{ session('message') }}</div>
    @endif
    <div class="d-flex align-items-center justify-content-center mt-3">
        <form class="w-50" method="post" action="{{route('film.update', ['id' => $film->id])}}" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
                <label for="title" class="form-label">Название фильма</label>
                <input
                    name="title"
                    type="text"
                    class="form-control @error('title') is-invalid @enderror"
                    id="title"
                    value="{{$film->title}}"
                >
                @error('title')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-3">
                <label for="title" class="form-label">Жанры фильма</label>

                <select name="genres[]" class="selectpicker w-100 @error('genres') is-invalid @enderror" multiple aria-label="size 3 select example">
                    @foreach($genres as $genre)
                        <option value="{{$genre->id}}" {{in_array($genre->id, $genresIds) ? 'selected' : ''}}>
                            {{$genre->title}}
                        </option>
                    @endforeach
                </select>
                @error('genres')
                <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>

            <div class="mb-4 d-flex justify-content-start">
                <img id="selectedImage" src="{{asset('storage/images/'.$film->image)}}"
                     alt="example placeholder" style="width: 300px;" />
            </div>
            <div class="mb-3">
                <label class="form-label" for="image">Постер</label>
                <input
                    name="image"
                    type="file"
                    class="form-control @error('image') is-invalid @enderror"
                    id="image"
                    onchange="displaySelectedImage(event, 'selectedImage')"

                />
                @error('image')
                    <div class="alert alert-danger">{{ $message }}</div>
                @enderror
            </div>


            <button type="submit" class="btn btn-primary">Обновить</button>
        </form>
    </div>
@endsection

<script>
    function displaySelectedImage(event, elementId) {
        const selectedImage = document.getElementById(elementId);
        const fileInput = event.target;

        if (fileInput.files && fileInput.files[0]) {
            const reader = new FileReader();

            reader.onload = function(e) {
                selectedImage.src = e.target.result;
            };

            reader.readAsDataURL(fileInput.files[0]);
        }
    }
</script>
