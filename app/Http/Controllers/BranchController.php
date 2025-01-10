<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index()
    {
        $branches = Branch::all();
        return view('dashboard.branch', compact('branches'));
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'nama_cabang' => 'required|string|max:255',
            'kota' => 'required|string|max:255',
            'alamat' => 'required|string|max:255',
        ]);

        $branch = Branch::create($validated);
        return response()->json($branch, 201);
    }

    public function show($id)
    {
        $branch = Branch::findOrFail($id);
        return response()->json($branch);
    }

    public function update(Request $request, $id)
    {
        $branch = Branch::findOrFail($id);

        $validated = $request->validate([
            'nama_cabang' => 'sometimes|string|max:255',
            'kota' => 'sometimes|string|max:255',
            'alamat' => 'sometimes|string|max:255',
        ]);

        $branch->update($validated);
        return response()->json($branch);
    }

    public function destroy($id_cabang)
    {
        $branch = Branch::findOrFail($id_cabang);
        $branch->delete();
        return response()->json(['message' => 'Branch deleted']);
    }
    public function edit($id)
    {
        $branches = Branch::findOrFail($id);
        return view('dashboard.branch-update', compact('branches'));
    }
}
