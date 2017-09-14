<?php

namespace App\Http\Controllers;

use App\DataTables\GradoDataTable;
use App\Http\Requests;
use App\Http\Requests\CreateGradoRequest;
use App\Http\Requests\UpdateGradoRequest;
use App\Repositories\GradoRepository;
use Flash;
use App\Http\Controllers\AppBaseController;
use Response;

class GradoController extends AppBaseController
{
    /** @var  GradoRepository */
    private $gradoRepository;

    public function __construct(GradoRepository $gradoRepo)
    {
        $this->gradoRepository = $gradoRepo;
    }

    /**
     * Display a listing of the Grado.
     *
     * @param GradoDataTable $gradoDataTable
     * @return Response
     */
    public function index(GradoDataTable $gradoDataTable)
    {
        return $gradoDataTable->render('grados.index');
    }

    /**
     * Show the form for creating a new Grado.
     *
     * @return Response
     */
    public function create()
    {
        return view('grados.create');
    }

    /**
     * Store a newly created Grado in storage.
     *
     * @param CreateGradoRequest $request
     *
     * @return Response
     */
    public function store(CreateGradoRequest $request)
    {
        $input = $request->all();

        $grado = $this->gradoRepository->create($input);

        Flash::success('Grado Guardado Exitosamente.');

        return redirect(route('grados.index'));
    }

    /**
     * Display the specified Grado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        return view('grados.show')->with('grado', $grado);
    }

    /**
     * Show the form for editing the specified Grado.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function edit($id)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        return view('grados.edit')->with('grado', $grado);
    }

    /**
     * Update the specified Grado in storage.
     *
     * @param  int              $id
     * @param UpdateGradoRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateGradoRequest $request)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        $grado = $this->gradoRepository->update($request->all(), $id);

        Flash::success('Grado updated successfully.');

        return redirect(route('grados.index'));
    }

    /**
     * Remove the specified Grado from storage.
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        $grado = $this->gradoRepository->findWithoutFail($id);

        if (empty($grado)) {
            Flash::error('Grado not found');

            return redirect(route('grados.index'));
        }

        $this->gradoRepository->delete($id);

        Flash::success('Grado deleted successfully.');

        return redirect(route('grados.index'));
    }
}
