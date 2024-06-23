<?php

namespace App\Http\Controllers;

use App\Exports\KeuanganExport;
use App\Exports\TagihanExport;
use App\Models\Keuangan;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Maatwebsite\Excel\Facades\Excel;
use Barryvdh\DomPDF\Facade\Pdf;
use Carbon\Carbon;
use Yajra\DataTables\Facades\DataTables;

class KeuanganController extends Controller
{
    /**
     * Konversi bulan ke angka Romawi
     */
    private function getRomanNumeral($monthNumber)
    {
        $romanNumerals = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',
            6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X',
            11 => 'XI', 12 => 'XII'
        ];
        return $romanNumerals[$monthNumber];
    }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        if (request()->ajax()) {
            $data = Keuangan::with('user')
                ->select(['id', 'id_user', 'berita_pembayaran', 'status_pembayaran', 'tanggal_pembayaran', 'petugas']);

            return DataTables::of($data)
                ->addColumn('id_user', function ($row) {
                    return $row->user->id;
                })
                ->addColumn('nama_lengkap', function ($row) {
                    return $row->user->nama_lengkap;
                })
                ->addColumn('aksi', function ($row) {
                    $btn = '<div class="btn-group">
                            <a href="/report_keuangan_pdf/' . $row->id . '" class="btn btn-dark btn-sm">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a href="/keuangan/show/' . $row->id . '" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/keuangan/edit/' . $row->id . '" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="' . route('Keuangan.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('data.data_keuangan_bbu');
    }

    public function tagihan()
    {
        if (request()->ajax()) {
            $data = Keuangan::with('user')
                ->where('data_pembayaran', 'tagihan')
                ->select(['id', 'id_user', 'berita_pembayaran', 'status_pembayaran', 'total_tagihan']);

            return DataTables::of($data)
                ->addColumn('id_user', function ($row) {
                    return $row->user->id;
                })
                ->addColumn('nama_lengkap', function ($row) {
                    return $row->user->nama_lengkap;
                })
                ->addColumn('aksi', function ($row) {
                    $btn = '<div class="btn-group">
                            <a href="/report_keuangan_pdf/' . $row->id . '" class="btn btn-dark btn-sm">
                                <i class="fas fa-file-pdf"></i>
                            </a>
                            <a href="/keuangan/show/' . $row->id . '" class="btn btn-info btn-sm">
                                <i class="fas fa-eye"></i>
                            </a>
                            <a href="/keuangan/edit/' . $row->id . '" class="btn btn-warning btn-sm">
                                <i class="fas fa-edit"></i>
                            </a>
                            <form action="' . route('Keuangan.destroy', $row->id) . '" method="POST" style="display:inline;">
                                ' . csrf_field() . method_field('DELETE') . '
                                <button class="btn btn-danger btn-sm">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </form>
                        </div>';
                    return $btn;
                })
                ->rawColumns(['aksi'])
                ->make(true);
        }

        return view('data.data_tagihan');
    }


    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        // Mendapatkan ID terakhir dari data Keuangan
        $lastId = Keuangan::latest()->value('id');

        // Mendapatkan nomor bulan dalam angka Romawi
        $monthNumber = date('n'); // Mengambil nomor bulan saat ini
        $romanMonth = $this->getRomanNumeral($monthNumber); // Mengonversi nomor bulan ke angka Romawi

        // Generate nomor bukti
        $nomor_bukti = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT) . '/' . $romanMonth . '/INV/BharunaBhaktiUtama - ' . date('Y');

        $user = User::all();

        // Mengirimkan variabel $nomor_bukti ke tampilan
        return view('create_data.create_data_keuangan_bbu', ['nomor_bukti' => $nomor_bukti]);
    }


    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validasi = Validator::make($request->all(), [
            'id_user' => 'required',
            'tanggal_pembayaran' => 'required',
            'nama' => 'required',
            'berita_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'jumlah_uang' => 'required',
            'petugas' => 'required',
        ], [
            'tanggal_pembayaran.required' => 'Tanggal Pembayaran wajib diisi',
            'id_user.required' => 'ID User wajib diisi',
            'berita_pembayaran.required' => 'Berita Pembayaran wajib diisi',
            'status_pembayaran.required' => 'Status Pembayaran wajib diisi',
            'jumlah_uang.required' => 'Jumlah Uang Wajib diisi',
            'petugas.required' => 'Petugas wajib diisi',
        ]);

        // Mendapatkan ID terakhir dari data Keuangan
        $lastId = Keuangan::latest()->value('id');

        // Mendapatkan nomor bulan dalam angka Romawi
        $monthNumber = date('n'); // Mengambil nomor bulan saat ini
        $romanMonth = $this->getRomanNumeral($monthNumber); // Mengonversi nomor bulan ke angka Romawi

        // Generate nomor bukti
        $nomor_bukti = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT) . '/' . $romanMonth . '/KUI/BharunaBhaktiUtama - ' . date('Y');

        // Simpan data ke database
        $data = [
            'id_user' => $request->id_user,
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'nomor_bukti' => $nomor_bukti,
            'status_pembayaran' => $request->status_pembayaran,
            'berita_pembayaran' => $request->berita_pembayaran,
            'jumlah_uang' => $request->jumlah_uang,
            'nama' => $request->nama,
            'petugas' => $request->petugas,
            'data_pembayaran' => 'bukti_bayar',
        ];
        Keuangan::create($data);

        // Redirect dengan pesan sukses
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Tersimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        // Ambil data keuangan berdasarkan ID
        $data = Keuangan::findOrFail($id);

        // Ambil nama lengkap pengguna terkait dari data keuangan
        $namaLengkap = $data->user->nama_lengkap;

        // Ambil semua data keuangan yang terkait dengan nama lengkap pengguna
        $dataKeuangan = Keuangan::whereHas('user', function ($query) use ($namaLengkap) {
            $query->where('nama_lengkap', $namaLengkap);
        })->get();

        return view('show_data.show_data_keuangan', compact('dataKeuangan', 'namaLengkap'));
    }


    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $data = Keuangan::findOrfail($id);
        return view('edit_data.edit_data_keuangan', compact('data'));
    }

    public function exportAllExcel()
    {
        return Excel::download(new KeuanganExport(), 'report_all_kwitansi.xlsx');
    }

    public function exportTagihanAllExcel()
    {
        return Excel::download(new TagihanExport(), 'report_all_invoice.xlsx');
    }

    public function exportPDF($id)
    {
        $data = Keuangan::findOrFail($id);
        $currentDate = Carbon::now()->locale('id')->isoFormat('D MMMM YYYY');
        $pdf = PDF::loadView('report.PDF.data_keuangan_bbu', compact('data', 'currentDate'));

        return $pdf->download('kwitansi_pembayaran_.pdf');
    }

    public function cetakInvoicePDF($id)
    {
        try {
            // Temukan data keuangan berdasarkan ID
            $keuangan = Keuangan::with('User')->findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }

        // Buat nama file PDF
        $filename = 'invoice_' . $id . '.pdf';

        // Ambil data yang diperlukan dari keuangan
        $nomor_tagihan = $keuangan->nomor_tagihan;
        $periode_pembayaran = Carbon::parse($keuangan->periode_pembayaran)->locale('id')->isoFormat('D MMMM YYYY');
        $berita_pembayaran = $keuangan->berita_pembayaran;
        $status_pembayaran = $keuangan->status_pembayaran;
        $total_tagihan = $keuangan->total_tagihan;
        $keterangan = $keuangan->keterangan;
        $user = $keuangan->User->nama_lengkap;

        // Lakukan load view PDF dengan data yang diperlukan
        $pdf = PDF::loadView('report.PDF.data_invoice', compact(
            'nomor_tagihan',
            'periode_pembayaran',
            'berita_pembayaran',
            'status_pembayaran',
            'total_tagihan',
            'keterangan',
            'user',
            'keuangan'
        ));

        // Return response dengan file PDF untuk diunduh
        return $pdf->download($filename);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        try {
            // Temukan data berdasarkan ID
            $model = Keuangan::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['errors' => ['Data tidak ditemukan']], 404);
        }
        $validasi = Validator::make($request->all(), [
            'tanggal_pembayaran' => 'required',
            'id_user' => 'required',
            'berita_pembayaran' => 'required',
            'status_pembayaran' => 'required',
            'jumlah_uang' => 'required',
            'petugas' => 'required',
        ], [
            'tanggal_pembayaran.required' => 'Tanggal Pembayaran wajib diisi',
            'nama.required' => 'Nama wajib diisi',
            'berita_pembayaran.required' => 'Berita Pembayaran wajib diisi',
            'status_pembayaran.required' => 'Status Pembayaran wajib diisi',
            'jumlah_uang.required' => 'Jumlah Uang wWjib diisi',
            'petugas.required' => 'Petugas wajib diisi',
        ]);
        $model->update([
            'tanggal_pembayaran' => $request->tanggal_pembayaran,
            'nomor_bukti' => $request->nomor_bukti,
            'status_pembayaran' => $request->status_pembayaran,
            'berita_pembayaran' => $request->berita_pembayaran,
            'jumlah_uang' => $request->jumlah_uang,
            'id_user' => $request->id_user,
            'petugas' => $request->petugas,
        ]);
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Diperbarui');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        try {
            $data = Keuangan::findOrFail($id);
        } catch (\Illuminate\Database\Eloquent\ModelNotFoundException $e) {
            return response()->json(['error' => 'Data tidak ditemukan.'], 404);
        }
        // Hapus data dari basis data
        $data->delete();
        return redirect()->route('Keuangan.index')->with('success', 'Data Telah Terhapus');
    }

    public function ValidasiAkun($id)
    {
        // Temukan data keuangan berdasarkan ID
        $keuangan = Keuangan::findOrFail($id);
        // Temukan user berdasarkan id_user di data keuangan
        $user = User::findOrFail($keuangan->id_user);

        // Ubah jenis_akun, status_akun, dan jenis_diklat
        $user->jenis_akun = 'siswa';
        $user->status_akun = 'tervalidasi';
        $user->jenis_diklat = $user->pendaftaran; // Mengambil nilai dari kolom pendaftaran

        $user->save();

        // Ubah status_pembayaran pada data keuangan menjadi LUNAS
        $keuangan->status_pembayaran = 'LUNAS';
        $keuangan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('Keuangan.show', ['id' => $id])->with('success', 'Akun berhasil divalidasi');
    }

    public function TerimaPembayaran($id)
    {
        // Temukan data keuangan berdasarkan ID
        $keuangan = Keuangan::findOrFail($id);
        // Temukan user berdasarkan id_user di data keuangan
        $user = User::findOrFail($keuangan->id_user);

        // Ubah jenis_akun, status_akun, dan jenis_diklat
        $user->status_transaksi = 'transaksi_berhasil';
        $user->layanan_tambahan = $user->pendaftaran; // Mengambil nilai dari kolom pendaftaran

        $user->save();

        // Ubah status_pembayaran pada data keuangan menjadi LUNAS
        $keuangan->status_pembayaran = 'LUNAS';
        $keuangan->save();

        // Redirect dengan pesan sukses
        return redirect()->route('Keuangan.show', ['id' => $id])->with('success', 'Akun berhasil divalidasi');
    }

    public function TolakPembayaran($id)
    {
        // Temukan data keuangan berdasarkan ID
        $keuangan = Keuangan::findOrFail($id);
        // Temukan user berdasarkan id_user di data keuangan
        $user = User::findOrFail($keuangan->id_user);

        // Ubah jenis_akun, status_akun, dan jenis_diklat
        $user->status_transaksi = 'sedang_diproses';

        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('Keuangan.show', ['id' => $id])->with('success', 'Data Ditolak !!');
    }

    public function TolakValidasi($id)
    {
        // Temukan data keuangan berdasarkan ID
        $keuangan = Keuangan::findOrFail($id);
        // Temukan user berdasarkan id_user di data keuangan
        $user = User::findOrFail($keuangan->id_user);

        // Ubah jenis_akun, status_akun, dan jenis_diklat
        $user->status_akun = 'proses_validasi';

        $user->save();

        // Redirect dengan pesan sukses
        return redirect()->route('Keuangan.show', ['id' => $id])->with('success', 'Data Ditolak !!');
    }
}
