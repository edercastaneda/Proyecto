<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Alumno
 * @package App\Models
 * @version September 18, 2017, 3:55 pm CST
 *
 * @property \Illuminate\Database\Eloquent\Collection carreraGrado
 * @property \Illuminate\Database\Eloquent\Collection cursos
 * @property string nombre
 * @property string apellido
 * @property string direccion
 * @property string telefono
 * @property string responsable
 */
class Alumno extends Model
{
    use SoftDeletes;

    public $table = 'alumnos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombre',
        'apellido',
        'direccion',
        'telefono',
        'responsable'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombre' => 'string',
        'apellido' => 'string',
        'direccion' => 'string',
        'telefono' => 'string',
        'responsable' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    
}
