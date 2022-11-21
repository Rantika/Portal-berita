<?php

namespace App\Http\Controllers;
use App\Models\Materi;
use App\Models\Playlist;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use RealRashid\SweetAlert\Facades\Alert;

class MateriController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $materi = Materi::all();
        return view('back.materi.index', compact('materi'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $playlist = Playlist::all();
        return view('back.materi.create', compact('playlist'));
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
            'judul_materi' => 'required|min:4',
       ]);
       $data= $request->all();
       $data['slug']= Str::slug($request->judul_materi);
       $data['gambar_materi']= $request->file('gambar_materi')->store('materi');

       Materi::create($data);
       return redirect()->route('materi.index')->with(['succes'=>'Data berhasil tersimpan']);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $materi = Materi::find($id);
        $playlist = Playlist::all();

        return view('back.materi.edit', compact('materi', 'playlist'));
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
        $this->validate($request,[
            'judul_materi'=> 'required:min:4',
        ]);

        if(!empty($request->file('gambar_materi'))){
            $data = $request->all();
            $data['slug']= Str::slug($request->judul_materi);
            $data['gambar_materi']= $request->file('gambar_materi')->store('materi');

            $materi =Materi::findOrFail($id);
            Storage::delete($materi->gambar_materi);

            $materi->update($data);
            return redirect()->route('materi.index')->with('succes','Berhasil Update Materi');
        }else{
            $data = $request->all();
            $data['slug']= Str::slug($request->judul_materi);


            $materi =Materi::findOrFail($id);
            $materi->update($data);
            return redirect()->route('materi.index')->with('succes','Berhasil Update Materi');
        }

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $materi = Materi::find($id);
        storage::delete($materi->gambar_materi);

        $materi->delete();
        Alert::warning('Hapus', 'Data Berhasil dihapus');
        return redirect()->route('materi.index');
    }
}
