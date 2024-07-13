<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property text $pengguna pengguna
@property timestamp $tanggal tanggal
@property int $pilihan pilihan
   
 */
class Pendapat extends Model
{

    /**
     * Database table name
     */
    protected $table = 'pendapat';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'pilihan',
        'pengguna',
        'tanggal',
        'pilihan'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tanggal'];
}
