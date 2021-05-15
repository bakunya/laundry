<style>
    .input-container {
        position: relative;
        height: 40px;
        margin-bottom: 30px !important;
    }
    .input-container label.label {
        position: absolute;
        top: 0;
        right: 0;
        margin-top: -15px;
        font-size: 0.6rem;
        cursor: pointer;
    }

    .container-form form > h1 {
        width: 100%;
        text-align: center;
        display: inherit;
    }

    .container-form form > p {
        margin: 15px;
    }

    .container-form form > button {
        height: fit-content;
        height: -mozfit-content;
    }

    @media screen and (min-width: 800px) {
        form {
            grid-template-areas:
                    "login login"
                    "avatar avatar"
                    "p p"
                    "ayah ibu"
                    "tempat tempat"
                    "password button" !important;
            gap: 5px;
            align-items: center;
        }
        .container-form form > p {grid-area: p;}
        .ayah {grid-area: ayah;}
        .ibu {grid-area: ibu;}
        .tempat {grid-area: tempat;}
        .button {grid-area: button;}
        .password {grid-area: password;}
        .text { width: 100%; margin: 0 10px; padding: 5px; font-size: 0.8rem;}
        .input-container.tempat {margin-top: 0;}
    }
</style>

<div class="container-login">
    <div class="container-form">
        <form action="<?= BASEURL ?>/credentials/updatecredentials" method="post" id="register" class="auth">
            <h1>Update Password Kredensial</h1>
            <p>Kredensial kata sandi berguna untuk mengganti kata sandi apabila suatu saat anda melupakannya</p>
            <div class="input-container ayah">
                <input type="text" name="nama_ayah" id="ayah" placeholder="Nama Ayah" required autocomplete="off" maxlength="99">
                <label class="label" for="ayah">Nama ayah</label>
            </div>
            <div class="input-container ibu">
                <input type="text" name="ibu" id="ibu" placeholder="Nama Ibu" class="ibu" required autocomplete="off">
                <label class="label" for="ibu">Nama ibu</label>
            </div>
            <div class="input-container tempat">
                <input type="text" name="tempat" id="tempat" placeholder="Tempat Tinggal Masa Kecil" class="tempat" required autocomplete="off">
                <label class="label" for="tempat">Tempat tinggal masa kecil</label>
            </div>
            <div class="input-container password">
                <label for="password">
                    <img src="<?= BASEURL ?>/img/lock.svg" alt="Password Icon">
                </label>
                <input type="password" name="password" id="password" placeholder="Kata sandi" class="password" required autocomplete="off" minlength="8">
                <img class="show-password" src="<?= BASEURL ?>/img/eye-slash.svg" alt="Show Password">
            </div>
            <button type="submit" name="submit" class="button">Update</button>
        </form>
        <div class="info">
            <a id="link-updatepassword" href="<?=BASEURL?>/auth/gantipassword">Update password?</a>
        </div>
    </div>
</div>