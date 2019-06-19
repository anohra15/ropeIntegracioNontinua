@extends('layouts.app')

@section('content')

<div class="container">

    <div class="row text-center">
        <div class="col-12">
            <h2 class="mt-5 mb-5">LISTADO DE EMPLEADOS</h2>
        </div>
    </div>


    <ul class="nav justify-content-center">
        <li class="nav-item">
            <a class="nav-link active" href="/listadoS">Supervisores</a>
        </li>
        <li class="nav-item">
            <a class="nav-link" href="/listadoO">Operadores</a>
        </li>
    </ul>


    <table class="table">
        <thead class="thead-dark">
        <tr>
            <th scope="col">Nombre</th>
            <th scope="col">Apellido</th>
            <th scope="col">Cargo</th>
            <th scope="col">Usuario</th>
            <th scope="col">Estado</th>
            <th scope="col">  Accion 1</th>
            <th scope="col">  Accion 2</th>
        </tr>
        </thead>
        <tbody>
        @foreach($supervisors as $supervisor)
            <tr>
                <th>{{$supervisor->name}}</th>
                <td> {{$supervisor->lastname}}</td>
                <td> {{$supervisor->position}}</td>
                <td> {{$supervisor->username}}</td>
                <td> <button type="submit" class="btn btn-success">{{$supervisor->status}}</button></td>

                @if($supervisor->status==='bloqueado')
                <td>
                    <form action="{{ url('desbloquear') }}/{{$supervisor->id}}" method="POST">
                        {{csrf_field()}}
                        {{method_field('PUT')}}

                        <button type="submit" class="btn btn-danger">Desbloquear</button>

                    </form>
                </td>
                @else
                    <td>
                        <form action="{{ url('desbloquear') }}/{{$supervisor->id}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                            <button type="submit" class="btn btn-danger" disabled="disabled">Desbloquear</button>

                        </form>
                    </td>
                @endif
                <td>
                    <form action="{{ url('modificar') }}/{{$supervisor->id}}" method="POST">
                            {{csrf_field()}}
                            {{method_field('PUT')}}

                        <button type="submit" class="btn btn-primary">Modificar</button>

                    </form>
                </td>

            </tr>

        @endforeach
        </tbody>
    </table>
</div>

@endsection

