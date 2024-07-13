<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $ukuran ukuran
@property varchar $path path
@property timestamp $restore_at restore at
@property int $status status
@property int $pid_process pid process
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class LogRestoreDesa extends Model
{

    /**
     * Database table name
     */
    protected $table = 'log_restore_desa';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'updated_by',
        'ukuran',
        'path',
        'restore_at',
        'status',
        'pid_process',
        'created_by',
        'updated_by'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['restore_at'];
}
