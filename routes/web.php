<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AbsensiSiswaController;
use App\Http\Controllers\DaftarCOPController;
use App\Http\Controllers\DaftarGMDSSController;
use App\Http\Controllers\DaftarMCUController;
use App\Http\Controllers\DaftarREORController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\JadwalController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\MataPelajaranController;
use App\Http\Controllers\NilaiUjianLokalController;
use App\Http\Controllers\PegawaiController;
use App\Http\Controllers\PendaftaranController;
use App\Http\Controllers\PengajarController;
use App\Http\Controllers\PerpanjangGMDSSController;
use App\Http\Controllers\PerpanjangREORController;
use App\Http\Controllers\PesertaController;
use App\Http\Controllers\PesertaUjianController;
use App\Http\Controllers\SAPRASController;
use App\Http\Controllers\UserController;

Route::get('/', function () {
    return view('welcome');
});

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__ . '/auth.php';


// LANDING PAGE
Route::get('/', function () {
    return view('auth.login');
})->name('Home');

// HOMEPAGE
Route::get('/home/admin', [HomeController::class, 'admin'])->middleware(['auth', 'verified', 'super_admin'])->name('Dashboard.Admin');
Route::get('/home/siswa', [HomeController::class, 'siswa'])->middleware(['auth', 'verified', 'siswa'])->name('Dashboard.Siswa');
Route::get('/home/pegawai', [HomeController::class, 'pegawai'])->middleware(['auth', 'verified', 'admin'])->name('Dashboard.Pegawai');
Route::get('/home/pengajar', [HomeController::class, 'pengajar'])->middleware(['auth', 'verified', 'pengajar'])->name('Dashboard.Pengajar');
Route::get('/home/pendaftar', [HomeController::class, 'pendaftar'])->middleware(['auth', 'verified', 'pendaftar'])->name('Dashboard.Pendaftar');

// DASHBOARD SISWA/PESERTA
Route::get('/absensi', [PesertaController::class, 'Absensi'])->name('Peserta.Absensi');
Route::get('/keuangan_siswa', [PesertaController::class, 'Keuangan'])->name('Peserta.Keuangan');
Route::get('/keuangan_siswa{id}', [PesertaController::class, 'showKeuangan'])->name('Peserta.show');
Route::get('/nilai', [PesertaController::class, 'Nilai'])->name('Peserta.Nilai');
Route::get('/edit/{user}', [PesertaController::class, 'Edit'])->name('Peserta.Edit');
Route::put('/update/{user}', [PesertaController::class, 'update'])->name('Peserta.Update');
Route::get('/layanan/{jenis_diklat}', [PendaftaranController::class, 'handleDiklatAll'])->name('pendaftaran.jenis');

// PENDAFTARAN
Route::get('/diklat', [PendaftaranController::class, 'diklat'])->name('Pendaftar.Diklat');
Route::get('/pendaftaran/{jenis_diklat}', [PendaftaranController::class, 'handleDiklat']);
Route::get('/getRegencies/{province_id}', [PendaftaranController::class, 'getRegencies']);
Route::get('/getDistricts/{regency_id}', [PendaftaranController::class, 'getDistricts']);
Route::get('/getVillages/{district_id}', [PendaftaranController::class, 'getVillages']);
Route::post('/pendaftaran/{jenisDiklat}', [PendaftaranController::class, 'storeDiklat'])->name('pendaftaran.storeDiklat');
Route::get('/cetak-invoice', [PendaftaranController::class, 'cetakInvoice'])->name('Cetak.Invoice');
Route::post('/upload-bukti-pembayaran', [PendaftaranController::class, 'uploadBuktiPembayaran'])->name('Upload.Bukti');


