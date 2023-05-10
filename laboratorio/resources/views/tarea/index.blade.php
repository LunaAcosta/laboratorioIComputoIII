@extends('layouts.app')

@section('content')
<div class="container">
    
   <div class="alert alert-success alert-dismissible" role="alert">
      @if (Session::has('mensaje'))
      {{ Session::get('mensaje')}}
      @endif


      <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
      </button>
   </div>



 <table class="table table-hover table-striped">

    <thead class="thead-light">
        <tr>
            <th></th>
            <th>Nombre Tarea</th>
            <th>Titulo Tarea</th>
            <th>Descripcion</th>
            <th>Asignatura</th>
            <th>Nombre Docente</th>
            <th>Acciones</th>
        </tr>
    </thead>

    <tbody>
        @foreach ($datosTareas as $tarea)
        <tr>
            <td>{{ $tarea->id }}</td>
            <td>{{ $tarea->NombreTarea }}</td>
            <td>{{ $tarea->TituloTarea }}</td>
            <td>{{ $tarea->Descripcion }}</td>
            <td>{{ $tarea->Asignatura }}</td>
            <td>{{ $tarea->NombreDocente }}</td>
            <td> 

             <a href="{{ url('/tarea/'.$tarea->id.'/edit')}}" class="btn btn-warning">Editar</a>
             
             <form action="{{ url('/tarea/'.$tarea->id) }}" class="d-inline" method="post">
                @csrf
                {{ method_field('DELETE')}}
                <input type="submit" onclick="return confirm('¿Desea Borrar Regristro?')" value="Borrar" class="btn btn-danger"> 
             </form> 
            

                
            </td>
        </tr>
        @endforeach
    </tbody>

 </table>
 
 <a href="{{ url('tarea/create') }}" class="btn btn-success">Nueva tarea</a>
</div>
@endsection