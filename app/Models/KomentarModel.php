<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_artikel id artikel
@property varchar $owner owner
@property varchar $email email
@property tinytext $subjek subjek
@property text $komentar komentar
@property timestamp $tgl_upload tgl upload
@property tinyint $status status
@property tinyint $tipe tipe
@property varchar $no_hp no hp
@property timestamp $updated_at updated at
@property tinyint $is_archived is archived
@property text $permohonan permohonan
   
 */
class KomentarModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'komentar';

    /**
    * Mass assignable columns
    */
    protected $fillable=['permohonan',
'id_artikel',
'owner',
'email',
'subjek',
'komentar',
'tgl_upload',
'status',
'tipe',
'no_hp',
'is_archived',
'permohonan'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_upload'];




}