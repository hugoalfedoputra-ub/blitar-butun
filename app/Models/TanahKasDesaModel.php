<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_pemilik_asal nama pemilik asal
@property text $letter_c letter c
@property text $kelas kelas
@property int $luas luas
@property int $asli_milik_desa asli milik desa
@property int $pemerintah pemerintah
@property int $provinsi provinsi
@property int $kabupaten_kota kabupaten kota
@property int $lain_lain lain lain
@property int $sawah sawah
@property int $tegal tegal
@property int $kebun kebun
@property int $tambak_kolam tambak kolam
@property int $tanah_kering_darat tanah kering darat
@property int $ada_patok ada patok
@property int $tidak_ada_patok tidak ada patok
@property int $ada_papan_nama ada papan nama
@property int $tidak_ada_papan_nama tidak ada papan nama
@property date $tanggal_perolehan tanggal perolehan
@property text $lokasi lokasi
@property text $peruntukan peruntukan
@property text $mutasi mutasi
@property text $keterangan keterangan
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property tinyint $visible visible
   
 */
class TanahKasDesaModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tanah_kas_desa';

    /**
    * Mass assignable columns
    */
    protected $fillable=['visible',
'nama_pemilik_asal',
'letter_c',
'kelas',
'luas',
'asli_milik_desa',
'pemerintah',
'provinsi',
'kabupaten_kota',
'lain_lain',
'sawah',
'tegal',
'kebun',
'tambak_kolam',
'tanah_kering_darat',
'ada_patok',
'tidak_ada_patok',
'ada_papan_nama',
'tidak_ada_papan_nama',
'tanggal_perolehan',
'lokasi',
'peruntukan',
'mutasi',
'keterangan',
'created_by',
'updated_by',
'visible'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_perolehan'];




}