@extends('layout.bootstrap3.index')

@section('content')





<div class="container" style="margin-top: 70px; width: 1130px;">



    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-home"></i> 
            <b>Add Buku</b>
        </div>
        <div class="panel-body">
                        
                       
           <form class="form-horizontal"  enctype="multipart/form-data" method="POST" action="<?php echo URL::to("/buku/add/proses"); ?>">
            
                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Judul Buku</label>
                        <div class="col-sm-3">
                            <input type="text" name="judul_buku" class="form-control">
                        </div>
                        &nbsp;<a style="color: red"> {{ $errors->first('judul_buku') }}</a>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Kategori</label>
                        <div class="col-sm-3">
                            <input type="text" name="kategori" class="form-control " style="width: 100px;">   
                        </div>
                        &nbsp;<a style="color: red"> {{ $errors->first('kategori') }}</a>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Deskripsi</label>
                        <div class="col-sm-3">
                            <textarea  name="deskripsi" class="form-control" rows="3" style="width: 220px;"></textarea>     
                        </div>
                        &nbsp;<a style="color: red"> {{ $errors->first('deskripsi') }}</a>
                    </div>

                    <div class="form-group">
                        <label  class="col-sm-3 control-label">Harga</label>
                        <div class="col-sm-3">
                            <input type="number" name="harga" class="form-control " style="width:100px;">    
                        </div>
                        &nbsp;<a style="color: red"> {{ $errors->first('harga') }}</a>
                    </div>



                    <div class='form-group'>
                        <label  class="col-sm-3 control-label">Nama Penulis</label>
                        <div class="col-sm-3">
                            <select name="penulis_id" class="form-control" style="width: 150px;">
                                <option value="">Choose..</option>

                                <?php foreach ($penulis as $data) { ?>
                                    <option value="<?php echo $data->id; ?>"><?php echo $data->nama_penulis; ?></option> 
                                <?php } ?>

                            </select>
                        </div>
                        &nbsp;<a style="color: red"> {{ $errors->first('penulis_id') }}</a>
                    </div>

                    <div class='form-group'>
                        <label  class="col-sm-3 control-label">Nama Penerbit</label>
                        <div class="col-sm-3">
                            <select name="penerbit_id" class="form-control"  style="width: 150px;">
                                <option value="">Choose..</option>

                                <?php foreach ($penerbit as $data) { ?>
                                    <option value="<?php echo $data->id;?>"><?php echo $data->nama_penerbit; ?></option>                                 
                                <?php } ?>

                            </select>
                        </div>
                        &nbsp;<a style="color: red"> {{ $errors->first('penerbit_id') }}</a>
                    </div>


                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Gambar</label>
                    <div class="col-sm-5">
                        <input type="file" name="gambar" class="form-control" placeholder="gambar">
                        <p style="color: red"> {{ $errors->first('gambar') }} </p>
                    </div>
                </div>
                    <div class='form-group'>

                        <button type="submit" name="submit" class="btn btn-primary" style="margin-left: 300px;"><i class="glyphicon glyphicon-save">Simpan</i></button>

                    </div>

           </form>
                       

            </div>
        </div>
</div>


@stop