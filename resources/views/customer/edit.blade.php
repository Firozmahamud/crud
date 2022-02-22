@extends('layouts.app')

@section('title')
edit customers
@endsection

@section('content')

<div class="row">
    <div class="col-lg-12 margin-tb">
        <div class="pull-left">
            <h2>Edit customers</h2>
        </div>
        <div class="pull-right">
            <a class="btn btn-primary" href="{{ route('customer.index') }}"> Back</a>
        </div>
    </div>
</div>

@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <form action="{{ route('customer.update',$all->id) }}" method="post">
        {{--  <div class="form-group">  --}}
            @csrf
            @method('PATCH')

     <div class="row">
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Name:</strong>
                <input type="text" name="name" value="{{ $all->name }}" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>E-mail::</strong>
                <input type="email" name="email" value="{{ $all->email}}" class="form-control">
            </div>
        </div>
        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Phone:</strong>
                <input type="text" name="phone" value="{{ $all->phone }}" class="form-control">
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12">
            <div class="form-group">
                <strong>Address:</strong>
                <textarea class="form-control" style="height:50px" name="Address">{{ $all->Address}}</textarea>
            </div>
        </div>

        <div class="col-xs-12 col-sm-12 col-md-12 text-center">
          <button type="submit" class="btn btn-primary">Update</button>
        </div>
    </div>
</form>


@endsection
