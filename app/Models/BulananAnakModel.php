<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $posyandu_id posyandu id
@property int $kia_id kia id
@property tinyint $status_gizi status gizi
@property tinyint $umur_bulan umur bulan
@property tinyint $status_tikar status tikar
@property tinyint $pemberian_imunisasi_dasar pemberian imunisasi dasar
@property tinyint $pemberian_imunisasi_campak pemberian imunisasi campak
@property tinyint $pengukuran_berat_badan pengukuran berat badan
@property float $berat_badan berat badan
@property tinyint $pengukuran_tinggi_badan pengukuran tinggi badan
@property float $tinggi_badan tinggi badan
@property tinyint $konseling_gizi_ayah konseling gizi ayah
@property tinyint $konseling_gizi_ibu konseling gizi ibu
@property tinyint $kunjungan_rumah kunjungan rumah
@property tinyint $air_bersih air bersih
@property tinyint $kepemilikan_jamban kepemilikan jamban
@property tinyint $akta_lahir akta lahir
@property tinyint $jaminan_kesehatan jaminan kesehatan
@property tinyint $pengasuhan_paud pengasuhan paud
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class BulananAnakModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'bulanan_anak';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'posyandu_id',
'kia_id',
'status_gizi',
'umur_bulan',
'status_tikar',
'pemberian_imunisasi_dasar',
'pemberian_imunisasi_campak',
'pengukuran_berat_badan',
'berat_badan',
'pengukuran_tinggi_badan',
'tinggi_badan',
'konseling_gizi_ayah',
'konseling_gizi_ibu',
'kunjungan_rumah',
'air_bersih',
'kepemilikan_jamban',
'akta_lahir',
'jaminan_kesehatan',
'pengasuhan_paud',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}