@extends('layouts.game')

@section('title')
index game
@endsection

@section('content')

<style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="uper">
    @if(session()->get('success'))
      <div class="alert alert-success">
        {{ session()->get('success') }}
      </div><br />
    @endif
    <table class="table table-striped">
      <thead>
          <tr>
            <td>ID</td>
            <td>Game Name</td>
            <td>Game Price</td>
            <td colspan="2">Action</td>
          </tr>
      </thead>
      <tbody>
          @foreach($game as $key => $games)
          <tr>
              {{-- <td>{{$games->id}}</td> --}}
            <td>{{ $key+1 }}</td>

              <td>{{$games->name}}</td>
              <td>{{$games->price}}</td>
              <td><a href="{{ route('game.edit', $games->id)}}" class="btn btn-primary">Edit</a></td>
              <td>
                  <form action="{{ route('game.destroy', $games->id)}}" method="post">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">Delete</button>
                  </form>
              </td>
          </tr>
          @endforeach
      </tbody>
    </table>
  <div>

@endsection
