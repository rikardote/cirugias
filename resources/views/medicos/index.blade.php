@extends('layouts.app')

@section('title', 'Medicos')

@section('content')

  <a data-url="{{ route('medicos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-condensed">
    <thead>
        <th>Nombre</th>
        <th>Especialidad</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($medicos as $medico)
        <tr>
         <td>{{ $medico->apellido_pat }} {{ $medico->apellido_mat }} {{ $medico->nombres }}</td>
         <td>{{ $medico->especialidad->name }}</td>
         <td>
            <a data-url="{{ route('medicos.edit', $medico->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            </a> 
            <a href="{{ route('medicos.destroy', $medico->id) }}" ><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('partials.form-modal', ['title'=>'Agregar/Editar Medicos'])
@include('partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection
