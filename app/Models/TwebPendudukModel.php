<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $nama nama
@property varchar $nik nik
@property int $id_kk id kk
@property tinyint $kk_level kk level
@property varchar $id_rtm id rtm
@property int $rtm_level rtm level
@property tinyint $sex sex
@property varchar $tempatlahir tempatlahir
@property date $tanggallahir tanggallahir
@property int $agama_id agama id
@property int $pendidikan_kk_id pendidikan kk id
@property int $pendidikan_sedang_id pendidikan sedang id
@property int $pekerjaan_id pekerjaan id
@property tinyint $status_kawin status kawin
@property tinyint $warganegara_id warganegara id
@property varchar $dokumen_pasport dokumen pasport
@property varchar $dokumen_kitas dokumen kitas
@property varchar $ayah_nik ayah nik
@property varchar $ibu_nik ibu nik
@property varchar $nama_ayah nama ayah
@property varchar $nama_ibu nama ibu
@property varchar $foto foto
@property int $golongan_darah_id golongan darah id
@property int $id_cluster id cluster
@property int $status status
@property varchar $alamat_sebelumnya alamat sebelumnya
@property varchar $alamat_sekarang alamat sekarang
@property tinyint $status_dasar status dasar
@property int $hamil hamil
@property int $cacat_id cacat id
@property int $sakit_menahun_id sakit menahun id
@property varchar $akta_lahir akta lahir
@property varchar $akta_perkawinan akta perkawinan
@property date $tanggalperkawinan tanggalperkawinan
@property varchar $akta_perceraian akta perceraian
@property date $tanggalperceraian tanggalperceraian
@property tinyint $cara_kb_id cara kb id
@property varchar $telepon telepon
@property date $tanggal_akhir_paspor tanggal akhir paspor
@property varchar $no_kk_sebelumnya no kk sebelumnya
@property tinyint $ktp_el ktp el
@property tinyint $status_rekam status rekam
@property varchar $waktu_lahir waktu lahir
@property tinyint $tempat_dilahirkan tempat dilahirkan
@property tinyint $jenis_kelahiran jenis kelahiran
@property tinyint $kelahiran_anak_ke kelahiran anak ke
@property tinyint $penolong_kelahiran penolong kelahiran
@property smallint $berat_lahir berat lahir
@property varchar $panjang_lahir panjang lahir
@property varchar $tag_id_card tag id card
@property timestamp $created_at created at
@property int $created_by created by
@property timestamp $updated_at updated at
@property int $updated_by updated by
@property tinyint $id_asuransi id asuransi
@property char $no_asuransi no asuransi
@property varchar $email email
@property varchar $email_token email token
@property datetime $email_tgl_kadaluarsa email tgl kadaluarsa
@property datetime $email_tgl_verifikasi email tgl verifikasi
@property varchar $telegram telegram
@property varchar $telegram_token telegram token
@property datetime $telegram_tgl_kadaluarsa telegram tgl kadaluarsa
@property datetime $telegram_tgl_verifikasi telegram tgl verifikasi
@property int $bahasa_id bahasa id
@property text $ket ket
@property varchar $negara_asal negara asal
@property varchar $tempat_cetak_ktp tempat cetak ktp
@property date $tanggal_cetak_ktp tanggal cetak ktp
@property varchar $suku suku
@property char $bpjs_ketenagakerjaan bpjs ketenagakerjaan
@property varchar $hubung_warga hubung warga
@property \Illuminate\Database\Eloquent\Collection $anggotagrupkontak belongsToMany
@property \Illuminate\Database\Eloquent\Collection $covid19Pemudik hasMany
@property \Illuminate\Database\Eloquent\Collection $dtksAnggotum hasMany
@property \Illuminate\Database\Eloquent\Collection $mandiri belongsToMany
   
 */
class TwebPendudukModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'tweb_penduduk';

    /**
    * Mass assignable columns
    */
    protected $fillable=['hubung_warga',
'nama',
'nik',
'id_kk',
'kk_level',
'id_rtm',
'rtm_level',
'sex',
'tempatlahir',
'tanggallahir',
'agama_id',
'pendidikan_kk_id',
'pendidikan_sedang_id',
'pekerjaan_id',
'status_kawin',
'warganegara_id',
'dokumen_pasport',
'dokumen_kitas',
'ayah_nik',
'ibu_nik',
'nama_ayah',
'nama_ibu',
'foto',
'golongan_darah_id',
'id_cluster',
'status',
'alamat_sebelumnya',
'alamat_sekarang',
'status_dasar',
'hamil',
'cacat_id',
'sakit_menahun_id',
'akta_lahir',
'akta_perkawinan',
'tanggalperkawinan',
'akta_perceraian',
'tanggalperceraian',
'cara_kb_id',
'telepon',
'tanggal_akhir_paspor',
'no_kk_sebelumnya',
'ktp_el',
'status_rekam',
'waktu_lahir',
'tempat_dilahirkan',
'jenis_kelahiran',
'kelahiran_anak_ke',
'penolong_kelahiran',
'berat_lahir',
'panjang_lahir',
'tag_id_card',
'created_by',
'updated_by',
'id_asuransi',
'no_asuransi',
'email',
'email_token',
'email_tgl_kadaluarsa',
'email_tgl_verifikasi',
'telegram',
'telegram_token',
'telegram_tgl_kadaluarsa',
'telegram_tgl_verifikasi',
'bahasa_id',
'ket',
'negara_asal',
'tempat_cetak_ktp',
'tanggal_cetak_ktp',
'suku',
'bpjs_ketenagakerjaan',
'hubung_warga'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggallahir',
'tanggalperkawinan',
'tanggalperceraian',
'tanggal_akhir_paspor',
'email_tgl_kadaluarsa',
'email_tgl_verifikasi',
'telegram_tgl_kadaluarsa',
'telegram_tgl_verifikasi',
'tanggal_cetak_ktp'];

    /**
    * anggotagrupkontaks
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function anggotagrupkontaks()
    {
        return $this->belongsToMany(Anggotagrupkontak::class,'anggota_grup_kontak');
    }
    /**
    * covid19Pemudiks
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function covid19Pemudiks()
    {
        return $this->hasMany(Covid19Pemudik::class,'id_terdata');
    }
    /**
    * dtksAnggota
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtksAnggota()
    {
        return $this->hasMany(DtksAnggotum::class,'id_penduduk');
    }
    /**
    * mandiris
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
    */
    public function mandiris()
    {
        return $this->belongsToMany(Mandiri::class,'tweb_penduduk_mandiri');
    }



}