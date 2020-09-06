@extends('layout')
@section('title')
Login
@endsection
@section('content')


<div class="container">

  <div class="row justify-content-md-center">

    <div class="col-5">


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
         
      
          <button type="submit" class="btn btn-primary">Enviar</button>
        </form>


    </div>
  </div>
</div>

  @endsection()