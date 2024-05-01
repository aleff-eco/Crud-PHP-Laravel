@extends('layouts.app')
@section('content')
    <div class='container'>
        <div class="row justify-content-center">
            <div class="col-md-8">

                <div>
                    @if (Session::has('Mensaje'))
                    <div class="alert alert-success" role="alert">
                        {{ Session::get('Mensaje') }}
                    </div>
                    @endif


                    <a href="{{ url('empleados/create') }}" class="btn  btn-success">Agregar empleado</a>
                    <br>
                    <br>

                    <table class="table table-light table-hover">
                        <thead>
                            <tr>
                                <th>Fila</th>
                                <th>ID</th>
                                <th>Imagen</th>
                                <th>Nombre</th>
                                <th>Email</th>
                                <th>Acciones</th>
                            </tr>
                        </thead>

                        <body>
                            @foreach ($Empleados as $Empleado)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $Empleado->id }} </td>
                                    <td> <img src="{{ asset('storage') . '/' . $Empleado->image }}" class="img-thumbnail img-fluid" alt="" width="120"> </td>
                                    <td> {{ $Empleado->name }} {{ $Empleado->lastName }} </td>
                                    <td> {{ $Empleado->email }} </td>
                                    <td>
                                        <a class="btn btn-outline-warning" href="{{ url('/empleados/' . $Empleado->id . '/edit') }}">Editar</a>
                                        
                                        <form method="post" action="{{ url('/empleados/' . $Empleado->id) }}"
                                            style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-outline-danger ml-2" type="submit"
                                                onclick="return confirm('Borrar ');">Borrar</button>
                                        </form>
                                    </td>
                                </tr>
                            @endforeach
                        </body>
                    </table>
                    

                </div>
                
            </div>
        </div>
    </div>
    
@endsection

