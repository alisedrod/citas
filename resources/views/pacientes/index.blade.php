@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Pacientes</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'pacientes.create', 'method' => 'get']) !!}
                        {!! Form::submit('Crear paciente', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['route' => 'pacientes.index', 'method' => 'get']) !!}
                        {!! Form::label('especialidad_id', 'Filtrar por la especialidad de la enfermedad') !!}
                        {!! Form::select('especialidad_id', $especialidades, ['class'=>'btn btn-default']) !!}
                        {!! Form::submit('Buscar',['class'=> 'btn xs']) !!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => 'pacientes.index', 'method' => 'get']) !!}
                        {!! Form::submit('Mostrar todos los pacientes', ['class'=> 'btn btn-link btn-sm'])!!}
                        {!! Form::close() !!}
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Nuhsa</th>
                                <th>Enfermedad</th>

                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($pacientes as $paciente)


                                <tr>
                                    <td>{{ $paciente->name }}</td>
                                    <td>{{ $paciente->surname }}</td>
                                    <td>{{ $paciente->nuhsa }}</td>
                                    <td>{{ $paciente->enfermedad->name }}</td>

                                    <td>
                                        {!! Form::open(['route' => ['pacientes.edit',$paciente->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['pacientes.destroy',$paciente->id], 'method' => 'delete']) !!}
                                        {!!   Form::submit('Borrar', ['class'=> 'btn btn-danger' ,'onclick' => 'if(!confirm("¿Está segur@?"))event.preventDefault();'])!!}
                                        {!! Form::close() !!}

                                    </td>
                                </tr>
                            @endforeach
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection