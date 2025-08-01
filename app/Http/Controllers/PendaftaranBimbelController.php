<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;

class PendaftaranBimbelController extends Controller
{
    // Tampilkan form pendaftaran bimbel
    public function create()
    {
        return view('pages.pendaftaran-bimbel');
    }

    // Proses penyimpanan data pendaftaran bimbel
    public function store(Request $request)
    {
        // Validasi input
        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nik' => 'required|string|unique:pendaftarans,nik',
            'jenis_kelamin' => 'required|in:L,P',
            'tempat_lahir' => 'required|string|max:255',
            'tanggal_lahir' => 'required|date',
            'agama' => 'required|string|max:50',
            'program' => 'required|in:INTENSIF,REGULER,AKADEMIK,PSIKOLOGI',
            'pengiriman' => 'nullable|string|max:255',
            'no_telfon_siswa' => 'nullable|string|max:20',
            'nama_ayah' => 'required|string|max:255',
            'pekerjaan_ayah' => 'nullable|string|max:255',
            'nama_ibu' => 'required|string|max:255',
            'pekerjaan_ibu' => 'nullable|string|max:255',
            'no_telfon_orang_tua' => 'nullable|string|max:20',
        ]);

        // Simpan data ke database
        Pendaftaran::create($validated);

        // Redirect ke halaman selesai dengan pesan sukses
        return redirect()->route('pendaftaran-bimbel.selesai')
            ->with('success', 'Pendaftaran bimbel berhasil dikirim!');
    }

    // Tampilkan halaman selesai
    public function selesai()
    {
        return view('pages.selesai');
    }
}