// PENDAFTARAN DIKLAT REOR
Route::get('/report_pendaftar_diklat_reor_all', [DaftarREORController::class, 'exportAllExcel'])->name('CetakData.Pendaftar_Diklat_REOR');
Route::get('/report_pendaftar_diklat_reor_pdf/{id}', [DaftarREORController::class, 'exportPDF'])->name('CetakDataPDF.Pendaftar_Diklat_REOR');
Route::post('/pendaftaran_diklat_reor', [DaftarREORController::class, 'store'])->name('DaftarREOR.store');
Route::get('/data_pendaftar_diklat_reor/create', function () {
    return view('pendaftaran.reor_daftar');
})->name('pendaftaran.reor_daftar');
Route::get('/data_pendaftar_diklat_reor', [DaftarREORController::class, 'index'])->name('DaftarREOR.index');
Route::post('/data_pendaftar_diklat_reor/', [DaftarREORController::class, 'create'])->name('DaftarREOR.create');
Route::get('/data_pendaftar_diklat_reor/show/{id}', [DaftarREORController::class, 'show'])->name('DaftarREOR.show');
Route::get('/data_pendaftar_diklat_reor/edit/{id}', [DaftarREORController::class, 'edit'])->name('DaftarREOR.edit');
Route::put('/data_pendaftar_diklat_reor/update/{id}', [DaftarREORController::class, 'update'])->name('DaftarREOR.update');
Route::delete('data_pendaftar_diklat_reor/delete/{id}', [DaftarREORController::class, 'destroy'])->name('DaftarREOR.destroy');


// PENDAFTARAN DIKLAT COP
Route::get('/report_pendaftar_diklat_cop_all', [DaftarCOPController::class, 'exportAllExcel'])->name('CetakData.Pendaftar_Diklat_COP');
Route::get('/report_pendaftar_diklat_cop_pdf/{id}', [DaftarCOPController::class, 'exportPDF'])->name('CetakDataPDF.Pendaftar_Diklat_COP');
Route::get('/pendaftaran_diklat_cop', function () {
    return view('pendaftaran.cop_daftar');
})->name('pendaftaran.cop_daftar');
Route::post('/pendaftaran_diklat_cop', [DaftarCOPController::class, 'store'])->name('DaftarCOP.store');
Route::get('/data_pendaftar_diklat_cop/create', function () {
    return view('create_data.create_data_pendaftar_cop');
})->name('pendaftaran.cop_create');
Route::get('/data_pendaftar_diklat_cop', [DaftarCOPController::class, 'index'])->name('DaftarCOP.index');
Route::post('/data_pendaftar_diklat_cop/', [DaftarCOPController::class, 'create'])->name('DaftarCOP.create');
Route::get('/data_pendaftar_diklat_cop/show/{id}', [DaftarCOPController::class, 'show'])->name('DaftarCOP.show');
Route::get('/data_pendaftar_diklat_cop/edit/{id}', [DaftarCOPController::class, 'edit'])->name('DaftarCOP.edit');
Route::put('/data_pendaftar_diklat_cop/update/{id}', [DaftarCOPController::class, 'update'])->name('DaftarCOP.update');
Route::delete('data_pendaftar_diklat_cop/delete/{id}', [DaftarCOPController::class, 'destroy'])->name('DaftarCOP.destroy');


// PENDAFTARAN DIKLAT GMDSS
Route::get('/report_pendaftar_diklat_gmdss_all', [DaftarGMDSSController::class, 'exportAllExcel'])->name('CetakData.Pendaftar_Diklat_GMDSS');
Route::get('/report_pendaftar_diklat_gmdss_pdf/{id}', [DaftarGMDSSController::class, 'exportPDF'])->name('CetakDataPDF.Pendaftar_Diklat_GMDSS');
Route::get('/pendaftaran_diklat_gmdss', function () {
    return view('pendaftaran.gmdss_daftar');
})->name('pendaftaran.gmdss_daftar');
Route::post('/pendaftaran_diklat_gmdss', [DaftarGMDSSController::class, 'store'])->name('DaftarGMDSS.store');
Route::get('/data_pendaftar_diklat_gmdss/create', function () {
    return view('create_data.create_data_pendaftar_gmdss');
})->name('pendaftaran.gmdss_create');
Route::get('/data_pendaftar_diklat_gmdss', [DaftarGMDSSController::class, 'index'])->name('DaftarGMDSS.index');
Route::post('/data_pendaftar_diklat_gmdss/', [DaftarGMDSSController::class, 'create'])->name('DaftarGMDSS.create');
Route::get('/data_pendaftar_diklat_gmdss/show/{id}', [DaftarGMDSSController::class, 'show'])->name('DaftarGMDSS.show');
Route::get('/data_pendaftar_diklat_gmdss/edit/{id}', [DaftarGMDSSController::class, 'edit'])->name('DaftarGMDSS.edit');
Route::put('/data_pendaftar_diklat_gmdss/update/{id}', [DaftarGMDSSController::class, 'update'])->name('DaftarGMDSS.update');
Route::delete('data_pendaftar_diklat_gmdss/delete/{id}', [DaftarGMDSSController::class, 'destroy'])->name('DaftarGMDSS.destroy');


