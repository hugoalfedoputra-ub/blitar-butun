<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $namespace namespace
@property varchar $code code
@property varchar $code_display code display
@property int $created created
@property mediumblob $audio_data audio data
   
 */
class CaptchaCodesModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'captcha_codes';

    /**
    * Mass assignable columns
    */
    protected $fillable=['audio_data',
'namespace',
'code',
'code_display',
'created',
'audio_data'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}