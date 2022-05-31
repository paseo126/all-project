<style>

    .a{
        background-color : #151111;
        padding : 10px 20px 10px 20px;
    }

    .box{
        height : 800px;
        margin-top : 50px
    }
    

    .input-field{
    width: 100%;
    height: 43px;
    background: #fff;
    border: none;
    outline: none;
    border : 1px solid #151111;
    border-radius : 5px;
    margin-top: 0.5rem;
    font-size: 0.95rem;
    color: #151111;
    padding-top: 1px ;
    padding-left : 10px;
}
</style>
    <div class="box">
        <div class="inner-box">
            <form form action="?page=ipaAksi" method="post" autocomplete="off" class="sign-in-form">
                <div class="logo-login">
                    <h3  style="margin-bottom:1.2rem">
                    
                    <a style="padding : 10px 20px 10px 20px" href="#" class="btn">IPA</a>
                    <a style="margin : 5px" href="?page=penilaianIPS" class="btn a">IPS</a>
                    </h3>
                </div>
                <div class="actual-form">
                    <div class="input-warp">
                        <input style="margin-bottom:1rem" type="hidden"  class="input-field" id="jurusan" name="jurusan" value="IPA" required>
                        <label for="nama">Bahasa Indonesia :</label>
                        <input style="margin-bottom:1rem" type="text"  class="input-field" id="bind" name="bind" autocomplete="off" required>
                        <label for="nama">Bahasa Inggris :</label>
                        <input style="margin-bottom:1rem" type="text"  class="input-field" id="bing" name="bing" autocomplete="off" required>
                        <label for="nama">Matematika :</label>
                        <input style="margin-bottom:1rem" type="text"  class="input-field" id="mtk" name="mtk" autocomplete="off" required>
                        <label for="Email">Biologi :</label>
                        <input  style="margin-bottom:1rem" type="text"  class="input-field" id="v2" name="v2" autocomplete="off" required>
                        <label for="username">Fisika :</label>
                        <input style="margin-bottom:1rem"  type="text"  class="input-field" id="v3" name="v3" autocomplete="off" required>
                        <label for="pass">Kimia :</label>
                        <input style="margin-bottom:1rem" type="text"  class="input-field" id="v4" name="v4" autocomplete="off" required>
                    </div>

                    <input type="submit" value="simpan" class="sign-login">

                </div>
            </form>
        </div>
    </div>
