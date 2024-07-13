<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $token token
@property timestamp $created_at created at
   
 */
class PasswordResetsModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'password_resets';

    /**
    * Mass assignable columns
    */
    protected $fillable=['token'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}