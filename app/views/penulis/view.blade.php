@extends('layout.bootstrap3.index')

@section('content')


<br/>
<br/>
<br/>

<div class="panel panel-default">
    <div class="panel-heading">
        <i class="glyphicon glyphicon-home"></i> 
        <b>Tabel Penulis</b>
        <form class="navbar-form navbar-right" role="search" method="POST" action="<?php echo URL::to('/penerbit/cari/'); ?>">
            <div class="form-group">
                <input name="cari" type="text" class="form-control" placeholder="Search">
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

        <div class="panel panel-default">
            <!-- Default panel contents -->
            <div class="panel-heading"><i class="glyphicon glyphicon-list-alt"></i>Penulis</div>

            <!-- Table -->
            <div class="table-bordered">
                <table class="table">
                    <tr class="panel-default">
                        <th>Id</th>
                        <th>Nama</th>
                        <th>Gender</th>
                        <th>Tanggal Lahir</th>
                        <th>Status</th>
                        <th>Alamat</th>
                        <th>Biografi</th>
                        <th>Action</th>
                    </tr>
                    <?php
                    $i = 1;
                    foreach ($isi as $value) {
                        ?>
                        <tr>
                            <td><?php echo $value['id']; ?></td>
                            <td><?php echo $value['nama_penulis']; ?></td>
                            <td><?php echo $value['gender']; ?></td>
                            <td><?php echo $value['tgllahir']; ?></td>
                            <td><?php echo $value['status']; ?></td>
                            <td><?php echo $value['alamat']; ?></td>
                            <td><?php echo $value['Biografi']; ?></td>
                            <td>
                                <div class="btn btn-group">
                                    <a class="btn btn-small btn-danger" title="Delete" href="{{ URL::to('/penulis/delete/' . $value->id) }}"><span class="glyphicon glyphicon-trash"></span> </a>
                                    <a class="btn btn-small btn-primary" title="Update" href="{{ URL::to('/penulis/edit/' . $value->id) }}"><span class=" glyphicon glyphicon-edit"></span> </a>
                                </div>

                            </td>
                        </tr>
                        <?php
                        $i++;
                    }
                    ?>
                </table>


            </div>
        </div>

    </div>
    @stop