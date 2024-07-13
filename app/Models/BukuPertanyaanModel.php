<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property text $pertanyaan pertanyaan
@property tinyint $status status
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class BukuPertanyaan extends Model
{

    /**
     * Database table name
     */
    protected $table = 'buku_pertanyaan';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'pertanyaan',
        'status'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
