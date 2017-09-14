<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Curso
 * @package App\Models
 * @version September 14, 2017, 8:23 pm UTC
 *
 * @property \App\Models\Docente docente
 * @property \App\Models\Grado grado
 * @property \Illuminate\Database\Eloquent\Collection carreraGrado
 * @property integer docente_id
 * @property integer grado_id
 * @property string nombre
 * @property string descripcion
 */
class Curso extends Model
{
    use SoftDeletes;

    public $table = 'cursos';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
        'docente_id',
        'grado_id',
        'nombre',
        'descripcion'
    ];

    /**
     * The attributes that should be casted to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'docente_id' => 'integer',
        'grado_id' => 'integer',
        'nombre' => 'string',
        'descripcion' => 'string'
    ];

    /**
     * Validation rules
     *
     * @var array
     */
    public static $rules = [
        
    ];

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function docente()
    {
        return $this->belongsTo(\App\Models\Docente::class);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     **/
    public function grado()
    {
        return $this->belongsTo(\App\Models\Grado::class);
    }
}
