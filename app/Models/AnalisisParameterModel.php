<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_indikator id indikator
@property varchar $jawaban jawaban
@property int $nilai nilai
@property int $kode_jawaban kode jawaban
@property tinyint $asign asign
   
 */
class AnalisisParameter extends Model
{

    /**
     * Database table name
     */
    protected $table = 'analisis_parameter';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'asign',
        'id_indikator',
        'jawaban',
        'nilai',
        'kode_jawaban',
        'asign'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
