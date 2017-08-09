@extends('layout.app')

@section('title', 'Register')

@section('content')
    <div class="col-md-6">
      <h2>Please Register </h2>
        <form action="/register" method="post">
        <div class="form-group">
            <label for="email">Name:</label>
            <input type="text" name="name" id="name" class="form-control" />
        </div>
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>

         <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" />
         </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

         <button type="submit" class="btn btn-primary">Register</button>

        </form>
    </div>
@endsection