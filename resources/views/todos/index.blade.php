@extends('layouts.main')

@section('content')
  <div>

    {{-- <div>
      <form action="" method="post">

      </form>
    </div> --}}

    <h4>Todos</h4>
    <ul>
      @foreach ($todos as $todo)
        <li>{{ $todo->title }}</li>
      @endforeach
    </ul>
  </div>
@endsection
