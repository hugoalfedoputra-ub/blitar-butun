<?php

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

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';

Route::resource('agendas', 'AgendaController');

Route::resource('analisisindikators', 'AnalisisIndikatorController');

Route::resource('analisiskategoriindikators', 'AnalisisKategoriIndikatorController');

Route::resource('analisisklasifikasis', 'AnalisisKlasifikasiController');

Route::resource('analisismasters', 'AnalisisMasterController');

Route::resource('analisisparameters', 'AnalisisParameterController');

Route::resource('analisispartisipasis', 'AnalisisPartisipasiController');

Route::resource('analisisperiodes', 'AnalisisPeriodeController');

Route::resource('analisisrefstates', 'AnalisisRefStateController');

Route::resource('analisisrefsubjeks', 'AnalisisRefSubjekController');

Route::resource('analisisrespons', 'AnalisisResponController');

Route::resource('analisisresponbuktis', 'AnalisisResponBuktiController');

Route::resource('analisisresponhasils', 'AnalisisResponHasilController');

Route::resource('analisistipeindikators', 'AnalisisTipeIndikatorController');

Route::resource('anggotagrupkontaks', 'AnggotaGrupKontakController');

Route::resource('anjungans', 'AnjunganController');

Route::resource('anjunganmenus', 'AnjunganMenuController');

Route::resource('areas', 'AreaController');

Route::resource('artikels', 'ArtikelController');

Route::resource('bukukeperluans', 'BukuKeperluanController');

Route::resource('bukukepuasans', 'BukuKepuasanController');

Route::resource('bukupertanyaans', 'BukuPertanyaanController');

Route::resource('bukutamus', 'BukuTamuController');

Route::resource('bulanananaks', 'BulananAnakController');

Route::resource('captchacodes', 'CaptchaCodesController');

Route::resource('cdesas', 'CdesaController');

Route::resource('cdesapenduduks', 'CdesaPendudukController');

Route::resource('configs', 'ConfigController');

Route::resource('covid19pantaus', 'Covid19PantauController');

Route::resource('covid19pemudiks', 'Covid19PemudikController');

Route::resource('covid19vaksins', 'Covid19VaksinController');

Route::resource('datapersils', 'DataPersilController');

Route::resource('datapersiljenis', 'DataPersilJenisController');

Route::resource('datapersilperuntukans', 'DataPersilPeruntukanController');

Route::resource('datasurats', 'DataSuratController');

Route::resource('disposisisuratmasuks', 'DisposisiSuratMasukController');

Route::resource('dokumens', 'DokumenController');

Route::resource('dokumenhidups', 'DokumenHidupController');

Route::resource('dtks', 'DtksController');

Route::resource('dtksanggotas', 'DtksAnggotaController');

Route::resource('dtkslampirans', 'DtksLampiranController');

Route::resource('dtkspengaturanprograms', 'DtksPengaturanProgramController');

Route::resource('dtksreflampirans', 'DtksRefLampiranController');

Route::resource('gambargalleries', 'GambarGalleryController');

Route::resource('garis', 'GarisController');

Route::resource('gissimbols', 'GisSimbolController');

Route::resource('grupakses', 'GrupAksesController');

Route::resource('hubungwargas', 'HubungWargaController');

Route::resource('ibuhamils', 'IbuHamilController');

Route::resource('inboxes', 'InboxController');

Route::resource('inventarisassets', 'InventarisAssetController');

Route::resource('inventarisgedungs', 'InventarisGedungController');

Route::resource('inventarisjalans', 'InventarisJalanController');

Route::resource('inventariskontruksis', 'InventarisKontruksiController');

Route::resource('inventarisperalatans', 'InventarisPeralatanController');

Route::resource('inventaristanahs', 'InventarisTanahController');

Route::resource('kaderpemberdayaanmasyarakats', 'KaderPemberdayaanMasyarakatController');

Route::resource('kategoris', 'KategoriController');

Route::resource('kehadiranalasankeluars', 'KehadiranAlasanKeluarController');

Route::resource('kehadiranhariliburs', 'KehadiranHariLiburController');

Route::resource('kehadiranjamkerjas', 'KehadiranJamKerjaController');

Route::resource('kehadiranpengaduans', 'KehadiranPengaduanController');

Route::resource('kehadiranperangkatdesas', 'KehadiranPerangkatDesaController');

Route::resource('kelompoks', 'KelompokController');

Route::resource('kelompokanggotas', 'KelompokAnggotaController');

