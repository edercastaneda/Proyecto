<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Docente
 * @package App\Models
 * @version September 14, 2017, 6:51 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection carreraGrado
 * @property \Illuminate\Database\Eloquent\Collection Curso
 * @property string nombres
 * @property string apellidos
 * @property string dpi
 * @property string direccion
 * @property string telefono
 */
class Docente extends Model
{
    use SoftDeletes;

    public $table = 'docentes';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';

    protected $append = ['full_name'];
    protected $dates = ['deleted_at'];


    public $fillable = [
        'nombres',
        'apellidos',
        'dpi',
        'direccion',
        'telefono'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'nombres' => 'string',
        'apellidos' => 'string',
        'dpi' => 'string',
        'direccion' => 'string',
        'telefono' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */



    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cursos()
    {
        return $this->hasMany(\App\Models\Curso::class);
    }

    public function getFullNameAttribute()
    {
        return $this->nombres . ' ' . $this->apellidos;
    }
}
