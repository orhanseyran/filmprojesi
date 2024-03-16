<?php

namespace App\Http\Controllers;

use App\Models\filmekle;
use App\Models\kategori;
use Illuminate\Http\Request;

class VeriEkleController extends Controller
{
    public function index(Request $request){

        $film = filmekle::query();

        if($request->get("filmara")){
            $film =  $film->where("kategori",$request->get("filmara"));
            $product = $film->where("film_adi", "like", "%" .request()->get("filmara"). "%");
        }

        $film = $film->paginate(10);


        $filmara = $request->input('filmara');

        $kategori = kategori::where("durum",1)->get();
        

        return view('ürün',compact("film","kategori","filmara"));
    }
    public function kategori(Request $request){
        $kategori = kategori::query();

        if($request->get("kategoriara")){
            $film =  $kategori->where("kategori",$request->get("kategoriara"));
        }

        $kategori = $kategori->paginate(10);


        $filmara= $request->input('kategoriara');

        return view('Kategoriler',compact("kategori","filmara"));
    }

    public function filmekle(Request $request){
        $filmekle = new filmekle();
        $filmekle->film_adi = $request->film_adi;
        $filmekle->kategori = $request->kategori;

        $filmekle->save();

        session()->flash("onay","Film Başarıyla Eklendi");

        return redirect()->back();


    }

    
    public function filmdüzenle(Request $request,$id){
        $filmekle = filmekle::find($id);
        $filmekle->film_adi = $request->film_adi;
        $filmekle->kategori = $request->kategori;

        $filmekle->update();

        session()->flash("onay","Film Başarıyla Düzenlendi");

        return redirect()->back();


    }

    public function kategoriekle(Request $request){
        $kategori = new kategori();
        $kategori->kategori = $request->kategori;
        $kategori->durum = $request->durum;

        $kategori->save();

        session()->flash("onay","Kategori Başarıyla Eklendi");

        return redirect()->back();


    }

    public function kategoridüzenle(Request $request,$id){
        $kategori = kategori::find($id);
        $kategori->kategori = $request->kategori;
        $kategori->durum = $request->durum;

        $kategori->update();

        session()->flash("onay","Kategori Başarıyla Düzenlendi");

        return redirect()->back();


    }
    public function kategoridelete(Request $request,$id){
        $kategori = kategori::find($id);
        $kategori->delete();

        session()->flash("onay","Kategori Silindi");

        return redirect()->back();


        
    }
    
    public function filmdelete(Request $request,$id){
        $filmekle = filmekle::find($id);
        $filmekle->delete();

        session()->flash("onay","Film Silindi");

        return redirect()->back();


    }
}
