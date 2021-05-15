<style>
    h1.username {
        display: flex;
        flex-direction: column;
    }

    li {
        max-width: 300px;
        text-align: left;
        margin-bottom: 10px;
    }

    li::after {
        content: "";
        border-bottom: 1px solid gray;
        margin-top: 15px;
        display: block
    }

    li span {
        font-size: 1rem;
        font-weight: 900;
        font-family: 'IBM-Medium'; 
    }

    form {
        grid-template-areas:
            "outlet kiloan"
            "harga service"
            "role role"
            "kosong button";
    }

    h1.username span {text-align: right}

    .filter {width: auto !important; margin-left: auto;}

    .input-container p {color: black; font-size: 0.6rem}

    #detail .modal-body {
        display: flex;
        flex-direction: column;
        align-items: center;
    }

    #detail .modal-body ul { min-width: 80% }

    .modal {display: initial; overflow-x: auto; min-width: 400px;}
    .modal-body {margin: 40px auto;}
    form .input-container {margin: 40px auto;}
    .modal-footer {margin: 20px}
    .text textarea { padding: 5px; margin: 0 10px; width: 100%; height: 40px;}
    .id_outlet {text-align: right; display: auto;}

    @media screen and (min-width: 800px) {
        form {
            grid-template-areas:
                "outlet kiloan"
                "harga service"
                "harga service"
                "text text"
                "kosong button";
            gap: 5px;
        }
        .text {grid-area: text; width: 100%; margin: 0 auto 20px auto !important;}
        .input-container {margin: 0 0 20px 0;}
        .modal {
            max-height: 600px;
        }
    }
</style>

<div class="main-container">
    <h1>Daftar Pegawai</h1>
    <button class="tambah" data-modal="tambah">Tambah</button>
    <?= $data['link'] ?>
    <div class="input-container">
        <label for="name">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by name or ID" data-path="manage/searchpegawai" autocomplete="on">
    </div>
    <?php foreach ($data['pegawai'] as $pegawai) : ?>
        <div class="list-container">
            <h3><?= $pegawai['nama'] ?></h3>
            <div class="action">
                <button class="detail" data-modal="detail" data-id="<?= $pegawai['id'] ?>">Detail</button>
                <button class="edit" data-modal="update" data-id="<?= $pegawai['id'] ?>">Edit</button>
                <a href="<?= BASEURL ?>/pegawai/deletepegawai/<?= $pegawai['id'] ?>" class="delete">Delete</a>
            </div>
        </div>
    <?php endforeach ; ?>
</div>

<div class="container-modal" data-name="tambah">
    <div class="modal">
        <div class="modal-title">
            <h1>Tambah Pegawai</h1>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL ?>/pegawai/tambahpegawai" method="post">
                <div class="input-container">
                    <label for="nama-tambah">
                        <img src="<?= BASEURL ?>/img/person.svg" alt="user icon">
                    </label>
                    <input type="text" name="nama" id="nama-tambah" placeholder="Nama" maxlength="99" required>
                    <p>Nama</p>
                </div>
                <div class="input-container">
                    <label for="telephone-tambah">
                        <img src="<?= BASEURL ?>/img/telephone.svg" alt="telephone icon">
                    </label>
                    <input type="tel" name="telephone" id="telephone-tambah" placeholder="Telephone" maxlength="99" required>
                    <p>Telephone</p>
                </div>
                <div class="input-container">
                    <label for="password-tambah">
                        <img src="<?= BASEURL ?>/img/lock.svg" alt="password icon">
                    </label>
                    <input type="text" name="password" id="password-tambah" placeholder="Password" required minlength="8">
                    <p>Password</p>
                </div>
                <div class="input-container">
                    <label for="outlet-tambah">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <input type="text" name="outlet" id="outlet-tambah" placeholder="Outlet ID" required value="<?= $_SESSION['user-information']['id_outlet'] ?>">
                    <p>Outlet ID</p>
                </div>
                <div class="input-container">
                    <label for="role-tambah">
                        <img src="<?= BASEURL ?>/img/employee.svg" alt="role icon">
                    </label>
                    <select name="role" id="role-tambah">
                        <option value="kasir" selected>Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                    <p>Role</p>
                </div>
                <div class="input-container text">
                    <label for="alamat-tambah">
                        <img src="<?= BASEURL ?>/img/alamat.svg" alt="role icon">
                    </label>
                    <textarea id="alamat-tambah" name="alamat"></textarea>
                    <p>Alamat</p>
                </div>
                <button type="submit" name="submit">Tambahkan</button>
            </form>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="tambah">Close</button>
        </div>
    </div>
</div>

<div class="container-modal" data-name="update">
    <div class="modal">
        <div class="modal-title">
            <h1>Update Pegawai</h1>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL ?>/pegawai/updatepegawai" method="post">
                <input type="text" name="id" id="id-update" style="display: none;">
                <div class="input-container">
                    <label for="nama-update">
                        <img src="<?= BASEURL ?>/img/person.svg" alt="user icon">
                    </label>
                    <input type="text" name="nama" id="nama-update" placeholder="Nama" maxlength="99" required>
                    <p>Nama</p>
                </div>
                <div class="input-container">
                    <label for="telp-update">
                        <img src="<?= BASEURL ?>/img/telephone.svg" alt="telephone icon">
                    </label>
                    <input type="tel" name="telephone" id="telp-update" placeholder="Telephone" maxlength="99" required>
                    <p>Telephone</p>
                </div>
                <div class="input-container">
                    <label for="outlet-update">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <input type="text" name="outlet" id="id_outlet-update" placeholder="Outlet ID" required>
                    <p>Outlet ID</p>
                </div>
                <div class="input-container">
                    <label for="role-update">
                        <img src="<?= BASEURL ?>/img/employee.svg" alt="role icon">
                    </label>
                    <select name="role" id="role-update">
                        <option value="kasir" selected>Kasir</option>
                        <option value="admin">Admin</option>
                    </select>
                    <p>Role</p>
                </div>
                <div class="input-container text">
                    <label for="alamat-update">
                        <img src="<?= BASEURL ?>/img/alamat.svg" alt="role icon">
                    </label>
                    <textarea id="alamat-update" name="alamat" required></textarea>
                    <p>Alamat</p>
                </div>
                <button type="submit" name="submit">Tambahkan</button>
            </form>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="update">Close</button>
        </div>
    </div>
</div>

<div class="container-modal" data-name="detail" id="detail">
    <div class="modal">
        <div class="modal-title">
            <h1 class="nama inner">Irvan Hakim</h1>
            <span class="id inner">0009123</span>
        </div>
        <div class="modal-body">
            <img src="<?= BASEURL ?>/img/work.svg" alt="Image of user" height="100">
            <ul>
                <li class="alamat inner">Jalan Ngentak, Gendeng, Bangunjiwo, Kec. Kasihan, Bantul, Daerah Istimewa Yogyakarta 55184</li>
                <li class="telp inner">+62 888 0603 3610</li>
                <li class="role inner">Admin</li>
                <li>Outlet: <span class="id_outlet inner">00987</span></li>
            </ul>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="detail">Close</button>
        </div>
    </div>
</div>