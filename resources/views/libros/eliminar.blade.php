@extends('layouts.app')
@section('content')
<div class="card-body">
    <h5 class="card-title">Eliminar un libro</h5>
        <form method="POST" action="{{route('libros.destroy')}}">
            @csrf
            <div class="form-group">
                <label for="nombre">Id del libro:</label>
                <input type="text" id="IdLibro" name="IdLibro" class="form-control" required>
            </div>
            <br>
            <button type="submit" class="form-control btn btn-primary">Eliminar</button>
        </form>
        @if(session('success'))
        <div class="alert alert-success" role="alert">
            {{ session('success')}}
        </div>
        @endif
        @if(session('error'))
        <div class="alert alert-danger" role="alert">
            {{ session('error')}}
        </div>
        @endif
</div>
@endsection