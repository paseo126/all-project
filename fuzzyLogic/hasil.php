<style>
    .ips{
        border-radius : 10px;
        background-color : #bce2faf3;
        overflow : auto;
    }

    .kepala{
        height : 50px;
        text-align : center;
    }

    hr{
        margin-bottom : 20px;
    }
    .data-diri{
        display : flex;
        justify-content:space-between;
        margin-bottom : 20px;
    }
    .data-diri h3{
        font-weight : 700;
        margin-bottom : 15px;
    }
    .nilai{
        margin-bottom : 20px;
    }

    .isi-nilai{
        display : flex;
        justify-content : space-between;
    }
    .nilai h3{
        font-weight : 700;
        margin-bottom : 15px;
    }

    .nilai table{
        width : 100%;
    }
    .gambar img{
        width : 250px;
        margin-right : -33px;
    }

    .n{
        border : 1px solid #151111;
        border-radius : 5px;
        margin-left : -15px;
        width : 50%;
        padding : 5px 5px 5px 5px;
    }

    .w{
        border : 1px solid #151111;
        border-radius : 5px;
        margin-right : -15px;
        width : 50%;
        padding : 5px 5px 5px 5px;
    }

    .hasil{
        display :flex;
        justify-content : space-between;
    }

    .hp{
        text-align : center;
        width : 32%;
        border : 1px solid #151111;
        border-radius : 5px;
        margin-left : -15px;
        padding : 8px 8px 22px 8px;
    }

    .hp h1{
        font-size : 3rem;
    }

    .rekomendasi{
        width : 70%;
        border : 1px solid #151111;
        border-radius : 5px;
        margin-right : -15px;
        padding : 8px 8px 5px 8px;
    }
    
</style>

<?php 
    include "koneksi.php";
    $sqlb = mysqli_query($koneksi, "select * from user where username='$_SESSION[userR]' and password='$_SESSION[passR]'");
    $rb = mysqli_fetch_array($sqlb);
    $namaLengkapb = "$rb[namaLengkap]";

    $sqlh = mysqli_query($koneksi, "select * from hasil where namaLengkap='$namaLengkapb'");
    $rh = mysqli_fetch_array($sqlh);
    
    $jurusanh = isset($rh['jurusan']) ?? 0 === count($rh['jurusan']) ;

    if ($jurusanh == "IPS") {
        include "hasilIPS.php";
        echo "ips";
    }elseif ($jurusanh == "IPA") {
        include "hasilIPA.php";
        echo "ipa";
    }else if($jurusanh == 0){
        echo "<h3> Anda Belum Melakukan Penilaian,<br> Silahkan Melakukan Penilaian </h3><br>";
?>
        <br><a style="margin : 5px" href="?page=penilaianIPA" class="btn">get Start</a>
<?php
    }

?>