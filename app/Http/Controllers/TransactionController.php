<?php

namespace App\Http\Controllers;

use App\Models\Customer;
use App\Models\Outlet;
use App\Models\Transaction;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class TransactionController extends Controller
{
    public function index()
    {
        $transactions = Transaction::latest()->get();
        if (Auth::user()->role == 'kasir') {
            $transactions = Transaction::where('outlet_id', Auth::user()->outlet_id)->latest()->get();
        }

        return view('pages.transactions.index', compact('transactions'));
    }

    public function create()
    {
        $outlets = Outlet::latest()->get();
        $customers = Customer::latest()->get();

        return view('pages.transactions.create', compact('outlets', 'customers'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'customer_id' => ['required', 'exists:customers,id'],
            'tgl_transaksi' => ['required', 'date'],
            'batas_waktu' => ['required', 'date'],
            'biaya_tambahan' => ['nullable', 'numeric'],
            'diskon' => ['nullable', 'numeric'],
            'pajak' => ['nullable', 'numeric'],
        ]);

        if (Auth::user()->role == 'admin') {
            $validator->addRules([
                'outlet_id' => ['required', 'exists:outlets,id'],
            ]);
            $outlet = Outlet::findOrFail($request->outlet_id);
        }

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $outlet = Auth::user()->outlet;
        $customer = Customer::findOrFail($request->customer_id);

        $outlet_id = $outlet->id;
        if (Auth::user()->role !== 'admin') {
            $outlet_id = Auth::user()->outlet_id;
        }

        $transaction = Transaction::create([
            'outlet_id' => $outlet_id,
            'customer_id' => $customer->id,
            'user_id' => Auth::user()->id,
            'kode_transaksi' => 'TRX' . time(),
            'tgl_transaksi' => $request->tgl_transaksi,
            'batas_waktu' => $request->batas_waktu,
            'biaya_tambahan' => $request->biaya_tambahan ?? 0,
            'diskon' => $request->diskon ?? 0,
            'pajak' => $request->pajak ?? 0,
        ]);

        Alert::success('Berhasil', 'Transaksi berhasil ditambahkan');
        return redirect()->route('transactions.detail', $transaction->kode_transaksi);
    }

    public function detail($kode_transaksi)
    {
        $transaction = Transaction::where('kode_transaksi', $kode_transaksi)->firstOrFail();
        if (Auth::user()->role !== 'admin' && Auth::user()->outlet_id != $transaction->outlet_id) {
            Alert::error('Gagal', 'Transaksi tidak ditemukan');
            return redirect()->back();
        }

        $transaction_details = $transaction->transaction_details;
        $packages = $transaction->outlet->packages;

        return view('pages.transactions.detail', compact('transaction', 'packages', 'transaction_details'));
    }

    public function storeTransactionDetail(Request $request, $kode_transaksi)
    {
        $validator = Validator::make($request->all(), [
            'package_id' => ['required', 'exists:packages,id'],
            'qty' => ['required', 'numeric'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $transaction = Transaction::where('kode_transaksi', $kode_transaksi)->firstOrFail();
        $package = $transaction->outlet->packages()->findOrFail($request->package_id);

        $transaction->transaction_details()->create([
            'package_id' => $package->id,
            'qty' => $request->qty,
            'subtotal' => $package->harga * $request->qty,
        ]);

        $transaction->update([
            'total' => $transaction->total + ($package->harga * $request->qty),
        ]);

        Alert::success('Berhasil', 'Paket berhasil ditambahkan');
        return redirect()->back();
    }

    public function edit($kode_transaksi)
    {
        $transaction = Transaction::where('kode_transaksi', $kode_transaksi)->firstOrFail();
        if (Auth::user()->role !== 'admin' && Auth::user()->outlet_id != $transaction->outlet_id) {
            Alert::error('Gagal', 'Transaksi tidak ditemukan');
            return redirect()->back();
        }
        $customers = Customer::latest()->get();
        $outlets = Outlet::latest()->get();

        return view('pages.transactions.edit', compact('transaction', 'customers', 'outlets'));
    }

    public function update(Request $request, $kode_transaksi)
    {
        $validator = Validator::make($request->all(), [
            'tgl_transaksi' => ['required', 'date'],
            'batas_waktu' => ['required', 'date'],
            'biaya_tambahan' => ['nullable', 'numeric'],
            'diskon' => ['nullable', 'numeric'],
            'pajak' => ['nullable', 'numeric'],
        ]);

        $outlet = Auth::user()->outlet;
        if (Auth::user()->role == 'admin') {
            $validator->addRules([
                'outlet_id' => ['required', 'exists:outlets,id'],
            ]);
            $outlet = Outlet::findOrFail($request->outlet_id);
        }

        $customer = Customer::findOrFail($request->customer_id);

        $outlet_id = $outlet->id;
        if (Auth::user()->role !== 'admin') {
            $outlet_id = Auth::user()->outlet_id;
        }

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $transaction = Transaction::where('kode_transaksi', $kode_transaksi)->firstOrFail();
        $transaction->update([
            'outlet_id' => $outlet_id,
            'customer_id' => $customer->id,
            'tgl_transaksi' => $request->tgl_transaksi,
            'batas_waktu' => $request->batas_waktu,
            'biaya_tambahan' => $request->biaya_tambahan ?? 0,
            'diskon' => $request->diskon ?? 0,
            'pajak' => $request->pajak ?? 0,
        ]);

        Alert::success('Berhasil', 'Transaksi berhasil diubah');
        return redirect()->route('transactions.detail', $transaction->kode_transaksi);
    }
}
