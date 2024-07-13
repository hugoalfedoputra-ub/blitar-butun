<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_keuangan_master id keuangan master
@property varchar $Tahun Tahun
@property varchar $Kd_Desa Kd Desa
@property varchar $Kd_Rincian Kd Rincian
@property varchar $NoRek_Bank NoRek Bank
@property varchar $Nama_Bank Nama Bank
@property varchar $Kantor_Cabang Kantor Cabang
@property varchar $Nama_Pemilik Nama Pemilik
@property varchar $Alamat_Pemilik Alamat Pemilik
@property varchar $No_Identitas No Identitas
@property varchar $No_Telepon No Telepon
@property varchar $ID_Bank ID Bank
@property IdKeuanganMaster $keuanganMaster belongsTo
   
 */
class KeuanganRefBankDesaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_ref_bank_desa';

    /**
    * Mass assignable columns
    */
    protected $fillable=['ID_Bank',
'id_keuangan_master',
'Tahun',
'Kd_Desa',
'Kd_Rincian',
'NoRek_Bank',
'Nama_Bank',
'Kantor_Cabang',
'Nama_Pemilik',
'Alamat_Pemilik',
'No_Identitas',
'No_Telepon',
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