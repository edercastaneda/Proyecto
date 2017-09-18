<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class AlumnoImage
 * @package App\Models
 * @version September 18, 2017, 5:07 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection carreraGrado
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property integer alumno_id
 * @property string data
 * @property string nombre
 * @property string type
 * @property integer size
 * @property string extension
 */
class AlumnoImage extends Model
{
    use SoftDeletes;

    public $table = 'alumno_images';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'alumno_id',
        'data',
        'nombre',
        'type',
        'size',
        'extension'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'alumno_id' => 'integer',
        'data' => 'string',
        'nombre' => 'string',
        'type' => 'string',
        'size' => 'integer',
        'extension' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
