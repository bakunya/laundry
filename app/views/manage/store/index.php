<style>
    li {
        max-width: 300px;
        text-align: center;
        margin: auto;
        margin-bottom: 10px;
    }

    .filter {
        width: auto !important; 
        margin-left: auto; 
        display: inline-block !important;
        color: black;
    }

    .modal-title h1 {
        display: flex;
        flex-direction: column;
    }
</style>

<div class="main-container">
    <h1>Daftar Outlet</h1>
    <button class="tambah" data-modal="tambah">Tambah</button>
    <?= $data['link'] ?>
    <div class="input-container">
        <label for="search">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by alamat or ID" required data-path="manage/searchstore" autocomplete="on">
    </div>
    <?php foreach ($data['store'] as $store) : ?>
        <div class="list-container">
            <h3><?= $store['nama'] ?></h3>
            <div class="action">
                <button class="detail" data-modal="detail" data-id="<?= $store['id'] ?>">Detail</button>
                <button class="edit" data-modal="update" data-id="<?= $store['id'] ?>">Edit</button>
                <a href="<?= BASEURL ?>/store/deletestore/<?= $store['id'] ?>" class="delete">Delete</a>
            </div>
        </div>
    <?php endforeach ; ?>
</div>

<div class="container-modal" data-name="tambah">
    <div class="modal">
        <div class="modal-title">
            <h1>Tambah Outlet</h1>
        </div>
        <div class="modal-body">
            <form action="<?= BASEURL ?>/store/tambahstore" method="post">
                <div class="input-container">
                    <label for="nama-tambah">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <input type="text" name="nama" id="nama-tambah" placeholder="Nama" maxlength="99" required>
                </div>
                <div class="input-container">
                    <label for="alamat-tambah">
                        <img src="<?= BASEURL ?>/img/alamat.svg" alt="jenis icon">
                    </label>
                    <input type="text" name="alamat" id="alamat-tambah" placeholder="alamat" required>
                </div>
                <div class="input-container">
                    <label for="telp-tambah">
                        <img src="<?= BASEURL ?>/img/telephone.svg" alt="service icon">
                    </label>
                    <input type="tel" name="telp" id="telp-tambah" placeholder="Telephone" maxlength="99" required>
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
            <form action="<?= BASEURL ?>/store/updatestore" method="post">
                <input type="text" name="id" id="id-update" style="display: none;">
                <div class="input-container">
                    <label for="nama-update">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <input type="text" name="nama" id="nama-update" placeholder="Nama" maxlength="99" required>
                </div>
                <div class="input-container">
                    <label for="alamat-update">
                        <img src="<?= BASEURL ?>/img/alamat.svg" alt="jenis icon">
                    </label>
                    <input type="text" name="alamat" id="alamat-update" placeholder="alamat">
                </div>
                <div class="input-container">
                    <label for="telephone-update">
                        <img src="<?= BASEURL ?>/img/telephone.svg" alt="service icon">
                    </label>
                    <input type="tel" name="telephone" id="telp-update" placeholder="Telephone" maxlength="99" required>
                </div>
                <button type="submit" name="submit">Update</button>
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
            <h1 class="inner nama">Stero Kasih</h1>
            <span class="inner id">0009123</span>
        </div>
        <div class="modal-body">
            <img src="<?= BASEURL ?>/img/store.jpg" alt="Store of sepatu" height="100">
            <ul>
                <li class="inner alamat">Jalan Ngentak, Gendeng, Bangunjiwo, Kec. Kasihan, Bantul, Daerah Istimewa Yogyakarta 55184</li>
                <li class="inner telp">+62 888 0603 3610</li>
            </ul>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="detail">Close</button>
        </div>
    </div>
</div>