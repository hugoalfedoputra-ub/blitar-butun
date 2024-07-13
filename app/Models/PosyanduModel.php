<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $nama nama
@property varchar $alamat alamat
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class Posyandu extends Model
{

    /**
     * Database table name
     */
    protected $table = 'posyandu';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'nama',
        'alamat',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
