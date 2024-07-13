<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
   @property int $id_dtks id dtks
@property int $id_penduduk id penduduk
@property int $id_keluarga id keluarga
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property varchar $kd_ket_keberadaan_art kd ket keberadaan art
@property varchar $bulan_meninggal bulan meninggal
@property year $tahun_meninggal tahun meninggal
@property varchar $kd_punya_akta_meniggal kd punya akta meniggal
@property varchar $bulan_pindah_tempat bulan pindah tempat
@property year $tahun_pindah_tempat tahun pindah tempat
@property varchar $kd_tempat_tinggal_saat_ini kd tempat tinggal saat ini
@property varchar $bulan_masuk_ruta bulan masuk ruta
@property year $tahun_masuk_ruta tahun masuk ruta
@property varchar $kd_alasan_masuk_ruta kd alasan masuk ruta
@property varchar $kd_hubungan_dg_krt kd hubungan dg krt
@property varchar $kd_hubungan_dg_kk kd hubungan dg kk
@property varchar $kd_jenis_kelamin kd jenis kelamin
@property varchar $kd_punya_aktanikah_cerai kd punya aktanikah cerai
@property varchar $kd_punya_kartuid kd punya kartuid
@property varchar $kd_sulit_penglihatan kd sulit penglihatan
@property varchar $kd_sulit_pendengaran kd sulit pendengaran
@property varchar $kd_sulit_jalan_naiktangga kd sulit jalan naiktangga
@property varchar $kd_sulit_gerak_tangan_jari kd sulit gerak tangan jari
@property varchar $kd_sulit_belajar_intelektual kd sulit belajar intelektual
@property varchar $kd_sulit_ingat_konsentrasi kd sulit ingat konsentrasi
@property varchar $kd_sulit_perilaku_emosi kd sulit perilaku emosi
@property varchar $kd_sulit_paham_bicara_kom kd sulit paham bicara kom
@property varchar $kd_sulit_mandiri kd sulit mandiri
@property varchar $kd_sering_sedih_depresi kd sering sedih depresi
@property varchar $kd_memiliki_perawat kd memiliki perawat
@property varchar $kd_merokok_sebulan_akhir kd merokok sebulan akhir
@property varchar $kd_penyakit_kronis_menahun kd penyakit kronis menahun
@property varchar $kd_partisipasi_sekolah kd partisipasi sekolah
@property varchar $kd_pendidikan_tertinggi kd pendidikan tertinggi
@property varchar $kd_kelas_tertinggi kd kelas tertinggi
@property varchar $kd_ijazah_tertinggi kd ijazah tertinggi
@property varchar $kd_bekerja_seminggu_lalu kd bekerja seminggu lalu
@property varchar $jumlah_jam_kerja_seminggu_lalu jumlah jam kerja seminggu lalu
@property bigint $pendapatan_sebulan_terakhir pendapatan sebulan terakhir
@property varchar $kd_punya_npwp kd punya npwp
@property varchar $npwp npwp
@property varchar $kd_lapangan_usaha_pekerjaan kd lapangan usaha pekerjaan
@property varchar $kd_kedudukan_di_pekerjaan kd kedudukan di pekerjaan
@property varchar $kd_gizi_seimbang kd gizi seimbang
@property varchar $kd_imunasasi_lengkap kd imunasasi lengkap
@property varchar $kd_bantuan_pempus kd bantuan pempus
@property varchar $kd_bantuan_pemkot kd bantuan pemkot
@property varchar $kd_bantuan_pemdes kd bantuan pemdes
@property varchar $kd_jamkes_setahun kd jamkes setahun
@property varchar $kd_ikut_pbijkn_bpjssehat kd ikut pbijkn bpjssehat
@property varchar $kd_ikut_bpjssehat_nonpbi kd ikut bpjssehat nonpbi
@property varchar $kd_ikut_jamsostek_bpjsk kd ikut jamsostek bpjsk
@property varchar $kd_ikut_pip kd ikut pip
@property varchar $kd_ikut_prakerja kd ikut prakerja
@property varchar $kd_ikut_kur kd ikut kur
@property varchar $kd_ikut_umi kd ikut umi
@property varchar $jumlah_jamket_kerja jumlah jamket kerja
@property tinyint $is_usaha_sendiri_bersama is usaha sendiri bersama
@property varchar $kd_punya_usaha_sendiri_bersama kd punya usaha sendiri bersama
@property tinyint $jumlah_usaha_sendiri_bersama jumlah usaha sendiri bersama
@property varchar $kd_lapangan_usaha_dr_usaha kd lapangan usaha dr usaha
@property varchar $tulis_lapangan_usaha_dr_usaha tulis lapangan usaha dr usaha
@property varchar $tulis_lapangan_usaha_pekerjaan tulis lapangan usaha pekerjaan
@property tinyint $jumlah_pekerja_dibayar jumlah pekerja dibayar
@property tinyint $jumlah_pekerja_tidak_dibayar jumlah pekerja tidak dibayar
@property varchar $kd_kepemilikan_ijin_usaha kd kepemilikan ijin usaha
@property varchar $kd_omset_usaha_perbulan kd omset usaha perbulan
@property varchar $kd_guna_internet_usaha kd guna internet usaha
@property IdKeluarga $twebKeluarga belongsTo
@property IdPenduduk $twebPenduduk belongsTo
@property IdDtk $dtk belongsTo
   
 */
class DtksAnggota extends Model
{

    /**
     * Database table name
     */
    protected $table = 'dtks_anggota';

    /**
     * Mass assignable columns
     */
    protected $fillable = [
        'kd_guna_internet_usaha',
        'id_dtks',
        'id_penduduk',
        'id_keluarga',
        'kd_ket_keberadaan_art',
        'bulan_meninggal',
        'tahun_meninggal',
        'kd_punya_akta_meniggal',
        'bulan_pindah_tempat',
        'tahun_pindah_tempat',
        'kd_tempat_tinggal_saat_ini',
        'bulan_masuk_ruta',
        'tahun_masuk_ruta',
        'kd_alasan_masuk_ruta',
        'kd_hubungan_dg_krt',
        'kd_hubungan_dg_kk',
        'kd_jenis_kelamin',
        'kd_punya_aktanikah_cerai',
        'kd_punya_kartuid',
        'kd_sulit_penglihatan',
        'kd_sulit_pendengaran',
        'kd_sulit_jalan_naiktangga',
        'kd_sulit_gerak_tangan_jari',
        'kd_sulit_belajar_intelektual',
        'kd_sulit_ingat_konsentrasi',
        'kd_sulit_perilaku_emosi',
        'kd_sulit_paham_bicara_kom',
        'kd_sulit_mandiri',
        'kd_sering_sedih_depresi',
        'kd_memiliki_perawat',
        'kd_merokok_sebulan_akhir',
        'kd_penyakit_kronis_menahun',
        'kd_partisipasi_sekolah',
        'kd_pendidikan_tertinggi',
        'kd_kelas_tertinggi',
        'kd_ijazah_tertinggi',
        'kd_bekerja_seminggu_lalu',
        'jumlah_jam_kerja_seminggu_lalu',
        'pendapatan_sebulan_terakhir',
        'kd_punya_npwp',
        'npwp',
        'kd_lapangan_usaha_pekerjaan',
        'kd_kedudukan_di_pekerjaan',
        'kd_gizi_seimbang',
        'kd_imunasasi_lengkap',
        'kd_bantuan_pempus',
        'kd_bantuan_pemkot',
        'kd_bantuan_pemdes',
        'kd_jamkes_setahun',
        'kd_ikut_pbijkn_bpjssehat',
        'kd_ikut_bpjssehat_nonpbi',
        'kd_ikut_jamsostek_bpjsk',
        'kd_ikut_pip',
        'kd_ikut_prakerja',
        'kd_ikut_kur',
        'kd_ikut_umi',
        'jumlah_jamket_kerja',
        'is_usaha_sendiri_bersama',
        'kd_punya_usaha_sendiri_bersama',
        'jumlah_usaha_sendiri_bersama',
        'kd_lapangan_usaha_dr_usaha',
        'tulis_lapangan_usaha_dr_usaha',
        'tulis_lapangan_usaha_pekerjaan',
        'jumlah_pekerja_dibayar',
        'jumlah_pekerja_tidak_dibayar',
        'kd_kepemilikan_ijin_usaha',
        'kd_omset_usaha_perbulan',
        'kd_guna_internet_usaha'
    ];

    /**
     * Date time columns.
     */
    protected $dates = [];

    /**
     * idKeluarga
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idKeluarga()
    {
        return $this->belongsTo(TwebKeluarga::class, 'id_keluarga');
    }

    /**
     * idPenduduk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idPenduduk()
    {
        return $this->belongsTo(TwebPenduduk::class, 'id_penduduk');
    }

    /**
     * idDtk
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
     */
    public function idDtk()
    {
        return $this->belongsTo(Dtk::class, 'id_dtks');
    }
}
