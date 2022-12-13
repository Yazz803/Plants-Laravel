<?php

namespace App\Http\Controllers;

use App\Models\Plant;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class PlantController extends Controller
{
    public function index()
    {
        $plants = Plant::latest()->filters(request(['search']))->paginate(9);
        return view('index', [
            'plants' => $plants
        ]);
    }

    public function create()
    {
        return view('create');
    }

    public function store(Request $request){
        $validatedData = $request->validate([
            'code_plant' => 'required|max:255|unique:plants',
            'name' => 'required|max:255',
            'type' => 'required|max:255',
        ],[
            'code_plant.required' => 'Kode Tanaman harus diisi',
            'code_plant.unique' => 'Kode Tanaman ada yang sama',
            'name.required' => 'Nama Tanaman harus diisi',
            'type.required' => 'Tipe Tanaman harus diisi',
        ]);

        $validatedData['notes'] = $request->notes;

        Plant::create($validatedData);
        
        Alert::toast('Data Tanaman Berhasil ditambah!', 'success');
        return redirect()->route('plant.index');
    }

    public function edit(Plant $plant){
        return view('edit', [
            'plant' => $plant
        ]);
    }

    public function update(Request $request, Plant $plant){
        $validatedData = $request->validate([
            'code_plant' => 'required|max:255',
            'name' => 'required|max:255',
            'growth' => 'required|max:255',
            'type' => 'required|max:255',
        ],[
            'code_plant.required' => 'Kode Tanaman harus diisi',
            'growth.required' => 'Perkembangan harus diisi',
            'name.required' => 'Nama Tanaman harus diisi',
            'type.required' => 'Tipe Tanaman harus diisi',
        ]);

        $validatedData['notes'] = $request->notes;
        $validatedData['growth'] = $request->growth;
        $validatedData['update'] = now();

        $plant->update($validatedData);
        
        Alert::toast('Data Tanaman Berhasil diubah!!', 'success');
        return redirect()->route('plant.index');
    }

    public function destroy(Plant $plant){
        $plant->delete();

        Alert::toast('Tanaman Berhasil diHapus', 'warning');
        return back();
    }
}
