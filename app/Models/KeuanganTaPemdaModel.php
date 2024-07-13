<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Prov Kd Prov
@property varchar $Kd_Kab Kd Kab
@property varchar $Nama_Pemda Nama Pemda
@property varchar $Nama_Provinsi Nama Provinsi
@property varchar $Ibukota Ibukota
@property varchar $Alamat Alamat
@property varchar $Nm_Bupati Nm Bupati
@property varchar $Jbt_Bupati Jbt Bupati
@property mediumblob $Logo Logo
@property varchar $C_Kode C Kode
@property varchar $C_Pemda C Pemda
@property varchar $C_Data C Data
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaPemdaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_pemda';

    /**
    * Mass assignable columns
    */
    protected $fillable=['C_Data',
'id_keuangan_master',
'Tahun',
'Kd_Prov',
'Kd_Kab',
'Nama_Pemda',
'Nama_Provinsi',
'Ibukota',
'Alamat',
'Nm_Bupati',
'Jbt_Bupati',
'Logo',
'C_Kode',
'C_Pemda',
'C_Data'];

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