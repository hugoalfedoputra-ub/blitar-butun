<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama_desa nama desa
@property varchar $kode_desa kode desa
@property int $kode_pos kode pos
@property varchar $nama_kecamatan nama kecamatan
@property varchar $kode_kecamatan kode kecamatan
@property varchar $nama_kepala_camat nama kepala camat
@property varchar $nip_kepala_camat nip kepala camat
@property varchar $nama_kabupaten nama kabupaten
@property varchar $kode_kabupaten kode kabupaten
@property varchar $nama_propinsi nama propinsi
@property varchar $kode_propinsi kode propinsi
@property varchar $logo logo
@property varchar $lat lat
@property varchar $lng lng
@property tinyint $zoom zoom
@property varchar $map_tipe map tipe
@property text $path path
@property varchar $alamat_kantor alamat kantor
@property varchar $email_desa email desa
@property varchar $telepon telepon
@property varchar $nomor_operator nomor operator
@property varchar $website website
@property varchar $kantor_desa kantor desa
@property varchar $warna warna
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property int $pamong_id pamong id
   
 */
class ConfigModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'config';

    /**
    * Mass assignable columns
    */
    protected $fillable=['pamong_id',
'nama_desa',
'kode_desa',
'kode_pos',
'nama_kecamatan',
'kode_kecamatan',
'nama_kepala_camat',
'nip_kepala_camat',
'nama_kabupaten',
'kode_kabupaten',
'nama_propinsi',
'kode_propinsi',
'logo',
'lat',
'lng',
'zoom',
'map_tipe',
'path',
'alamat_kantor',
'email_desa',
'telepon',
'nomor_operator',
'website',
'kantor_desa',
'warna',
'created_by',
'updated_by',
'pamong_id'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}