// PENDAFTARAN SERTIFIKAT MCU
Route::get('/report_pendaftar_sertifikat_mcu_all', [DaftarMCUController::class, 'exportAllExcel'])->name('CetakData.Pendaftar_Sertifikat_MCU');
Route::get('/report_pendaftar_sertifikat_mcu_pdf/{id}', [DaftarMCUController::class, 'exportPDF'])->name('CetakDataPDF.Pendaftar_Sertifikat_MCU');
Route::get('/pendaftaran_sertifikat_mcu', function () {
    return view('pendaftaran.mcu_daftar');
})->name('pendaftaran.mcu_daftar');
Route::post('/pendaftaran_sertifikat_mcu', [DaftarMCUController::class, 'store'])->name('DaftarMCU.store');
Route::get('/data_pendaftar_sertifikat_mcu/create', function () {
    return view('create_data.create_data_pendaftar_mcu');
})->name('pendaftaran.mcu_create');
Route::get('/data_pendaftar_sertifikat_mcu', [DaftarMCUController::class, 'index'])->name('DaftarMCU.index');
Route::post('/data_pendaftar_sertifikat_mcu/', [DaftarMCUController::class, 'create'])->name('DaftarMCU.create');
Route::get('/data_pendaftar_sertifikat_mcu/show/{id}', [DaftarMCUController::class, 'show'])->name('DaftarMCU.show');
Route::get('/data_pendaftar_sertifikat_mcu/edit/{id}', [DaftarMCUController::class, 'edit'])->name('DaftarMCU.edit');
Route::put('/data_pendaftar_sertifikat_mcu/update/{id}', [DaftarMCUController::class, 'update'])->name('DaftarMCU.update');
Route::delete('data_pendaftar_sertifikat_mcu/delete/{id}', [DaftarMCUController::class, 'destroy'])->name('DaftarMCU.destroy');


// PERPANJANGAN SERTIFIKAT REOR
Route::get('/report_perpanjang_sertifikat_reor_all', [PerpanjangREORController::class, 'exportAllExcel'])->name('CetakData.Perpanjang_Sertifikat_REOR');
Route::get('/report_perpanjang_sertifikat_reor_pdf/{id}', [PerpanjangREORController::class, 'exportPDF'])->name('CetakDataPDF.Perpanjang_Sertifikat_REOR');
Route::get('/pendaftaran_perpanjangan_sertifikat_reor', function () {
    return view('pendaftaran.reor_perpanjang');
})->name('pendaftaran.reor_perpanjang');
Route::post('/pendaftaran_perpanjangan_sertifikat_reor', [PerpanjangREORController::class, 'store'])->name('PerpanjangREOR.store');
Route::get('/data_perpanjang_sertifikat_reor/create', function () {
    return view('create_data.create_data_perpanjang_reor');
})->name('perpanjang.reor_create');
Route::get('/data_perpanjang_sertifikat_reor', [PerpanjangREORController::class, 'index'])->name('PerpanjangREOR.index');
Route::post('/data_perpanjang_sertifikat_reor/', [PerpanjangREORController::class, 'create'])->name('PerpanjangREOR.create');
Route::get('/data_perpanjang_sertifikat_reor/show/{id}', [PerpanjangREORController::class, 'show'])->name('PerpanjangREOR.show');
Route::get('/data_perpanjang_sertifikat_reor/edit/{id}', [PerpanjangREORController::class, 'edit'])->name('PerpanjangREOR.edit');
Route::put('/data_perpanjang_sertifikat_reor/update/{id}', [PerpanjangREORController::class, 'update'])->name('PerpanjangREOR.update');
Route::delete('data_perpanjang_sertifikat_reor/delete/{id}', [PerpanjangREORController::class, 'destroy'])->name('PerpanjangREOR.destroy');


