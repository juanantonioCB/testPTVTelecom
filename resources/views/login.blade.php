@extends('layout')
@section('title')
<h1>Login</h1>
@endsection
@section('content')
<form method="POST">
  @csrf
    <div class="form-group">
      <label>USUARIO</label>
      <input name="user" type="name" class="form-control" placeholder="Usuario" value="13242">
    </div>
    
    <div class="form-group">
      <label>DNI</label>
      <input name="dni" class="form-control" placeholder="DNI" value="44358696E">
    </div>
   

    <button type="submit" class="btn btn-primary">Submit</button>
  </form>
  @endsection()