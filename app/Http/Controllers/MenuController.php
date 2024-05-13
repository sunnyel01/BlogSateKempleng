<?php

namespace App\Http\Controllers;

use App\Models\Menu;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class MenuController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $menus = Menu::all();
        return view('menu.index', ['menus' => $menus]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $kategoris = \App\Models\Kategori::all();
        return view('menu.create', [
        'kategoris' => $kategoris
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'id_kategori' =>'required|integer',
            'gambar'     => 'required|image|mimes:jpeg,jpg,png|max:2048',
            'nama_menu'     => 'required|min:5',
            'harga'     => 'required|integer|min:3',
            'deskripsi'   => 'required|min:10'
        ]);
    
        //upload image
        $gambar = $request->file('gambar');
        $gambar->storeAs('public/menus', $gambar->hashName());
    
        //create artikel
        Menu::create([
            'id_kategori' => $request->id_kategori,
            'gambar'     => $gambar->hashName(),
            'nama_menu'     => $request->nama_menu,
            'harga'     => $request->harga,
            'deskripsi'   => $request->deskripsi
        ]);
    
        //redirect to index
        return redirect(route('daftarMenu'))->with('success', 'Data Berhasil Disimpan');
    }

    /**
     * Display the specified resource.
     */
    public function show(Menu $menu)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        $kategoris = \App\Models\Kategori::all();
        $menu= Menu::findOrFail($id); 
        return view('menu.edit', [
            'menu' => $menu,
            'kategoris' => $kategoris
        ]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {
        $this->validate($request, [
            'id_kategori' =>'required|integer',
            'gambar'     => 'image|mimes:jpeg,jpg,png|max:2048',
            'nama_menu'     => 'required|min:5',
            'harga'     => 'required|integer|min:3',
            'deskripsi'   => 'required|min:10'
        ]);
    
        //untuk mengambil ID Artikel
        $menu = Menu::findOrFail($id);
    
        //Cek apabila gambar akan di upload
        if ($request->hasFile('gambar')) {
    
            //upload gambar baru
            $gambar = $request->file('gambar');
            $gambar->storeAs('public/menus', $gambar->hashName());
    
            //hapus gambar lama
            Storage::delete('public/menus/' . $menu->gambar);
    
            //update artikel dengan gambar baru
            $menu->update([
                'id_kategori' => $request->id_kategori,
                'gambar'     => $gambar->hashName(),
                'nama_menu'     => $request->nama_menu,
                'harga'     => $request->harga,
                'deskripsi'   => $request->deskripsi
            ]);
    
        } else {
    
            //update artikel tanpa gambar
            $menu->update([
                'id_kategori' => $request->id_kategori,
                'nama_menu'   => $request->nama_menu,
                'harga'       => $request->harga,
                'deskripsi'   => $request->deskripsi
            ]);
        
        }
    
        //mengarahkan ke halaman index artikel
        return redirect(route('daftarMenu'))->with('success', 'Data Berhasil Diupdate');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $menu = Menu::findOrFail($id);

        Storage::delete('public/menus/'. $menu->gambar);

        $menu->delete();
        return redirect(route('daftarMenu'))->with('success', 'Data Berhasil Di Hapus');
    }
}
