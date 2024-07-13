<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property varchar $satuan satuan
@property varchar $nama nama
@property int $enabled enabled
@property timestamp $tgl_upload tgl upload
@property int $id_pend id pend
@property tinyint $kategori kategori
@property text $attr attr
@property tinyint $tipe tipe
@property text $url url
@property int $tahun tahun
@property tinyint $kategori_info_publik kategori info publik
@property timestamp $updated_at updated at
@property tinyint $deleted deleted
@property int $id_syarat id syarat
@property int $id_parent id parent
@property timestamp $created_at created at
@property varchar $created_by created by
@property varchar $updated_by updated by
@property tinyint $dok_warga dok warga
@property varchar $lokasi_arsip lokasi arsip
   
 */
class DokumenHidup extends Model
{

    /**
     * Database table name
     */
    protected $table = 'dokumen_hidup';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'lokasi_arsip',
        'satuan',
        'nama',
        'enabled',
        'tgl_upload',
        'id_pend',
        'kategori',
        'attr',
        'tipe',
        'url',
        'tahun',
        'kategori_info_publik',
        'deleted',
        'id_syarat',
        'id_parent',
        'created_by',
        'updated_by',
        'dok_warga',
        'lokasi_arsip'
    ];

    /**
     * Date time columns.
     */
    protected $dates = ['tgl_upload'];
}
