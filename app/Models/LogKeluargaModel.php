<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_kk id kk
@property int $id_peristiwa id peristiwa
@property timestamp $tgl_peristiwa tgl peristiwa
@property int $id_pend id pend
@property int $updated_by updated by
@property int $id_log_penduduk id log penduduk
@property IdLogPenduduk $logPenduduk belongsTo
   
 */
class LogKeluargaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'log_keluarga';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_log_penduduk',
'id_kk',
'id_peristiwa',
'tgl_peristiwa',
'id_pend',
'updated_by',
'id_log_penduduk'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_peristiwa'];

    /**
    * idLogPenduduk
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idLogPenduduk()
    {
        return $this->belongsTo(LogPenduduk::class,'id_log_penduduk');
    }




}