Route::resource('kelompokmasters', 'KelompokMasterController');

Route::resource('keluargaaktifs', 'KeluargaAktifController');

Route::resource('keuanganmanualrefbidangs', 'KeuanganManualRefBidangController');

Route::resource('keuanganmanualrefkegiatans', 'KeuanganManualRefKegiatanController');

Route::resource('keuanganmanualrefrek1s', 'KeuanganManualRefRek1Controller');

Route::resource('keuanganmanualrefrek2s', 'KeuanganManualRefRek2Controller');

Route::resource('keuanganmanualrefrek3s', 'KeuanganManualRefRek3Controller');

Route::resource('keuanganmanualrincis', 'KeuanganManualRinciController');

Route::resource('keuanganmanualrincitpls', 'KeuanganManualRinciTplController');

Route::resource('keuanganmasters', 'KeuanganMasterController');

Route::resource('keuanganrefbankdesas', 'KeuanganRefBankDesaController');

Route::resource('keuanganrefbeloperasionals', 'KeuanganRefBelOperasionalController');

Route::resource('keuanganrefbidangs', 'KeuanganRefBidangController');

Route::resource('keuanganrefbungas', 'KeuanganRefBungaController');

Route::resource('keuanganrefdesas', 'KeuanganRefDesaController');

Route::resource('keuanganrefkecamatans', 'KeuanganRefKecamatanController');

Route::resource('keuanganrefkegiatans', 'KeuanganRefKegiatanController');

Route::resource('keuanganrefkorolaris', 'KeuanganRefKorolariController');

Route::resource('keuanganrefneracacloses', 'KeuanganRefNeracaCloseController');

Route::resource('keuanganrefperangkats', 'KeuanganRefPerangkatController');

Route::resource('keuanganrefpotongans', 'KeuanganRefPotonganController');

Route::resource('keuanganrefrek1s', 'KeuanganRefRek1Controller');

Route::resource('keuanganrefrek2s', 'KeuanganRefRek2Controller');

Route::resource('keuanganrefrek3s', 'KeuanganRefRek3Controller');

Route::resource('keuanganrefrek4s', 'KeuanganRefRek4Controller');

Route::resource('keuanganrefsbus', 'KeuanganRefSbuController');

Route::resource('keuanganrefsumbers', 'KeuanganRefSumberController');

Route::resource('keuangantaanggarans', 'KeuanganTaAnggaranController');

Route::resource('keuangantaanggaranlogs', 'KeuanganTaAnggaranLogController');

Route::resource('keuangantaanggaranrincis', 'KeuanganTaAnggaranRinciController');

Route::resource('keuangantabidangs', 'KeuanganTaBidangController');

Route::resource('keuangantadesas', 'KeuanganTaDesaController');

Route::resource('keuangantajurnalumums', 'KeuanganTaJurnalUmumController');

Route::resource('keuangantajurnalumumrincis', 'KeuanganTaJurnalUmumRinciController');

Route::resource('keuangantakegiatans', 'KeuanganTaKegiatanController');

Route::resource('keuangantamutasis', 'KeuanganTaMutasiController');

Route::resource('keuangantapajaks', 'KeuanganTaPajakController');

Route::resource('keuangantapajakrincis', 'KeuanganTaPajakRinciController');

Route::resource('keuangantapemdas', 'KeuanganTaPemdaController');

Route::resource('keuangantapencairans', 'KeuanganTaPencairanController');

Route::resource('keuangantaperangkats', 'KeuanganTaPerangkatController');

Route::resource('keuangantarabs', 'KeuanganTaRabController');

Route::resource('keuangantarabrincis', 'KeuanganTaRabRinciController');

Route::resource('keuangantarabsubs', 'KeuanganTaRabSubController');

Route::resource('keuangantarpjmbidangs', 'KeuanganTaRpjmBidangController');

Route::resource('keuangantarpjmkegiatans', 'KeuanganTaRpjmKegiatanController');

Route::resource('keuangantarpjmmisis', 'KeuanganTaRpjmMisiController');

Route::resource('keuangantarpjmpaguindikatifs', 'KeuanganTaRpjmPaguIndikatifController');

Route::resource('keuangantarpjmpagutahunans', 'KeuanganTaRpjmPaguTahunanController');

Route::resource('keuangantarpjmsasarans', 'KeuanganTaRpjmSasaranController');

