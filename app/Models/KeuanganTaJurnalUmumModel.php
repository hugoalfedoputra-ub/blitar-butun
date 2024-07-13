<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $KdBuku KdBuku
@property varchar $Kd_Desa Kd Desa
@property varchar $Tanggal Tanggal
@property varchar $JnsBukti JnsBukti
@property varchar $NoBukti NoBukti
@property varchar $Keterangan Keterangan
@property varchar $DK DK
@property varchar $Debet Debet
@property varchar $Kredit Kredit
@property varchar $Jenis Jenis
@property varchar $Posted Posted
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaJurnalUmumModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_jurnal_umum';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Posted',
'id_keuangan_master',
'Tahun',
'KdBuku',
'Kd_Desa',
'Tanggal',
'JnsBukti',
'NoBukti',
'Keterangan',
'DK',
'Debet',
'Kredit',
'Jenis',
'Posted'];

    /**
    * Date time columns.
    */
    protected $dates=[];

    /**
    * idKeuanganMaster
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idKeuanganMaster()
    {
        return $this->belongsTo(KeuanganMaster::class,'id_keuangan_master');
    }




}