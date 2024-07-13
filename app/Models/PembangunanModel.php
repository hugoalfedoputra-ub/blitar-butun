<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property int $id_lokasi id lokasi
@property varchar $sumber_dana sumber dana
@property varchar $judul judul
@property varchar $slug slug
@property varchar $keterangan keterangan
@property varchar $lokasi lokasi
@property varchar $lat lat
@property varchar $lng lng
@property varchar $volume volume
@property year $tahun_anggaran tahun anggaran
@property varchar $pelaksana_kegiatan pelaksana kegiatan
@property tinyint $status status
@property datetime $created_at created at
@property datetime $updated_at updated at
@property varchar $foto foto
@property bigint $anggaran anggaran
@property int $perubahan_anggaran perubahan anggaran
@property bigint $sumber_biaya_pemerintah sumber biaya pemerintah
@property bigint $sumber_biaya_provinsi sumber biaya provinsi
@property bigint $sumber_biaya_kab_kota sumber biaya kab kota
@property bigint $sumber_biaya_swadaya sumber biaya swadaya
@property bigint $sumber_biaya_jumlah sumber biaya jumlah
@property varchar $manfaat manfaat
@property int $waktu waktu
@property tinyint $satuan_waktu satuan waktu
@property varchar $sifat_proyek sifat proyek
   
 */
class PembangunanModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'pembangunan';

    /**
    * Mass assignable columns
    */
    protected $fillable=['sifat_proyek',
'id_lokasi',
'sumber_dana',
'judul',
'slug',
'keterangan',
'lokasi',
'lat',
'lng',
'volume',
'tahun_anggaran',
'pelaksana_kegiatan',
'status',
'foto',
'anggaran',
'perubahan_anggaran',
'sumber_biaya_pemerintah',
'sumber_biaya_provinsi',
'sumber_biaya_kab_kota',
'sumber_biaya_swadaya',
'sumber_biaya_jumlah',
'manfaat',
'waktu',
'satuan_waktu',
'sifat_proyek'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}