// PERPANJANGAN SERTIFIKAT GMDSS
Route::get('/report_perpanjang_sertifikat_gmdss_all', [PerpanjangGMDSSController::class, 'exportAllExcel'])->name('CetakData.Perpanjang_Sertifikat_GMDSS');
Route::get('/report_perpanjang_sertifikat_gmdss_pdf/{id}', [PerpanjangGMDSSController::class, 'exportPDF'])->name('CetakDataPDF.Perpanjang_Sertifikat_GMDSS');
Route::get('/pendaftaran_perpanjangan_sertifikat_gmdss', function () {
    return view('pendaftaran.gmdss_perpanjang');
})->name('pendaftaran.gmdss_perpanjang');
Route::post('/pendaftaran_perpanjangan_sertifikat_gmdss', [PerpanjangGMDSSController::class, 'store'])->name('PerpanjangGMDSS.store');
Route::get('/data_perpanjang_sertifikat_gmdss/create', function () {
    return view('create_data.create_data_perpanjang_gmdss');
})->name('perpanjang.gmdss_create');
Route::get('/data_perpanjang_sertifikat_gmdss', [PerpanjangGMDSSController::class, 'index'])->name('PerpanjangGMDSS.index');
Route::post('/data_perpanjang_sertifikat_gmdss/', [PerpanjangGMDSSController::class, 'create'])->name('PerpanjangGMDSS.create');
Route::get('/data_perpanjang_sertifikat_gmdss/show/{id}', [PerpanjangGMDSSController::class, 'show'])->name('PerpanjangGMDSS.show');
Route::get('/data_perpanjang_sertifikat_gmdss/edit/{id}', [PerpanjangGMDSSController::class, 'edit'])->name('PerpanjangGMDSS.edit');
Route::put('/data_perpanjang_sertifikat_gmdss/update/{id}', [PerpanjangGMDSSController::class, 'update'])->name('PerpanjangGMDSS.update');
Route::delete('data_perpanjang_sertifikat_gmdss/delete/{id}', [PerpanjangGMDSSController::class, 'destroy'])->name('PerpanjangGMDSS.destroy');


// KEUANGAN
Route::get('/report_data_keuangan_all', [KeuanganController::class, 'exportAllExcel'])->name('CetakData.Keuangan');
Route::get('/report_data_invoice_all', [KeuanganController::class, 'exportTagihanAllExcel'])->name('CetakData.Invoice');
Route::get('/report_keuangan_pdf/{id}', [KeuanganController::class, 'exportPDF'])->name('CetakDataPDF.Keuangan');
Route::get('/cetak-invoice/{id}', [KeuanganController::class, 'cetakInvoicePDF'])->name('CetakInvoice.Keuangan');
Route::get('/keuangan', [KeuanganController::class, 'index'])->name('Keuangan.index');
Route::get('/tagihan', [KeuanganController::class, 'tagihan'])->name('Keuangan.tagihan');
Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('Keuangan.create');
Route::post('/keuangan', [KeuanganController::class, 'store'])->name('Keuangan.store');
Route::get('/keuangan/show/{id}', [KeuanganController::class, 'show'])->name('Keuangan.show');
Route::get('/keuangan/edit/{id}', [KeuanganController::class, 'edit'])->name('Keuangan.edit');
Route::put('/keuangan/update/{id}', [KeuanganController::class, 'update'])->name('Keuangan.update');
Route::delete('keuangan/delete/{id}', [KeuanganController::class, 'destroy'])->name('Keuangan.destroy');
Route::post('/keuangan/validasi-akun/{id}', [KeuanganController::class, 'ValidasiAkun'])->name('Keuangan.ValidasiAkun');
Route::post('/keuangan/terima-pembayaran/{id}', [KeuanganController::class, 'TerimaPembayaran'])->name('Keuangan.TerimaPembayaran');
Route::post('/keuangan/tolak-pembayaran/{id}', [KeuanganController::class, 'TolakPembayaran'])->name('Keuangan.TolakPembayaran');
Route::post('/keuangan/tolak-validasi/{id}', [KeuanganController::class, 'TolakValidasi'])->name('Keuangan.TolakValidasi');



