<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $pamong_nama pamong nama
@property varchar $gelar_depan gelar depan
@property varchar $gelar_belakang gelar belakang
@property varchar $pamong_nip pamong nip
@property varchar $pamong_tag_id_card pamong tag id card
@property varchar $pamong_pin pamong pin
@property varchar $pamong_nik pamong nik
@property tinyint $pamong_status pamong status
@property date $pamong_tgl_terdaftar pamong tgl terdaftar
@property tinyint $pamong_ttd pamong ttd
@property text $foto foto
@property int $id_pend id pend
@property varchar $pamong_tempatlahir pamong tempatlahir
@property date $pamong_tanggallahir pamong tanggallahir
@property tinyint $pamong_sex pamong sex
@property int $pamong_pendidikan pamong pendidikan
@property int $pamong_agama pamong agama
@property varchar $pamong_nosk pamong nosk
@property date $pamong_tglsk pamong tglsk
@property varchar $pamong_masajab pamong masajab
@property int $urut urut
@property varchar $pamong_niap pamong niap
@property varchar $pamong_pangkat pamong pangkat
@property varchar $pamong_nohenti pamong nohenti
@property date $pamong_tglhenti pamong tglhenti
@property tinyint $pamong_ub pamong ub
@property int $atasan atasan
@property tinyint $bagan_tingkat bagan tingkat
@property int $bagan_offset bagan offset
@property varchar $bagan_layout bagan layout
@property varchar $bagan_warna bagan warna
@property int $kehadiran kehadiran
@property int $jabatan_id jabatan id
@property \Illuminate\Database\Eloquent\Collection $disposisisuratmasuk belongsToMany
   
 */
class TwebDesaPamong extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_desa_pamong';

    /**
    * Mass assignable columns
    */
    protected $fillable=['jabatan_id',
'pamong_nama',
'gelar_depan',
'gelar_belakang',
'pamong_nip',
'pamong_tag_id_card',
'pamong_pin',
'pamong_nik',
'pamong_status',
'pamong_tgl_terdaftar',
'pamong_ttd',
'foto',
'id_pend',
'pamong_tempatlahir',
'pamong_tanggallahir',
'pamong_sex',
'pamong_pendidikan',
'pamong_agama',
'pamong_nosk',
'pamong_tglsk',
'pamong_masajab',
'urut',
'pamong_niap',
'pamong_pangkat',
'pamong_nohenti',
'pamong_tglhenti',
'pamong_ub',
'atasan',
'bagan_tingkat',
'bagan_offset',
'bagan_layout',
'bagan_warna',
'kehadiran',
'jabatan_id'];

    /**
    * Date time columns.
    */
    protected $dates=['pamong_tgl_terdaftar',
'pamong_tanggallahir',
'pamong_tglsk',
'pamong_tglhenti'];

    /**
    * disposisisuratmasuks
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function disposisisuratmasuks()
    {
        return $this->belongsToMany(Disposisisuratmasuks::class,'disposisi_surat_masuk');
    }



}