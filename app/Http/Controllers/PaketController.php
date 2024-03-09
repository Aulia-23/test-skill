<?php

namespace App\Http\Controllers;
use App\Models\paketmodel;
use Illuminate\Http\Request;

class PaketController extends Controller
{
        public function index()
            {
                $pakets = Paket::all();
                return view('pakets.index', compact('pakets'));
            }

            // Menampilkan formulir untuk membuat paket baru
            public function create()
            {
                return view('pakets.create');
            }

            // Menyimpan paket baru yang dibuat
            public function store(Request $request)
            {
                $request->validate([
                    'nama_paket' => 'required',
                    'harga_paket' => 'required|numeric',
                    'deskripsi' => 'required',
                ]);

                Paket::create($request->all());

                return redirect()->route('pakets.index')
                                 ->with('success', 'Paket berhasil ditambahkan.');
            }

            // Menampilkan detail sebuah paket
            public function show($id)
            {
                $paket = Paket::findOrFail($id);
                return view('pakets.show', compact('paket'));
            }

            // Menampilkan formulir untuk mengedit sebuah paket
            public function edit($id)
            {
                $paket = Paket::findOrFail($id);
                return view('pakets.edit', compact('paket'));
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
