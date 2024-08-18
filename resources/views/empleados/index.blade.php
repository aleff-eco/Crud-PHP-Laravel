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

                    <a href="{{ url('empleados/create') }}" class="btn btn-success mb-3">Agregar empleado</a>

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
                        <tbody>
                            @foreach ($Empleados as $Empleado)
                                <tr>
                                    <td> {{ $loop->iteration }} </td>
                                    <td> {{ $Empleado->id }} </td>
                                    <td>
                                        <img src="{{ $Empleado->image ? asset('storage/' . $Empleado->image) : asset('./public/icon.png') }}"
                                            class="img-thumbnail img-fluid rounded-circle" alt="Imagen de perfil" width="80">
                                    </td>
                                    <td> {{ $Empleado->name }} {{ $Empleado->lastName }} </td>
                                    <td> {{ $Empleado->email }} </td>
                                    <td>
                                        <a class="btn btn-sm btn-primary"
                                            href="{{ url('/empleados/' . $Empleado->id . '/edit') }}"
                                            style="margin-right: 10px;">
                                            <i class="fas fa-edit mr-1"></i> Editar
                                        </a>
                                    
                                        <form method="post" action="{{ url('/empleados/' . $Empleado->id) }}"
                                            style="display:inline">
                                            {{ csrf_field() }}
                                            {{ method_field('DELETE') }}
                                            <button class="btn btn-sm btn-danger"
                                                type="submit" onclick="return confirm('¿Borrar?');"
                                                style="margin-left: 10px;">
                                                <i class="fas fa-trash-alt mr-1"></i> Borrar
                                            </button>
                                        </form>
                                    </td>
                                    
                                </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
@endsection