// INVENTORY SERTIFIKAT
Route::get('/report_data_inventory_all', [InventoryController::class, 'exportAllExcel'])->name('CetakData.Inventory');
Route::get('/report_inventory_pdf/{id}', [InventoryController::class, 'exportPDF'])->name('CetakDataPDF.Inventory');
Route::get('/inventory', [InventoryController::class, 'index'])->name('Inventory.index');
Route::get('/inventory/create', [InventoryController::class, 'create'])->name('Inventory.create');
Route::post('/inventory', [InventoryController::class, 'store'])->name('Inventory.store');
Route::get('/inventory/show/{id}', [InventoryController::class, 'show'])->name('Inventory.show');
Route::get('/inventory/edit/{id}', [InventoryController::class, 'edit'])->name('Inventory.edit');
Route::put('/inventory/update/{id}', [InventoryController::class, 'update'])->name('Inventory.update');
Route::delete('inventory/delete/{id}', [InventoryController::class, 'destroy'])->name('Inventory.destroy');

// SARANA & PRASARANA
Route::get('/report_data_sarana_prasarana_all', [SAPRASController::class, 'exportAllExcel'])->name('CetakData.SAPRAS');
Route::get('/report_sarana_prasarana_pdf/{id}', [SAPRASController::class, 'exportPDF'])->name('CetakDataPDF.SAPRAS');
Route::get('/sapras', [SAPRASController::class, 'index'])->name('SAPRAS.index');
Route::get('/sapras/create', [SAPRASController::class, 'create'])->name('SAPRAS.create');
Route::post('/sapras', [SAPRASController::class, 'store'])->name('SAPRAS.store');
Route::get('/sapras/show/{id}', [SAPRASController::class, 'show'])->name('SAPRAS.show');
Route::get('/sapras/edit/{id}', [SAPRASController::class, 'edit'])->name('SAPRAS.edit');
Route::put('/sapras/update/{id}', [SAPRASController::class, 'update'])->name('SAPRAS.update');
Route::delete('sapras/delete/{id}', [SAPRASController::class, 'destroy'])->name('SAPRAS.destroy');

// PEGAWAI
Route::get('/report_data_pegawai_all', [PegawaiController::class, 'exportAllExcel'])->name('CetakData.Pegawai');
Route::get('/report_pegawai_pdf/{id}', [PegawaiController::class, 'exportPDF'])->name('CetakDataPDF.Pegawai');
Route::get('/pegawai', [PegawaiController::class, 'index'])->name('Pegawai.index');
Route::get('/pegawai/create', [PegawaiController::class, 'create'])->name('Pegawai.create');
Route::post('/pegawai', [PegawaiController::class, 'store'])->name('Pegawai.store');
Route::get('/pegawai/show/{id}', [PegawaiController::class, 'show'])->name('Pegawai.show');
Route::get('/pegawai/edit/{id}', [PegawaiController::class, 'edit'])->name('Pegawai.edit');
Route::put('/pegawai/update/{id}', [PegawaiController::class, 'update'])->name('Pegawai.update');
Route::delete('pegawai/delete/{id}', [PegawaiController::class, 'destroy'])->name('Pegawai.destroy');

