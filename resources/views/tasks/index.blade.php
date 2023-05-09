@extends('app')

@section('content')
  <div class="container w-25 border p-4 mt-4">
    <form action="{{ route('tasks') }}" method="POST">
      @csrf <!-- Genera un token al servidor web -->
      @if (session('success'))
        <h6 class="alert alert-success">{{ session('success')}}</h6>
      @endif
      @error('title')
        <h6 class="alert alert-danger">{{ $message }}</h6>
      @enderror
      <div class="mb-3">
        <label for="title" class="form-label">Titulo de la tarea</label>
        <input type="text" name="title" class="form-control">
      </div>
      <button type="submit" class="btn btn-primary">Crear</button>
    </form>
    @foreach ($tasks as $task )
      <div class="row py-1">
        <div class="col-md-9 d-flex align-items-center">
          <a href="{{ route('tasks-show', ['id' => $task->id]) }}">{{ $task->title }}</a>
        </div>
        <div class="col-md-3 d-flex justify-content-end">
          <form action="{{ route('tasks-destroy', ['id' => $task->id]) }}" method="POST">
            @method('DELETE')
            @csrf
            <button class="btn btn-danger btn-sm">Eliminar</button>
          </form>
        </div>
      </div> 

    @endforeach

  </div>
@endsection