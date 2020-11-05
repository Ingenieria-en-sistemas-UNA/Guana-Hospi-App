@extends('layouts.default')
@section('content')

<div class="container">
    <div class="col-sm-12">  @if(session()->get('success'))
        <div class="alert alert-success">
          {{ session()->get('success') }}
        </div>
      @endif
    </div>
    <div class="col-sm-12">  @if(session()->get('error'))
        <div class="alert alert-danger">
          {{ session()->get('error') }}
        </div>
      @endif
    </div>
    <div class="table-responsive">
        <table
            class="table"
            data-toggle="table"
            data-pagination="true"
            data-height="460"
            data-search="true">
            <thead class="thead-dark">
              <tr>
                <th>Responsable</th>
                <th>Fecha</th>
                <th>Descripcion</th>
              </tr>
            </thead>
            <tbody>
                @foreach( $activities as $activity )
                    <tr>
                        <td>{{$activity->Email}}</td>
                        <td>{{$activity->Fecha}}</td>
                        <td>{{$activity->Accion}}</td>
                    </tr>
                @endforeach
            </tbody>
          </table>
    </div>
</div>

@stop
