<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Artikel;
use App\Models\Kategori;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use RealRashid\SweetAlert\Facades\Alert;
class ArtikelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $artikel = Artikel::all();
        return view('back.artikel.index',[
            'artikel'=> $artikel,

        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $kategori = Kategori::all();
        return view('back.artikel.create', compact('kategori'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate($request, [
            'judul' => 'required|min:4',
       ]);
       $data= $request->all();
       $data['slug']= Str::slug($request->judul);
       $data['user_id']= Auth::id();
       $data['views']= 0;
       $data['gambar_artikel']= $request->file('gambar_artikel')->store('artikel');

       Artikel::create($data);

       Alert::success('Berhasil', 'Data Berhasil tersimpan');
       return redirect()->route('artikel.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $artikel= Artikel::find($id);
        $kategori = Kategori::all();

        return view('back.artikel.edit',[
            'artikel'=>$artikel,
            'kategori'=>$kategori
        ]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
    //     $this->validate($request, [
    //         'judul' => 'required|min:4',
    //    ]);

        if(empty($request->file('gambar_artikel'))){

            $artikel= Artikel::find($id);
            $artikel->update([
                'judul'=> $request->judul,
                'body'=> $request->body,
                'slug'=>Str::slug($request->judul),
                'kategori_id'=> $request->kategori_id,
                'is_active'=> $request->is_active,
                'user_id'=> Auth::id(),
                'views'=> 0,

            ]);
            Alert::info('Update', 'Data Berhasil terupdate');
            return redirect()->route('artikel.index');
        } else {
            $artikel= Artikel::find($id);
            Storage::delete($artikel->gambar_artikel);
            $artikel->update([
                'judul'=> $request->judul,
                'judul'=> $request->body,
                'slug'=>Str::slug($request->judul),
                'kategori_id'=> $request->kategori_id,
                'is_active'=> $request->is_active,
                'user_id'=> Auth::id(),
                'views'=> 0,
                'gambar_artikel'=> $request->file('gambar_artikel')->store('artikel')

            ]);

        }
        Alert::info('Update', 'Data Berhasil terupdate');

       return redirect()->route('artikel.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $artikel = Artikel::find($id);
        storage::delete($artikel->gambar_artikel);

        $artikel->delete();
        Alert::warning('Hapus', 'Data Berhasil dihapus');
        return redirect()->route('artikel.index')->with(['succes'=>'Data berhasil dihapus']);
    }
}
