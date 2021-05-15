<div class="container-login">
    <div class="container-form">
        <form action="<?= BASEURL ?>/auth/signin" method="post" class="auth">
            <h1>Log in</h1>
            <div class="input-container">
                <label for="telephone">
                    <img src="<?= BASEURL ?>/img/telephone.svg" alt="Password Icon">
                </label>
                <input type="tel" name="telephone" id="telephone" placeholder="Nomor Telephone Kamu" required autocomplete="off" maxlength="14">
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
            <p>Don't have an account? <a href="<?= BASEURL ?>/auth/register">Sign up here.</a></p>
        </div>
    </div>
</div>