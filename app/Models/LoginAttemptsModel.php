<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $username username
@property varchar $ip_address ip address
@property int $time time
   
 */
class LoginAttempts extends Model
{

    /**
     * Database table name
     */
    protected $table = 'login_attempts';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'time',
        'username',
        'ip_address',
        'time'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];
}
