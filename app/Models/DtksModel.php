<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property tinyint $is_draft is draft
@property int $id_rtm id rtm
@property int $id_keluarga id keluarga
@property timestamp $created_at created at
@property timestamp $updated_at updated at
@property varchar $versi_kuisioner versi kuisioner
@property mediumtext $catatan catatan
@property varchar $kode_provinsi kode provinsi
@property varchar $kode_kabupaten kode kabupaten
@property varchar $kode_kecamatan kode kecamatan
@property varchar $kode_desa kode desa
@property varchar $kode_sls_non_sls kode sls non sls
@property varchar $kode_sub_sls kode sub sls
@property varchar $nama_sls_non_sls nama sls non sls
@property varchar $no_urut_bangunan_tinggal no urut bangunan tinggal
@property varchar $no_urut_keluarga_verif no urut keluarga verif
@property varchar $status_keluarga status keluarga
@property varchar $kode_landmark_wilkerstat kode landmark wilkerstat
@property varchar $kd_kk kd kk
@property varchar $no_urut_ruta no urut ruta
@property date $tanggal_pencacahan tanggal pencacahan
@property varchar $nama_petugas_pencacahan nama petugas pencacahan
@property varchar $kode_petugas_pencacahan kode petugas pencacahan
@property date $tanggal_pemeriksaan tanggal pemeriksaan
@property varchar $nama_pemeriksa nama pemeriksa
@property varchar $kode_pemeriksa kode pemeriksa
@property varchar $nama_responden nama responden
@property varchar $kd_hasil_pencacahan_ruta kd hasil pencacahan ruta
@property date $tanggal_pendataan tanggal pendataan
@property varchar $nama_ppl nama ppl
@property varchar $kode_ppl kode ppl
@property varchar $nama_pml nama pml
@property varchar $kode_pml kode pml
@property varchar $kd_hasil_pendataan_keluarga kd hasil pendataan keluarga
@property varchar $no_hp_responden no hp responden
@property varchar $kd_stat_bangunan_tinggal kd stat bangunan tinggal
@property varchar $kd_stat_lahan_tinggal kd stat lahan tinggal
@property varchar $kd_sertiv_lahan_milik kd sertiv lahan milik
@property int $luas_lantai luas lantai
@property varchar $kd_jenis_lantai_terluas kd jenis lantai terluas
@property varchar $kd_jenis_dinding kd jenis dinding
@property varchar $kd_kondisi_dinding kd kondisi dinding
@property varchar $kd_jenis_atap kd jenis atap
@property varchar $kd_kondisi_atap kd kondisi atap
@property varchar $jumlah_kamar_tidur jumlah kamar tidur
@property varchar $kd_sumber_air_minum kd sumber air minum
@property varchar $kd_jarak_sumber_air_ke_tpl kd jarak sumber air ke tpl
@property varchar $kd_memperoleh_air_minum kd memperoleh air minum
@property varchar $kd_sumber_penerangan_utama kd sumber penerangan utama
@property varchar $kd_daya_terpasang kd daya terpasang
@property varchar $kd_daya_terpasang2 kd daya terpasang2
@property varchar $kd_daya_terpasang3 kd daya terpasang3
@property varchar $kode_pelanggan_daya kode pelanggan daya
@property varchar $kd_bahan_bakar_memasak kd bahan bakar memasak
@property varchar $kd_fasilitas_tempat_bab kd fasilitas tempat bab
@property varchar $kd_jenis_kloset kd jenis kloset
@property varchar $kd_pembuangan_akhir_tinja kd pembuangan akhir tinja
@property varchar $kd_tabung_gas_3_kg kd tabung gas 3 kg
@property varchar $kd_tabung_gas_5_5_kg kd tabung gas 5 5 kg
@property varchar $kd_tabung_gas_12_kg kd tabung gas 12 kg
@property varchar $kd_lemari_es kd lemari es
@property varchar $kd_ac kd ac
@property varchar $kd_pemanas_air kd pemanas air
@property varchar $kd_telepon_rumah kd telepon rumah
@property varchar $kd_televisi kd televisi
@property varchar $kd_perhiasan_10_gr_emas kd perhiasan 10 gr emas
@property varchar $kd_rek_aktif kd rek aktif
@property varchar $kd_komputer_laptop kd komputer laptop
@property varchar $kd_sepeda_motor kd sepeda motor
@property varchar $kd_mobil kd mobil
@property varchar $kd_perahu kd perahu
@property varchar $kd_kapal_perahu_motor kd kapal perahu motor
@property varchar $kd_featured_phone kd featured phone
@property varchar $kd_smartphone kd smartphone
@property varchar $kd_sepeda kd sepeda
@property varchar $kd_lahan kd lahan
@property int $luas_lahan luas lahan
@property varchar $kd_ada_sertiv_lahan kd ada sertiv lahan
@property varchar $kd_rumah_ditempat_lain kd rumah ditempat lain
@property int $jumlah_sapi jumlah sapi
@property int $jumlah_kerbau jumlah kerbau
@property int $jumlah_kuda jumlah kuda
@property int $jumlah_babi jumlah babi
@property int $jumlah_kambing_domba jumlah kambing domba
@property int $jumlah_unggas jumlah unggas
@property int $jumlah_ikan jumlah ikan
@property int $jumlah_lainnya jumlah lainnya
@property varchar $kd_ada_art_usaha_sendiri_bersama kd ada art usaha sendiri bersama
@property varchar $kd_internet_sebulan kd internet sebulan
@property varchar $kd_pengeluaran_pulsa_dan_data kd pengeluaran pulsa dan data
@property varchar $kd_ada_art_lanjut_usia kd ada art lanjut usia
@property varchar $kd_bss_bnpt kd bss bnpt
@property varchar $bulan_bss_bnpt bulan bss bnpt
@property year $tahun_bss_bnpt tahun bss bnpt
@property varchar $kd_pkh kd pkh
@property varchar $bulan_pkh bulan pkh
@property year $tahun_pkh tahun pkh
@property varchar $kd_bst_covid19 kd bst covid19
@property varchar $bulan_bst_covid19 bulan bst covid19
@property year $tahun_bst_covid19 tahun bst covid19
@property varchar $kd_blt_dana_desa kd blt dana desa
@property varchar $bulan_blt_dana_desa bulan blt dana desa
@property year $tahun_blt_dana_desa tahun blt dana desa
@property varchar $kd_subsidi_listrik kd subsidi listrik
@property varchar $bulan_subsidi_listrik bulan subsidi listrik
@property year $tahun_subsidi_listrik tahun subsidi listrik
@property varchar $kd_asuransi_lain kd asuransi lain
@property varchar $bulan_asuransi_lain bulan asuransi lain
@property year $tahun_asuransi_lain tahun asuransi lain
@property varchar $kd_bantuan_pemprov kd bantuan pemprov
@property varchar $bulan_bantuan_pemprov bulan bantuan pemprov
@property year $tahun_bantuan_pemprov tahun bantuan pemprov
@property varchar $kd_bantuan_pemkabkot kd bantuan pemkabkot
@property varchar $bulan_bantuan_pemkabkot bulan bantuan pemkabkot
@property year $tahun_bantuan_pemkabkot tahun bantuan pemkabkot
@property varchar $kd_bantuan_pemdes kd bantuan pemdes
@property varchar $bulan_bantuan_pemdes bulan bantuan pemdes
@property year $tahun_bantuan_pemdes tahun bantuan pemdes
@property varchar $kd_bantuan_pemda kd bantuan pemda
@property varchar $bulan_bantuan_pemda bulan bantuan pemda
@property year $tahun_bantuan_pemda tahun bantuan pemda
@property varchar $kd_bantuan_masyarakat kd bantuan masyarakat
@property varchar $bulan_bantuan_masyarakat bulan bantuan masyarakat
@property year $tahun_bantuan_masyarakat tahun bantuan masyarakat
@property varchar $kd_subsidi_pupuk kd subsidi pupuk
@property varchar $bulan_subsidi_pupuk bulan subsidi pupuk
@property year $tahun_subsidi_pupuk tahun subsidi pupuk
@property varchar $kd_subsidi_lpg kd subsidi lpg
@property varchar $bulan_subsidi_lpg bulan subsidi lpg
@property year $tahun_subsidi_lpg tahun subsidi lpg
@property varchar $kd_konsumsi_daging kd konsumsi daging
@property varchar $kd_makan kd makan
@property varchar $kd_beli_pakaian_baru kd beli pakaian baru
@property varchar $kd_bayar_biaya_pengobatan kd bayar biaya pengobatan
@property varchar $kd_bahasa_wawancara kd bahasa wawancara
@property varchar $tulis_bahasa_daerah tulis bahasa daerah
@property IdKeluarga $twebKeluarga belongsTo
@property IdRtm $twebRtm belongsTo
@property \Illuminate\Database\Eloquent\Collection $dtksAnggotum hasMany
@property \Illuminate\Database\Eloquent\Collection $dtksRefLampiran hasMany
   
 */
class DtksModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'dtks';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tulis_bahasa_daerah',
'is_draft',
'id_rtm',
'id_keluarga',
'versi_kuisioner',
'catatan',
'kode_provinsi',
'kode_kabupaten',
'kode_kecamatan',
'kode_desa',
'kode_sls_non_sls',
'kode_sub_sls',
'nama_sls_non_sls',
'no_urut_bangunan_tinggal',
'no_urut_keluarga_verif',
'status_keluarga',
'kode_landmark_wilkerstat',
'kd_kk',
'no_urut_ruta',
'tanggal_pencacahan',
'nama_petugas_pencacahan',
'kode_petugas_pencacahan',
'tanggal_pemeriksaan',
'nama_pemeriksa',
'kode_pemeriksa',
'nama_responden',
'kd_hasil_pencacahan_ruta',
'tanggal_pendataan',
'nama_ppl',
'kode_ppl',
'nama_pml',
'kode_pml',
'kd_hasil_pendataan_keluarga',
'no_hp_responden',
'kd_stat_bangunan_tinggal',
'kd_stat_lahan_tinggal',
'kd_sertiv_lahan_milik',
'luas_lantai',
'kd_jenis_lantai_terluas',
'kd_jenis_dinding',
'kd_kondisi_dinding',
'kd_jenis_atap',
'kd_kondisi_atap',
'jumlah_kamar_tidur',
'kd_sumber_air_minum',
'kd_jarak_sumber_air_ke_tpl',
'kd_memperoleh_air_minum',
'kd_sumber_penerangan_utama',
'kd_daya_terpasang',
'kd_daya_terpasang2',
'kd_daya_terpasang3',
'kode_pelanggan_daya',
'kd_bahan_bakar_memasak',
'kd_fasilitas_tempat_bab',
'kd_jenis_kloset',
'kd_pembuangan_akhir_tinja',
'kd_tabung_gas_3_kg',
'kd_tabung_gas_5_5_kg',
'kd_tabung_gas_12_kg',
'kd_lemari_es',
'kd_ac',
'kd_pemanas_air',
'kd_telepon_rumah',
'kd_televisi',
'kd_perhiasan_10_gr_emas',
'kd_rek_aktif',
'kd_komputer_laptop',
'kd_sepeda_motor',
'kd_mobil',
'kd_perahu',
'kd_kapal_perahu_motor',
'kd_featured_phone',
'kd_smartphone',
'kd_sepeda',
'kd_lahan',
'luas_lahan',
'kd_ada_sertiv_lahan',
'kd_rumah_ditempat_lain',
'jumlah_sapi',
'jumlah_kerbau',
'jumlah_kuda',
'jumlah_babi',
'jumlah_kambing_domba',
'jumlah_unggas',
'jumlah_ikan',
'jumlah_lainnya',
'kd_ada_art_usaha_sendiri_bersama',
'kd_internet_sebulan',
'kd_pengeluaran_pulsa_dan_data',
'kd_ada_art_lanjut_usia',
'kd_bss_bnpt',
'bulan_bss_bnpt',
'tahun_bss_bnpt',
'kd_pkh',
'bulan_pkh',
'tahun_pkh',
'kd_bst_covid19',
'bulan_bst_covid19',
'tahun_bst_covid19',
'kd_blt_dana_desa',
'bulan_blt_dana_desa',
'tahun_blt_dana_desa',
'kd_subsidi_listrik',
'bulan_subsidi_listrik',
'tahun_subsidi_listrik',
'kd_asuransi_lain',
'bulan_asuransi_lain',
'tahun_asuransi_lain',
'kd_bantuan_pemprov',
'bulan_bantuan_pemprov',
'tahun_bantuan_pemprov',
'kd_bantuan_pemkabkot',
'bulan_bantuan_pemkabkot',
'tahun_bantuan_pemkabkot',
'kd_bantuan_pemdes',
'bulan_bantuan_pemdes',
'tahun_bantuan_pemdes',
'kd_bantuan_pemda',
'bulan_bantuan_pemda',
'tahun_bantuan_pemda',
'kd_bantuan_masyarakat',
'bulan_bantuan_masyarakat',
'tahun_bantuan_masyarakat',
'kd_subsidi_pupuk',
'bulan_subsidi_pupuk',
'tahun_subsidi_pupuk',
'kd_subsidi_lpg',
'bulan_subsidi_lpg',
'tahun_subsidi_lpg',
'kd_konsumsi_daging',
'kd_makan',
'kd_beli_pakaian_baru',
'kd_bayar_biaya_pengobatan',
'kd_bahasa_wawancara',
'tulis_bahasa_daerah'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_pencacahan',
'tanggal_pemeriksaan',
'tanggal_pendataan'];

    /**
    * idKeluarga
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idKeluarga()
    {
        return $this->belongsTo(TwebKeluarga::class,'id_keluarga');
    }

    /**
    * idRtm
    *
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function idRtm()
    {
        return $this->belongsTo(TwebRtm::class,'id_rtm');
    }

    /**
    * dtksAnggota
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtksAnggota()
    {
        return $this->hasMany(DtksAnggotum::class,'id_dtks');
    }
    /**
    * dtksRefLampirans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function dtksRefLampirans()
    {
        return $this->hasMany(DtksRefLampiran::class,'id_dtks');
    }



}