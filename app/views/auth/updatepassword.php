<div class="container-login">
    <div class="container-form">
        <form action="<?= BASEURL ?>/auth/updatepassword" method="post" class="auth">
            <h1>Update Password</h1>
            <div class="input-container">
                <label for="password-old">
                    <img src="<?= BASEURL ?>/img/lock.svg" alt="Password Icon">
                </label>
                <input type="password" name="password-old" id="password-old" placeholder="Password lama Kamu" class="password" required autocomplete="off" minlength="8">
                <img class="show-password" src="<?= BASEURL ?>/img/eye-slash.svg" alt="Show Password">
            </div>
            <div class="input-container">
                <label for="password">
                    <img src="<?= BASEURL ?>/img/lock.svg" alt="Password Icon">
                </label>
                <input type="password" name="password" id="password" placeholder="Password Kamu" class="password" required autocomplete="off" minlength="8">
                <img class="show-password" src="<?= BASEURL ?>/img/eye-slash.svg" alt="Show Password">
            </div>
            <button type="submit" name="submit">login</button>
        </form>
        <div class="info">
            <a href="<?= BASEURL ?>/auth/lupapassword">Lupa kata sandi?</a>
            <a id="link-updatepassword" href="<?=BASEURL?>/credentials">Kredensial password</a>
        </div>
    </div>
</div>