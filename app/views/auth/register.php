<style>
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
                    "name telp"
                    "password repassword"
                    "alamat alamat"
                    "button button" !important;
            gap: 5px;
        }
        .name {grid-area: name;}
        .telp {grid-area: telp;}
        .password {grid-area: password;}
        .repassword {grid-area: repassword;}
        .alamat {grid-area: alamat;}
        .button {grid-area: button;}
        .text { width: 100%; margin: 0 10px; padding: 5px; font-size: 0.8rem;}
        .input-container {margin: 0 0 20px 0;}
    }
</style>

<div class="container-login">
    <div class="container-form">
        <form action="<?= BASEURL ?>/auth/signup" method="post" id="register" class="auth">
            <h1>Register</h1>
            <div class="input-container name">
                <label for="name">
                    <img src="<?= BASEURL ?>/img/person.svg" alt="Password Icon">
                </label>
                <input type="name" name="name" id="name" placeholder="Nama kamu" required autocomplete="off" maxlength="99">
            </div>
            <div class="input-container telp">
                <label for="telephone">
                    <img src="<?= BASEURL ?>/img/telephone.svg" alt="Password Icon">
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
            <div class="input-container repassword">
                <label for="re-password">
                    <img src="<?= BASEURL ?>/img/lock.svg" alt="Password Icon">
                </label>
                <input type="password" name="re-password" id="re-password" placeholder="Konfirmasi kata sandi" class="password" required autocomplete="off" minlength="8">
                <img class="show-password" src="<?= BASEURL ?>/img/eye-slash.svg" alt="Show Password">
            </div>
            <div class="input-container alamat">
                <label for="alamat-tambah">
                    <img src="<?= BASEURL ?>/img/alamat.svg" alt="role icon">
                </label>
                <textarea id="alamat-tambah" class="text" name="alamat" placeholder="Alamat untuk layanan pengiriman" required></textarea>
            </div>
            <button type="submit" name="submit" class="button">Sign up</button>
        </form>
        <div class="info">
            <p>Already have an account? <a href="<?= BASEURL ?>/auth/login">Sign in here.</a></p>
        </div>
    </div>
</div>