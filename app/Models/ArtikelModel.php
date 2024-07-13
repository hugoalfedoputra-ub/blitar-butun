<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $gambar gambar
@property text $isi isi
@property int $enabled enabled
@property timestamp $tgl_upload tgl upload
@property int $id_kategori id kategori
@property int $id_user id user
@property varchar $judul judul
@property int $headline headline
@property varchar $gambar1 gambar1
@property varchar $gambar2 gambar2
@property varchar $gambar3 gambar3
@property varchar $dokumen dokumen
@property varchar $link_dokumen link dokumen
@property tinyint $boleh_komentar boleh komentar
@property varchar $slug slug
@property int $hit hit
@property int $urut urut
@property tinyint $jenis_widget jenis widget
@property \Illuminate\Database\Eloquent\Collection $agenda hasMany
   
 */
class ArtikelModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'artikel';

    /**
    * Mass assignable columns
    */
    protected $fillable=['jenis_widget',
'gambar',
'isi',
'enabled',
'tgl_upload',
'id_kategori',
'id_user',
'judul',
'headline',
'gambar1',
'gambar2',
'gambar3',
'dokumen',
'link_dokumen',
'boleh_komentar',
'slug',
'hit',
'urut',
'jenis_widget'];

    /**
    * Date time columns.
    */
    protected $dates=['tgl_upload'];

    /**
    * agendas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function agendas()
    {
        return $this->hasMany(Agenda::class,'id_artikel');
    }



}