@extends('layouts.app')

@section('content')
    <section class="content-header">
        <h1>
            Alumno
        </h1>
    </section>
    <div class="content">
        <div class="box box-primary">
            <div class="box-body">
                <div class="row" >
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">

                        @include('alumnos.show_fields')
                    </div>
                    <div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
                        @if($alumno->alumnoImages->count()>0)
                            @foreach($alumno->alumnoImages as $key => $image)
                                <div class="form-group col-sm-3">
                                    <img src="{{srcImgBynary($image)}}" alt="{{$image->nombre}}" class="img-responsive">
                                </div>
                            @endforeach
                        @else
                            <h3 class="text-warning text-center">No hay imagenes cargadas</h3>
                        @endif
                    </div>
                    <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">

                        <a href="{!! route('alumnos.index') !!}" class="btn btn-default">Back</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
