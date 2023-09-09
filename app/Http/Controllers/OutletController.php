<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class OutletController extends Controller
{
    public function index()
    {
        $outlets = Outlet::latest()->get();

        confirmDelete('Hapus Outlet', 'Apakah anda yakin akan menghapus?');

        return view('pages.outlets.index', compact('outlets'));
    }

    public function create()
    {
        return view('pages.outlets.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        Outlet::create($request->all());

        Alert::success('Berhasil', 'Outlet berhasil ditambahkan');
        return redirect()->route('outlets.index');
    }

    public function edit(Outlet $outlet)
    {
        return view('pages.outlets.edit', compact('outlet'));
    }

    public function update(Request $request, Outlet $outlet)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $outlet->update($request->all());

        Alert::success('Berhasil', 'Outlet berhasil diubah');
        return redirect()->route('outlets.index');
    }

    public function destroy(Outlet $outlet)
    {
        $outlet->delete();

        Alert::success('Berhasil', 'Outlet berhasil dihapus');
        return redirect()->route('outlets.index');
    }
}
