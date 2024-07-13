<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $message message
@property varchar $jenis_error jenis error
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class LogTte extends Model
{

    /**
     * Database table name
     */
    protected $table = 'log_tte';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'message',
        'jenis_error',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
