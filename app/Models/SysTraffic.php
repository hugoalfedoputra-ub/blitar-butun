<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property longtext $ipAddress ipAddress
@property bigint $Jumlah Jumlah
   
 */
class SysTraffic extends Model
{

    /**
     * Database table name
     */
    protected $table = 'sys_traffic';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'Jumlah',
        'ipAddress',
        'Jumlah'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
