@extends('layouts.game')

@section('title')
edit game
@endsection

@section('content')


<style>
    .uper {
      margin-top: 40px;
    }
  </style>
  <div class="card uper">
    <div class="card-header">
      Edit Game Data
    </div>
    <div class="card-body">
      @if ($errors->any())
        <div class="alert alert-danger">
          <ul>
              @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
              @endforeach
          </ul>
        </div><br />
      @endif
        <form method="post" action="{{ route('game.update', $game->id ) }}">
            <div class="form-group">
                @csrf
                @method('PATCH')
                <label for="country_name">Game Name:</label>
                <input type="text" class="form-control" name="name" value="{{ $game->name }}"/>
            </div>
            <div class="form-group">
                <label for="cases">Game Price :</label>
                <input type="text" class="form-control" name="price" value="{{ $game->price }}"/>
            </div>
            <button type="submit" class="btn btn-primary">Update game</button>
        </form>
    </div>
  </div>

@endsection
