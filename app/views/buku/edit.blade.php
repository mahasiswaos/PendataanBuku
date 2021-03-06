@extends('layout.bootstrap3.index')

@section('content')



<div class="container" style="margin-top: 70px; width: 1130px;">
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-home"></i> 
            <b> Buku</b>
        </div>
        <div class="panel-body">

            <form class="form-horizontal" enctype="multipart/form-data" method="POST" action="<?php echo URL::to("/buku/edit/proses/" . $buku->id); ?>">

                <div class='form-group' >
                    <input type="hidden" name="id" value="<?php echo $buku->id; ?>">
                    <label  class="col-sm-3 control-label">Judul Buku</label>
                    <div class="col-sm-3">
                        <input type='text' name="judul_buku" class="form-control" value="<?php echo $buku->judul_buku ?>" style="width: 200px;">

                    </div>
                    &nbsp;<a style="color: red"> {{ $errors->first('judul_buku') }}</a>
                </div>

                <div class='form-group'>
                    <label  class="col-sm-3 control-label">Kategori</label>
                    <div class="col-sm-3">
                        <input type='text' name="kategori" class="form-control" value="<?php echo $buku->kategori ?>" style="width: 150px;">

                    </div>
                    &nbsp;<a style="color: red"> {{ $errors->first('kategori') }}</a>
                </div>

                <div class='form-group'>
                    <label  class="col-sm-3 control-label">Deskripsi</label>
                    <div class="col-sm-3">
                        <textarea rows="3"  name="deskripsi" class="form-control" style="width: 300px;"><?php echo $buku->deskripsi ?></textarea>

                    </div>
                    &nbsp;<a style="color: red"> {{ $errors->first('deskripsi') }}</a>
                </div>


                <div class="form-group">
                    <label  class="col-sm-3 control-label">Harga</label>
                    <div class="col-sm-3">
                        <input type='number' name="harga" class="form-control" value="<?php echo $buku->harga ?>" style="width: 100px;">

                    </div>
                    &nbsp;<a style="color: red"> {{ $errors->first('harga') }}</a>
                </div>

                <div class='form-group'>
                    <label  class="col-sm-3 control-label">Nama Penulis</label>
                    <div class="col-sm-3">
                        <select name="penulis_id" style="width: 150px;">

                            <option value="">Choose..</option>

                            <?php foreach ($penulis as $data) { ?>

                                <option value="<?php echo $data->id; ?>"<?php
                                if (!empty($data->id)) {
                                    echo "selected";
                                }
                                ?>><?php echo $data->nama_penulis; ?></option>    

                            <?php } ?>

                        </select>

                    </div>
                    &nbsp;<a style="color: red"> {{ $errors->first('penulis_id') }}</a>
                </div>

                <div class='form-group'>
                    <label class="col-sm-3 control-label">Nama Penerbit</label>
                    <div class="col-sm-3">
                        <select name="penerbit_id"  style="width: 150px;">
                            <option value="">Choose..</option>
                            <?php foreach ($penerbit as $data) { ?>
                                <option value="<?php echo $data->id; ?>"<?php
                                if (!empty($data->id)) {
                                    echo "selected";
                                }
                                ?>><?php echo $data->nama_penerbit; ?></option>                                 
                                    <?php } ?>

                        </select>

                    </div>
                    &nbsp;<a style="color: red"> {{ $errors->first('penerbit_id') }}</a>
                </div>


                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Gambar</label>
                    <div class="col-sm-5">
                        <input type="file" value="<?php print URL::to($buku->gambar); ?>" name="gambar" class="form-control">
                        <p style="color: red"> {{ $errors->first('gambar') }} </p>
                    </div>
                    <div class="col-sm-3">
                        <img src="<?php echo URL::to($buku->gambar); ?>" width="60" height="60">
                    </div>
                </div>





                <div class='form-group'>
                    <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 300px;"><i class="glyphicon glyphicon-save">Simpan</i></button>

                </div>

            </form>

            @stop