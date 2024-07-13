<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property varchar $url_surat url surat
@property varchar $kode_surat kode surat
@property varchar $lampiran lampiran
@property tinyint $kunci kunci
@property tinyint $favorit favorit
@property tinyint $jenis jenis
@property tinyint $mandiri mandiri
@property int $masa_berlaku masa berlaku
@property varchar $satuan_masa_berlaku satuan masa berlaku
@property tinyint $qr_code qr code
@property tinyint $logo_garuda logo garuda
@property tinyint $kecamatan kecamatan
@property longtext $syarat_surat syarat surat
@property longtext $template template
@property longtext $template_desa template desa
@property longtext $form_isian form isian
@property longtext $kode_isian kode isian
@property varchar $orientasi orientasi
@property varchar $ukuran ukuran
@property text $margin margin
@property int $footer footer
@property int $header header
@property varchar $format_nomor format nomor
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
   
 */
class TwebSuratFormatModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_surat_format';

    /**
    * Mass assignable columns
    */
    protected $fillable=['updated_by',
'nama',
'url_surat',
'kode_surat',
'lampiran',
'kunci',
'favorit',
'jenis',
'mandiri',
'masa_berlaku',
'satuan_masa_berlaku',
'qr_code',
'logo_garuda',
'kecamatan',
'syarat_surat',
'template',
'template_desa',
'form_isian',
'kode_isian',
'orientasi',
'ukuran',
'margin',
'footer',
'header',
'format_nomor',
'created_by',
'updated_by'];

    /**
    * Date time columns.
    */
    protected $dates=[];




}