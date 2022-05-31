<div class="big-title">
    <h1>Future is Here,</h1>
    <h1>Lets Start Your Answer</h1>
    <p class="text">
        Lorem ipsum dolor sit amet, consectetur adipisicing elit. Eaque vero unde harum eum, laborum explicabo delectus eius quod nulla, eos fugiat. Officia quaerat est atque laborum modi. Eius, minus nemo?
    </p>
    <div class="cta">

        <?php 
            if(!empty($_SESSION["userR"]) and !empty($_SESSION["passR"])){
                $sqla = mysqli_query($koneksi, "select * from responden where usernameR='$_SESSION[userR]' and passwordR='$_SESSION[passR]'");
                $ra = mysqli_fetch_array($sqla);
        ?>
        <a href="?p=isiKuesioner" class="btn">get Start</a>
        <?php
            }else{
        ?>
        <a href="#" class="btn">get Start</a>
        <?php
            }
        ?>
    </div>
</div>