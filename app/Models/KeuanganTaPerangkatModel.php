<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Jabatan Kd Jabatan
@property varchar $No_ID No ID
@property varchar $Nama_Perangkat Nama Perangkat
@property varchar $Alamat_Perangkat Alamat Perangkat
@property varchar $Nomor_HP Nomor HP
@property varchar $Rek_Bank Rek Bank
@property varchar $Nama_Bank Nama Bank
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaPerangkatModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_perangkat';

    /**
    * Mass assignable columns
    */
    protected $fillable=['Nama_Bank',
'id_keuangan_master',
'Tahun',
'Kd_Desa',
'Kd_Jabatan',
'No_ID',
'Nama_Perangkat',
'Alamat_Perangkat',
'Nomor_HP',
'Rek_Bank',
'Nama_Bank'];

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