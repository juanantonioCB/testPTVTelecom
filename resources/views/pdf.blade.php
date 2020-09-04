@extends('layout')
@section('title')
    
@endsection
@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8">

                <div class="table-responsive">
                    <h1>FICHA</h1>
                    <table class="table ">
                        <thead>
                            <tr>
                                <th scope="col">Nombre</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $name }}</td>
                            </tr>
                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">Email</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td>{{ $email }}</td>
                            </tr>

                        </tbody>
                        <thead>
                            <tr>
                                <th scope="col">Firma</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td><img src="data:image/png;base64,{{ $image }}" /></td>
                            </tr>

                        </tbody>
                    </table>

                </div>
            </div>
        </div>
    </div>


@endsection
