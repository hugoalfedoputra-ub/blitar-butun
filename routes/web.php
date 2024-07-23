<?php

use App\Http\Controllers\AgendaController;
use App\Http\Controllers\AnalisisIndikatorController;
use App\Http\Controllers\AnalisisKategoriIndikatorController;
use App\Http\Controllers\AnalisisKlasifikasiController;
use App\Http\Controllers\AnalisisMasterController;
use App\Http\Controllers\AnalisisParameterController;
use App\Http\Controllers\AnalisisPartisipasiController;
use App\Http\Controllers\AnalisisPeriodeController;
use App\Http\Controllers\AnalisisRefStateController;
use App\Http\Controllers\AnalisisRefSubjekController;
use App\Http\Controllers\AnalisisResponController;
use App\Http\Controllers\AnalisisResponBuktiController;
use App\Http\Controllers\AnalisisResponHasilController;
use App\Http\Controllers\AnalisisTipeIndikatorController;
use App\Http\Controllers\AnggotaGrupKontakController;
use App\Http\Controllers\AnjunganController;
use App\Http\Controllers\AnjunganMenuController;
use App\Http\Controllers\AreaController;
use App\Http\Controllers\ArtikelController;
use App\Http\Controllers\BukuKeperluanController;
use App\Http\Controllers\BukuKepuasanController;
use App\Http\Controllers\BukuPertanyaanController;
use App\Http\Controllers\BukuTamuController;
use App\Http\Controllers\BulananAnakController;
use App\Http\Controllers\CaptchaCodesController;
use App\Http\Controllers\CdesaController;
use App\Http\Controllers\CdesaPendudukController;
use App\Http\Controllers\ConfigSIDController;
use App\Http\Controllers\ConnectionController;
use App\Http\Controllers\Covid19PantauController;
use App\Http\Controllers\Covid19PemudikController;
use App\Http\Controllers\Covid19VaksinController;
use App\Http\Controllers\DataPersilController;
use App\Http\Controllers\DataPersilJenisController;
use App\Http\Controllers\DataPersilPeruntukanController;
use App\Http\Controllers\DataSuratController;
use App\Http\Controllers\DisposisiSuratMasukController;
use App\Http\Controllers\DokumenController;
use App\Http\Controllers\DokumenHidupController;
use App\Http\Controllers\DtksController;
use App\Http\Controllers\DtksAnggotaController;
use App\Http\Controllers\DtksLampiranController;
use App\Http\Controllers\DtksPengaturanProgramController;
use App\Http\Controllers\DtksRefLampiranController;
use App\Http\Controllers\GambarGalleryController;
use App\Http\Controllers\GarisController;
use App\Http\Controllers\GisSimbolController;
use App\Http\Controllers\GrupAksesController;
use App\Http\Controllers\HubungWargaController;
use App\Http\Controllers\IbuHamilController;
use App\Http\Controllers\InboxController;
use App\Http\Controllers\InventarisAssetController;
use App\Http\Controllers\InventarisGedungController;
use App\Http\Controllers\InventarisJalanController;
use App\Http\Controllers\InventarisKontruksiController;
use App\Http\Controllers\InventarisPeralatanController;
use App\Http\Controllers\InventarisTanahController;
use App\Http\Controllers\KaderPemberdayaanMasyarakatController;
use App\Http\Controllers\KategoriController;
use App\Http\Controllers\KehadiranAlasanKeluarController;
use App\Http\Controllers\KehadiranHariLiburController;
use App\Http\Controllers\KehadiranJamKerjaController;
use App\Http\Controllers\KehadiranPengaduanController;
use App\Http\Controllers\KehadiranPerangkatDesaController;
use App\Http\Controllers\KelompokController;
use App\Http\Controllers\KelompokAnggotaController;
use App\Http\Controllers\KelompokMasterController;
use App\Http\Controllers\KeluargaAktifController;
use App\Http\Controllers\KeuanganManualRefBidangController;
use App\Http\Controllers\KeuanganManualRefKegiatanController;
use App\Http\Controllers\KeuanganManualRefRek1Controller;
use App\Http\Controllers\KeuanganManualRefRek2Controller;
use App\Http\Controllers\KeuanganManualRefRek3Controller;
use App\Http\Controllers\KeuanganManualRinciController;
use App\Http\Controllers\KeuanganManualRinciTplController;
use App\Http\Controllers\KeuanganMasterController;
use App\Http\Controllers\KeuanganRefBankDesaController;
use App\Http\Controllers\KeuanganRefBelOperasionalController;
use App\Http\Controllers\KeuanganRefBidangController;
use App\Http\Controllers\KeuanganRefBungaController;
use App\Http\Controllers\KeuanganRefDesaController;
use App\Http\Controllers\KeuanganRefKecamatanController;
use App\Http\Controllers\KeuanganRefKegiatanController;
use App\Http\Controllers\KeuanganRefKorolariController;
use App\Http\Controllers\KeuanganRefNeracaCloseController;
use App\Http\Controllers\KeuanganRefPerangkatController;
use App\Http\Controllers\KeuanganRefPotonganController;
use App\Http\Controllers\KeuanganRefRek1Controller;
use App\Http\Controllers\KeuanganRefRek2Controller;
use App\Http\Controllers\KeuanganRefRek3Controller;
use App\Http\Controllers\KeuanganRefRek4Controller;
use App\Http\Controllers\KeuanganRefSbuController;
use App\Http\Controllers\KeuanganRefSumberController;
use App\Http\Controllers\KeuanganTaAnggaranController;
use App\Http\Controllers\KeuanganTaAnggaranLogController;
use App\Http\Controllers\KeuanganTaAnggaranRinciController;
use App\Http\Controllers\KeuanganTaBidangController;
use App\Http\Controllers\KeuanganTaDesaController;
use App\Http\Controllers\KeuanganTaJurnalUmumController;
use App\Http\Controllers\KeuanganTaJurnalUmumRinciController;
use App\Http\Controllers\KeuanganTaKegiatanController;
use App\Http\Controllers\KeuanganTaMutasiController;
use App\Http\Controllers\KeuanganTaPajakController;
use App\Http\Controllers\KeuanganTaPajakRinciController;
use App\Http\Controllers\KeuanganTaPemdaController;
use App\Http\Controllers\KeuanganTaPencairanController;
use App\Http\Controllers\KeuanganTaPerangkatController;
use App\Http\Controllers\KeuanganTaRabController;
use App\Http\Controllers\KeuanganTaRabRinciController;
use App\Http\Controllers\KeuanganTaRabSubController;
use App\Http\Controllers\KeuanganTaRpjmBidangController;
use App\Http\Controllers\KeuanganTaRpjmKegiatanController;
use App\Http\Controllers\KeuanganTaRpjmMisiController;
use App\Http\Controllers\KeuanganTaRpjmPaguIndikatifController;
use App\Http\Controllers\KeuanganTaRpjmPaguTahunanController;
use App\Http\Controllers\KeuanganTaRpjmSasaranController;
use App\Http\Controllers\KeuanganTaRpjmTujuanController;
use App\Http\Controllers\KeuanganTaRpjmVisiController;
use App\Http\Controllers\KeuanganTaSaldoAwalController;
use App\Http\Controllers\KeuanganTaSpjController;
use App\Http\Controllers\KeuanganTaSpjBuktiController;
use App\Http\Controllers\KeuanganTaSpjRinciController;
use App\Http\Controllers\KeuanganTaSpjSisaController;
use App\Http\Controllers\KeuanganTaSpjpotController;
use App\Http\Controllers\KeuanganTaSppController;
use App\Http\Controllers\KeuanganTaSppRinciController;
use App\Http\Controllers\KeuanganTaSppbuktiController;
use App\Http\Controllers\KeuanganTaSpppotController;
use App\Http\Controllers\KeuanganTaStsController;
use App\Http\Controllers\KeuanganTaStsRinciController;
use App\Http\Controllers\KeuanganTaTbpController;
use App\Http\Controllers\KeuanganTaTbpRinciController;
use App\Http\Controllers\KeuanganTaTriwulanController;
use App\Http\Controllers\KeuanganTaTriwulanRinciController;
use App\Http\Controllers\KiaController;
use App\Http\Controllers\KlasifikasiSuratController;
use App\Http\Controllers\KomentarController;
use App\Http\Controllers\KontakController;
use App\Http\Controllers\KontakGrupController;
use App\Http\Controllers\LaporanSinkronisasiController;
use App\Http\Controllers\LineController;
use App\Http\Controllers\LogBackupController;
use App\Http\Controllers\LogEksporController;
use App\Http\Controllers\LogHapusPendudukController;
use App\Http\Controllers\LogKeluargaController;
use App\Http\Controllers\LogPendudukController;
use App\Http\Controllers\LogPerubahanPendudukController;
use App\Http\Controllers\LogRestoreDesaController;
use App\Http\Controllers\LogSinkronisasiController;
use App\Http\Controllers\LogSuratController;
use App\Http\Controllers\LogTolakController;
use App\Http\Controllers\LogTteController;
use App\Http\Controllers\LoginAttemptsController;
use App\Http\Controllers\LokasiController;
use App\Http\Controllers\MasterInventarisController;
use App\Http\Controllers\MediaSosialController;
use App\Http\Controllers\MenuController;
use App\Http\Controllers\MigrasiController;
use App\Http\Controllers\MutasiCdesaController;
use App\Http\Controllers\MutasiInventarisAssetController;
use App\Http\Controllers\MutasiInventarisGedungController;
use App\Http\Controllers\MutasiInventarisJalanController;
use App\Http\Controllers\MutasiInventarisPeralatanController;
use App\Http\Controllers\MutasiInventarisTanahController;
use App\Http\Controllers\NotifikasiController;
use App\Http\Controllers\OutboxController;
use App\Http\Controllers\PasswordResetsController;
use App\Http\Controllers\PelapakController;
use App\Http\Controllers\PembangunanController;
use App\Http\Controllers\PembangunanRefDokumentasiController;
use App\Http\Controllers\PendapatController;
use App\Http\Controllers\PendudukHidupController;
use App\Http\Controllers\PengaduanController;
use App\Http\Controllers\PermohonanSuratController;
use App\Http\Controllers\PersilController;
use App\Http\Controllers\PesanController;
use App\Http\Controllers\PesanDetailController;
use App\Http\Controllers\PointController;
use App\Http\Controllers\PolygonController;
use App\Http\Controllers\PosyanduController;
use App\Http\Controllers\ProdukController;
use App\Http\Controllers\ProdukKategoriController;
use App\Http\Controllers\ProgramController;
use App\Http\Controllers\ProgramPesertaController;
use App\Http\Controllers\RefAsalTanahKasController;
use App\Http\Controllers\RefDokumenController;
use App\Http\Controllers\RefJabatanController;
use App\Http\Controllers\RefPendudukBahasaController;
use App\Http\Controllers\RefPendudukBidangController;
use App\Http\Controllers\RefPendudukHamilController;
use App\Http\Controllers\RefPendudukKursusController;
use App\Http\Controllers\RefPendudukSukuController;
use App\Http\Controllers\RefPeristiwaController;
use App\Http\Controllers\RefPersilKelasController;
use App\Http\Controllers\RefPersilMutasiController;
use App\Http\Controllers\RefPeruntukanTanahKasController;
use App\Http\Controllers\RefPindahController;
use App\Http\Controllers\RefSinkronisasiController;
use App\Http\Controllers\RefStatusCovidController;
use App\Http\Controllers\RefSyaratSuratController;
use App\Http\Controllers\RekapMutasiInventarisController;
use App\Http\Controllers\SasaranPaudController;
use App\Http\Controllers\SentitemsController;
use App\Http\Controllers\SettingAplikasiController;
use App\Http\Controllers\SettingModulController;
use App\Http\Controllers\StatisticsController;
use App\Http\Controllers\SuplemenController;
use App\Http\Controllers\SuplemenTerdataController;
use App\Http\Controllers\SuratKeluarController;
use App\Http\Controllers\SuratMasukController;
use App\Http\Controllers\SysTrafficController;
use App\Http\Controllers\TanahDesaController;
use App\Http\Controllers\TanahKasDesaController;
use App\Http\Controllers\TeksBerjalanController;
use App\Http\Controllers\TwebAsetController;
use App\Http\Controllers\TwebCacatController;
use App\Http\Controllers\TwebCaraKbController;
use App\Http\Controllers\TwebDesaPamongController;
use App\Http\Controllers\TwebGolonganDarahController;
use App\Http\Controllers\TwebKeluargaController;
use App\Http\Controllers\TwebKeluargaSejahteraController;
use App\Http\Controllers\TwebPendudukController;
use App\Http\Controllers\TwebPendudukAgamaController;
use App\Http\Controllers\TwebPendudukAsuransiController;
use App\Http\Controllers\TwebPendudukHubunganController;
use App\Http\Controllers\TwebPendudukKawinController;
use App\Http\Controllers\TwebPendudukMandiriController;
use App\Http\Controllers\TwebPendudukMapController;
use App\Http\Controllers\TwebPendudukPekerjaanController;
use App\Http\Controllers\TwebPendudukPendidikanController;
use App\Http\Controllers\TwebPendudukPendidikanKkController;
use App\Http\Controllers\TwebPendudukSexController;
use App\Http\Controllers\TwebPendudukStatusController;
use App\Http\Controllers\TwebPendudukUmurController;
use App\Http\Controllers\TwebPendudukWarganegaraController;
use App\Http\Controllers\TwebRtmController;
use App\Http\Controllers\TwebRtmHubunganController;
use App\Http\Controllers\TwebSakitMenahunController;
use App\Http\Controllers\TwebStatusDasarController;
use App\Http\Controllers\TwebStatusKtpController;
use App\Http\Controllers\TwebSuratFormatController;
use App\Http\Controllers\TwebWilClusterdesaController;
use App\Http\Controllers\UrlsController;
use App\Http\Controllers\UserSIDController;
use App\Http\Controllers\UserGrupController;
use App\Http\Controllers\WidgetController;

