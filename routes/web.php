<?php

use App\Http\Controllers\DaftarCOPController;
use App\Http\Controllers\DaftarGMDSSController;
use App\Http\Controllers\DaftarMCUController;
use App\Http\Controllers\DaftarREORController;
use App\Http\Controllers\InventoryController;
use App\Http\Controllers\KeuanganController;
use App\Http\Controllers\PerpanjangGMDSSController;
use App\Http\Controllers\PerpanjangREORController;
use App\Http\Controllers\SAPRASController;
use Illuminate\Support\Facades\Route;

// LANDING PAGE
Route::get('/', function () {
    return view('welcome');
})->name('Home');


// PENDAFTARAN DIKLAT REOR
Route::get('/report_pendaftar_diklat_reor_all', [DaftarREORController::class, 'exportAllExcel'])->name('CetakData.Pendaftar_Diklat_REOR');
Route::get('/report_pendaftar_diklat_reor_pdf/{id}', [DaftarREORController::class, 'exportPDF'])->name('CetakDataPDF.Pendaftar_Diklat_REOR');
Route::get('/pendaftaran_diklat_reor', function () {
    return view('pendaftaran.reor_daftar');
})->name('pendaftaran.reor_daftar');
Route::post('/pendaftaran_diklat_reor', [DaftarREORController::class, 'store'])->name('DaftarREOR.store');
Route::get('/data_pendaftar_diklat_reor/create', function () {
    return view('create_data.create_data_pendaftar_reor');
})->name('pendaftaran.reor_create');
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
Route::get('/report_keuangan_pdf/{id}', [KeuanganController::class, 'exportPDF'])->name('CetakDataPDF.Keuangan');
Route::get('/keuangan', [KeuanganController::class, 'index'])->name('Keuangan.index');
Route::get('/keuangan/create', [KeuanganController::class, 'create'])->name('Keuangan.create');
Route::post('/keuangan', [KeuanganController::class, 'store'])->name('Keuangan.store');
Route::get('/keuangan/show/{id}', [KeuanganController::class, 'show'])->name('Keuangan.show');
Route::get('/keuangan/edit/{id}', [KeuanganController::class, 'edit'])->name('Keuangan.edit');
Route::put('/keuangan/update/{id}', [KeuanganController::class, 'update'])->name('Keuangan.update');
Route::delete('keuangan/delete/{id}', [KeuanganController::class, 'destroy'])->name('Keuangan.destroy');


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
