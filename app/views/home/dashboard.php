<style>
    #link-updatepassword {
        margin: 10px;
        text-align: right;
        color: #777bd5;
        font-family: "IBM-Bold";
        font-size: 0.8rem;
        transition: 200ms;
    }

    #link-updatepassword:hover {
        color: #4e529c;
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

<div class="hamburger menu-button menu">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="black" class="bi bi-list" viewBox="0 0 16 16">
        <path fill-rule="evenodd" d="M2.5 11.5A.5.5 0 0 1 3 11h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 7h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4A.5.5 0 0 1 3 3h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
    </svg>
</div>

<div class="hamburger settings menu-button">
    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-gear" viewBox="0 0 16 16">
        <path d="M8 4.754a3.246 3.246 0 1 0 0 6.492 3.246 3.246 0 0 0 0-6.492zM5.754 8a2.246 2.246 0 1 1 4.492 0 2.246 2.246 0 0 1-4.492 0z"/>
        <path d="M9.796 1.343c-.527-1.79-3.065-1.79-3.592 0l-.094.319a.873.873 0 0 1-1.255.52l-.292-.16c-1.64-.892-3.433.902-2.54 2.541l.159.292a.873.873 0 0 1-.52 1.255l-.319.094c-1.79.527-1.79 3.065 0 3.592l.319.094a.873.873 0 0 1 .52 1.255l-.16.292c-.892 1.64.901 3.434 2.541 2.54l.292-.159a.873.873 0 0 1 1.255.52l.094.319c.527 1.79 3.065 1.79 3.592 0l.094-.319a.873.873 0 0 1 1.255-.52l.292.16c1.64.893 3.434-.902 2.54-2.541l-.159-.292a.873.873 0 0 1 .52-1.255l.319-.094c1.79-.527 1.79-3.065 0-3.592l-.319-.094a.873.873 0 0 1-.52-1.255l.16-.292c.893-1.64-.902-3.433-2.541-2.54l-.292.159a.873.873 0 0 1-1.255-.52l-.094-.319zm-2.633.283c.246-.835 1.428-.835 1.674 0l.094.319a1.873 1.873 0 0 0 2.693 1.115l.291-.16c.764-.415 1.6.42 1.184 1.185l-.159.292a1.873 1.873 0 0 0 1.116 2.692l.318.094c.835.246.835 1.428 0 1.674l-.319.094a1.873 1.873 0 0 0-1.115 2.693l.16.291c.415.764-.42 1.6-1.185 1.184l-.291-.159a1.873 1.873 0 0 0-2.693 1.116l-.094.318c-.246.835-1.428.835-1.674 0l-.094-.319a1.873 1.873 0 0 0-2.692-1.115l-.292.16c-.764.415-1.6-.42-1.184-1.185l.159-.291A1.873 1.873 0 0 0 1.945 8.93l-.319-.094c-.835-.246-.835-1.428 0-1.674l.319-.094A1.873 1.873 0 0 0 3.06 4.377l-.16-.292c-.415-.764.42-1.6 1.185-1.184l.292.159a1.873 1.873 0 0 0 2.692-1.115l.094-.319z"/>
    </svg>
</div>