use App\Http\Controllers\ProfileController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

Route::get('/', function () {
    return Inertia::render('Welcome', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::get('/dashboard', function () {
    return Inertia::render('Dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::get('artikel/{articleId}/komentar', [KomentarController::class, 'getCommentsByArticleId']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('connection', ConnectionController::class);

Route::resource('agenda', AgendaController::class);

Route::resource('analisisindikator', AnalisisIndikatorController::class);

Route::resource('analisiskategoriindikator', AnalisisKategoriIndikatorController::class);

Route::resource('analisisklasifikasi', AnalisisKlasifikasiController::class);

Route::resource('analisismaster', AnalisisMasterController::class);

Route::resource('analisisparameter', AnalisisParameterController::class);

Route::resource('analisispartisipasi', AnalisisPartisipasiController::class);

Route::resource('analisisperiode', AnalisisPeriodeController::class);

Route::resource('analisisrefstate', AnalisisRefStateController::class);

Route::resource('analisisrefsubjek', AnalisisRefSubjekController::class);

Route::resource('analisisrespon', AnalisisResponController::class);

Route::resource('analisisresponbukti', AnalisisResponBuktiController::class);

Route::resource('analisisresponhasil', AnalisisResponHasilController::class);

Route::resource('analisistipeindikator', AnalisisTipeIndikatorController::class);

Route::resource('anggotagrupkontak', AnggotaGrupKontakController::class);

Route::resource('anjungan', AnjunganController::class);

Route::resource('anjunganmenu', AnjunganMenuController::class);

Route::resource('area', AreaController::class);

Route::resource('artikel', ArtikelController::class);

Route::resource('bukukeperluan', BukuKeperluanController::class);

Route::resource('bukukepuasan', BukuKepuasanController::class);

Route::resource('bukupertanyaan', BukuPertanyaanController::class);

Route::resource('bukutamu', BukuTamuController::class);

Route::resource('bulanananak', BulananAnakController::class);

Route::resource('captchacode', CaptchaCodesController::class);

Route::resource('cdesa', CdesaController::class);

Route::resource('cdesapenduduk', CdesaPendudukController::class);

Route::resource('config', ConfigSIDController::class);

Route::resource('covid19pantau', Covid19PantauController::class);

Route::resource('covid19pemudik', Covid19PemudikController::class);

Route::resource('covid19vaksin', Covid19VaksinController::class);

Route::resource('datapersil', DataPersilController::class);

Route::resource('datapersiljenis', DataPersilJenisController::class);

Route::resource('datapersilperuntukan', DataPersilPeruntukanController::class);

Route::resource('datasurat', DataSuratController::class);

Route::resource('disposisisuratmasuk', DisposisiSuratMasukController::class);

Route::resource('dokumen', DokumenController::class);

Route::resource('dokumenhidup', DokumenHidupController::class);

Route::resource('dtks', DtksController::class);

Route::resource('dtksanggota', DtksAnggotaController::class);

Route::resource('dtkslampiran', DtksLampiranController::class);

Route::resource('dtkspengaturanprogram', DtksPengaturanProgramController::class);

Route::resource('dtksreflampiran', DtksRefLampiranController::class);

Route::resource('gambargallery', GambarGalleryController::class);

Route::resource('garis', GarisController::class);

Route::resource('gissimbol', GisSimbolController::class);

Route::resource('grupakses', GrupAksesController::class);

Route::resource('hubungwarga', HubungWargaController::class);

Route::resource('ibuhamil', IbuHamilController::class);

Route::resource('inbox', InboxController::class);

Route::resource('inventarisasset', InventarisAssetController::class);

Route::resource('inventarisgedung', InventarisGedungController::class);

Route::resource('inventarisjalan', InventarisJalanController::class);

Route::resource('inventariskontruksi', InventarisKontruksiController::class);

Route::resource('inventarisperalatan', InventarisPeralatanController::class);

Route::resource('inventaristanah', InventarisTanahController::class);

Route::resource('kaderpemberdayaanmasyarakat', KaderPemberdayaanMasyarakatController::class);

Route::resource('kategori', KategoriController::class);

Route::resource('kehadiranalasankeluar', KehadiranAlasanKeluarController::class);

Route::resource('kehadiranharilibur', KehadiranHariLiburController::class);

Route::resource('kehadiranjamkerja', KehadiranJamKerjaController::class);

Route::resource('kehadiranpengaduan', KehadiranPengaduanController::class);

Route::resource('kehadiranperangkatdesa', KehadiranPerangkatDesaController::class);

Route::resource('kelompok', KelompokController::class);

Route::resource('kelompokanggota', KelompokAnggotaController::class);

Route::resource('kelompokmaster', KelompokMasterController::class);

Route::resource('keluargaaktif', KeluargaAktifController::class);

Route::resource('keuanganmanualrefbidang', KeuanganManualRefBidangController::class);

Route::resource('keuanganmanualrefkegiatan', KeuanganManualRefKegiatanController::class);

Route::resource('keuanganmanualrefrek1', KeuanganManualRefRek1Controller::class);

Route::resource('keuanganmanualrefrek2', KeuanganManualRefRek2Controller::class);

Route::resource('keuanganmanualrefrek3', KeuanganManualRefRek3Controller::class);

Route::resource('keuanganmanualrinci', KeuanganManualRinciController::class);

Route::resource('keuanganmanualrincitpl', KeuanganManualRinciTplController::class);

Route::resource('keuanganmaster', KeuanganMasterController::class);

Route::resource('keuanganrefbankdesa', KeuanganRefBankDesaController::class);

Route::resource('keuanganrefbeloperasional', KeuanganRefBelOperasionalController::class);

Route::resource('keuanganrefbidang', KeuanganRefBidangController::class);

Route::resource('keuanganrefbunga', KeuanganRefBungaController::class);

Route::resource('keuanganrefdesa', KeuanganRefDesaController::class);

Route::resource('keuanganrefkecamatan', KeuanganRefKecamatanController::class);

Route::resource('keuanganrefkegiatan', KeuanganRefKegiatanController::class);

Route::resource('keuanganrefkorolari', KeuanganRefKorolariController::class);

Route::resource('keuanganrefneracaclose', KeuanganRefNeracaCloseController::class);

Route::resource('keuanganrefperangkat', KeuanganRefPerangkatController::class);

Route::resource('keuanganrefpotongan', KeuanganRefPotonganController::class);

Route::resource('keuanganrefrek1', KeuanganRefRek1Controller::class);

Route::resource('keuanganrefrek2', KeuanganRefRek2Controller::class);

Route::resource('keuanganrefrek3', KeuanganRefRek3Controller::class);

Route::resource('keuanganrefrek4', KeuanganRefRek4Controller::class);

Route::resource('keuanganrefsbu', KeuanganRefSbuController::class);

Route::resource('keuanganrefsumber', KeuanganRefSumberController::class);

Route::resource('keuangantaanggaran', KeuanganTaAnggaranController::class);

Route::resource('keuangantaanggaranlog', KeuanganTaAnggaranLogController::class);

Route::resource('keuangantaanggaranrinci', KeuanganTaAnggaranRinciController::class);

Route::resource('keuangantabidang', KeuanganTaBidangController::class);

Route::resource('keuangantadesa', KeuanganTaDesaController::class);

Route::resource('keuangantajurnalumum', KeuanganTaJurnalUmumController::class);

Route::resource('keuangantajurnalumumrinci', KeuanganTaJurnalUmumRinciController::class);

Route::resource('keuangantakegiatan', KeuanganTaKegiatanController::class);

Route::resource('keuangantamutasi', KeuanganTaMutasiController::class);

Route::resource('keuangantapajak', KeuanganTaPajakController::class);

Route::resource('keuangantapajakrinci', KeuanganTaPajakRinciController::class);

Route::resource('keuangantapemda', KeuanganTaPemdaController::class);

Route::resource('keuangantapencairan', KeuanganTaPencairanController::class);

Route::resource('keuangantaperangkat', KeuanganTaPerangkatController::class);

Route::resource('keuangantarab', KeuanganTaRabController::class);

Route::resource('keuangantarabrinci', KeuanganTaRabRinciController::class);

Route::resource('keuangantarabsub', KeuanganTaRabSubController::class);

Route::resource('keuangantarpjmbidang', KeuanganTaRpjmBidangController::class);

Route::resource('keuangantarpjmkegiatan', KeuanganTaRpjmKegiatanController::class);

Route::resource('keuangantarpjmmisi', KeuanganTaRpjmMisiController::class);

Route::resource('keuangantarpjmpaguindikatif', KeuanganTaRpjmPaguIndikatifController::class);

Route::resource('keuangantarpjmpagutahunan', KeuanganTaRpjmPaguTahunanController::class);

Route::resource('keuangantarpjmsasaran', KeuanganTaRpjmSasaranController::class);

Route::resource('keuangantarpjmtujuan', KeuanganTaRpjmTujuanController::class);

Route::resource('keuangantarpjmvisi', KeuanganTaRpjmVisiController::class);

Route::resource('keuangantasaldoawal', KeuanganTaSaldoAwalController::class);

Route::resource('keuangantaspj', KeuanganTaSpjController::class);

Route::resource('keuangantaspjbukti', KeuanganTaSpjBuktiController::class);

Route::resource('keuangantaspjrinci', KeuanganTaSpjRinciController::class);

Route::resource('keuangantaspjsisa', KeuanganTaSpjSisaController::class);

Route::resource('keuangantaspjpot', KeuanganTaSpjpotController::class);

Route::resource('keuangantaspp', KeuanganTaSppController::class);

Route::resource('keuangantaspprinci', KeuanganTaSppRinciController::class);

Route::resource('keuangantasppbukti', KeuanganTaSppbuktiController::class);

Route::resource('keuangantaspppot', KeuanganTaSpppotController::class);

Route::resource('keuangantast', KeuanganTaStsController::class);

Route::resource('keuangantastsrinci', KeuanganTaStsRinciController::class);

Route::resource('keuangantatbp', KeuanganTaTbpController::class);

Route::resource('keuangantatbprinci', KeuanganTaTbpRinciController::class);

Route::resource('keuangantatriwulan', KeuanganTaTriwulanController::class);

Route::resource('keuangantatriwulanrinci', KeuanganTaTriwulanRinciController::class);

Route::resource('kia', KiaController::class);

Route::resource('klasifikasisurat', KlasifikasiSuratController::class);

Route::resource('komentar', KomentarController::class);

Route::resource('kontak', KontakController::class);

Route::resource('kontakgrup', KontakGrupController::class);

Route::resource('laporansinkronisasi', LaporanSinkronisasiController::class);

Route::resource('line', LineController::class);

Route::resource('logbackup', LogBackupController::class);

Route::resource('logekspor', LogEksporController::class);

Route::resource('loghapuspenduduk', LogHapusPendudukController::class);

Route::resource('logkeluarga', LogKeluargaController::class);

Route::resource('logpenduduk', LogPendudukController::class);

Route::resource('logperubahanpenduduk', LogPerubahanPendudukController::class);

Route::resource('logrestoredesa', LogRestoreDesaController::class);

Route::resource('logsinkronisasi', LogSinkronisasiController::class);

Route::resource('logsurat', LogSuratController::class);

Route::resource('logtolak', LogTolakController::class);

Route::resource('logtte', LogTteController::class);

Route::resource('loginattempt', LoginAttemptsController::class);

Route::resource('lokasi', LokasiController::class);

Route::resource('masterinventari', MasterInventarisController::class);

Route::resource('mediasosial', MediaSosialController::class);

Route::resource('menu', MenuController::class);

Route::resource('migrasi', MigrasiController::class);

Route::resource('mutasicdesa', MutasiCdesaController::class);

Route::resource('mutasiinventarisasset', MutasiInventarisAssetController::class);

Route::resource('mutasiinventarisgedung', MutasiInventarisGedungController::class);

Route::resource('mutasiinventarisjalan', MutasiInventarisJalanController::class);

Route::resource('mutasiinventarisperalatan', MutasiInventarisPeralatanController::class);

Route::resource('mutasiinventaristanah', MutasiInventarisTanahController::class);

Route::resource('notifikasi', NotifikasiController::class);

Route::resource('outbox', OutboxController::class);

Route::resource('passwordreset', PasswordResetsController::class);

Route::resource('pelapak', PelapakController::class);

Route::resource('pembangunan', PembangunanController::class);

Route::resource('pembangunanrefdokumentasi', PembangunanRefDokumentasiController::class);

Route::resource('pendapat', PendapatController::class);

Route::resource('pendudukhidup', PendudukHidupController::class);

Route::resource('pengaduan', PengaduanController::class);

Route::resource('permohonansurat', PermohonanSuratController::class);

Route::resource('persil', PersilController::class);

Route::resource('pesan', PesanController::class);

Route::resource('pesandetail', PesanDetailController::class);

Route::resource('point', PointController::class);

Route::resource('polygon', PolygonController::class);

Route::resource('posyandu', PosyanduController::class);

Route::resource('produk', ProdukController::class);

Route::resource('produkkategori', ProdukKategoriController::class);

Route::resource('program', ProgramController::class);

Route::resource('programpeserta', ProgramPesertaController::class);

Route::resource('refasaltanahkas', RefAsalTanahKasController::class);

Route::resource('refdokumen', RefDokumenController::class);

Route::resource('refjabatan', RefJabatanController::class);

Route::resource('refpendudukbahasa', RefPendudukBahasaController::class);

Route::resource('refpendudukbidang', RefPendudukBidangController::class);

Route::resource('refpendudukhamil', RefPendudukHamilController::class);

Route::resource('refpendudukkursus', RefPendudukKursusController::class);

Route::resource('refpenduduksuku', RefPendudukSukuController::class);

Route::resource('refperistiwa', RefPeristiwaController::class);

Route::resource('refpersilkelas', RefPersilKelasController::class);

Route::resource('refpersilmutasi', RefPersilMutasiController::class);

Route::resource('refperuntukantanahkas', RefPeruntukanTanahKasController::class);

Route::resource('refpindah', RefPindahController::class);

Route::resource('refsinkronisasi', RefSinkronisasiController::class);

Route::resource('refstatuscovid', RefStatusCovidController::class);

Route::resource('refsyaratsurat', RefSyaratSuratController::class);

Route::resource('rekapmutasiinventaris', RekapMutasiInventarisController::class);

Route::resource('sasaranpaud', SasaranPaudController::class);

Route::resource('sentitem', SentitemsController::class);

Route::resource('settingaplikasi', SettingAplikasiController::class);

Route::resource('settingmodul', SettingModulController::class);

Route::resource('statistic', StatisticsController::class);

Route::resource('suplemen', SuplemenController::class);

Route::resource('suplementerdata', SuplemenTerdataController::class);

Route::resource('suratkeluar', SuratKeluarController::class);

Route::resource('suratmasuk', SuratMasukController::class);

Route::resource('systraffic', SysTrafficController::class);

Route::resource('tanahdesa', TanahDesaController::class);

Route::resource('tanahkasdesa', TanahKasDesaController::class);

Route::resource('teksberjalan', TeksBerjalanController::class);

Route::resource('twebaset', TwebAsetController::class);

Route::resource('twebcacat', TwebCacatController::class);

Route::resource('twebcarakb', TwebCaraKbController::class);

Route::resource('twebdesapamong', TwebDesaPamongController::class);

Route::resource('twebgolongandarah', TwebGolonganDarahController::class);

Route::resource('twebkeluarga', TwebKeluargaController::class);

Route::resource('twebkeluargasejahtera', TwebKeluargaSejahteraController::class);

Route::resource('twebpenduduk', TwebPendudukController::class);

Route::resource('twebpendudukagama', TwebPendudukAgamaController::class);

Route::resource('twebpendudukasuransi', TwebPendudukAsuransiController::class);

Route::resource('twebpendudukhubungan', TwebPendudukHubunganController::class);

Route::resource('twebpendudukkawin', TwebPendudukKawinController::class);

Route::resource('twebpendudukmandiri', TwebPendudukMandiriController::class);

Route::resource('twebpendudukmap', TwebPendudukMapController::class);

Route::resource('twebpendudukpekerjaan', TwebPendudukPekerjaanController::class);

Route::resource('twebpendudukpendidikan', TwebPendudukPendidikanController::class);

Route::resource('twebpendudukpendidikankk', TwebPendudukPendidikanKkController::class);

Route::resource('twebpenduduksex', TwebPendudukSexController::class);

Route::resource('twebpendudukstatus', TwebPendudukStatusController::class);

Route::resource('twebpendudukumur', TwebPendudukUmurController::class);

Route::resource('twebpendudukwarganegara', TwebPendudukWarganegaraController::class);

Route::resource('twebrtm', TwebRtmController::class);

Route::resource('twebrtmhubungan', TwebRtmHubunganController::class);

Route::resource('twebsakitmenahun', TwebSakitMenahunController::class);

Route::resource('twebstatusdasar', TwebStatusDasarController::class);

Route::resource('twebstatusktp', TwebStatusKtpController::class);

Route::resource('twebsuratformat', TwebSuratFormatController::class);

Route::resource('twebwilclusterdesa', TwebWilClusterdesaController::class);

Route::resource('url', UrlsController::class);

Route::resource('usersid', UserSIDController::class);

Route::resource('usergrup', UserGrupController::class);

Route::resource('widget', WidgetController::class);
