<?php

namespace App\Repositories;

use App\Models\TempFile;
use InfyOm\Generator\Common\BaseRepository;

/**
 * Class TempFileRepository
 * @package App\Repositories
 * @version September 18, 2017, 4:23 pm CST
 *
 * @method TempFile findWithoutFail($id, $columns = ['*'])
 * @method TempFile find($id, $columns = ['*'])
 * @method TempFile first($columns = ['*'])
*/
class TempFileRepository extends BaseRepository
{
    /**
     * @var array
     */
    protected $fieldSearchable = [
        'user_id',
        'data',
        'nombre',
        'type',
        'size',
        'extension'
    ];

    /**
     * Configure the Model
     **/
    public function model()
    {
        return TempFile::class;
    }
}