// PENGAJAR
Route::get('/report_data_pengajar_all', [PengajarController::class, 'exportAllExcel'])->name('CetakData.Pengajar');
Route::get('/report_pengajar_pdf/{id}', [PengajarController::class, 'exportPDF'])->name('CetakDataPDF.Pengajar');
Route::get('/pengajar', [PengajarController::class, 'index'])->name('Pengajar.index');
Route::get('/pengajar/create', [PengajarController::class, 'create'])->name('Pengajar.create');
Route::post('/pengajar', [PengajarController::class, 'store'])->name('Pengajar.store');
Route::get('/pengajar/show/{id}', [PengajarController::class, 'show'])->name('Pengajar.show');
Route::get('/pengajar/edit/{id}', [PengajarController::class, 'edit'])->name('Pengajar.edit');
Route::put('/pengajar/update/{id}', [PengajarController::class, 'update'])->name('Pengajar.update');
Route::delete('pengajar/delete/{id}', [PengajarController::class, 'destroy'])->name('Pengajar.destroy');

// JADWAL
Route::get('/report_data_jadwal_all', [JadwalController::class, 'exportAllExcel'])->name('CetakData.Jadwal');
Route::get('/report_jadwal_pdf/{id}', [JadwalController::class, 'exportPDF'])->name('CetakDataPDF.Jadwal');
Route::get('/jadwal', [JadwalController::class, 'index'])->name('Jadwal.index');
Route::get('/jadwal/create', [JadwalController::class, 'create'])->name('Jadwal.create');
Route::post('/jadwal', [JadwalController::class, 'store'])->name('Jadwal.store');
Route::get('/jadwal/show/{id}', [JadwalController::class, 'show'])->name('Jadwal.show');
Route::get('/jadwal/edit/{id}', [JadwalController::class, 'edit'])->name('Jadwal.edit');
Route::put('/jadwal/update/{id}', [JadwalController::class, 'update'])->name('Jadwal.update');
Route::delete('jadwal/delete/{id}', [JadwalController::class, 'destroy'])->name('Jadwal.destroy');

// MATA PELAJARAN
Route::get('/report_data_mata_pelajaran_all', [MataPelajaranController::class, 'exportAllExcel'])->name('CetakData.MataPelajaran');
Route::get('/report_mata_pelajaran_pdf/{id}', [MataPelajaranController::class, 'exportPDF'])->name('CetakDataPDF.MataPelajaran');
Route::get('/mata_pelajaran', [MataPelajaranController::class, 'index'])->name('MataPelajaran.index');
Route::get('/mata_pelajaran/create', [MataPelajaranController::class, 'create'])->name('MataPelajaran.create');
Route::post('/mata_pelajaran', [MataPelajaranController::class, 'store'])->name('MataPelajaran.store');
Route::get('/mata_pelajaran/show/{id}', [MataPelajaranController::class, 'show'])->name('MataPelajaran.show');
Route::get('/mata_pelajaran/edit/{id}', [MataPelajaranController::class, 'edit'])->name('MataPelajaran.edit');
Route::put('/mata_pelajaran/update/{id}', [MataPelajaranController::class, 'update'])->name('MataPelajaran.update');
Route::delete('mata_pelajaran/delete/{id}', [MataPelajaranController::class, 'destroy'])->name('MataPelajaran.destroy');

// PENGGUNA SIMBBU
Route::get('/report_data_users_all', [UserController::class, 'exportAllExcel'])->name('CetakData.Users');
Route::get('/report_users_pdf/{id}', [UserController::class, 'exportPDF'])->name('CetakDataPDF.Users');
Route::get('/users', [UserController::class, 'index'])->name('Users.index');
Route::get('/users/create', [UserController::class, 'create'])->name('Users.create');
Route::post('/users', [UserController::class, 'store'])->name('Users.store');
Route::get('/users/show/{id}', [UserController::class, 'show'])->name('Users.show');
Route::get('/users/edit/{id}', [UserController::class, 'edit'])->name('Users.edit');
Route::put('/users/update/{id}', [UserController::class, 'update'])->name('Users.update');
Route::delete('users/delete/{id}', [UserController::class, 'destroy'])->name('Users.destroy');


