<?php


foreach ($test as $val){//data test di ambil dari TestController dan di ketika masuk ke view, akan di ubah menjadi variable yaitu $test
   echo  $val->id;
    echo $val->nama;
    echo $val->tanggal_lahir;
}

?>
