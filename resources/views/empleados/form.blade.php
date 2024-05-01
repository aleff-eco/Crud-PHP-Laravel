<nav class="navbar bg-body-tertiary">
    <div class="container-fluid">
        <a class="navbar-brand"
            onclick="if(confirm('Volver al menu')) window.location.href = '{{ url('empleados') }}';">Volver</a>
    </div>
</nav>



<div class="container">

    <h4>formulario de empleados</h4>
    <div class="alert alert-light" role="alert">
        {{ $Modo == 'crear' ? 'Agregar empleado' : 'Modificar empleado' }}
    </div>


    <div class="form-group">
        <label for="name" class="control-label">{{ 'Nombre' }}</label>
        <input type="text" class="form-control  {{$errors->has('nombre') ? 'is-invalid': ''}}" name="name" id="name" value="{{ isset($Empleado->name) ? $Empleado->name:old('name') }}">
        {!! $errors->first('nombre', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="lastName" class="control-label">{{ 'Apellidos' }}</label>
        <input type="text" class="form-control {{$errors->has('nombre') ? 'is-invalid': ''}}" name="lastName" id="lastName" value="{{ isset($Empleado->lastName) ? $Empleado->lastName:old('lastName')}}">
        {!! $errors->first('apellidos', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="email" class="control-label">{{ 'Email' }}</label>
        <input type="email" class="form-control  {{$errors->has('nombre') ? 'is-invalid': ''}}" name="email" id="email" value="{{ isset($Empleado->email) ? $Empleado->email:old('email') }}">
        {!! $errors->first('email', '<div class="invalid-feedback">:message</div>') !!}
    </div>

    <div class="form-group">
        <label for="image"></label>
        @if (isset($Empleado->image) ? $Empleado->image : '')
            <img class="img-thumbnail img-fluid" src="{{ asset('storage') . '/' . $Empleado->image }}" alt="" width="150"> </br>
        @endif
    
    </div>

    <input class="btn btn-light form-control {{$errors->has('foto') ? 'is-invalid': ''}} " type="file" name="image" id="image" value="{{ isset($Empleado->image) ? $Empleado->image : '' }}">
    
    <input type="submit" class="{{ $Modo == 'crear' ? 'btn btn-success' : 'btn btn-primary' }}"
        value="{{ $Modo == 'crear' ? 'Agregar' : 'Modificar' }}">


</div>
