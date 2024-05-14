<?php

namespace App\Http\Controllers;

use App\Exports\InventoryExport;
use App\Models\InventorySertifikat;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;

class InventoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $data = InventorySertifikat::paginate(100);

        return view('data.data_inventory_sertifikat', [
            'data' => $data,
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('create_data.create_data_inventory_sertifikat');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = validator::make($request->all(), [
            'jenis_sertifikat' => 'required',
            'nama_pemilik' => 'required',
            'no_sertifikat' => 'required',
            'status_sertifikat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'foto_sertifikat' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'bukti_pengambilan' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'bukti_pengiriman' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
        ], [
            'jenis_sertifikat.required' => 'Jenis Sertifikat Wajib Di Isi',
            'status_sertifikat.required' => 'Status Sertifikat Wajib Di Isi',
            'no_sertifikat.required' => 'No Sertifikat Wajib Di Isi',
            'nama_pemilik.required' => 'Nama Pemilik Wajib Di Isi',
            'no_telp.required' => 'No Telepon Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'foto_sertifikat.required' => 'Foto Wajib Diupload',
            'bukti_pengambilan.required' => 'Foto Wajib Diupload',
            'bukti_pengiriman.required' => 'Foto Wajib Diupload',
        ]);

        $data = [
            'jenis_sertifikat' => $request->jenis_sertifikat,
            'nama_pemilik' => $request->nama_pemilik,
            'no_sertifikat' => $request->no_sertifikat,
            'status_sertifikat' => $request->status_sertifikat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
        ];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto_sertifikat', $data);
        $this->processImageUpload($request, 'bukti_pengambilan', $data);
        $this->processImageUpload($request, 'bukti_pengiriman', $data);

        InventorySertifikat::create($data);
        return redirect()->route('Inventory.index')->with('success', 'Data Telah Tersimpan');
    }


    public function exportAllExcel()
    {
        return Excel::download(new InventoryExport(), 'report_all_inventory_sertifikat.xlsx');
    }

    public function exportPDF($id)
    {
        $data = InventorySertifikat::findOrFail($id);
        $pdf = PDF::loadView('report.PDF.data_inventory_sertifikat_bbu', compact('data'));

        return $pdf->download('inventory_sertifikat_.pdf');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $data = InventorySertifikat::findOrfail($id);
        return view('show_data.show_data_inventory_sertifikat', compact('data'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = InventorySertifikat::findOrfail($id);
        return view('edit_data.edit_data_inventory_sertifikat', compact('data'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = InventorySertifikat::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = validator::make($request->all(), [
            'jenis_sertifikat' => 'required',
            'nama_pemilik' => 'required',
            'no_sertifikat' => 'required',
            'status_sertifikat' => 'required',
            'no_telp' => 'required',
            'email' => 'required',
            'foto_sertifikat' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'bukti_pengambilan' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
            'bukti_pengiriman' => 'sometimes|image|mimes:jpeg,png,jpg,gif,svg|max:7080',
        ], [
            'jenis_sertifikat.required' => 'Jenis Sertifikat Wajib Di Isi',
            'status_sertifikat.required' => 'Status Sertifikat Wajib Di Isi',
            'no_sertifikat.required' => 'No Sertifikat Wajib Di Isi',
            'nama_pemilik.required' => 'Nama Pemilik Wajib Di Isi',
            'no_telp.required' => 'No Telepon Wajib Di Isi',
            'email.required' => 'Email Wajib Di Isi',
            'foto_sertifikat.required' => 'Foto Wajib Diupload',
            'bukti_pengambilan.required' => 'Foto Wajib Diupload',
            'bukti_pengiriman.required' => 'Foto Wajib Diupload',
        ]);
        $data = [];

        // Simpan file foto jika ada
        $this->processImageUpload($request, 'foto_sertifikat', $data, $model);
        $this->processImageUpload($request, 'bukti_pengambilan', $data, $model);
        $this->processImageUpload($request, 'bukti_pengiriman', $data, $model);

        // Update data
        $model->update([
            'jenis_sertifikat' => $request->jenis_sertifikat,
            'nama_pemilik' => $request->nama_pemilik,
            'no_sertifikat' => $request->no_sertifikat,
            'status_sertifikat' => $request->status_sertifikat,
            'no_telp' => $request->no_telp,
            'email' => $request->email,
            'foto_sertifikat' => $data['foto_sertifikat'] ?? $model->foto,
            'bukti_pengambilan' => $data['bukti_pengambilan'] ?? $model->foto_ktp,
            'bukti_pengiriman' => $data['bukti_pengiriman'] ?? $model->foto_bst,
        ]);
        return redirect()->route('Inventory.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = InventorySertifikat::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Hapus semua file terkait
        $this->deleteRelatedFiles($data);

        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('PerpanjangGMDSS.index')->with('success', 'Data Telah Terhapus');
    }

    private function deleteRelatedFiles($data)
    {
        $fileFields = ['foto_sertifikat', 'bukti_pengambilan', 'bukti_pengiriman'];

        foreach ($fileFields as $fieldName) {
            if ($data->$fieldName) {
                Storage::delete('public/img/' . basename($data->$fieldName));
            }
        }
    }

    private function processImageUpload($request, $fieldName, &$data, $model = null)
    {
        if ($request->hasFile($fieldName)) {
            $image = $request->file($fieldName);
            $imageName = time() . '_' . $image->getClientOriginalName();
            $image->storeAs('public/img', $imageName);

            // Hapus file lama jika sedang melakukan update
            if ($model && $model->$fieldName) {
                Storage::delete('public/img/' . $model->$fieldName);
            }

            // Tambahkan nama file ke data
            $data[$fieldName] = $imageName;
        } elseif ($model && $model->$fieldName) {
            // Jika tidak ada file baru diupload, tetapi ada file lama, gunakan file lama
            $data[$fieldName] = $model->$fieldName;
        }
    }
}
