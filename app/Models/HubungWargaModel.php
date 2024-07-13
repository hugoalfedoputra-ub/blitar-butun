<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_grup id grup
@property varchar $subjek subjek
@property text $isi isi
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property IdGrup $kontakGrup belongsTo
   
 */
class HubungWargaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'hubung_warga';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'id_grup',
'subjek',
'isi',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idGrup
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idGrup()
    {
        return $this->belongsTo(KontakGrup::class,'id_grup');
    }




}