<li class="{{ Request::is('docentes*') ? 'active' : '' }}">
    <a href="{!! route('docentes.index') !!}"><i class="fa fa-edit"></i><span>Docentes</span></a>
</li>

<li class="{{ Request::is('cursos*') ? 'active' : '' }}">
    <a href="{!! route('cursos.index') !!}"><i class="fa fa-edit"></i><span>Cursos</span></a>
</li>

<li class="{{ Request::is('grados*') ? 'active' : '' }}">
    <a href="{!! route('grados.index') !!}"><i class="fa fa-edit"></i><span>Grados</span></a>
</li>


