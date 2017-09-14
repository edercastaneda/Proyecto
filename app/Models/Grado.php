<?php

namespace App\Models;

use Eloquent as Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class Grado
 * @package App\Models
 * @version September 14, 2017, 6:54 pm UTC
 *
 * @property \Illuminate\Database\Eloquent\Collection carreraGrado
 * @property \Illuminate\Database\Eloquent\Collection Curso
 * @property string nombre
 * @property string descripcion
 */
class Grado extends Model
{
    use SoftDeletes;

    public $table = 'grados';
    
    const CREATED_AT = 'created_at';
    const UPDATED_AT = 'updated_at';


    protected $dates = ['deleted_at'];


    public $fillable = [
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
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     **/
    public function carreras()
    {
        return $this->belongsToMany(\App\Models\Carrera::class, 'carrera_grado');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     **/
    public function cursos()
    {
        return $this->hasMany(\App\Models\Curso::class);
    }
}
