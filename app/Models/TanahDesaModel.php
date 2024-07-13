<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_penduduk id penduduk
@property decimal $nik nik
@property text $jenis_pemilik jenis pemilik
@property varchar $nama_pemilik_asal nama pemilik asal
@property int $luas luas
@property int $hak_milik hak milik
@property int $hak_guna_bangunan hak guna bangunan
@property int $hak_pakai hak pakai
@property int $hak_guna_usaha hak guna usaha
@property int $hak_pengelolaan hak pengelolaan
@property int $hak_milik_adat hak milik adat
@property int $hak_verponding hak verponding
@property int $tanah_negara tanah negara
@property int $perumahan perumahan
@property int $perdagangan_jasa perdagangan jasa
@property int $perkantoran perkantoran
@property int $industri industri
@property int $fasilitas_umum fasilitas umum
@property int $sawah sawah
@property int $tegalan tegalan
@property int $perkebunan perkebunan
@property int $peternakan_perikanan peternakan perikanan
@property int $hutan_belukar hutan belukar
@property int $hutan_lebat_lindung hutan lebat lindung
@property int $tanah_kosong tanah kosong
@property int $lain lain
@property text $mutasi mutasi
@property text $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property tinyint $visible visible
   
 */
class TanahDesaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tanah_desa';

    /**
    * Mass assignable columns
    */
    protected $fillable=['visible',
'id_penduduk',
'nik',
'jenis_pemilik',
'nama_pemilik_asal',
'luas',
'hak_milik',
'hak_guna_bangunan',
'hak_pakai',
'hak_guna_usaha',
'hak_pengelolaan',
'hak_milik_adat',
'hak_verponding',
'tanah_negara',
'perumahan',
'perdagangan_jasa',
'perkantoran',
'industri',
'fasilitas_umum',
'sawah',
'tegalan',
'perkebunan',
'peternakan_perikanan',
'hutan_belukar',
'hutan_lebat_lindung',
'tanah_kosong',
'lain',
'mutasi',
'keterangan',
'created_by',
'updated_by',
'visible'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}