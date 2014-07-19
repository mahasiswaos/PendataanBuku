@extends('layout.bootstrap3.index')

@section('content')
<br/>
<br/>
<br/>

<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading"><i class="glyphicon glyphicon-plus"></i>Edit Penerbit</div>
        <div class="panel-body">
            <form class="form-horizontal" enctype="multipart/form-data" action="<?php echo URL::to("/penerbit/EditProses/". $kolom->id); ?>" method="post">
                
                
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nama</label>
                    <div class="col-sm-4">
                        <input type="text"value="<?php echo $kolom->nama_penerbit; ?>"  name="nama" class="form-control " placeholder="name">
                        <p style="color: red"> {{ $errors->first('name') }} </p>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">No Telp</label>
                    <div class="col-sm-4">
                        <input type="text"value="<?php echo $kolom->no_tlp; ?>"  name="no" class="form-control " placeholder="Tahun/bulan/hari">
                        <p style="color: red"> {{ $errors->first('Tanggal Berdiri') }} </p>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Sejarah Singkat</label>
                    <div class="col-sm-4">
                        <textarea type="text"value="<?php echo $kolom->sejarah; ?>"  name="sejarah" class="form-control " placeholder="Tahun/bulan/hari"><?php echo $kolom->sejarah ?></textarea>
                        <p style="color: red"> {{ $errors->first('sejarah') }} </p>
                    </div>
                </div>
            
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-4">
                        <input type="text"value="<?php echo $kolom->alamat; ?>"  name="alamat" class="form-control " placeholder="name">
                        <p style="color: red"> {{ $errors->first('Alamat') }} </p>
                    </div>
                </div>
                
                   <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Gambar</label>
                    <div class="col-sm-5">
                        <input type="file" value="<?php print URL::to($kolom->gambar); ?>" name="gambar" class="form-control">
                        <p style="color: red"> {{ $errors->first('gambar') }} </p>
                    </div>
                    <div class="col-sm-3">
                        <img src="<?php echo URL::to($kolom->gambar); ?>" width="60" height="60">
                    </div>
                </div>
               
                
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-saved"></i> Update</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop
