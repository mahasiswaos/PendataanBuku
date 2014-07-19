<?php

namespace App\Controllers;

use App\Models\Buku;
use App\Models\Penerbit;
use App\Models\Penulis;
use App\Controllers\BaseController;
use App\Controllers\AdminController;
use Illuminate\Support\Facades\View;
use Input;
use Validator;
use Illuminate\Support\Facades\Redirect;
use Session;

class BukuController extends AdminController {

  public  function view() {
        $a = Buku::paginate(5);
        $data = array(
            'buku' => $a,
          
        );
     
        return View::make('buku.view', $data);
    }

  public  function add() {

        $penulis = Penulis::all();
        $penerbit = Penerbit::all();

        $data = array(
            'penulis' => $penulis, // agar id pada tabel penulis bisa di munculkan di form
            'penerbit' => $penerbit, // agar id pada tabel penerbit bisa di munculkan di form
        );

        return View::make('buku.add', $data);
    }

    function addProses() {
        $input = Input::all();
        $rules = array(
            'judul_buku' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'penerbit_id' => 'required',
            'penulis_id' => 'required',
            'image' => 'image|max:2000|mimes:jpg,jpeg,png'
            );
 
        $validasi = Validator::make($input, $rules);
        if($validasi->fails()){
           return Redirect::to('/buku/add')->withErrors($validasi);
        }else{
            $file = Input::file('gambar');
            $prefixDest = 'public/';
            $destinationPath = 'images';
            $filename = $file->getClientOriginalName();
            $pathFile = $prefixDest . $destinationPath;
            $pathDb = $destinationPath . '/' . $filename;

            //eksekusi penyimpanan file yang di upload
            //menuju folder public
            Input::file('gambar')->move($pathFile, $filename);
            
            
            $tBuku = new Buku();
            $tBuku->judul_buku = $input['judul_buku'];
            $tBuku->kategori = $input['kategori'];
            $tBuku->deskripsi = $input['deskripsi'];
            $tBuku->harga = $input['harga'];
            $tBuku->penulis_id = $input['penulis_id'];
            $tBuku->penerbit_id = $input['penerbit_id'];
            $tBuku->gambar = $pathDb ;
            $tBuku->save() ;
            
            Session::flash('message', 'Successfully created band!');
            return Redirect::to('/buku');

        }
    }
    
      function Prosesedit() {
        $input = Input::all();
        $rules = array(
            'judul_buku' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'penerbit_id' => 'required',
            'penulis_id' => 'required',
            'image' => 'image|max:2000|mimes:jpg,jpeg,png'
            );
 
        $validasi = Validator::make($input, $rules);
        if($validasi->fails()){
           return Redirect::to('/buku/edit'.$id)->withErrors($validasi);
        }else{
            $file = Input::file('gambar');
            $prefixDest = 'public/';
            $destinationPath = 'images';
            $filename = $file->getClientOriginalName();
            $pathFile = $prefixDest . $destinationPath;
            $pathDb = $destinationPath . '/' . $filename;

            //eksekusi penyimpanan file yang di upload
            //menuju folder public
            Input::file('gambar')->move($pathFile, $filename);
            
            
            $tBuku = new Buku();
            $tBuku->judul_buku = $input['judul_buku'];
            $tBuku->kategori = $input['kategori'];
            $tBuku->deskripsi = $input['deskripsi'];
            $tBuku->harga = $input['harga'];
            $tBuku->penulis_id = $input['penulis_id'];
            $tBuku->penerbit_id = $input['penerbit_id'];
            $tBuku->gambar = $pathDb ;
            $tBuku->save() ;
            
            Session::flash('message', 'Successfully created band!');
            return Redirect::to('/buku');

        }
    }

    function edit($id) {

        $tBuku = Buku::find($id);
        $penulis = Penulis::all();
        $penerbit = Penerbit::all();
        $data = array(
            'buku' => $tBuku,
            'penulis' => $penulis,
            'penerbit' => $penerbit,
        );
        
       
        return View::make('buku.edit', $data);
    }

    function editProses($id) {
        $rules = array(
            'judul_buku' => 'required',
            'kategori' => 'required',
            'deskripsi' => 'required',
            'harga' => 'required',
            'penulis_id' => 'required',
            'penerbit_id' => 'required',
            'gambar' => 'required|max:2000|mimes:jpg,jpeg,png',
            );
 
       $validasi = Validator::make(Input::All(), $rules);
       if($validasi->fails()){
            return Redirect::to('/buku/edit/'.$id)->withErrors($validasi);
        } else {
            
            
            $file = Input::file('gambar');
            $prefixDest = 'public/';
            $destinationPath = 'images';
            $filename = $file->getClientOriginalName();
            $pathFile = $prefixDest . $destinationPath;
            $pathDb = $destinationPath . '/' . $filename;

            //eksekusi penyimpanan file yang di upload
            //menuju folder public
            Input::file('gambar')->move($pathFile, $filename);
            
        
            $in=Input::all();
            $database = Buku::find($id);
            
            $database ->judul_buku = $in['judul_buku'];
            $database ->kategori = $in['kategori'];
            $database ->deskripsi = $in['deskripsi'];
            $database ->harga = $in['harga'];
            $database ->penulis_id = $in['penulis_id'];
            $database ->penerbit_id = $in['penerbit_id'];
            $database ->gambar = $pathDb ;
            $database ->save() ;
            
            Session::flash('message', 'Successfully created band!');
            return Redirect::to('/buku');

        
        }
    
       }

    public function delete($id) {

        $Buku = Buku::find($id); //find fungsinya mencari ID pada tabel
        $file=  public_path().'/'.$Buku->gambar;
        unlink($file);
        $Buku->delete();
        Session::flash('message', 'Data Berhasil Di Hapus');
        return Redirect::to('/buku');
    }

}
