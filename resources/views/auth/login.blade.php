@extends('layout.app')

@section('title', 'Login')

@section('content')
<div class="container">
    <div class="col-md-6">
      <h2>Please Login </h2>
        <form action="/login" method="post">
        <div class="form-group">
            <label for="email">Email:</label>
            <input type="email" name="email" id="email" class="form-control" />
        </div>

         <div class="form-group">
            <label for="password">Password:</label>
            <input type="password" name="password" id="password" class="form-control" />
         </div>
        <input type="hidden" name="_token" value="{{ csrf_token() }}" />

         <button type="submit" class="btn btn-primary">Login</button>

        </form>
    </div>
</div>
@endsection