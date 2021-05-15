<style>
    .input-container {
        position: relative;
        height: 50px;
        margin-bottom: 30px !important;
    }
    .input-container label.label {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -15px;
        font-size: 0.7rem;
        cursor: pointer;
    }

    #alamat-tambah {
        height: 40px;
        padding: 5px;
    }
    .alamat img {
        margin-right: 5px;
    }
    @media screen and (min-width: 800px) {
        form {
            grid-template-areas:
                    "login login"
                    "avatar avatar"
                    "telp password"
                    "ayah ibu"
                    "tempat tempat"
                    "button button" !important;
            gap: 5px;
        }
        .ayah {grid-area: ayah;}
        .telp {grid-area: telp;}
        .password {grid-area: password;}
        .ibu {grid-area: ibu;}
        .tempat {grid-area: tempat;}
        .button {grid-area: button;}
        .text { width: 100%; margin: 0 10px; padding: 5px; font-size: 0.8rem;}
        .input-container {margin: 0 0 20px 0;}
    }
</style>

<div class="container-login">
    <div class="container-form">
        <form action="<?= BASEURL ?>/auth/forgotpassword" method="post" id="register" class="auth">
            <h1>Update password</h1>
            <div class="input-container telp">
                <label for="telephone">
                    <img src="<?= BASEURL ?>/img/telephone.svg" alt="Telp Icon">
                </label>
                <input type="tel" name="telephone" id="telephone" placeholder="Nomor telephone" required autocomplete="off" maxlength="14">
            </div>            
            <div class="input-container password">
                <label for="password">
                    <img src="<?= BASEURL ?>/img/lock.svg" alt="Password Icon">
                </label>
                <input type="password" name="password" id="password" placeholder="Kata sandi" class="password" required autocomplete="off" minlength="8">
                <img class="show-password" src="<?= BASEURL ?>/img/eye-slash.svg" alt="Show Password">
            </div>
            <div class="input-container ayah">
                <input type="text" name="nama_ayah" id="ayah" placeholder="Nama Ayah" required autocomplete="off" maxlength="99">
                <label for="ayah" class="label">ayah</label>
            </div>
            <div class="input-container ibu">
                <input type="text" name="ibu" id="ibu" placeholder="Nama Ibu" class="ibu" required autocomplete="off">
                <label for="ibu" class="label">Nama ibu</label>
            </div>
            <div class="input-container tempat">
                <input type="text" name="tempat" id="tempat" placeholder="Tempat Tinggal Masa Kecil" class="tempat" required autocomplete="off">
                <label for="tempat" class="label">Tempat tinggal masa kecil</label>
            </div>
            <button type="submit" name="submit" class="button">Update</button>
        </form>
        <div class="info">
            <a id="link-updatepassword" href="<?=BASEURL?>/auth/gantipassword">Update password?</a>
        </div>
    </div>
</div>