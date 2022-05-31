<div class="container">

<style>        

        .kuesioner{
            margin-top : 50px;
        }

        .kuesioner a{
            margin-left : 45%;
        }

        table{
            border-collapse: collapse;
            margin-bottom : 30px;
        }

        tr{
            border-bottom: 1px solid #eef0f3;
        }

        thead td{
            font-size: 14px;
            text-transform: uppercase;
            font-weight: 600;
            background: #f9fafb;
            text-align: start;
            padding: 15px;
        }

        tbody tr td{
            padding: 10px 15px;
        }

        .tombol {
            width: 40px;
            background: #151111;
            border: none;
            color: white;
            padding : 5px 10px;
            font-size:18px;
            text-align: center;
            display: inline-block;
            cursor: pointer;
            border-radius: 10px;
            transition : 0.3s;
        }

        .add{
            width: 70px;
            margin: 10px 10px 20px;
            transition : 0.3s;
            
        }

        .tombol .add:hover {
            width: 40px;
            background: #5bacdf;
        }

        

        .f{
            width: 40px;
            margin : 3px 3px 3px 3px;
        }

        
    .kuesioner input[type=text]{
    font-size: 15px;
    width: 100%;
    padding: 12px 20px;
    border: 2px solid #ccc;
    transition: 0.5s;
    outline: none;
    background-size: 30px;
    background-position: 5px 5px;
    background-repeat: no-repeat;
    padding-left: 40px;
    border-radius: 5px;
    float : left;
    }

    .big-title{
        margin-top:50px;
    }

    .jabatan{
    margin-top:20px;
    }
    .jabatan input[type=text]{
    font-size: 15px;
    width: 50%;
    padding: 12px 20px;
    border: 2px solid #ccc;
    transition: 0.5s;
    outline: none;
    background-size: 30px;
    background-position: 5px 5px;
    background-repeat: no-repeat;
    padding-left: 40px;
    border-radius: 5px;
    float : left;
    }

    .jabatan label{
        color: #151111;
        font-size : 1.5rem;
    }

    .container form{
        width:100%;
        max-width:none;
        border-radius:5px;
        margin-top:20px
    }

</style>
<div class="big-title">
    <h1>Silahkan Beri Penilaian Anda,</h1>
    <h1>Baca Penjelasan terlebih dahulu</h1>
    <p class="text">
        Berikut Adalah Penjelasan dari Tabel Dibawah ini, dimana pilih lah salah satu dari pilihan berikut,
        terima Kasih
        <ul style="margin-left:25px">
            <li><td>SS</td><td> = Sangat Setuju</td> </li>
            <li><td>S</td><td> = Setuju</td> </li>
            <li><td>KS</td><td> = Kurang Setuju</td> </li>
            <li><td>TS</td><td> = Tidak Setuju</td> </li>
            <li><td>STS</td><td> = Sangat Tidak Setuju</td> </li>
        </ul>
    </p>
</div>
<form action="?p=kuesioner" method="post">
<div class="jabatan">
    <label for="">Jabatan : </label>
    <br>
    <br>
    <input type="text" name="jabatan" id="jabatan" autocomplete="off">
</div>

<div class="kuesioner">

<?php

include 'koneksi.php';
$sqla = mysqli_query($koneksi, "select * from responden where usernameR='$_SESSION[userR]' and passwordR='$_SESSION[passR]'");
$ra = mysqli_fetch_array($sqla);

$query = "select * from pertanyaan";
$pert = mysqli_query($koneksi, $query);

if (!$pert) {
    echo("Error description: " . $mysqli -> error);
}
?>


    
    
    
    
<table width="100%">
<thead>

    <tr>
        <td>No</td>
        <td>Code Pertanyaan</td>
        <td>Isi Pertanyaan</td>
        <td>SS</td>
        <td>S</td>
        <td>KS</td>
        <td>TS</td>
        <td>STS</td>
    </tr>
</thead>

<tbody>

<?php
    $no = 1;
    while ($p =  mysqli_fetch_array($pert)) {
?>
        <td><?php echo"$no"; ?></td>
        <td><?php echo"$p[codeP]"; ?></td>
        <td><?php echo"$p[isiP]"; ?></td>
        <td><input type="radio" name="<?php echo"nilai$p[codeP]"; ?>" id="<?php echo"nilai$p[codeP]"; ?>" value="5"></td>
        <td><input type="radio" name="<?php echo"nilai$p[codeP]"; ?>" id="<?php echo"nilai$p[codeP]"; ?>" value="4"></td>
        <td><input type="radio" name="<?php echo"nilai$p[codeP]"; ?>" id="<?php echo"nilai$p[codeP]"; ?>" value="3"></td>
        <td><input type="radio" name="<?php echo"nilai$p[codeP]"; ?>" id="<?php echo"nilai$p[codeP]"; ?>" value="2"></td>
        <td><input type="radio" name="<?php echo"nilai$p[codeP]"; ?>" id="<?php echo"nilai$p[codeP]"; ?>" value="1"></td>
</tbody>
            

<?php
$no++;
    }
?>
</table>
<input type="submit" class="tombol add" value="save" >
	</form>

</div>
</div>