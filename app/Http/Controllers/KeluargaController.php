<?php

namespace App\Http\Controllers;

use App\Models\Keluarga;
use Illuminate\Http\Request;

class KeluargaControler extends Controller
{
    // Get all bios
    public function index()
    {
        $keluarga = Keluarga::all();
        return response()->json($keluarga);
    }

    // Get single bio
    public function show($id)
    {
        $keluarga = Keluarga::find($id);
        if (!$keluarga) {
            return response()->json(['message' => 'Keluarga not found'], 404);
        }
        return response()->json($keluarga);
    }

    // Create new bio
    public function store(Request $request)
    {
        $this->validate($request, [
            'id' => 'required|exists:users,id',
            'hubungan_keluarga' => 'nullable|string',
            'nama_lengkap' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir' => 'nullable|string',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'penghasilan_bulanan' => 'nullable|string',
        ]); 

        $keluarga = Keluarga::create($request->all());

        return response()->json($keluarga, 201);
    }

    // Update bio
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'hubungan_keluarga' => 'nullable|string',
            'nama_lengkap' => 'nullable|string',
            'tempat_lahir' => 'nullable|string',
            'tgl_lahir' => 'nullable|string',
            'alamat' => 'nullable|string',
            'pekerjaan' => 'nullable|string',
            'penghasilan_bulanan' => 'nullable|string',
        ]);

        $keluarga = Keluarga::find($id);
        if (!$keluarga) {
            return response()->json(['message' => 'Keluarga not found'], 404);
        }
        $keluarga->update($request->all());

        return response()->json($keluarga, 200);
    }

    // Delete bio
    public function destroy($id)
    {
        $keluarga = Keluarga::find($id);
        if (!$keluarga) {
            return response()->json(['message' => 'Keluarga not found'], 404);
        }
        $keluarga->delete();

        return response()->json(null, 204);
    }
}
