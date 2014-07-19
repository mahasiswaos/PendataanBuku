@extends('layout.bootstrap3.index')

@section('content')



<div class="container" style="margin-top: 70px; width: 1130px;">

   
    <div class="panel panel-default">
        <div class="panel-heading">
            <i class="glyphicon glyphicon-home"></i> 
            <b>Tabel Buku</b>
        </div>
        <div class="panel-body">
            
            
            
            
            @if (Session::has('message'))
            <div class="alert alert-info alert-dismissable">
                <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
                {{ Session::get('message') }}
            </div>
            @endif

            <div class="row">
                
                <?php 
          
                foreach ($buku as $isi) {;?>


                    <div class="col-sm-5 col-md-3">
                        <div class="thumbnail">
                            <img src="<?php echo URL::to($isi['gambar']); ?>" style="width: 150px; height: 190px; margin-bottom:-10px;" data-src="holder.js/300x200" alt="300x200">
                          
                            <div class="text" style="margin-left:0px; text-align:center;">
                                <h4><?php echo $isi->judul_buku ?></h4>
                                Penulis  : <?php echo $isi->penulis->nama_penulis ?><br/>
                                Penerbit : <?php echo $isi->penerbit->nama_penerbit ?><br/>
                                Price : <b>Rp. <?php echo $isi->harga ?>.</b>,00<br/>
                                <a class="btn btn-link">Detail . .</a><br/>

                                <a href="<?php echo URL::to('/buku/edit/' . $isi->id) ?>"><button class="btn btn-info"><i class="glyphicon glyphicon-pencil">Edit</i></button></a>
                                <a href="<?php echo URL::to('/buku/delete/' . $isi->id) ?>"><button class="btn btn-danger"><i class="glyphicon glyphicon-trash">Delete</i></button></a>
                            </div>
                        </div>
                    </div>
                  
                <?php   } ?>


            </div>
                <div class="pagination" style="margin-left: 330px; margin-top: -20px; margin-bottom: -10px;"> <?php echo $buku->links() ?></div> 
            </div>
          
        </div>
    </div>
    <div class="panel-footer">
        Copyright @ 2014
    </div>
</div>


@stop