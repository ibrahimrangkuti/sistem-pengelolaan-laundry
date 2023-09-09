<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\Package;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class PackageController extends Controller
{
    public function index()
    {
        $packages = Package::latest()->get();

        confirmDelete('Hapus Paket', 'Apakah anda yakin akan menghapus?');

        return view('pages.packages.index', compact('packages'));
    }

    public function create()
    {
        $outlets = Outlet::latest()->get();
        $types = ['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain'];

        return view('pages.packages.create', compact('outlets', 'types'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'outlet_id' => 'required|exists:outlets,id',
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jenis' => 'required|in:kiloan,selimut,bed_cover,kaos,lain',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        Package::create($request->all());

        Alert::success('Berhasil', 'Paket berhasil ditambahkan');
        return redirect()->route('packages.index');
    }

    public function edit(Package $package)
    {
        $outlets = Outlet::latest()->get();
        $types = ['kiloan', 'selimut', 'bed_cover', 'kaos', 'lain'];

        return view('pages.packages.edit', compact('package', 'outlets', 'types'));
    }

    public function update(Request $request, Package $package)
    {
        $validator = Validator::make($request->all(), [
            'outlet_id' => 'required|exists:outlets,id',
            'nama_paket' => 'required|string|max:255',
            'harga' => 'required|integer',
            'jenis' => 'required|in:kiloan,selimut,bed_cover,kaos,lain',
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $package->update($request->all());

        Alert::success('Berhasil', 'Paket berhasil diubah');
        return redirect()->route('packages.index');
    }
}
