@extends('app')

@section('content')
  <div class="container w-25 border p-4 mt-4">
    <form action="{{ route('tasks-update', ['id' => $task->id]) }}" method="POST">
      @method('PATCH')
      @csrf <!-- Genera un token al servidor web -->
      @if (session('success'))
        <h6 class="alert alert-success">{{ session('success')}}</h6>
      @endif
      @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
      @enderror
      <div class="mb-3">
        <label for="title" class="form-label">Titulo de la tarea</label>
        <input type="text" name="title" class="form-control" value="{{ $task->title }}">
      </div>
      <button type="submit" class="btn btn-primary">Actualizar</button>

  </div>
@endsection