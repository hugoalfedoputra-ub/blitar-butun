<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_dtks id dtks
@property int $id_lampiran id lampiran
@property IdLampiran $dtksLampiran belongsTo
@property IdDtk $dtk belongsTo
   
 */
class DtksRefLampiranModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'dtks_ref_lampiran';

    /**
    * Mass assignable columns
    */
    protected $fillable=['id_lampiran',
'id_dtks',
'id_lampiran'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idLampiran
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idLampiran()
    {
        return $this->belongsTo(DtksLampiran::class,'id_lampiran');
    }

    /**
    * idDtk
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idDtk()
    {
        return $this->belongsTo(Dtk::class,'id_dtks');
    }




}