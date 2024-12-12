<?php

namespace App\Http\Controllers;

use App\Http\Resources\TransaksiResource;
use App\Models\Transaksi;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;

class TransaksiController extends Controller
{
    public function index()
    {
        $transaksis = Transaksi::with('mobil')->latest()->paginate(5);

        return new TransaksiResource(true, 'List Data Transaksi', $transaksis);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'required',
            'mobil_id' => 'required|exists:mobils,id',
            'sewa_masuk' => 'required',
            'sewa_keluar' => 'required',
        ]);

        if ($validator->fails()) {
            return new TransaksiResource(false, 'Data Transaksi Gagal Ditambahkan', $validator->errors());
        }

        $transaksi = Transaksi::create([
            'name' => $request->name,
            'mobil_id' => $request->mobil_id,
            'status' => 'proses',
            'sewa_masuk' => $request->sewa_masuk,
            'sewa_keluar' => $request->sewa_keluar,
        ]);

        return new TransaksiResource(true, 'Data Transaksi Berhasil Ditambahkan', $transaksi);
    }

    public function show($id)
    {
        $transaksi = Transaksi::with('mobil')->find($id);

        if (!$transaksi) {
            return new TransaksiResource(false, 'Data Transaksi Tidak Ditemukan', null);
        }

        return new TransaksiResource(true, 'Data Transaksi Ditemukan', $transaksi);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'name' => 'nullable',
            'mobil_id' => 'nullable|exists:mobils,id',
            'status' => 'nullable',
            'sewa_masuk' => 'nullable',
            'sewa_keluar' => 'nullable',
        ]);

        if ($validator->fails()) {
            return new TransaksiResource(false, 'Data Transaksi Gagal Diubah', $validator->errors());
        }

        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return new TransaksiResource(false, 'Data Transaksi Tidak Ditemukan', null);
        }

        $transaksi->update([
            'name' => $request->name ?? $transaksi->name,
            'mobil_id' => $request->mobil_id ?? $transaksi->mobil_id,
            'status' => $request->status ?? $transaksi->status,
            'sewa_masuk' => $request->sewa_masuk ?? $transaksi->sewa_masuk,
            'sewa_keluar' => $request->sewa_keluar ?? $transaksi->sewa_keluar,
        ]);

        return new TransaksiResource(true, 'Data Transaksi Berhasil Diubah', $transaksi);
    }

    public function destroy($id)
    {
        $transaksi = Transaksi::find($id);

        if (!$transaksi) {
            return new TransaksiResource(false, 'Data Transaksi Tidak Ditemukan', null);
        }

        $transaksi->delete();

        return new TransaksiResource(true, 'Data Transaksi Berhasil Dihapus', null);
    } 
}
