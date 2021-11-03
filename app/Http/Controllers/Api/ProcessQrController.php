<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Resources\MahasiswaResource;
use App\Models\Mahasiswa;
use App\Models\Mapel;
use Illuminate\Http\Request;

class ProcessQrController extends Controller
{
    public function process($mapel_id, Request $request)
    {
        // $request->validate([
        //     'nim' => 'required|exists:mahasiswas,nim'
        // ]);
        $mapel = Mapel::findOrFail($mapel_id);
        $mahasiswa = Mahasiswa::where('nim', $request->nim)->first();
        if($mahasiswa == null){
            return response()->json(['failed' => 'QR Code invalid!'], 200);
        }
        if(in_array($mahasiswa->id, $mapel->mahasiswas->pluck('id')->toArray())){
            return response()->json(['failed' => $mahasiswa->name . ' sudah terdaftar!'], 200);
        }
        $mapel->mahasiswas()->attach($mahasiswa->id);
        return response()->json(['success' => $mahasiswa->name . ' hadir!'], 200);
    }
    public function getMahasiswa($mapel_id){
        $mapel = Mapel::findOrFail($mapel_id);
        return MahasiswaResource::collection($mapel->mahasiswas()->latest()->get())->response()->setStatusCode(200);
    }
}