// ABSENSI
Route::post("nama_untuk_absensi", [AbsensiSiswaController::class, 'getNama'])->name('Absensi.get');
Route::get('/report_data_absensi_siswa_all', [AbsensiSiswaController::class, 'exportAllExcel'])->name('CetakData.Absensi');
Route::get('/report_absensi_siswa_pdf/{id}', [AbsensiSiswaController::class, 'exportPDF'])->name('CetakDataPDF.Absensi');
Route::get('/absensi_siswa', [AbsensiSiswaController::class, 'index'])->name('Absensi.index');
Route::get('/absensi_siswa/create', [AbsensiSiswaController::class, 'create'])->name('Absensi.create');
Route::post('/absensi_siswa', [AbsensiSiswaController::class, 'store'])->name('Absensi.store');
Route::get('/absensi_siswa/show/{id}', [AbsensiSiswaController::class, 'show'])->name('Absensi.show');
Route::get('/absensi_siswa/edit/{id}', [AbsensiSiswaController::class, 'edit'])->name('Absensi.edit');
Route::put('/absensi_siswa/update/{id}', [AbsensiSiswaController::class, 'update'])->name('Absensi.update');
Route::delete('absensi_siswa/delete/{id}', [AbsensiSiswaController::class, 'destroy'])->name('Absensi.destroy');


// PESERTA UJIAN
Route::get('/report_data_peserta_ujian_all', [PesertaUjianController::class, 'exportAllExcel'])->name('CetakData.PesertaUjian');
Route::get('/report_peserta_ujian_pdf/{id}', [PesertaUjianController::class, 'exportPDF'])->name('CetakDataPDF.PesertaUjian');
Route::get('/peserta_ujian', [PesertaUjianController::class, 'index'])->name('PesertaUjian.index');
Route::get('/peserta_ujian/create', [PesertaUjianController::class, 'create'])->name('PesertaUjian.create');
Route::post('/peserta_ujian', [PesertaUjianController::class, 'store'])->name('PesertaUjian.store');
Route::post("nama_untuk_peserta_ujian_lokal", [PesertaUjianController::class, 'getNama'])->name('PesertaUjian.get');
Route::get('/peserta_ujian/show/{id}', [PesertaUjianController::class, 'show'])->name('PesertaUjian.show');
Route::get('/peserta_ujian/edit/{id}', [PesertaUjianController::class, 'edit'])->name('PesertaUjian.edit');
Route::put('/peserta_ujian/update/{id}', [PesertaUjianController::class, 'update'])->name('PesertaUjian.update');
Route::delete('peserta_ujian/delete/{id}', [PesertaUjianController::class, 'destroy'])->name('PesertaUjian.destroy');

// NILAI UJIAN LOKAL
Route::post("nama_untuk_nilai_ujian_lokal", [NilaiUjianLokalController::class, 'getNama'])->name('NilaiUjianLokal.get');
Route::get('/report_data_nilai_ujian_lokal_all', [NilaiUjianLokalController::class, 'exportAllExcel'])->name('CetakData.NilaiUjianLokal');
Route::get('/report_nilai_ujian_lokal_pdf/{id}', [NilaiUjianLokalController::class, 'exportPDF'])->name('CetakDataPDF.NilaiUjianLokal');
Route::get('/nilai_ujian_lokal', [NilaiUjianLokalController::class, 'index'])->name('NilaiUjianLokal.index');
Route::get('/nilai_ujian_lokal/create', [NilaiUjianLokalController::class, 'create'])->name('NilaiUjianLokal.create');
Route::post('/nilai_ujian_lokal', [NilaiUjianLokalController::class, 'store'])->name('NilaiUjianLokal.store');
Route::get('/nilai_ujian_lokal/show/{id}', [NilaiUjianLokalController::class, 'show'])->name('NilaiUjianLokal.show');
Route::get('/nilai_ujian_lokal/edit/{id}', [NilaiUjianLokalController::class, 'edit'])->name('NilaiUjianLokal.edit');
Route::put('/nilai_ujian_lokal/update/{id}', [NilaiUjianLokalController::class, 'update'])->name('NilaiUjianLokal.update');
Route::delete('nilai_ujian_lokal/delete/{id}', [NilaiUjianLokalController::class, 'destroy'])->name('NilaiUjianLokal.destroy');
