<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property smallint $nomor_urut nomor urut
@property date $tanggal_penerimaan tanggal penerimaan
@property varchar $nomor_surat nomor surat
@property varchar $kode_surat kode surat
@property date $tanggal_surat tanggal surat
@property varchar $pengirim pengirim
@property varchar $isi_singkat isi singkat
@property varchar $isi_disposisi isi disposisi
@property varchar $berkas_scan berkas scan
@property varchar $lokasi_arsip lokasi arsip
@property \Illuminate\Database\Eloquent\Collection $disposisi belongsToMany
   
 */
class SuratMasukModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'surat_masuk';

    /**
    * Mass assignable columns
    */
    protected $fillable=['lokasi_arsip',
'nomor_urut',
'tanggal_penerimaan',
'nomor_surat',
'kode_surat',
'tanggal_surat',
'pengirim',
'isi_singkat',
'isi_disposisi',
'berkas_scan',
'lokasi_arsip'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_penerimaan',
'tanggal_surat'];

    /**
    * disposisis
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function disposisis()
    {
        return $this->belongsToMany(Disposisi::class,'disposisi_surat_masuk');
    }



}