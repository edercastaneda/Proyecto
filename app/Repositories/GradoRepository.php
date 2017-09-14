<?php

namespace App\Repositories;

use App\Models\Grado;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class GradoRepository
 * @package App\Repositories
 * @version September 14, 2017, 6:54 pm UTC
 *
 * @method Grado findWithoutFail($id, $columns = ['*'])
 * @method Grado find($id, $columns = ['*'])
 * @method Grado first($columns = ['*'])
*/
class GradoRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'nombre',
        'descripcion'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return Grado::class;
    }
}
