<?php

namespace App\Repositories;

use App\Models\Docente;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class DocenteRepository
 * @package App\Repositories
 * @version September 14, 2017, 6:51 pm UTC
 *
 * @method Docente findWithoutFail($id, $columns = ['*'])
 * @method Docente find($id, $columns = ['*'])
 * @method Docente first($columns = ['*'])
*/
class DocenteRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombres',
        'apellidos',
        'dpi',
        'direccion',
        'telefono'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Docente::class;
    }
}
