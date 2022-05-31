
<?php   
            include "koneksi.php";
            $jabatan = $_POST["jabatan"];

            $sqla = mysqli_query($koneksi, "select * from responden where usernameR='$_SESSION[userR]' and passwordR='$_SESSION[passR]'");
            $ra = mysqli_fetch_array($sqla);
            $nama = "$ra[namaResponden]";
            $email = "$ra[email]";


$cek_nama = mysqli_num_rows(mysqli_query($koneksi,"SELECT * FROM hasil WHERE namaReponden='$nama'"));
if ($cek_nama > 0){
echo "<script>window.alert('Anda Sudah Pernah Memberikan Penilaian, Terimakasih !!')</script>";
echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=home'>";
}else {

            $query = "select * from pertanyaan";
            $pert = mysqli_query($koneksi, $query);
            $num = mysqli_num_rows($pert);
            if (!$pert) {
                echo("Error description: " . $mysqli -> error);
            }
            $no = 1;
            while ($p =  mysqli_fetch_array($pert)) {
                $code = $p["codeP"];

                   if ($no == 1) {
                       $ai2_1 = $_POST["nilai".$code];
                   }elseif ($no == 2) {
                        $ai2_2 = $_POST["nilai".$code];
                        echo "nilai2 = $ai2_2";
                   }elseif ($no == 3) {
                        $ai2_3 = $_POST["nilai".$code];
                    }elseif ($no == 4) {
                        $ai2_4 = $_POST["nilai".$code];
                        echo "nilai4 = $ai2_4";
                    }elseif ($no == 5) {
                        $ai2_5 = $_POST["nilai".$code];
                    }elseif ($no == 6) {
                        $ai2_6 = $_POST["nilai".$code];
                    }elseif ($no == 7) {
                        $ai2_7 = $_POST["nilai".$code];
                    }elseif ($no == 8) {
                        $ai2_8 = $_POST["nilai".$code];
                    }elseif ($no == 9) {
                        $ai2_9 = $_POST["nilai".$code];
                    }elseif ($no == 10) {
                        $ai2_10 = $_POST["nilai".$code];
                    }elseif ($no == 11) {
                        $ai2_11 = $_POST["nilai".$code];
                    }elseif ($no == 12) {
                        $ai2_12 = $_POST["nilai".$code];
                    }elseif ($no == 13) {
                        $ai2_13 = $_POST["nilai".$code];
                    }elseif ($no == 14) {
                        $ai2_14 = $_POST["nilai".$code];
                    }elseif ($no == 15) {
                        $ai2_15 = $_POST["nilai".$code];
                    }elseif ($no == 16) {
                        $ai2_16 = $_POST["nilai".$code];
                    }
                $no++;
            }

            
                $quey1 = "insert into hasil values ('','$nama','$jabatan','$email','$ai2_1','$ai2_2',
                '$ai2_3','$ai2_4','$ai2_5','$ai2_6','$ai2_7','$ai2_8','$ai2_9','$ai2_10','$ai2_11','$ai2_12',
                '$ai2_13','$ai2_14','$ai2_15','$ai2_16', NOW())";

                $kuesioner = mysqli_query($koneksi, $quey1);

                if (!$kuesioner) {
                    echo("Error description: " . $mysqli -> error);
                }else{
                    echo"<script>alert('Terima Kasih Sudah Memilih');</script>";
                    echo "<META HTTP-EQUIV='Refresh' Content='1; URL=?page=home'>";
                }

    }
        
?>

