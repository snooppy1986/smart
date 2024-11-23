@extends('layout.dashboard')

@section('content')
    <div class="container">
        @if (session('message'))
            <div class="alert alert-success">{{ session('message') }}</div>
        @endif
        <a href="{{route('genre.create')}}" class="btn btn-success mb-2 text-white">
            Создать
        </a>
        <div class="card">
            <div class="card-header">Жанры</div>
            <div class="card-body">
                {{ $dataTable->table() }}
            </div>
        </div>
    </div>
@endsection
@push('scripts')
    {{ $dataTable->scripts(attributes: ['type' => 'module']) }}

    <script>
        $('.table').on('click', '#delete', function (){
            let id = $(this).attr('attr_id');
            $.ajax({
                url:'genre/delete/'+id,
                method: 'post',
                data: {
                    "_token": "{{ csrf_token() }}"
                },
                success: function (res){
                   location.reload()

                }
            })
        })
    </script>
@endpush
