<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property mediumtext $isi isi
@property int $enabled enabled
@property varchar $judul judul
@property tinyint $jenis_widget jenis widget
@property int $urut urut
@property varchar $form_admin form admin
@property mediumtext $setting setting
   
 */
class Widget extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'widget';

    /**
    * Mass assignable columns
    */
    protected $fillable=['setting',
'isi',
'enabled',
'judul',
'jenis_widget',
'urut',
'form_admin',
'setting'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}