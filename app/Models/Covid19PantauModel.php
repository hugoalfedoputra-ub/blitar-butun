<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_pemudik id pemudik
@property datetime $tanggal_jam tanggal jam
@property decimal $suhu_tubuh suhu tubuh
@property varchar $batuk batuk
@property varchar $flu flu
@property varchar $sesak_nafas sesak nafas
@property varchar $keluhan_lain keluhan lain
@property varchar $status_covid status covid
@property IdPemudik $covid19Pemudik belongsTo
   
 */
class Covid19PantauModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'covid19_pantau';

    /**
    * Mass assignable columns
    */
    protected $fillable=['status_covid',
'id_pemudik',
'tanggal_jam',
'suhu_tubuh',
'batuk',
'flu',
'sesak_nafas',
'keluhan_lain',
'status_covid'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_jam'];

    /**
    * idPemudik
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idPemudik()
    {
        return $this->belongsTo(Covid19Pemudik::class,'id_pemudik');
    }




}