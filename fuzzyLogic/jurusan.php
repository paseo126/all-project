<style>
    
    table{
        border-collapse: collapse;
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
    .board{
        background : #fff;
        width : 100%;
        margin-top : 50px;
    }


</style>

<?php
    $query = "select * from jurusan order by namaKampus ASC";
    $jurusan = mysqli_query($koneksi, $query);

    if (!$jurusan) {
    echo("Error description: " . $mysqli -> error);
    }
?>
<div class="board">
<table width="100%">
    <thead>
        <tr>
            <td>No</td>
            <td>Nama Kampus</td>
            <td>Jurusan Kuliah</td>
            <td>Jurusan Sekolah</td>
            <td>Nilai Standard</td>
        </tr>
    </thead>

    <?php
        $no = 1;
        while ($jr =  mysqli_fetch_array($jurusan)) {
    ?>
        <tbody>
            <td><?php echo"$no"; ?></td>
            <td><?php echo"$jr[namaKampus]"; ?></td>
            <td><?php echo"$jr[namaJurusan]"; ?></td>
            <td><?php echo"$jr[jurusanSekolah]"; ?></td>
            <td><?php echo"$jr[nilaiStandar]"; ?></td>
    </tbody>
    <?php
            $no++;
        }
    ?>
</table>
</div>