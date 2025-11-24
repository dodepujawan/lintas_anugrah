<?php

namespace App\Http\Controllers;

use App\Models\Driver;
use Illuminate\Http\Request;
use Yajra\DataTables\Facades\DataTables;

class DriverController extends Controller
{
    public function index()
    {
        return view('driver.driver');
    }

    public function data()
    {
        $driver = Driver::select('*');

        return DataTables::of($driver)
            ->addIndexColumn()
            ->addColumn('action', function($driver) {
                return '
                <div class="btn-group">
                    <button class="btn btn-sm btn-warning edit edit-driver" data-id="'.$driver->id.'"><i class="bx bx-edit"></i></button>
                    <button class="btn btn-sm btn-danger delete delete-driver" data-id="'.$driver->id.'"><i class="bx bx-trash"></i></button>
                </div>
                ';
            })
            ->rawColumns(['action'])
            ->make(true);
    }

    public function store(Request $request)
    {
        $request->validate([
            'kode' => 'required|max:20|unique:driver,kode',
            'nama' => 'required|max:100',
            'alamat' => 'required|max:200', // Biasanya alamat lebih panjang
            'phone' => 'required|min:5|numeric', // numeric bukan number
            'mulai_kerja' => 'required|date',
        ]);

        Driver::create($request->all());

        return response()->json(['success' => 'Data berhasil disimpan!']);
    }

    public function edit($id)
    {
        $driver = Driver::findOrFail($id);
        return response()->json($driver);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'kode' => 'required|max:20|unique:driver,kode,'.$id,
            'nama' => 'required|max:100',
            'alamat' => 'required|max:200', // Biasanya alamat lebih panjang
            'phone' => 'required|min:5|numeric', // numeric bukan number
            'mulai_kerja' => 'required|date',
        ]);

        $driver = Driver::findOrFail($id);
        $driver->update($request->all());

        return response()->json(['success' => 'Data berhasil diupdate!']);
    }

    public function destroy($id)
    {
        Driver::destroy($id);
        return response()->json(['success' => 'Data berhasil dihapus!']);
    }
}
