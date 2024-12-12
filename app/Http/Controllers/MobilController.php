<?php

namespace App\Http\Controllers;

use App\Http\Resources\MobilResource;
use App\Models\Mobil;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Facades\Validator;

class MobilController extends Controller
{
    public function index()
    {
        $mobils = Mobil::latest()->paginate(5);

        return new MobilResource(true, 'List Data Mobil', $mobils);
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'merek' => 'required',
            'nomor_polisi' => 'required|unique:mobils,nomor_polisi',
            'warna' => 'required',
            'transmisi' => 'required',
            'kapasitas' => 'nullable',
            'harga' => 'nullable',
            'image' => 'required|image|mimes:jpeg,png,jpg,gif,svg|max:2048',
        ]);

        if ($validator->fails()) {
            return new MobilResource(false, 'Data Mobil Gagal Ditambahkan', $validator->errors());
        }

        // upload image
        $image = $request->file('image');
        $image->storeAs('public/mobils', $image->hashName());

        $mobil = Mobil::create([
            'merek' => $request->merek,
            'nomor_polisi' => $request->nomor_polisi,
            'warna' => $request->warna,
            'transmisi' => $request->transmisi,
            'kapasitas' => $request->kapasitas,
            'harga' => $request->harga,
            'image_url' => $image->hashName(),
        ]);

        return new MobilResource(true, 'Data Mobil Berhasil Ditambahkan', $mobil);
    }

    public function show($id)
    {
        $mobil = Mobil::find($id);

        if (!$mobil) {
            return new MobilResource(false, 'Data Mobil Tidak Ditemukan', null);
        }

        return new MobilResource(true, 'Data Mobil Ditemukan', $mobil);
    }

    public function update(Request $request, $id)
    {
        $validator = Validator::make($request->all(), [
            'merek' => 'required',
            'nomor_polisi' => 'nullable|unique:mobils,nomor_polisi,' . $id,
            'warna' => 'nullable',
            'transmisi' => 'nullable',
            'kapasitas' => 'nullable',
            'harga' => 'nullable',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif,svg|max:2048'
        ]);

        if ($validator->fails()) {
            return new MobilResource(false, 'Data Mobil Gagal Diubah', $validator->errors());
        }

        $mobil = Mobil::find($id);

        if (!$mobil) {
            return new MobilResource(false, 'Data Mobil Tidak Ditemukan', null);
        }

        if ($request->hasFile('image')) {
            $image = $request->file('image');
            $image->storeAs('public/mobils', $image->hashName());
            Storage::delete('public/mobils/' . $mobil->image_url);
            $mobil->image_url = $image->hashName();
        }

        $mobil->update([
            'merek' => $request->merek ?? $mobil->merek,
            'nomor_polisi' => $request->nomor_polisi ?? $mobil->nomor_polisi,
            'warna' => $request->warna ?? $mobil->warna,
            'transmisi' => $request->transmisi ?? $mobil->transmisi,
            'kapasitas' => $request->kapasitas ?? $mobil->kapasitas,
            'harga' => $request->harga ?? $mobil->harga,
        ]);

        return new MobilResource(true, 'Data Mobil Berhasil Diubah', $mobil);
    }

    public function destroy($id)
    {
        $mobil = Mobil::find($id);

        if (!$mobil) {
            return new MobilResource(false, 'Data Mobil Tidak Ditemukan', null);
        }   

        Storage::delete('public/mobils/' . $mobil->image_url);
        $mobil->delete();

        return new MobilResource(true, 'Data Mobil Berhasil Dihapus', null);
    }
}