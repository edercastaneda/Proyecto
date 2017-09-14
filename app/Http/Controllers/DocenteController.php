<?php

namespace App\Http\Controllers;

use App\DataTables\DocenteDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateDocenteRequest;
use App\Http\Requests\UpdateDocenteRequest;
use App\Repositories\DocenteRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class DocenteController extends AppBaseController
{
    /** @var  DocenteRepository */
    private $docenteRepository;

    public function __construct(DocenteRepository $docenteRepo)
    {
        $this->docenteRepository = $docenteRepo;
    }

    /**
     * Display a listing of the Docente.
     *
     * @param DocenteDataTable $docenteDataTable
     * @return Response
     */
    public function index(DocenteDataTable $docenteDataTable)
    {
        return $docenteDataTable->render('docentes.index');
    }

    /**
     * Show the form for creating a new Docente.
     *
     * @return Response
     */
    public function create()
    {
        return view('docentes.create');
    }

    /**
     * Store a newly created Docente in storage.
     *
     * @param CreateDocenteRequest $request
     *
     * @return Response
     */
    public function store(CreateDocenteRequest $request)
    {
        $input = $request->all();

        $docente = $this->docenteRepository->create($input);

        Flash::success('Docente Guardado Exitosamente.');

        return redirect(route('docentes.index'));
    }

    /**
     * Display the specified Docente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $docente = $this->docenteRepository->findWithoutFail($id);

        if (empty($docente)) {
            Flash::error('Docente not found');

            return redirect(route('docentes.index'));
        }

        return view('docentes.show')->with('docente', $docente);
    }

    /**
     * Show the form for editing the specified Docente.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $docente = $this->docenteRepository->findWithoutFail($id);

        if (empty($docente)) {
            Flash::error('Docente not found');

            return redirect(route('docentes.index'));
        }

        return view('docentes.edit')->with('docente', $docente);
    }

    /**
     * Update the specified Docente in storage.
     *
     * @param  int              $id
     * @param UpdateDocenteRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateDocenteRequest $request)
    {
        $docente = $this->docenteRepository->findWithoutFail($id);

        if (empty($docente)) {
            Flash::error('Docente not found');

            return redirect(route('docentes.index'));
        }

        $docente = $this->docenteRepository->update($request->all(), $id);

        Flash::success('Docente updated successfully.');

        return redirect(route('docentes.index'));
    }

    /**
     * Remove the specified Docente from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $docente = $this->docenteRepository->findWithoutFail($id);

        if (empty($docente)) {
            Flash::error('Docente not found');

            return redirect(route('docentes.index'));
        }

        $this->docenteRepository->delete($id);

        Flash::success('Docente deleted successfully.');

        return redirect(route('docentes.index'));
    }
}
