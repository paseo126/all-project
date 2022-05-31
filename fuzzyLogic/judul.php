<div class="big-title">
    <h1>Future is Here,</h1>
    <h1>Lets Start Your Answer</h1>
    <p class="text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque vero unde harum eum, laborum explicabo delectus eius quod nulla, eos fugiat. Officia quaerat est atque laborum modi. Eius, minus nemo?
    </p>
    <div class="cta">

        <?php 
            if(!empty($_SESSION["userR"]) and !empty($_SESSION["passR"])){
                $sqla = mysqli_query($koneksi, "select * from user where username='$_SESSION[userR]' and password='$_SESSION[passR]'");
                $ra = mysqli_fetch_array($sqla);
        ?>
        <a style="margin : 5px" href="?page=penilaianIPA" class="btn">get Start</a><a href="?page=jurusan" class="btn">Lihat Jurusan</a>
        <?php
            }else{
        ?>
        <a href="?page=jurusan" class="btn">Lihat Jurusan</a>
        <?php
            }
        ?>
    </div>
</div>