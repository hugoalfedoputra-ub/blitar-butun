<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_nama id nama
@property int $id_pertanyaan id pertanyaan
@property int $id_jawaban id jawaban
@property text $pertanyaan_statis pertanyaan statis
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class BukuKepuasan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'buku_kepuasan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'id_nama',
        'id_pertanyaan',
        'id_jawaban',
        'pertanyaan_statis'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
