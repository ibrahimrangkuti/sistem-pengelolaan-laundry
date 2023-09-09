<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class CustomerController extends Controller
{
    public function index()
    {
        $customers = Customer::latest()->get();

        confirmDelete('Hapus Pelanggan', 'Apakah anda yakin akan menghapus?');

        return view('pages.customers.index', compact('customers'));
    }

    public function create()
    {
        return view('pages.customers.create');
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        Customer::create([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        Alert::success('Berhasil', 'Pelanggan berhasil ditambahkan');
        return redirect()->route('customers.index');
    }

    public function edit(Customer $customer)
    {
        return view('pages.customers.edit', compact('customer'));
    }

    public function update(Request $request, Customer $customer)
    {
        $validator = Validator::make($request->all(), [
            'nama' => ['required', 'string', 'max:255'],
            'alamat' => ['required', 'string'],
            'telp' => ['required', 'string', 'max:255'],
            'jenis_kelamin' => ['required', 'string'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $customer->update([
            'nama' => $request->nama,
            'alamat' => $request->alamat,
            'telp' => $request->telp,
            'jenis_kelamin' => $request->jenis_kelamin,
        ]);

        Alert::success('Berhasil', 'Pelanggan berhasil diubah');
        return redirect()->route('customers.index');
    }

    public function destroy(Customer $customer)
    {
        $customer->delete();

        Alert::success('Berhasil', 'Pelanggan berhasil dihapus');
        return redirect()->route('customers.index');
    }
}
