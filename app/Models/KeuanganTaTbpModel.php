<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $No_Bukti No Bukti
@property varchar $Tgl_Bukti Tgl Bukti
@property varchar $Kd_Desa Kd Desa
@property varchar $Uraian Uraian
@property varchar $Nm_Penyetor Nm Penyetor
@property varchar $Alamat_Penyetor Alamat Penyetor
@property varchar $TTD_Penyetor TTD Penyetor
@property varchar $NoRek_Bank NoRek Bank
@property varchar $Nama_Bank Nama Bank
@property varchar $Jumlah Jumlah
@property varchar $Nm_Bendahara Nm Bendahara
@property varchar $Jbt_Bendahara Jbt Bendahara
@property varchar $Status Status
@property varchar $KdBayar KdBayar
@property varchar $Ref_Bayar Ref Bayar
@property varchar $ID_Bank ID Bank
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganTaTbpModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ta_tbp';

    /**
    * Mass assignable columns
    */
    protected $fillable=['ID_Bank',
'id_keuangan_master',
'Tahun',
'No_Bukti',
'Tgl_Bukti',
'Kd_Desa',
'Uraian',
'Nm_Penyetor',
'Alamat_Penyetor',
'TTD_Penyetor',
'NoRek_Bank',
'Nama_Bank',
'Jumlah',
'Nm_Bendahara',
'Jbt_Bendahara',
'Status',
'KdBayar',
'Ref_Bayar',
'ID_Bank'];

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