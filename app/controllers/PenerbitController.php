<?php

namespace App\Controllers;

use App\Controllers\AdminController;
use App\Models\Penerbit;
use View;
use Validator;
use Input;
use Session;
use Redirect;

class PenerbitController extends AdminController {

    public function view() {


        $a = Penerbit::paginate(5);
        $data = array(
            'penerbit' => $a,
        );
        return View::make('penerbit.view', $data);
    }

    public function Add() {
        return View::make('penerbit.add');
    }

    public function AddProses() {
        $aturan = [

            'nama' => 'Required',
            'no' => 'Required',
            'alamat' => 'Required',
            'sejarah' => 'Required',
            'gambar' => 'required|max:2000|mimes:jpg,jpeg,png',
        ];

        $validator = Validator::make(Input::All(), $aturan);
        if ($validator->fails()) {
            return Redirect::to('/penerbit/add')->withErrors($validator);
        } else {
            $filegambar = Input::file('gambar');
            $facuan = 'public/';
            $ftujuan = 'images';
            $filename = $filegambar->getClientOriginalName();
            $path = $facuan . $ftujuan;
            $pathDb = $ftujuan . '/' . $filename; //digunakan untuk mengisi di Db
            $filegambar->move($path, $filename);

            $input = Input::all();
            $kolom = new Penerbit;
            $kolom->nama_penerbit = $input['nama'];
            $kolom->gambar = $pathDb;
            $kolom->no_tlp = $input['no'];
            $kolom->alamat = $input['alamat'];
            $kolom->sejarah = $input['sejarah'];
            $kolom->save();


            /*
             * redirect ke index bands
             */
            Session::flash('message', 'Successfully created band!');
            return Redirect::to('penerbit/');
        }
    }

    public function Delete($id) {
        $kolom = Penerbit::find($id);
        $filegambar = public_path() . '/' . $kolom->gambar;
        unlink($filegambar);
        $kolom->delete();
        Session::flash('message', 'Data Berhasil Di Hapus');
        return Redirect::to('/penerbit');
    }

    public function cari() {
        $input = Input::all();
        print_r($input);
    }

    public function Edit($id_penerbit) {
        $ket = Penerbit::find($id_penerbit);
        $data = [
            'kolom' => $ket,
        ];

        return View::make('penerbit.edit', $data);
    }

    public function EditProses($id) {
        $rules = [
            'nama' => 'Required',
            'no' => 'Required',
            'alamat' => 'Required',
            'sejarah' => 'Required',
            'gambar' => 'Required|max:2000|mimes:jpg,jpeg,png',
        ];

        $validator = Validator::make(Input::all(), $rules);
        // jika tidak valid redirect ke halaman edit
        if ($validator->fails()) {
            return Redirect::to("/penerbit/edit/" . $id)
                            ->withErrors($validator);
        } else {

            $file = Input::file('gambar');
            $acuan = 'public/';
            $ftujuan = 'images';
            $filename = $file->getClientOriginalName();
            $pathFile = $acuan . $ftujuan;
            $pathDb = $ftujuan . '/' . $filename;

            //eksekusi penyimpanan file yang di upload
            //menuju folder public
            $file->move($pathFile, $filename);

            // jika valid disimpan
            $in = Input::all();
            $database = Penerbit::find($id);

            $database->nama_penerbit = $in['nama'];
            $database->no_tlp = $in['no'];
            $database->alamat = $in['alamat'];
            $database->sejarah = $in['sejarah'];
            $database->gambar = $pathDb;
            $database->update();
            // redirect ke halaman band index
            Session::flash('message', 'Successfully updated Users!');
            return Redirect::to('penerbit/');
        }
    }

}
