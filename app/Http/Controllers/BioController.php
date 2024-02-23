<?php

namespace App\Http\Controllers;

use App\Models\Bio;
use Illuminate\Http\Request;

class BioController extends Controller
{
    // Get all bios
    public function index()
    {
        $bios = Bio::all();
        return response()->json($bios);
    }

    // Get single bio
    public function show($id)
    {
        $bio = Bio::find($id);
        if (!$bio) {
            return response()->json(['message' => 'Bio not found'], 404);
        }
        return response()->json($bio);
    }

    // Create new bio
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:users,id',
            'hobi' => 'nullable|string',
            'keahlian' => 'nullable|string',
            'nik' => 'nullable|string',
            'kk' => 'nullable|string',
            'aktivitas' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'ukuran_baju' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'motivasi' => 'nullable|string',
            'get_informasi' => 'nullable|string',
        ]);

        $bio = Bio::create($request->all());

        return response()->json($bio, 201);
    }

    // Update bio
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hobi' => 'nullable|string',
            'keahlian' => 'nullable|string',
            'nik' => 'nullable|string',
            'kk' => 'nullable|string',
            'aktivitas' => 'nullable|string',
            'pendidikan' => 'nullable|string',
            'ukuran_baju' => 'nullable|string',
            'riwayat_penyakit' => 'nullable|string',
            'motivasi' => 'nullable|string',
            'get_informasi' => 'nullable|string',
        ]);

        $bio = Bio::find($id);
        if (!$bio) {
            return response()->json(['message' => 'Bio not found'], 404);
        }
        $bio->update($request->all());

        return response()->json($bio, 200);
    }

    // Delete bio
    public function destroy($id)
    {
        $bio = Bio::find($id);
        if (!$bio) {
            return response()->json(['message' => 'Bio not found'], 404);
        }
        $bio->delete();

        return response()->json(null, 204);
    }
}
