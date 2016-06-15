@extends('layouts.app')

@section('title', 'Cirugia')

@section('content')

  <a data-url="{{ route('cirugias.create') }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
    <span class="fa fa-plus-circle fa-2x" aria-hidden='true'></span>
  </a> 
   <table class="table table-condensed">
    <thead>
        <th>Nombre</th>
        <th>Accion</th>
    </thead>
    <tbody>
    @foreach($cirugias as $cirugia)
        <tr>
         <td>{{ $cirugia->name }}</td>
         <td>
            <a data-url="{{ route('cirugias.edit', $cirugia->id) }}" class="load-form-modal  panelColorGreen" data-toggle ="modal" data-target='#form-modal'>
               <span class="fa fa-pencil-square-o fa-2x" aria-hidden='true'></span>
            </a> 
            <a href="{{ route('cirugias.destroy', $cirugia->id) }}" ><span class="fa fa-trash fa-2x panelColorRed" aria-hidden="true"></span></a>
         </td>
        </tr>
    @endforeach
    </tbody>
</table>

@include('partials.form-modal', ['title'=>'Agregar/Editar Anestesiologos'])
@include('partials.confirmation_modal', ['title'=>'Confirmation Modal'])

@endsection
