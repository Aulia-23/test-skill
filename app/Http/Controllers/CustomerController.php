<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CustomerController extends Controller
{
    public function index()
                {
                    $customers = Customer::all();
                    return view('customers.index', compact('customers'));
                }

                // Menampilkan formulir untuk membuat paket baru
                public function create()
                {
                    return view('customers.create');
                }

                // Menyimpan paket baru yang dibuat
                public function store(Request $request)
                {
                    $request->validate([
                        'nama_customer' => 'required',
                        'alamat' => 'required',
                        'no_telp' => 'required',
                        'id_paket' => 'required',
                        'role' => 'required',,
                    ]);


                    return redirect()->route('customer.index')
                                     ->with('success', 'Customer berhasil ditambahkan.');
                }

                // Menampilkan detail sebuah paket
                public function show($id)
                {
                    $customer = Customer::findOrFail($id);
                    return view('customers.show', compact('customer'));
                }

                // Menampilkan formulir untuk mengedit sebuah paket
                public function edit($id)
                {
                    $customer = Customer::findOrFail($id);
                    return view('customers.edit', compact('customer'));
                }

                // Menyimpan perubahan yang dibuat pada sebuah paket
                public function update(Request $request, $id)
                {
                    $request->validate([
                        'nama_paket' => 'required',
                        'harga_paket' => 'required|numeric',
                        'deskripsi' => 'required',
                    ]);

                    $paket = Paket::findOrFail($id);
                    $paket->update($request->all());

                    return redirect()->route('pakets.index')
                                     ->with('success', 'Paket berhasil diperbarui.');
                }

                // Menghapus sebuah paket
                public function destroy($id)
                {
                    $paket = Paket::findOrFail($id);
                    $paket->delete();

                    return redirect()->route('pakets.index')
                                     ->with('success', 'Paket berhasil dihapus.');
                }
}
