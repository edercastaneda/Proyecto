<table class="table table-responsive" id="alumnos-table">
    <thead>
        <th>Nombre</th>
        <th>Apellido</th>
        <th>Direccion</th>
        <th>Telefono</th>
        <th>Responsable</th>
        <th colspan="3">Action</th>
    </thead>
    <tbody>
    @foreach($alumnos as $alumno)
        <tr>
            <td>{!! $alumno->nombre !!}</td>
            <td>{!! $alumno->apellido !!}</td>
            <td>{!! $alumno->direccion !!}</td>
            <td>{!! $alumno->telefono !!}</td>
            <td>{!! $alumno->responsable !!}</td>
            <td>
                {!! Form::open(['route' => ['alumnos.destroy', $alumno->id], 'method' => 'delete']) !!}
                <div class='btn-group'>
                    <a href="{!! route('alumnos.show', [$alumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-eye-open"></i></a>
                    <a href="{!! route('alumnos.edit', [$alumno->id]) !!}" class='btn btn-default btn-xs'><i class="glyphicon glyphicon-edit"></i></a>
                    {!! Form::button('<i class="glyphicon glyphicon-trash"></i>', ['type' => 'submit', 'class' => 'btn btn-danger btn-xs', 'onclick' => "return confirm('Are you sure?')"]) !!}
                </div>
                {!! Form::close() !!}
            </td>
        </tr>
    @endforeach
    </tbody>
</table>
{!! $alumnos->links() !!}
