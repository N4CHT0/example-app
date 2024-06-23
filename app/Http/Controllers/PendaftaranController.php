<?php

namespace App\Http\Controllers;

use App\Models\DaftarCOP;
use App\Models\DaftarGMDSS;
use App\Models\DaftarMCU;
use App\Models\DaftarREOR;
use App\Models\Province;
use App\Models\Regency;
use App\Models\District;
use App\Models\Keuangan;
use App\Models\PerpanjangGMDSS;
use App\Models\PerpanjangREOR;
use App\Models\User;
use App\Models\Village;
use Barryvdh\DomPDF\Facade\Pdf;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Carbon\Carbon;

class PendaftaranController extends Controller
{
    private function getRomanNumeral($monthNumber)
    {
        $romanNumerals = [
            1 => 'I', 2 => 'II', 3 => 'III', 4 => 'IV', 5 => 'V',
            6 => 'VI', 7 => 'VII', 8 => 'VIII', 9 => 'IX', 10 => 'X',
            11 => 'XI', 12 => 'XII'
        ];
        return $romanNumerals[$monthNumber];
    }

    public function diklat()
    {
        return view('auth.diklat');
    }

    public function handleDiklat($jenis_diklat)
    {
        if ($jenis_diklat == 'gmdss') {
            $provinsi = Province::all();
            return view('pendaftaran.gmdss_daftar', compact('provinsi'));
        } elseif ($jenis_diklat == 'reor') {
            $provinsi = Province::all();
            return view('pendaftaran.reor_daftar', compact('provinsi'));
        } elseif ($jenis_diklat == 'cop') {
            $provinsi = Province::all();
            return view('pendaftaran.cop_daftar', compact('provinsi'));
        } else {
            abort(404);
        }
    }

    public function handleDiklatAll($jenis_diklat)
    {
        $provinsi = Province::all();

        if ($jenis_diklat == 'gmdss') {
            return view('pendaftaran.gmdss_daftar', compact('provinsi'));
        } elseif ($jenis_diklat == 'reor') {
            return view('pendaftaran.reor_daftar', compact('provinsi'));
        } elseif ($jenis_diklat == 'cop') {
            return view('pendaftaran.cop_daftar', compact('provinsi'));
        } elseif ($jenis_diklat == 'perpanjang_reor') {
            return view('pendaftaran.reor_perpanjang', compact('provinsi'));
        } elseif ($jenis_diklat == 'perpanjang_gmdss') {
            return view('pendaftaran.gmdss_perpanjang', compact('provinsi'));
        } elseif ($jenis_diklat == 'mcu') {
            return view('pendaftaran.mcu_daftar');
        } else {
            abort(404);
        }
    }


    public function storeDiklat(Request $request, $jenisDiklat)
    {
        switch ($jenisDiklat) {
            case 'gmdss':
                app('App\Http\Controllers\DaftarGMDSSController')->store($request);
                // Update jenis pendaftaran user untuk gmdss
                $this->updatePendaftaran($jenisDiklat);
                break;
            case 'cop':
                app('App\Http\Controllers\DaftarCOPController')->store($request);
                break;
            case 'reor':
                app('App\Http\Controllers\DaftarREORController')->store($request);
                // Update jenis pendaftaran user untuk reor
                $this->updatePendaftaran($jenisDiklat);
                break;
            case 'mcu':
                app('App\Http\Controllers\DaftarMCUController')->store($request);
                break;
            case 'perpanjangan_reor':
                app('App\Http\Controllers\PerpanjangREORController')->store($request);
                break;
            case 'perpanjangan_gmdss':
                app('App\Http\Controllers\PerpanjangGMDSSController')->store($request);
                break;
            default:
                return redirect()->back()->withErrors(['jenis_diklat' => 'Jenis diklat tidak valid']);
        }

        // Create invoice
        $this->createInvoice($jenisDiklat);

        // Retrieve the current user
        $user = auth()->user();
        if (!$user instanceof User) {
            return redirect()->back()->withErrors(['user' => 'User not found or not authenticated']);
        }
        // Pengecekan jenis_akun untuk redirect ke dashboard yang sesuai
        if ($user->jenis_akun == 'pendaftar') {
            return redirect()->route('Dashboard.Pendaftar');
        } elseif ($user->jenis_akun == 'siswa') {
            // Update status_transaksi for 'siswa'
            $user->status_transaksi = 'upload_bukti_bayar';
            $user->save();
            return redirect()->route('Dashboard.Siswa');
        } else {
            return redirect()->route('Dashboard.Default'); // Redirect ke default dashboard jika jenis_akun tidak dikenali
        }
    }


