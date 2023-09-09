<?php

namespace App\Http\Controllers;

use App\Models\Outlet;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use RealRashid\SweetAlert\Facades\Alert;

class UserController extends Controller
{
    public function index()
    {
        $users = User::latest()->get();

        confirmDelete('Hapus Pengguna', 'Apakah anda yakin ingin menghapus?');

        return view('pages.users.index', compact('users'));
    }

    public function create()
    {
        $roles = ['admin', 'owner', 'kasir'];
        $outlets = Outlet::latest()->get();

        return view('pages.users.create', compact('roles', 'outlets'));
    }

    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'outlet_id' => ['nullable', 'integer', 'exists:outlets,id'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email'],
            'password' => ['required', 'string', 'min:3'],
            'role' => ['required', 'string', 'in:admin,owner,kasir'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        User::create([
            'outlet_id' => $request->outlet_id,
            'nama' => $request->nama,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'role' => $request->role
        ]);

        Alert::success('Berhasil', 'Pengguna berhasil ditambahkan');
        return redirect()->route('users.index');
    }

    public function edit(User $user)
    {
        $roles = ['admin', 'owner', 'kasir'];
        $outlets = Outlet::latest()->get();

        return view('pages.users.edit', compact('user', 'roles', 'outlets'));
    }

    public function update(Request $request, User $user)
    {
        $validator = Validator::make($request->all(), [
            'outlet_id' => ['nullable', 'integer', 'exists:outlets,id'],
            'nama' => ['required', 'string', 'max:255'],
            'email' => ['required', 'email', 'unique:users,email,' . $user->id],
            'password' => ['nullable', 'string', 'min:3'],
            'role' => ['required', 'string', 'in:admin,owner,kasir'],
        ]);

        if ($validator->fails()) {
            Alert::error('Gagal', $validator->errors()->first());
            return redirect()->back()->withInput();
        }

        $data = [
            'outlet_id' => $request->outlet,
            'nama' => $request->nama,
            'email' => $request->email,
            'role' => $request->role
        ];

        if ($request->password) {
            $data['password'] = bcrypt($request->password);
        }

        $user->update($data);

        Alert::success('Berhasil', 'Pengguna berhasil diubah');
        return redirect()->route('users.index');
    }

    public function destroy(User $user)
    {
        if (Auth::user() == $user) {
            Alert::error('Gagal', 'Tidak dapat menghapus akun anda sendiri');
            return redirect()->back();
        }

        $user->delete();

        Alert::success('Berhasil', 'Pengguna berhasil dihapus');
        return redirect()->route('users.index');
    }
}
