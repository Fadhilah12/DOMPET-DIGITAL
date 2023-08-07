<?php

namespace App\Http\Controllers;

use App\Models\Kategori;
use App\Models\Kategorikeluar;
use App\Models\Kategoripemasukan;
use App\Models\Pengeluaran;
use App\Models\Saldokeluar;
use Illuminate\Support\Facades\Validator;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use RealRashid\SweetAlert\Facades\Alert;
use PDF;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\PengeluaranExport;
use Illuminate\Support\Facades\DB;

class PengeluaranController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {

         // Retrieve the ID of the currently authenticated user
         $id = Auth::user()->id;

         // Fetch the user data from the 'users' table
         $data = DB::table('users')
             ->where('id', '=', $id)
             ->first();
        $pageTitle = 'halaman kategori';
        $pengeluarans = Pengeluaran::where('user_id', $data->id)->get();
        confirmDelete();
        return view('pengeluaran.index', [
            'data' => $data,
            'pageTitle' => $pageTitle,
            'pengeluaran' => $pengeluarans
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $pageTitle = 'Create Kategori';
        $pengeluarans = Kategorikeluar::all();
        $pengeluaran = Saldokeluar::all();

        // return view('pemasukan.create', compact('pageTitle','pemasukan'));
        return view ('pengeluaran.create',[
            'pageTitle'=>$pageTitle,
            'pengeluarans'=>$pengeluarans,
            'saldomasuks'=>$pengeluaran
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka'
        ];

        $validator = Validator::make($request->all(), [
            'nominal' => 'required',
            'deskripsi' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }
 // Get File
$file = $request->file('struk');

if ($file != null) {
    $originalFilename = $file->getClientOriginalName();
    $encryptedFilename = $file->hashName();

    // Store File
    $file->store('public/files');
}

// ELOQUENT
$pengeluarans = new Pengeluaran();
$pengeluarans->kategorikeluar_id = $request->kategori_id;
$pengeluarans->nominal = $request->nominal;
$pengeluarans->deskripsi = $request->deskripsi;
$pengeluarans->tanggal_pengeluaran = $request->tanggal_pengeluaran;
$pengeluarans->user_id = Auth::id();
$pengeluarans->save();

$pemasukanId = $pengeluarans->id;
$saldoKeluar = Saldokeluar::where('user_id', Auth::id())->first();

if ($saldoKeluar) {
    $saldoKeluar->totalkeluar += $request->nominal; // Menambahkan nominal ke total keluar
} else {
    $saldoKeluar = new Saldokeluar();
    $saldoKeluar->pengeluaran_id = $pemasukanId;
    $saldoKeluar->user_id = Auth::id();
    $saldoKeluar->totalkeluar = $request->nominal;
}

if ($file != null) {
    $pengeluarans->original_filename = $originalFilename;
    $pengeluarans->encrypted_filename = $encryptedFilename;
}

$saldoKeluar->save();

        Alert::success('Added Successfully', 'Expenditure Data Added Successfully.');

        return redirect()->route('pengeluaran.index',[
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $pageTitle = 'show Kategori';
        $pengeluaran= Pengeluaran::find($id);
        $kategorikeluar = Kategorikeluar::find($id);

        return view('pengeluaran.show', compact('pageTitle','pengeluaran','kategorikeluar'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $pageTitle = 'edit pengeluaran';
        $pengeluaran = Pengeluaran::find($id);
        $kategorikeluar = Kategorikeluar::all();
        $pengeluarans = Saldokeluar::find($id);

        return view('pengeluaran.edit', compact('pageTitle','pengeluaran','kategorikeluar','pengeluarans'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
         // var_dump($request->kategori_id);die();
         $messages = [
            'required' => ':Attribute harus diisi.',
            'email' => 'Isi :attribute dengan format yang benar',
            'numeric' => 'Isi :attribute dengan angka',
            'regex' => 'Isi :attribute dengan huruf besar saja',
        ];

        $validator = Validator::make($request->all(), [
             'kategori_id' =>'required',
            'nominal' => 'required',
            'deskripsi' => 'required'
        ], $messages);

        if ($validator->fails()) {
            return redirect()->back()->withErrors($validator)->withInput();
        }

        // Dapatkan Data Pemasukan dan Saldo Masuk yang akan diupdate
        $pengeluaran = Pengeluaran::find($id);
        $saldokeluar = Saldokeluar::where('pengeluaran_id', $id)->first();


        // Update Data Pemasukan
        $pengeluaran->kategorikeluar_id = $request->kategori_id;
        $pengeluaran->nominal = $request->nominal;
        $pengeluaran->deskripsi = $request->deskripsi;
        $pengeluaran->tanggal_pengeluaran = $request->tanggal_pengeluaran;
        $pengeluaran->user_id = Auth::id();
        $pengeluaran->save();

        // Update Data Saldo Masuk
        $saldokeluar->user_id = Auth::id();
        $saldokeluar->totalkeluar = $request->nominal;
        $saldokeluar->save();

        Alert::success('Update Successfully', 'Expenditure Data Changed Successfully.');

        return redirect()->route('pengeluaran.index')->with('success', 'Data updated successfully.');

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {

        $pengeluaran = Pengeluaran::find($id);

        if ($pengeluaran) {
            // Update 'pemasukan_id' to null in associated Saldomasuk records
            Saldokeluar::where('pengeluaran_id', $pengeluaran->id)->update(['pengeluaran_id' => $id]);

            // Then delete the Pemasukan record
            $pengeluaran->delete();
        }
        if ($pengeluaran->encrypted_filename) {
            Storage::disk('public')->delete('files/' . $pengeluaran->encrypted_filename);
        }

    Alert::success('Deleted Successfully', 'Expenditure Data Deleted Successfully.');

    return redirect()->route('pengeluaran.index');

    }

    public function exportPdf2()
    {
        $pengeluaran = Pengeluaran::all();

        $pdf = PDF::loadView('pengeluaran.export_pdf', compact('pengeluaran'));

        return $pdf->download('pengeluaran.pdf');
    }

    public function exportExcel()
    {
        return Excel::download(new PengeluaranExport, 'Pengeluaran.xlsx');
    }

    public function downloadFile($pengeluaranId)
    {
        $pengeluaran = Pengeluaran::find($pengeluaranId);
        $encryptedFilename = 'public/files/'.$pengeluaran->encrypted_filename;
        $downloadFilename = Str::lower($pengeluaran->user_id.'_struk.png');

        if(Storage::exists($encryptedFilename)) {
            return Storage::download($encryptedFilename, $downloadFilename);
        }
    }

}
