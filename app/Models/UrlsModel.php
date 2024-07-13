<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $url url
@property varchar $alias alias
@property datetime $created created
   
 */
class UrlsModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'urls';

    /**
    * Mass assignable columns
    */
    protected $fillable=['created',
'url',
'alias',
'created'];

    /**
    * Date time columns.
    */
    protected $dates=['created'];




}