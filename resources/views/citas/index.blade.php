@extends('layouts.app')

@section('content')
    <div class="container">
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Citas</div>

                    <div class="panel-body">
                        @include('flash::message')
                        {!! Form::open(['route' => 'citas.create', 'method' => 'get']) !!}
                        {!!   Form::submit('Crear cita', ['class'=> 'btn btn-primary'])!!}
                        {!! Form::close() !!}
                        <br>
                        {!! Form::open(['route' => ['citas.index','id'], 'method' => 'get']) !!}
                        {!!   Form::submit('Mostrar citas futuras', ['class'=> 'btn btn-link btn-sm'])!!}
                        {!! Form::close() !!}
                        {!! Form::open(['route' => ['citas.show','id'], 'method' => 'get']) !!}
                        {!!   Form::submit('Mostrar todas las citas', ['class'=> 'btn btn-link btn-sm'])!!}
                        {!! Form::close() !!}
                        <table class="table table-striped table-bordered">
                            <tr>
                                <th>Fecha</th>
                                <th>Medico</th>
                                <th>Paciente</th>
                                <th>Localización</th>
                                <th>Hora de finalización de la cita</th>
                                <th colspan="2">Acciones</th>
                            </tr>

                            @foreach ($citas as $cita)


                                <tr>
                                    <td>{{ $cita->fecha_hora }}</td>
                                    <td>{{ $cita->medico->full_name }}</td>
                                    <td>{{ $cita->paciente->full_name}}</td>
                                    <td>{{$cita->localizacion->full_name}}</td>
                                    <td>{{$cita->hora_fin}}</td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.edit',$cita->id], 'method' => 'get']) !!}
                                        {!!   Form::submit('Editar', ['class'=> 'btn btn-warning'])!!}
                                        {!! Form::close() !!}
                                    </td>
                                    <td>
                                        {!! Form::open(['route' => ['citas.destroy',$cita->id], 'method' => 'delete']) !!}
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