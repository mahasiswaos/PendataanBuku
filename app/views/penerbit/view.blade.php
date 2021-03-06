@extends('layout.bootstrap3.index')
@section('content')

<br/>
<br/>
<br/>


<div class="panel panel-default">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-home"></i> 
        <b>Tabel Penerbit</b>
        <form class="navbar-form navbar-right" role="search" method="get" action="<?php echo URL::to('/penerbit/cari/'); ?>">
            <div class="form-group">
                <input name="pete" type="text" class="form-control" placeholder="Search">
            </div>

            <button  class="btn btn-danger" type="submit"><i class="glyphicon glyphicon-search" ></i></button>
        </form>
        
    </div>
    <div class="panel-body">
        @if (Session::has('message'))
        <div class="alert alert-info alert-dismissable">
            <button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
            {{ Session::get('message') }}
        </div>
        @endif


        <?php foreach ($penerbit as $kolom) { ?>

            <div class="row">
                <div class="col-sm-2"></div>
                <div class="col-sm-12">
                    <div class="panel panel-default">
                        <div class="panel-heading">
                            <strong>Nama Penerbit: <?php echo $kolom->nama_penerbit ?></strong>
                        </div>
                        <div class="panel-body">
                            <table> 
                                <thead>
                                <th>
                                    <img width="130" height="130" src="<?php echo URL::to($kolom['gambar']); ?>"/>  
                                    <a class="btn btn-info" href="<?php echo URL::to('/penerbit/edit/' . $kolom->id); ?>"><i class="glyphicon glyphicon-edit"></i></a>   
                                    <a  class="btn btn-danger" href="<?php echo URL::to('/penerbit/delete/' . $kolom->id); ?>"><i class="glyphicon glyphicon-trash"></i></a>
                                </th>
                                <th>

                                </th>
                                <th>
                                <div class="col-sm-12">
                                    <textarea type="text" name="alamat" class="form-control " readonly=""
                                              value="" style="width: 700px; height:130px"><?php echo $kolom->sejarah?></textarea>
                                </div>
                                </th>
                                </thead>
                            </table>

                        </div>
                        <div class="panel-heading">
                            <table>
                                <tr>
                                    <td><i class="glyphicon glyphicon-phone-alt"></i></td>
                                    <td>:  </td>
                                    <td><strong><?php echo $kolom->no_tlp ?></strong></td>
                                </tr>
                                <tr>
                                    <td><i class="glyphicon glyphicon-map-marker"></i></td> 
                                    <td>:  </td>
                                    <td><strong><?php echo $kolom->alamat ?></strong></td>
                                </tr>
                            </table>
                        </div>
                    </div>
                </div>
            </div>   





        <?php } ?>


        <ul class="pager">
            <?php echo $penerbit->links(); ?>
           
        </ul>

    </div>  


    <div class="panel-footer">
        Copyright @ 2014
    </div>

    @stop