    private function createInvoice($jenisPendaftaran)
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            return redirect()->back()->withErrors(['user' => 'User not found or not authenticated']);
        }

        // Generate nomor bukti
        $lastId = Keuangan::latest()->value('id');
        $monthNumber = date('n'); // Mengambil nomor bulan saat ini
        $romanMonth = $this->getRomanNumeral($monthNumber); // Mengonversi nomor bulan ke angka Romawi
        $nomor_tagihan = str_pad($lastId + 1, 4, '0', STR_PAD_LEFT) . '/' . $romanMonth . '/INV/BharunaBhaktiUtama - ' . date('Y');

        // Set keterangan dan total_tagihan sesuai jenis pendaftaran
        switch ($jenisPendaftaran) {
            case 'gmdss':
                $keterangan = 'DIKLAT GMDSS';
                $total_tagihan = 4500000;
                $edit_foto = DaftarGMDSS::where('nama_lengkap', $user->nama_lengkap)->where('edit_foto', 'YA')->value('edit_foto');
                break;
            case 'mcu':
                $keterangan = 'SERTIFIKAT MEDICAL CHECK UP';
                $total_tagihan = 775000;
                $edit_foto = DaftarMCU::where('nama_lengkap', $user->nama_lengkap)->where('edit_foto', 'YA')->value('edit_foto');
                break;
            case 'cop':
                // Ambil nilai jenis_sertifikat_cop dari tabel daftar_cop
                $jenis_sertifikat_cop = DaftarCOP::where('nama_lengkap', $user->nama_lengkap)->value('jenis_sertifikat_cop');
                $edit_foto = DaftarCOP::where('nama_lengkap', $user->nama_lengkap)->where('edit_foto', 'YA')->value('edit_foto');
                switch ($jenis_sertifikat_cop) {
                    case 'MC':
                        $total_tagihan = 1000000;
                        break;
                    case 'MFA':
                        $total_tagihan = 950000;
                        break;
                    case 'SSO':
                        $total_tagihan = 1050000;
                        break;
                    case 'SAT':
                        $total_tagihan = 800000;
                        break;
                    case 'SATSDSD':
                        $total_tagihan = 850000;
                        break;
                    default:
                        $total_tagihan = 0;
                        break;
                }
                $keterangan = 'DIKLAT COP - ' . $jenis_sertifikat_cop;
                break;
            case 'perpanjangan_reor':
                $jenis_sertifikat = PerpanjangREOR::where('nama_lengkap', $user->nama_lengkap)->value('jenis_sertifikat');
                $edit_foto = PerpanjangREOR::where('nama_lengkap', $user->nama_lengkap)->where('edit_foto', 'YA')->value('edit_foto');
                switch ($jenis_sertifikat) {
                    case 'SRE':
                        $total_tagihan = 600000;
                        break;
                    case 'SOU':
                        $total_tagihan = 600000;
                        break;
                    default:
                        $total_tagihan = 0;
                        break;
                }
                $keterangan = 'PERPANJANGAN SERTIFIKAT REOR - ' . $jenis_sertifikat;
                break;
            case 'perpanjangan_gmdss':
                $jenis_perpanjang = PerpanjangGMDSS::where('nama_lengkap', $user->nama_lengkap)->value('jenis_perpanjang');
                $edit_foto = PerpanjangGMDSS::where('nama_lengkap', $user->nama_lengkap)->where('edit_foto', 'YA')->value('edit_foto');
                switch ($jenis_perpanjang) {
                    case 'REVAL':
                        $total_tagihan = 1000000;
                        break;
                    case 'ENDORSE':
                        $total_tagihan = 1000000;
                        break;
                    case 'REVAL & ENDORSE':
                        $total_tagihan = 2000000;
                        break;
                    default:
                        $total_tagihan = 0;
                        break;
                }
                $keterangan = 'PERPANJANGAN SERTIFIKAT GMDSS - ' . $jenis_perpanjang;
                break;
            case 'reor':
                // Ambil nilai pilihan_diklat dari tabel daftar_reor
                $pilihan_diklat = DaftarREOR::where('nama_lengkap', $user->nama_lengkap)->value('pilihan_diklat');
                $edit_foto = DaftarREOR::where('nama_lengkap', $user->nama_lengkap)->where('edit_foto', 'YA')->value('edit_foto');
                switch ($pilihan_diklat) {
                    case 'SRE-I':
                        $total_tagihan = 9050000;
                        break;
                    case 'SRE-II':
                        $total_tagihan = 8300000;
                        break;
                    case 'SOU-REGULAR':
                        $total_tagihan = 8150000;
                        break;
                    case 'SOU-MUALIM':
                        $total_tagihan = 6500000;
                        break;
                    default:
                        $total_tagihan = 0;
                        break;
                }
                $keterangan = 'DIKLAT REOR - ' . $pilihan_diklat;
                break;
            default:
                $keterangan = 'DIKLAT';
                $total_tagihan = 0;
                $edit_foto = null;  // No edit_foto for default case
                break;
        }

        // Pengecekan edit_foto dari model terkait
        if ($edit_foto === 'YA') {
            $keterangan .= ' + EDIT FOTO';
            $total_tagihan += 50000;
        }


        // Create invoice entry
        Keuangan::create([
            'tanggal_pembayaran' => now(),
            'periode_pembayaran' => now()->format('Y-m-d'),
            'nomor_tagihan' => $nomor_tagihan,
            'id_user' => $user->id,
            'berita_pembayaran' => 'Pembayaran Pendaftaran ' . $keterangan,
            'status_pembayaran' => 'BELUM LUNAS', // or whatever default status you want
            'data_pembayaran' => 'tagihan',
            'total_tagihan' => $total_tagihan,
            'keterangan' => $keterangan,
        ]);
    }

    public function cetakInvoice()
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            return redirect()->back()->withErrors(['user' => 'User not found or not authenticated']);
        }

        // Ambil data invoice user terbaru
        $invoice = Keuangan::where('id_user', $user->id)->latest()->first();

        if (!$invoice) {
            return redirect()->back()->withErrors(['invoice' => 'Invoice not found']);
        }

        // Mendapatkan tanggal saat ini dalam format Indonesia
        $currentDate = Carbon::now()->locale('id')->isoFormat('D MMMM YYYY');

        // Render view invoice ke dalam PDF dengan menyertakan $currentDate
        $pdf = PDF::loadView('report.PDF.data_tagihan', compact('invoice', 'currentDate'));

        // Unduh PDF
        return $pdf->download('invoice.pdf');
    }



    private function updatePendaftaran($jenisPendaftaran)
    {
        $user = Auth::user();

        if (!$user instanceof User) {
            return redirect()->back()->withErrors(['user' => 'User not found or not authenticated']);
        }

        $user->pendaftaran = $jenisPendaftaran;
        $user->save();
    }


    public function getRegencies($province_id)
    {
        $regencies = Regency::where('province_id', $province_id)->get();
        return response()->json($regencies);
    }

    public function getDistricts($regency_id)
    {
        $districts = District::where('regency_id', $regency_id)->get();
        return response()->json($districts);
    }

    public function getVillages($district_id)
    {
        $villages = Village::where('district_id', $district_id)->get();
        return response()->json($villages);
    }

    public function home()
    {
        return view('dashboard.pendaftar'); // Pastikan Anda memiliki view ini
    }

    public function uploadBuktiPembayaran(Request $request)
    {
        // Validasi request
        $request->validate([
            'bukti_pembayaran' => 'required|image|mimes:jpeg,png,jpg,gif|max:8048', // Sesuaikan dengan kebutuhan
        ]);

        // Ambil user yang sedang login
        $user = Auth::user();

        if (!$user instanceof User) {
            return redirect()->back()->withErrors(['user' => 'User not found or not authenticated']);
        }

        // Proses pengunggahan gambar
        $data = [];
        $this->processImageUpload($request, 'bukti_pembayaran', $data);

        // Update data user dengan bukti pembayaran sesuai jenis_akun
        if ($user) {
            if ($user->jenis_akun === 'siswa') {
                $user->update([
                    'bukti_pembayaran' => $data['bukti_pembayaran'],
                    'status_transaksi' => 'sedang_diproses',
                ]);
                // Tambahkan log untuk debugging jika diperlukan
                // Log::info('User siswa updated', ['user_id' => $user->id]);
                return redirect()->route('Dashboard.Siswa');
            } elseif ($user->jenis_akun === 'pendaftar') {
                $user->update([
                    'bukti_pembayaran' => $data['bukti_pembayaran'],
                    'status_akun' => 'proses_validasi',
                ]);
                // Tambahkan log untuk debugging jika diperlukan
                // Log::info('User pendaftar updated', ['user_id' => $user->id]);
                return redirect()->route('Dashboard.Pendaftar');
            }
        }

        // Default redirect jika jenis_akun tidak sesuai
        return redirect()->route('Dashboard.Pendaftar');
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
