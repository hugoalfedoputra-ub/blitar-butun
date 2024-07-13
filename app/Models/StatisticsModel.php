<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $url_id url id
@property datetime $created created
   
 */
class StatisticsModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'statistics';

    /**
    * Mass assignable columns
    */
    protected $fillable=['created',
'url_id',
'created'];

    /**
    * Date time columns.
    */
    protected $dates=['created'];




}