Route::resource('keuangantarpjmtujuans', 'KeuanganTaRpjmTujuanController');

Route::resource('keuangantarpjmvisis', 'KeuanganTaRpjmVisiController');

Route::resource('keuangantasaldoawals', 'KeuanganTaSaldoAwalController');

Route::resource('keuangantaspjs', 'KeuanganTaSpjController');

Route::resource('keuangantaspjbuktis', 'KeuanganTaSpjBuktiController');

Route::resource('keuangantaspjrincis', 'KeuanganTaSpjRinciController');

Route::resource('keuangantaspjsisas', 'KeuanganTaSpjSisaController');

Route::resource('keuangantaspjpots', 'KeuanganTaSpjpotController');

Route::resource('keuangantaspps', 'KeuanganTaSppController');

Route::resource('keuangantaspprincis', 'KeuanganTaSppRinciController');

Route::resource('keuangantasppbuktis', 'KeuanganTaSppbuktiController');

Route::resource('keuangantaspppots', 'KeuanganTaSpppotController');

Route::resource('keuangantasts', 'KeuanganTaStsController');

Route::resource('keuangantastsrincis', 'KeuanganTaStsRinciController');

Route::resource('keuangantatbps', 'KeuanganTaTbpController');

Route::resource('keuangantatbprincis', 'KeuanganTaTbpRinciController');

Route::resource('keuangantatriwulans', 'KeuanganTaTriwulanController');

Route::resource('keuangantatriwulanrincis', 'KeuanganTaTriwulanRinciController');

Route::resource('kias', 'KiaController');

Route::resource('klasifikasisurats', 'KlasifikasiSuratController');

Route::resource('komentars', 'KomentarController');

Route::resource('kontaks', 'KontakController');

Route::resource('kontakgrups', 'KontakGrupController');

Route::resource('laporansinkronisasis', 'LaporanSinkronisasiController');

Route::resource('lines', 'LineController');

Route::resource('logbackups', 'LogBackupController');

Route::resource('logekspors', 'LogEksporController');

Route::resource('loghapuspenduduks', 'LogHapusPendudukController');

Route::resource('logkeluargas', 'LogKeluargaController');

Route::resource('logpenduduks', 'LogPendudukController');

Route::resource('logperubahanpenduduks', 'LogPerubahanPendudukController');

Route::resource('logrestoredesas', 'LogRestoreDesaController');

Route::resource('logsinkronisasis', 'LogSinkronisasiController');

Route::resource('logsurats', 'LogSuratController');

Route::resource('logtolaks', 'LogTolakController');

Route::resource('logttes', 'LogTteController');

Route::resource('loginattempts', 'LoginAttemptsController');

Route::resource('lokasis', 'LokasiController');

Route::resource('masterinventaris', 'MasterInventarisController');

Route::resource('mediasosials', 'MediaSosialController');

Route::resource('menus', 'MenuController');

Route::resource('migrasis', 'MigrasiController');

Route::resource('mutasicdesas', 'MutasiCdesaController');

Route::resource('mutasiinventarisassets', 'MutasiInventarisAssetController');

Route::resource('mutasiinventarisgedungs', 'MutasiInventarisGedungController');

Route::resource('mutasiinventarisjalans', 'MutasiInventarisJalanController');

Route::resource('mutasiinventarisperalatans', 'MutasiInventarisPeralatanController');

Route::resource('mutasiinventaristanahs', 'MutasiInventarisTanahController');

Route::resource('notifikasis', 'NotifikasiController');

Route::resource('outboxes', 'OutboxController');

Route::resource('passwordresets', 'PasswordResetsController');

Route::resource('pelapaks', 'PelapakController');

Route::resource('pembangunans', 'PembangunanController');

Route::resource('pembangunanrefdokumentasis', 'PembangunanRefDokumentasiController');

Route::resource('pendapats', 'PendapatController');

Route::resource('pendudukhidups', 'PendudukHidupController');

Route::resource('pengaduans', 'PengaduanController');

Route::resource('permohonansurats', 'PermohonanSuratController');

Route::resource('persils', 'PersilController');

Route::resource('pesans', 'PesanController');

Route::resource('pesandetails', 'PesanDetailController');

Route::resource('points', 'PointController');

Route::resource('polygons', 'PolygonController');

Route::resource('posyandus', 'PosyanduController');

Route::resource('produks', 'ProdukController');

Route::resource('produkkategoris', 'ProdukKategoriController');

Route::resource('programs', 'ProgramController');

