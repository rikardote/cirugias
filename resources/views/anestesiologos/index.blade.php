@extends('layouts.app')

@section('title', 'Anestesiologos')

@section('content')

  <a data-url="{{ route('anestesiologos.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-condensed">
    <thead>
        <th>Nombre</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($anestesiologos as $anestesiologo)
        <tr>
         <td>{{ $anestesiologo->fullname }}</td>
         <td>
            <a data-url="{{ route('anestesiologos.edit', $anestesiologo->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            </a> 
            <a href="{{ route('anestesiologos.destroy', $anestesiologo->id) }}" ><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('partials.form-modal', ['title'=>'Agregar/Editar Anestesiologos'])
@include('partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection
