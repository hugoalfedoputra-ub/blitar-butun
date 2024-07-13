<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;
/**
   @property varchar $versi_database versi database
@property varchar $tahun_anggaran tahun anggaran
@property int $aktif aktif
@property date $tanggal_impor tanggal impor
@property \Illuminate\Database\Eloquent\Collection $keuanganRefBankDesa hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefBelOperasional hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefBidang hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefBunga hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefDesa hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefKecamatan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefKegiatan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefKorolari hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefNeracaClose hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefPerangkat hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefPotongan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefRek1 hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefRek2 hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefRek3 hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefRek4 hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefSbu hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganRefSumber hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaAnggaran hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaAnggaranLog hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaAnggaranRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaBidang hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaDesa hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaJurnalUmum hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaJurnalUmumRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaKegiatan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaMutasi hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaPajak hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaPajakRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaPemda hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaPencairan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaPerangkat hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRab hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRabRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRabSub hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmBidang hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmKegiatan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmMisi hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmPaguIndikatif hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmPaguTahunan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmSasaran hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmTujuan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaRpjmVisi hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSaldoAwal hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpj hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpjpot hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpjBukti hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpjRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpjSisa hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpp hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSppbukti hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSpppot hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSppRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaSt hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaStsRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaTbp hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaTbpRinci hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaTriwulan hasMany
@property \Illuminate\Database\Eloquent\Collection $keuanganTaTriwulanRinci hasMany
   
 */
class KeuanganMasterModel extends Model 
{
    
    /**
    * Database table name
    */
    protected $table = 'keuangan_master';

    /**
    * Mass assignable columns
    */
    protected $fillable=['tanggal_impor',
'versi_database',
'tahun_anggaran',
'aktif',
'tanggal_impor'];

    /**
    * Date time columns.
    */
    protected $dates=['tanggal_impor'];

    /**
    * keuanganRefBankDesas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefBankDesas()
    {
        return $this->hasMany(KeuanganRefBankDesa::class,'id_keuangan_master');
    }
    /**
    * keuanganRefBelOperasionals
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefBelOperasionals()
    {
        return $this->hasMany(KeuanganRefBelOperasional::class,'id_keuangan_master');
    }
    /**
    * keuanganRefBidangs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefBidangs()
    {
        return $this->hasMany(KeuanganRefBidang::class,'id_keuangan_master');
    }
    /**
    * keuanganRefBungas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefBungas()
    {
        return $this->hasMany(KeuanganRefBunga::class,'id_keuangan_master');
    }
    /**
    * keuanganRefDesas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefDesas()
    {
        return $this->hasMany(KeuanganRefDesa::class,'id_keuangan_master');
    }
    /**
    * keuanganRefKecamatans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefKecamatans()
    {
        return $this->hasMany(KeuanganRefKecamatan::class,'id_keuangan_master');
    }
    /**
    * keuanganRefKegiatans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefKegiatans()
    {
        return $this->hasMany(KeuanganRefKegiatan::class,'id_keuangan_master');
    }
    /**
    * keuanganRefKorolaris
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefKorolaris()
    {
        return $this->hasMany(KeuanganRefKorolari::class,'id_keuangan_master');
    }
    /**
    * keuanganRefNeracaCloses
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefNeracaCloses()
    {
        return $this->hasMany(KeuanganRefNeracaClose::class,'id_keuangan_master');
    }
    /**
    * keuanganRefPerangkats
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefPerangkats()
    {
        return $this->hasMany(KeuanganRefPerangkat::class,'id_keuangan_master');
    }
    /**
    * keuanganRefPotongans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefPotongans()
    {
        return $this->hasMany(KeuanganRefPotongan::class,'id_keuangan_master');
    }
    /**
    * keuanganRefRek1s
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefRek1s()
    {
        return $this->hasMany(KeuanganRefRek1::class,'id_keuangan_master');
    }
    /**
    * keuanganRefRek2s
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefRek2s()
    {
        return $this->hasMany(KeuanganRefRek2::class,'id_keuangan_master');
    }
    /**
    * keuanganRefRek3s
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefRek3s()
    {
        return $this->hasMany(KeuanganRefRek3::class,'id_keuangan_master');
    }
    /**
    * keuanganRefRek4s
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefRek4s()
    {
        return $this->hasMany(KeuanganRefRek4::class,'id_keuangan_master');
    }
    /**
    * keuanganRefSbus
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefSbus()
    {
        return $this->hasMany(KeuanganRefSbu::class,'id_keuangan_master');
    }
    /**
    * keuanganRefSumbers
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganRefSumbers()
    {
        return $this->hasMany(KeuanganRefSumber::class,'id_keuangan_master');
    }
    /**
    * keuanganTaAnggarans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaAnggarans()
    {
        return $this->hasMany(KeuanganTaAnggaran::class,'id_keuangan_master');
    }
    /**
    * keuanganTaAnggaranLogs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaAnggaranLogs()
    {
        return $this->hasMany(KeuanganTaAnggaranLog::class,'id_keuangan_master');
    }
    /**
    * keuanganTaAnggaranRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaAnggaranRincis()
    {
        return $this->hasMany(KeuanganTaAnggaranRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaBidangs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaBidangs()
    {
        return $this->hasMany(KeuanganTaBidang::class,'id_keuangan_master');
    }
    /**
    * keuanganTaDesas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaDesas()
    {
        return $this->hasMany(KeuanganTaDesa::class,'id_keuangan_master');
    }
    /**
    * keuanganTaJurnalUmums
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaJurnalUmums()
    {
        return $this->hasMany(KeuanganTaJurnalUmum::class,'id_keuangan_master');
    }
    /**
    * keuanganTaJurnalUmumRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaJurnalUmumRincis()
    {
        return $this->hasMany(KeuanganTaJurnalUmumRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaKegiatans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaKegiatans()
    {
        return $this->hasMany(KeuanganTaKegiatan::class,'id_keuangan_master');
    }
    /**
    * keuanganTaMutasis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaMutasis()
    {
        return $this->hasMany(KeuanganTaMutasi::class,'id_keuangan_master');
    }
    /**
    * keuanganTaPajaks
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaPajaks()
    {
        return $this->hasMany(KeuanganTaPajak::class,'id_keuangan_master');
    }
    /**
    * keuanganTaPajakRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaPajakRincis()
    {
        return $this->hasMany(KeuanganTaPajakRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaPemdas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaPemdas()
    {
        return $this->hasMany(KeuanganTaPemda::class,'id_keuangan_master');
    }
    /**
    * keuanganTaPencairans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaPencairans()
    {
        return $this->hasMany(KeuanganTaPencairan::class,'id_keuangan_master');
    }
    /**
    * keuanganTaPerangkats
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaPerangkats()
    {
        return $this->hasMany(KeuanganTaPerangkat::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRabs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRabs()
    {
        return $this->hasMany(KeuanganTaRab::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRabRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRabRincis()
    {
        return $this->hasMany(KeuanganTaRabRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRabSubs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRabSubs()
    {
        return $this->hasMany(KeuanganTaRabSub::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmBidangs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmBidangs()
    {
        return $this->hasMany(KeuanganTaRpjmBidang::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmKegiatans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmKegiatans()
    {
        return $this->hasMany(KeuanganTaRpjmKegiatan::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmMisis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmMisis()
    {
        return $this->hasMany(KeuanganTaRpjmMisi::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmPaguIndikatifs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmPaguIndikatifs()
    {
        return $this->hasMany(KeuanganTaRpjmPaguIndikatif::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmPaguTahunans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmPaguTahunans()
    {
        return $this->hasMany(KeuanganTaRpjmPaguTahunan::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmSasarans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmSasarans()
    {
        return $this->hasMany(KeuanganTaRpjmSasaran::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmTujuans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmTujuans()
    {
        return $this->hasMany(KeuanganTaRpjmTujuan::class,'id_keuangan_master');
    }
    /**
    * keuanganTaRpjmVisis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaRpjmVisis()
    {
        return $this->hasMany(KeuanganTaRpjmVisi::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSaldoAwals
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSaldoAwals()
    {
        return $this->hasMany(KeuanganTaSaldoAwal::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpjs
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpjs()
    {
        return $this->hasMany(KeuanganTaSpj::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpjpots
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpjpots()
    {
        return $this->hasMany(KeuanganTaSpjpot::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpjBuktis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpjBuktis()
    {
        return $this->hasMany(KeuanganTaSpjBukti::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpjRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpjRincis()
    {
        return $this->hasMany(KeuanganTaSpjRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpjSisas
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpjSisas()
    {
        return $this->hasMany(KeuanganTaSpjSisa::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpps
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpps()
    {
        return $this->hasMany(KeuanganTaSpp::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSppbuktis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSppbuktis()
    {
        return $this->hasMany(KeuanganTaSppbukti::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSpppots
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSpppots()
    {
        return $this->hasMany(KeuanganTaSpppot::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSppRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSppRincis()
    {
        return $this->hasMany(KeuanganTaSppRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaSts
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaSts()
    {
        return $this->hasMany(KeuanganTaSt::class,'id_keuangan_master');
    }
    /**
    * keuanganTaStsRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaStsRincis()
    {
        return $this->hasMany(KeuanganTaStsRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaTbps
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaTbps()
    {
        return $this->hasMany(KeuanganTaTbp::class,'id_keuangan_master');
    }
    /**
    * keuanganTaTbpRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaTbpRincis()
    {
        return $this->hasMany(KeuanganTaTbpRinci::class,'id_keuangan_master');
    }
    /**
    * keuanganTaTriwulans
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaTriwulans()
    {
        return $this->hasMany(KeuanganTaTriwulan::class,'id_keuangan_master');
    }
    /**
    * keuanganTaTriwulanRincis
    *
    * @return \Illuminate\Database\Eloquent\Relations\HasMany
    */
    public function keuanganTaTriwulanRincis()
    {
        return $this->hasMany(KeuanganTaTriwulanRinci::class,'id_keuangan_master');
    }



}