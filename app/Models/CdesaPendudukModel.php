<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_cdesa id cdesa
@property int $id_pend id pend
@property IdCdesa $cdesa belongsTo
   
 */
class CdesaPendudukModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'cdesa_penduduk';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_pend',
'id_cdesa',
'id_pend'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idCdesa
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idCdesa()
    {
        return $this->belongsTo(Cdesa::class,'id_cdesa');
    }




}