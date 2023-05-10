<h1> {{ $modo }} empleado</h1>

@if(count($errors)>0)

   <div class="alert alert-danger" role="alert">
    <ul>
        @foreach( $errors->all() as $error)
        <li>{{ $error }}</li>
        @endforeach
    </ul>
  
   </div>
  
@endif

<div class="form-group">
   <label for="NombreTarea">Nombre Tarea</label>
   <input type="text" class="form-control"   name="NombreTarea" 
   value="{{ isset($tarea->NombreTarea)?$tarea->NombreTarea:old('NombreTarea') }}" id="NombreTarea"> 
</div>

<div class="form-group">
  <label for="TituloTarea">Titulo Tarea</label>
  <input type="text" class="form-control"   name="TituloTarea" 
  value="{{ isset($tarea->TituloTarea)?$tarea->TituloTarea:old('TituloTarea') }}" id="TituloTarea"> 
</div>

<div class="form-group">
 <label for="Descripcion">Descripcion</label>
 <input type="text" class="form-control"  name="Descripcion" 
 value="{{ isset($tarea->Descripcion)?$tarea->Descripcion:old('Descripcion') }}" id="Descripcion"> 
</div>

<div class="form-group">
 <label for="Asignatura">Asignatura</label>
 <input type="text" class="form-control"   name="Asignatura" 
 value="{{ isset($tarea->Asignatura)?$tarea->Asignatura:old('Asignatura') }}" id="Asignatura"> 
</div>

<div class="form-group">
<label for="NombreDocente">Nombre Docente</label>
<input type="text" class="form-control"  name="NombreDocente" 
value="{{ isset($tarea->NombreDocente)?$tarea->NombreDocente:old('NombreDocente') }}" id="NombreDocente"><br> 
</div>
<input class="btn btn-success" type="submit"  value="{{ $modo }} datos">

<a href="{{ url('tarea/') }}" class="btn btn-primary">Volver</a>

