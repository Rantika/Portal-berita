<?php

namespace App\Http\Controllers;
use App\Models\Kategori;
use App\Models\Artikel;
use App\Models\Slide;
use App\Models\Iklan;
use Illuminate\Http\Request;

class FrontendController extends Controller
{
    public function index(){

        $category = Kategori::all();
        $artikel = Artikel::all();
        $slide = Slide::all();
        return view('front.home',[
            'kategori'=> $category,
            'artikel' => $artikel,
            'slide' =>   $slide
        ]);
    }
    public function detail($slug){

            $artikel = Artikel:: where('slug', $slug)-> first();
            $category = Kategori::all();
            $iklanA = Iklan::where('id', '1')->first();

            $postinganTerbaru = Artikel::orderBy('created_at', 'DESC')->limit('5')->get();
            return view('front.artikel.detail-artikel',[
                'kategori'=> $category,
                'artikel' => $artikel,
                'iklanA' => $iklanA,
                'postinganTerbaru' =>$postinganTerbaru
            ]);
        }
}