<aside id="sidebar">
    <div class="items">
        <?php if ($_SESSION['user-information']['role'] == "admin"): ?>
            <div class="manajemen">
                <a href="<?= BASEURL ?>/manage/ourpegawai" class="ourpegawai">pegawai</a>
                <a href="<?= BASEURL ?>/manage/pelanggan" class="pelanggan">pelanggan</a>
                <a href="<?= BASEURL ?>/manage/ourstore" class="ourstore">store</a>
                <a href="<?= BASEURL ?>/manage/ourpaket" class="ourpaket">paket</a>
                <a href="<?= BASEURL ?>/manage/diskon" class="diskon">diskon</a>
            </div>
            <div class="transaksi">
                <a href="<?= BASEURL ?>/transaksi/ourtransaction" class="ourtransaction">transaksi</a>
                <a href="<?= BASEURL ?>/home/cucian" class="cucian">Cucian</a>
                <a href="<?= BASEURL ?>/service/harga" class="harga">Harga</a>
                <a href="<?= BASEURL ?>/service/outlet" class="outlet">Outlet</a>
            </div>
            <a href="<?= BASEURL ?>/auth/logout" class="logout">
        <?php elseif ($_SESSION['user-information']['role'] == "kasir"): ?>
            <a href="<?= BASEURL ?>/transaksi/ourtransaction" class="ourtransaction">transaksi</a>
            <a href="<?= BASEURL ?>/home/cucian" class="cucian">Cucian</a>
            <a href="<?= BASEURL ?>/service/harga" class="harga">Harga</a>
            <a href="<?= BASEURL ?>/service/outlet" class="outlet">Outlet</a>
            <a href="<?= BASEURL ?>/auth/logout" class="logout">
        <?php elseif ($_SESSION['user-information']['role'] == "pelanggan"): ?>
            <a href="<?= BASEURL ?>/home/cucian" class="cucian">Cucian</a>
            <a href="<?= BASEURL ?>/service/harga" class="harga">Harga</a>
            <a href="<?= BASEURL ?>/service/outlet" class="outlet">Outlet</a>
            <a href="<?= BASEURL ?>/auth/logout" class="logout">
        <?php endif ?>
            Logout
            <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-box-arrow-right" viewBox="0 0 16 16">
                <path fill-rule="evenodd" d="M10 12.5a.5.5 0 0 1-.5.5h-8a.5.5 0 0 1-.5-.5v-9a.5.5 0 0 1 .5-.5h8a.5.5 0 0 1 .5.5v2a.5.5 0 0 0 1 0v-2A1.5 1.5 0 0 0 9.5 2h-8A1.5 1.5 0 0 0 0 3.5v9A1.5 1.5 0 0 0 1.5 14h8a1.5 1.5 0 0 0 1.5-1.5v-2a.5.5 0 0 0-1 0v2z"/>
                <path fill-rule="evenodd" d="M15.854 8.354a.5.5 0 0 0 0-.708l-3-3a.5.5 0 0 0-.708.708L14.293 7.5H5.5a.5.5 0 0 0 0 1h8.793l-2.147 2.146a.5.5 0 0 0 .708.708l3-3z"/>
            </svg> 
        </a>
    </div>
</aside>

<aside id="settings">
    <div class="container-form">
        <form action="<?= BASEURL ?>/auth/updateuser" method="post" id="register" class="auth">
            <h1>Update Profile</h1>
            <div class="input-container name">
                <label for="name">
                    <img src="<?= BASEURL ?>/img/person.svg" alt="Password Icon">
                </label>
                <input type="name" name="name" id="name" placeholder="Nama kamu" required autocomplete="off" value="<?= $_SESSION['user-information']['nama'] ?>">
            </div>
            <div class="input-container telp">
                <label for="telephone">
                    <img src="<?= BASEURL ?>/img/telephone.svg" alt="Password Icon">
                </label>
                <input type="tel" name="telephone" id="telephone" placeholder="Nomor telephone" required autocomplete="off" value="<?= $_SESSION['user-information']['telp'] ?>">
            </div>
            <div class="input-container alamat">
                <label for="alamat-tambah">
                    <img src="<?= BASEURL ?>/img/alamat.svg" alt="role icon">
                </label>
                <textarea id="alamat-tambah" class="text" name="alamat" placeholder="Alamat untuk layanan pengiriman" required><?= $_SESSION['user-information']['alamat'] ?></textarea>
            </div>
            <button name="submit" type="submit" class="button">Update</button>
        </form>
        <a id="link-updatepassword" href="<?=BASEURL?>/auth/lupapassword">Lupa password?</a>
        <a id="link-updatepassword" href="<?=BASEURL?>/auth/gantipassword">Update password?</a>
        <a id="link-updatepassword" href="<?=BASEURL?>/credentials">Kredensial password</a>
    </div>
</aside>
<div class="container-dashboard">
    <span>00:00</span>
    <h1>selamat datang, <?= $_SESSION['user-information']['nama'] ?>.</h1>
    <p class="question">Apa yang akan kamu lakukan hari ini?</p>
    <p class="quote">""</p>
</div>