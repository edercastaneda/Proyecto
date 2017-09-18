<?php

namespace App\Http\Controllers;

use App\DataTables\AlumnoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateAlumnoRequest;
use App\Http\Requests\UpdateAlumnoRequest;
use App\Repositories\AlumnoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class AlumnoController extends AppBaseController
{
    /** @var  AlumnoRepository */
    private $alumnoRepository;

    public function __construct(AlumnoRepository $alumnoRepo)
    {
        $this->alumnoRepository = $alumnoRepo;
    }

    /**
     * Display a listing of the Alumno.
     *
     * @param AlumnoDataTable $alumnoDataTable
     * @return Response
     */
    public function index(AlumnoDataTable $alumnoDataTable)
    {
        return $alumnoDataTable->render('alumnos.index');
    }

    /**
     * Show the form for creating a new Alumno.
     *
     * @return Response
     */
    public function create()
    {
        //elimina los archivos temporales
        $tempFiles = TempFile::where('user_id',Auth::user()->id)->delete();

        return view('alumnos.create');
    }

    /**
     * Store a newly created Alumno in storage.
     *
     * @param CreateAlumnoRequest $request
     *
     * @return Response
     */
    public function store(CreateAlumnoRequest $request)
    {
        $input = $request->all();

        $alumno = $this->alumnoRepository->create($input);

        $tempFiles = TempFile::where('user_id',Auth::user()->id)->get();

        $alumnoImages = collect();
        foreach ($tempFiles as $file){

            $datos= [
                'alumno_id' => $alumno->id,
                'data' => $file->data,
                'nombre' => $file->nombre,
                'type' => $file->type,
                'size' => $file->size,
                'extension' => $file->extension
            ];

            $alumnoImages->push(New AlumnoImage($datos));

        }

        $alumno->alumnoImages()->saveMany($alumnoImages);

        Flash::success('Alumno saved successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Display the specified Alumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.show')->with('alumno', $alumno);
    }

    /**
     * Show the form for editing the specified Alumno.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        return view('alumnos.edit')->with('alumno', $alumno);
    }

    /**
     * Update the specified Alumno in storage.
     *
     * @param  int              $id
     * @param UpdateAlumnoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateAlumnoRequest $request)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        $alumno = $this->alumnoRepository->update($request->all(), $id);

        Flash::success('Alumno updated successfully.');

        return redirect(route('alumnos.index'));
    }

    /**
     * Remove the specified Alumno from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $alumno = $this->alumnoRepository->findWithoutFail($id);

        if (empty($alumno)) {
            Flash::error('Alumno not found');

            return redirect(route('alumnos.index'));
        }

        $this->alumnoRepository->delete($id);

        Flash::success('Alumno deleted successfully.');

        return redirect(route('alumnos.index'));
    }
}
