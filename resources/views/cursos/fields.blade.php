<!-- Docente Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('docente_id', 'Docente Id:') !!}
{{--!! Form::number('docente_id', null, ['class' => 'form-control']) !!} --}}
    <select name="docente_id" id="inputID" class="form-control">
        <option value=""> -- Select One -- </option>
        @foreach(\App\Models\Docente::all() as $d)
            <option value="{{$d->id}}"> {{$d->full_name}} </option>
            @endforeach
    </select>

</div>

<!-- Grado Id Field -->
<div class="form-group col-sm-6">
    {!! Form::label('grado_id', 'Grado Id:') !!}
   {{-- {!! Form::number('grado_id', null, ['class' => 'form-control']) !!} --}}
    <select name="grado_id" id="inputID" class="form-control">
        <option value=""> -- Select One -- </option>
        @foreach(\App\Models\Grado::all() as $g)
            <option value="{{$g->id}}"> {{$g->nombre}} </option>
        @endforeach
    </select>

</div>

<!-- Nombre Field -->
<div class="form-group col-sm-6">
    {!! Form::label('nombre', 'Nombre:') !!}
    {!! Form::text('nombre', null, ['class' => 'form-control']) !!}
</div>

<!-- Descripcion Field -->
<div class="form-group col-sm-6">
    {!! Form::label('descripcion', 'Descripcion:') !!}
    {!! Form::text('descripcion', null, ['class' => 'form-control']) !!}
</div>

<!-- Submit Field -->
<div class="form-group col-sm-12">
    {!! Form::submit('Save', ['class' => 'btn btn-primary']) !!}
    <a href="{!! route('cursos.index') !!}" class="btn btn-default">Cancel</a>
</div>
