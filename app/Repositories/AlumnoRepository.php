<?php

namespace App\Repositories;

use App\Models\Alumno;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class AlumnoRepository
 * @package App\Repositories
 * @version September 18, 2017, 3:55 pm CST
 *
 * @method Alumno findWithoutFail($id, $columns = ['*'])
 * @method Alumno find($id, $columns = ['*'])
 * @method Alumno first($columns = ['*'])
*/
class AlumnoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'responsable'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Alumno::class;
    }
}
