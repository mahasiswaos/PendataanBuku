<?php

namespace App\Controllers;

use View;
use App\Controllers\BaseController;
use App\Controllers\AdminController;

use App\Models\Penulis;
use Validator;
use Redirect;
use Input;
use Session;


class PenulisController extends AdminController {
    
//fungsi untuk menampilkan data penulis
    public function penulisView() {
        $input = Penulis::all();
        $data = [ 'isi' => $input,
            ];
            return View::make('penulis.view', $data);
    }
    
//    fungsi untuk menambah data penulis
    public function penulisAdd() {
        $input = Penulis::all();
        $data = ['isi' => $input,
            ];
            return View::make('penulis.add', $data);
    }
    
    public function prosesAdd() {
        $aturan = [
            'id' => 'required',
            'nama_penulis' => 'required',
            'gender' => 'required',
            'tgllahir' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'biografi' => 'required',
        ];
        $validator = Validator::make(Input::all(), $aturan);
        
        if ($validator->fails()){
            return Redirect::to('/penulis/add')->withErrors($validator); ;
        }else{
            
            $isi = Input::all();
            $ket = new Penulis;
            
            $ket->id = $isi['id'];
            $ket->nama_penulis = $isi['nama_penulis'];
            $ket->gender = $isi['gender'];
            $ket->tgllahir = $isi['tgllahir'];
            $ket->status = $isi['status'];
            $ket->alamat = $isi['alamat'];
            $ket->biografi = $isi['biografi'];
            $ket->save();
            /*
             * redirect ke index bands
             */
            Session::flash('message', 'Sukses menambah data Penulis!');
            return Redirect::to('penulis/');
        }
    }
    
    public function penulisEdit($id) {
        $ket = Penulis::find($id);
        $data = [ 'isi' => $ket,
            ];
            return View::make('penulis.edit', $data);
    }
    
    public function Editproses($id) {
        $aturan = [
            'id' => 'required',
            'nama' => 'required',
            'gender' => 'required',
            'tgllahir' => 'required',
            'status' => 'required',
            'alamat' => 'required',
            'biografi' => 'required',
   
        ];
        $validator = Validator::make(Input::all(), $aturan);
        
        if ($validator->fails()){
            echo "Inputan  kurang";
            // return Redirect::to("/penulis/edit/" .$id)->withErrors($validator);
        }else{
            
            $isi = Input::all();
            $ket = Penulis::find($id);
            $ket->id = $isi['id'];
            $ket->nama_penulis = $isi['nama'];
            $ket->gender = $isi['gender'];
            $ket->tgllahir = $isi['tgllahir'];
            $ket->status = $isi['status'];
            $ket->alamat = $isi['alamat'];
            $ket->biografi = $isi['biografi'];
            $ket->save();
            /*
             * redirect ke index bands
             */
            Session::flash('message', 'Sukses menambah data Penulis!');
            return Redirect::to('penulis/');
        }
    }
    
    
    
    
    
//    public function prosesUpdate($id) {
//        // validation
//        $aturan = [ 
//            'id' => 'required',
//            'nama_penulis' => 'required',
//            'gender' => 'required',
//            'tgllahir' => 'required',
//            'status' => 'required',
//            'alamat' => 'required',
//            'biografi' => 'required',
//        ];
//
//        $validator = Validator::make(Input::all(), $aturan);
//        // jika tidak valid redirect ke halaman edit
//        if ($validator->fails()) {
//            return Redirect::to("/penulis/edit/" . $id)
//                            ->withErrors($validator);
//        } else {
//          $isi = Input::all();
//            $ket = new Penulis;
//            $ket->id = $isi['id'];
//            $ket->nama_penulis = $isi['nama_penulis'];
//            $ket->gender = $isi['gender'];
//            $ket->tgllahir = $isi['tgllahir'];
//            $ket->status = $isi['status'];
//            $ket->alamat = $isi['alamat'];
//            $ket->biografi = $isi['biografi'];
//            $ket->save();
//            /*
//             * redirect ke index bands
//             */
//            Session::flash('message', 'Sukses Update data Penulis!');
//            return Redirect::to('penulis/');
//        }
//    }
    
    public function PenulisDelete($id) {
        $user = Penulis::find($id);
        $user->delete();
        Session::flash('message', 'Sukses menghapus data Penulis!');
        return Redirect::to('/penulis');
    }
}
