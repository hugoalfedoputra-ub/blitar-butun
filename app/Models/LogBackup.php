<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $ukuran ukuran
@property varchar $path path
@property tinyint $permanen permanen
@property timestamp $downloaded_at downloaded at
@property int $status status
@property int $pid_process pid process
@property timestamp $created_at created at
@property timestamp $updated_at updated at
   
 */
class LogBackup extends Model
{

    /**
     * Database table name
     */
    protected $table = 'log_backup';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'ukuran',
        'path',
        'permanen',
        'downloaded_at',
        'status',
        'pid_process'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['downloaded_at'];
}
