@extends('layout.bootstrap3.index')

@section('content')
<br/>
<br/>
<br/>


<div class="col-sm-8">
    <div class="panel panel-default">
        <div class="panel-heading"><i class="glyphicon glyphicon-plus"></i> Form Add Penulis</div>
        <div class="panel-body">
            <form class="form-horizontal" action="<?php echo URL::to("/penulis/proses_add"); ?>" method="post">
                <div class="form-group">
                    <label class="col-sm-3 control-label">ID Penulis</label>
                    <div class="col-sm-4">
                        <input type="text" name="id" class="form-control " placeholder="ID Buku">
                        <p style="color: red"> {{ $errors->first('id') }} </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Nama Penulis</label>
                    <div class="col-sm-4">
                        <input type="text" name="nama_penulis" class="form-control " placeholder="Nama Penulis">
                        <p style="color: red"> {{ $errors->first('nama_penulis') }} </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Jenis Kelamin</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="gender">
                            <option value="" disabled="" selected="">Pilih Gender...!</option>
                            <option value="Pria">Pria</option>
                            <option value="Wanita">Wanita</option>
                        </select>
                        <p style="color: red"> {{ $errors->first('gender') }} </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Tanggal Lahir</label>
                    <div class="col-sm-3">
                        <input type="date" name="tgllahir" class="form-control" placeholder="31/01/2000">
                        <p style="color: red"> {{ $errors->first('Tanggal lahir') }} </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Status Pernikahan</label>
                    <div class="col-sm-3">
                        <select class="form-control" name="status">
                            <option disabled="" selected>Pilih Status...!</option>
                            <option value="Lajang">Lajang</option>
                            <option value="Menikah">Menikah</option>
                        </select>
                        <p style="color: red"> {{ $errors->first('status') }} </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Alamat</label>
                    <div class="col-sm-5">
                        <input type="text" name="alamat" class="form-control" placeholder="Alamat">
                        <p style="color: red"> {{ $errors->first('alamat') }} </p>
                    </div>
                </div>
                <div class="form-group">
                    <label for="inputEmail3" class="col-sm-3 control-label">Biografi</label>
                    <div class="col-sm-5">
                        <textarea type="text" name="biografi" class="form-control" rows="4">
                        </textarea>
                        <p style="color: red"> {{ $errors->first('biografi') }} </p> 
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-3 col-sm-10">
                        <button type="submit" class="btn btn-info"><i class="glyphicon glyphicon-saved"></i> Save</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@stop