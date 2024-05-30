<?php

namespace App\Http\Controllers;

use App\Exports\NilaiUjianLokalSiswaExport;
use App\Models\NilaiUjianLokal;
use App\Models\PesertaUjian;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class NilaiUjianLokalController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = NilaiUjianLokal::with('pesertaUjian')->paginate(100);

        return view('data.data_nilai_ujian_lokal', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */

    public function getNama(Request $request)
    {
        $status = ['Telah Mengikuti Ujian'];
        $users = PesertaUjian::with('Users')
            ->whereIn('status_peserta', $status);

        if ($search = $request->name) {
            $users->whereHas('Users', function ($query) use ($search) {
                $query->where('nama_lengkap', 'LIKE', "%$search%");
            });
        }

        $nama_lengkap = $users->get()->map(function ($peserta) {
            return [
                'id' => $peserta->id,
                'nama_lengkap' => $peserta->Users->nama_lengkap,
            ];
        });

        return response()->json($nama_lengkap);
    }

    public function create()
    {
        $peserta_ujian = PesertaUjian::all();
        return view('create_data.create_data_nilai_ujian_lokal', compact('peserta_ujian'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_peserta_ujian' => 'required',
            'teknik_radio' => 'required',
            'service_document' => 'required',
            'radio_regulation' => 'required',
            'bahasa_inggris' => 'required',
            'perjanjian_internasional' => 'required',
            'gmdss' => 'required',
            'radio_telephony' => 'required',
            'ibt' => 'required',
            'morse' => 'required',
            'pancasila' => 'required',
            'teknik_listrik' => 'required',
            'naveka' => 'required',
            'praktek_service_document' => 'required',
            'praktek_radio_telephony' => 'required',
            'praktek_morse' => 'required',
            'praktek_gmdss' => 'required',
        ], [
            'id_peserta_ujian' => 'ID Peserta Ujian Tidak boleh kosong',
            'teknik_radio' => 'Nilai Teknik Radio Kosong',
            'radio_regulation' => 'Nilai Radio Regulation Kosong',
            'service_document' => 'Nilai Service Document Kosong',
            'bahasa_inggris' => 'Nilai Bahasa Inggris Kosong',
            'perjanjian_internasional' => 'Nilai Perjanjian Internasional Kosong',
            'gmdss' => 'Nilai GMDSS Kosong',
            'radio_telephony' => 'Nilai Radio Telephony Kosong',
            'ibt' => 'Nilai IBT Kosong',
            'morse' => 'Nilai Morse Kosong',
            'pancasila' => 'Nilai Pancasila Kosong',
            'teknik_listrik' => 'Nilai Teknik Listrik Kosong',
            'naveka' => 'Nilai NAVEKA Kosong',
            'praktek_service_document' => 'Nilai Service Document Kosong',
            'praktek_radio_telephony' => 'Nilai Radio Telephony Kosong',
            'praktek_morse' => 'Nilai Praktek Morse Kosong',
            'praktek_gmdss' => 'Nilai Praktek GMDSS Kosong',
        ]);
        $data = [
            'id_peserta_ujian' => $request->id_peserta_ujian,
            'teknik_radio' => $request->teknik_radio,
            'radio_regulation' => $request->radio_regulation,
            'service_document' => $request->service_document,
            'bahasa_inggris' => $request->bahasa_inggris,
            'perjanjian_internasional' => $request->perjanjian_internasional,
            'gmdss' => $request->gmdss,
            'radio_telephony' => $request->radio_telephony,
            'ibt' => $request->ibt,
            'morse' => $request->morse,
            'pancasila' => $request->pancasila,
            'teknik_listrik' => $request->teknik_listrik,
            'naveka' => $request->naveka,
            'praktek_service_document' => $request->praktek_service_document,
            'praktek_radio_telephony' => $request->praktek_radio_telephony,
            'praktek_morse' => $request->praktek_morse,
            'praktek_gmdss' => $request->praktek_gmdss,
        ];
        NilaiUjianLokal::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('NilaiUjianLokal.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = NilaiUjianLokal::findOrfail($id);
        return view('show_data.show_data_nilai_ujian_lokal', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = NilaiUjianLokal::findOrfail($id);
        return view('edit_data.edit_data_nilai_ujian_lokal', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new NilaiUjianLokalSiswaExport(), 'report_all_nilai_ujian_lokal.xlsx');
    }

    public function exportPDF($id)
    {
        $data = PesertaUjian::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_nilai_ujian_lokal', compact('data'));

        return $pdf->download('data_nilai_ujian_lokal_.pdf');
    }
    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = NilaiUjianLokal::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'id_peserta_ujian' => 'required',
            'teknik_radio' => 'required',
            'service_document' => 'required',
            'radio_regulation' => 'required',
            'bahasa_inggris' => 'required',
            'perjanjian_internasional' => 'required',
            'gmdss' => 'required',
            'radio_telephony' => 'required',
            'ibt' => 'required',
            'morse' => 'required',
            'pancasila' => 'required',
            'teknik_listrik' => 'required',
            'naveka' => 'required',
            'praktek_service_document' => 'required',
            'praktek_radio_telephony' => 'required',
            'praktek_morse' => 'required',
            'praktek_gmdss' => 'required',
        ], [
            'id_peserta_ujian' => 'ID Peserta Ujian Tidak boleh kosong',
            'teknik_radio' => 'Nilai Teknik Radio Kosong',
            'radio_regulation' => 'Nilai Radio Regulation Kosong',
            'service_document' => 'Nilai Service Document Kosong',
            'bahasa_inggris' => 'Nilai Bahasa Inggris Kosong',
            'perjanjian_internasional' => 'Nilai Perjanjian Internasional Kosong',
            'gmdss' => 'Nilai GMDSS Kosong',
            'radio_telephony' => 'Nilai Radio Telephony Kosong',
            'ibt' => 'Nilai IBT Kosong',
            'morse' => 'Nilai Morse Kosong',
            'pancasila' => 'Nilai Pancasila Kosong',
            'teknik_listrik' => 'Nilai Teknik Listrik Kosong',
            'naveka' => 'Nilai NAVEKA Kosong',
            'praktek_service_document' => 'Nilai Service Document Kosong',
            'praktek_radio_telephony' => 'Nilai Radio Telephony Kosong',
            'praktek_morse' => 'Nilai Praktek Morse Kosong',
            'praktek_gmdss' => 'Nilai Praktek GMDSS Kosong',
        ]);
        $model->update([
            'id_peserta_ujian' => $request->id_peserta_ujian,
            'teknik_radio' => $request->teknik_radio,
            'radio_regulation' => $request->radio_regulation,
            'service_document' => $request->service_document,
            'bahasa_inggris' => $request->bahasa_inggris,
            'perjanjian_internasional' => $request->perjanjian_internasional,
            'gmdss' => $request->gmdss,
            'radio_telephony' => $request->radio_telephony,
            'ibt' => $request->ibt,
            'morse' => $request->morse,
            'pancasila' => $request->pancasila,
            'teknik_listrik' => $request->teknik_listrik,
            'naveka' => $request->naveka,
            'praktek_service_document' => $request->praktek_service_document,
            'praktek_radio_telephony' => $request->praktek_radio_telephony,
            'praktek_morse' => $request->praktek_morse,
            'praktek_gmdss' => $request->praktek_gmdss,
        ]);
        return redirect()->route('NilaiUjianLokal.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = NilaiUjianLokal::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('NilaiUjianLokal.index')->with('success', 'Data Telah Terhapus');
    }
}
