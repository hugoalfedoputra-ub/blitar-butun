<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $posyandu_id posyandu id
@property int $kia_id kia id
@property tinyint $status_kehamilan status kehamilan
@property tinyint $usia_kehamilan usia kehamilan
@property date $tanggal_melahirkan tanggal melahirkan
@property tinyint $pemeriksaan_kehamilan pemeriksaan kehamilan
@property tinyint $konsumsi_pil_fe konsumsi pil fe
@property int $butir_pil_fe butir pil fe
@property tinyint $pemeriksaan_nifas pemeriksaan nifas
@property tinyint $konseling_gizi konseling gizi
@property tinyint $kunjungan_rumah kunjungan rumah
@property tinyint $akses_air_bersih akses air bersih
@property tinyint $kepemilikan_jamban kepemilikan jamban
@property tinyint $jaminan_kesehatan jaminan kesehatan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class IbuHamilModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'ibu_hamil';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'posyandu_id',
'kia_id',
'status_kehamilan',
'usia_kehamilan',
'tanggal_melahirkan',
'pemeriksaan_kehamilan',
'konsumsi_pil_fe',
'butir_pil_fe',
'pemeriksaan_nifas',
'konseling_gizi',
'kunjungan_rumah',
'akses_air_bersih',
'kepemilikan_jamban',
'jaminan_kesehatan',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_melahirkan'];




}