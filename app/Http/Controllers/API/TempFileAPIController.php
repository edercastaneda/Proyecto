<?php

namespace App\Http\Controllers\API;

use App\Http\Requests\API\CreateTempFileAPIRequest;
use App\Http\Requests\API\UpdateTempFileAPIRequest;
use App\Models\TempFile;
use App\Repositories\TempFileRepository;
use Illuminate\Http\Request;
use App\Http\Controllers\AppBaseController;
use InfyOm\Generator\Criteria\LimitOffsetCriteria;
use Prettus\Repository\Criteria\RequestCriteria;
use Response;

/**
 * Class TempFileController
 * @package App\Http\Controllers\API
 */

class TempFileAPIController extends AppBaseController
{
    /** @var  TempFileRepository */
    private $tempFileRepository;

    public function __construct(TempFileRepository $tempFileRepo)
    {
        $this->tempFileRepository = $tempFileRepo;
    }

    /**
     * Display a listing of the TempFile.
     * GET|HEAD /tempFiles
     *
     * @param Request $request
     * @return Response
     */
    public function index(Request $request)
    {
        $this->tempFileRepository->pushCriteria(new RequestCriteria($request));
        $this->tempFileRepository->pushCriteria(new LimitOffsetCriteria($request));
        $tempFiles = $this->tempFileRepository->all();

        return $this->sendResponse($tempFiles->toArray(), 'Temp Files retrieved successfully');
    }

    /**
     * Store a newly created TempFile in storage.
     * POST /tempFiles
     *
     * @param CreateTempFileAPIRequest $request
     *
     * @return Response
     */
    public function store(CreateTempFileAPIRequest $request)
    {
        $input = $request->all();

        $tempFiles = $this->tempFileRepository->create($input);

        return $this->sendResponse($tempFiles->toArray(), 'Temp File saved successfully');
    }

    /**
     * Display the specified TempFile.
     * GET|HEAD /tempFiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function show($id)
    {
        /** @var TempFile $tempFile */
        $tempFile = $this->tempFileRepository->findWithoutFail($id);

        if (empty($tempFile)) {
            return $this->sendError('Temp File not found');
        }

        return $this->sendResponse($tempFile->toArray(), 'Temp File retrieved successfully');
    }

    /**
     * Update the specified TempFile in storage.
     * PUT/PATCH /tempFiles/{id}
     *
     * @param  int $id
     * @param UpdateTempFileAPIRequest $request
     *
     * @return Response
     */
    public function update($id, UpdateTempFileAPIRequest $request)
    {
        $input = $request->all();

        /** @var TempFile $tempFile */
        $tempFile = $this->tempFileRepository->findWithoutFail($id);

        if (empty($tempFile)) {
            return $this->sendError('Temp File not found');
        }

        $tempFile = $this->tempFileRepository->update($input, $id);

        return $this->sendResponse($tempFile->toArray(), 'TempFile updated successfully');
    }

    /**
     * Remove the specified TempFile from storage.
     * DELETE /tempFiles/{id}
     *
     * @param  int $id
     *
     * @return Response
     */
    public function destroy($id)
    {
        /** @var TempFile $tempFile */
        $tempFile = $this->tempFileRepository->findWithoutFail($id);

        if (empty($tempFile)) {
            return $this->sendError('Temp File not found');
        }

        $tempFile->delete();

        return $this->sendResponse($id, 'Temp File deleted successfully');
    }

    /**
     * Guard de forma ajax los archivos subidos en la tabla equipo_archivos
     * @param Equipo $equipo
     * @param CreateEquipoRequest $requests
     * @return mixed
     */
    public function multiStore(CreateTempFileAPIRequest $requests)
    {

        $files = $requests->file('files');

        $collect = collect();
        foreach ($files as $file){

            $datos= [
                'user_id' => $requests->user,
                'option' => null,
                'data' => fileToBinary($file),
//                'data' => null,
                'nombre' => $file->getClientOriginalName(),
                'type' => $file->getMimeType(),
                'size' => $file->getSize(),
                'extension' => $file->extension()
            ];

//            dd($datos);
            $collect->push($this->tempFileRepository->create($datos));

        }

        return Response::json([]);

    }
}