Route::resource('programpesertas', 'ProgramPesertaController');

Route::resource('refasaltanahkas', 'RefAsalTanahKasController');

Route::resource('refdokumens', 'RefDokumenController');

Route::resource('refjabatans', 'RefJabatanController');

Route::resource('refpendudukbahasas', 'RefPendudukBahasaController');

Route::resource('refpendudukbidangs', 'RefPendudukBidangController');

Route::resource('refpendudukhamils', 'RefPendudukHamilController');

Route::resource('refpendudukkursuses', 'RefPendudukKursusController');

Route::resource('refpenduduksukus', 'RefPendudukSukuController');

Route::resource('refperistiwas', 'RefPeristiwaController');

Route::resource('refpersilkelas', 'RefPersilKelasController');

Route::resource('refpersilmutasis', 'RefPersilMutasiController');

Route::resource('refperuntukantanahkas', 'RefPeruntukanTanahKasController');

Route::resource('refpindahs', 'RefPindahController');

Route::resource('refsinkronisasis', 'RefSinkronisasiController');

Route::resource('refstatuscovids', 'RefStatusCovidController');

Route::resource('refsyaratsurats', 'RefSyaratSuratController');

Route::resource('rekapmutasiinventaris', 'RekapMutasiInventarisController');

Route::resource('sasaranpauds', 'SasaranPaudController');

Route::resource('sentitems', 'SentitemsController');

Route::resource('settingaplikasis', 'SettingAplikasiController');

Route::resource('settingmoduls', 'SettingModulController');

Route::resource('statistics', 'StatisticsController');

Route::resource('suplemens', 'SuplemenController');

Route::resource('suplementerdatas', 'SuplemenTerdataController');

Route::resource('suratkeluars', 'SuratKeluarController');

Route::resource('suratmasuks', 'SuratMasukController');

Route::resource('systraffics', 'SysTrafficController');

Route::resource('tanahdesas', 'TanahDesaController');

Route::resource('tanahkasdesas', 'TanahKasDesaController');

Route::resource('teksberjalans', 'TeksBerjalanController');

Route::resource('twebasets', 'TwebAsetController');

Route::resource('twebcacats', 'TwebCacatController');

Route::resource('twebcarakbs', 'TwebCaraKbController');

Route::resource('twebdesapamongs', 'TwebDesaPamongController');

Route::resource('twebgolongandarahs', 'TwebGolonganDarahController');

Route::resource('twebkeluargas', 'TwebKeluargaController');

Route::resource('twebkeluargasejahteras', 'TwebKeluargaSejahteraController');

Route::resource('twebpenduduks', 'TwebPendudukController');

Route::resource('twebpendudukagamas', 'TwebPendudukAgamaController');

Route::resource('twebpendudukasuransis', 'TwebPendudukAsuransiController');

Route::resource('twebpendudukhubungans', 'TwebPendudukHubunganController');

Route::resource('twebpendudukkawins', 'TwebPendudukKawinController');

Route::resource('twebpendudukmandiris', 'TwebPendudukMandiriController');

Route::resource('twebpendudukmaps', 'TwebPendudukMapController');

Route::resource('twebpendudukpekerjaans', 'TwebPendudukPekerjaanController');

Route::resource('twebpendudukpendidikans', 'TwebPendudukPendidikanController');

Route::resource('twebpendudukpendidikankks', 'TwebPendudukPendidikanKkController');

Route::resource('twebpenduduksexes', 'TwebPendudukSexController');

Route::resource('twebpendudukstatuses', 'TwebPendudukStatusController');

Route::resource('twebpendudukumurs', 'TwebPendudukUmurController');

Route::resource('twebpendudukwarganegaras', 'TwebPendudukWarganegaraController');

Route::resource('twebrtms', 'TwebRtmController');

Route::resource('twebrtmhubungans', 'TwebRtmHubunganController');

Route::resource('twebsakitmenahuns', 'TwebSakitMenahunController');

Route::resource('twebstatusdasars', 'TwebStatusDasarController');

Route::resource('twebstatusktps', 'TwebStatusKtpController');

Route::resource('twebsuratformats', 'TwebSuratFormatController');

Route::resource('twebwilclusterdesas', 'TwebWilClusterdesaController');

Route::resource('urls', 'UrlsController');

Route::resource('usersids', 'UserSIDController');

Route::resource('usergrups', 'UserGrupController');

Route::resource('widgets', 'WidgetController');
