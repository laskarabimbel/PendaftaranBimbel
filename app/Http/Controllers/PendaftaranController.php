<?php

namespace App\Http\Controllers;

use App\Models\Pendaftaran;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;
use Barryvdh\DomPDF\Facade\Pdf;

class PendaftaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        if ($request->ajax()) {
            $query = Pendaftaran::query();
            return DataTables::of($query)->make();
        }
        return view('pages.pendaftaran.index');
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('pages.pendaftaran.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
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

        Pendaftaran::create($validated);

        return redirect('pendaftaran')->with('toast', 'showToast("Data berhasil disimpan")');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $item = Pendaftaran::findOrFail($id);
        return view('pages.pendaftaran.edit', [
            'item' => $item
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $validated = $request->validate([
            'nama_siswa' => 'required|string|max:255',
            'nik' => 'required|string|unique:pendaftarans,nik,' . $id,
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

        $pendaftaran->update($validated);

        return redirect('pendaftaran')->with('toast', 'showToast("Data berhasil diupdate")');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);
        $pendaftaran->delete();

        return redirect()->back()->with('toast', 'showToast("Data berhasil dihapus")');
    }

    public function download($id)
    {
        $pendaftaran = Pendaftaran::findOrFail($id);

        $pdf = Pdf::loadView('pages.pendaftaran.document', compact('pendaftaran'))->setPaper('a4', 'portrait');

        return $pdf->download('formulir_pendaftaran_' . $pendaftaran->nama_siswa . '.pdf');
    }
}
