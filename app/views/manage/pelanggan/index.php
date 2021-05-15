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

    .input-container p {color: black;}

    .filter {width: auto !important; margin-left: auto;}

    #alamat-update, #alamat-tambah {width: 100%; padding: 5px; margin-left: 5px; height: 40px;}
    #password-update,
    #password-tambah {
        height: fit-content;
        height: -moz-fit-content;
    }
</style>

<div class="main-container">
    <h1>Daftar Pelanggan</h1>
    <button class="tambah" data-modal="tambah">Tambah</button>
    <?= isset($data['link']) ? $data['link'] : "" ?>
    <div class="input-container">
        <label for="name">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by name or ID" required data-path="manage/searchpelanggan" autocomplete="on">
    </div>
    <?php foreach($data['pelanggan'] as $pelanggan) : ?>
        <div class="list-container">
        <h3><?= $pelanggan['nama'] ?></h3>
        <div class="action">
            <a href="<?= BASEURL ?>/manage/pelanggandetail/<?= $pelanggan['id'] ?>" class="detail">Detail</a>
            <button class="edit" data-modal="update" data-id="<?= $pelanggan['id'] ?>">Edit</button>
            <a href="<?= BASEURL ?>/pelanggan/deletepelanggan/<?= $pelanggan['id'] ?>" class="delete">Delete</a>
        </div>
    </div>
    <?php endforeach ; ?>
</div>

<div class="container-modal" data-name="tambah">
    <div class="modal">
        <div class="modal-title">
            <h1>Tambah Paket</h1>
        </div>
        <div class="modal-body">
        <form action="<?= BASEURL ?>/pelanggan/tambahpelanggan" method="post">
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
                    <input type="text" name="password" id="password-tambah" placeholder="Password" required>
                    <p>Password</p>
                </div>
                <div class="input-container text">
                    <label for="alamat-tambah">
                        <img src="<?= BASEURL ?>/img/employee.svg" alt="role icon">
                    </label>
                    <textarea id="alamat-tambah" name="alamat" required></textarea>
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
            <h1>Update Paket</h1>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL ?>/pelanggan/updatepelanggan" method="post" id="form-update">
            <input type="text" name="id" id="id-update" style="display: none;">
                <div class="input-container">
                    <label for="nama-update">
                        <img src="<?= BASEURL ?>/img/person.svg" alt="user icon">
                    </label>
                    <input type="text" name="nama" id="nama-update" placeholder="Nama" maxlength="99" required>
                    <p>Nama</p>
                </div>
                <div class="input-container text">
                    <label for="alamat-tambah">
                        <img src="<?= BASEURL ?>/img/employee.svg" alt="role icon">
                    </label>
                    <textarea id="alamat-update" name="alamat"></textarea>
                    <p>Alamat</p>
                </div>
                <button type="submit">Tambahkan</button>
            </form>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="update">Close</button>
        </div>
    </div>
</div>