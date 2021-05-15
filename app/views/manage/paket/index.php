<style>
    .filter {width: auto !important; margin-left: auto;}
    .input-container p {color: black; text-transform: capitalize;}
    .harga,
    .layanan,
    .diskon.inner {margin: 0 15px;}
    .harga.inner {text-decoration: line-through}
    .final_harga { font-size: 3rem; margin: 0 10px;}
    .layanan,
    .diskon.inner {text-align: right;}
    .diskon.inner::after {
        content: "%"
    }
    .diskon.inner::before {
        content: "Diskon: "
    }
    .final_harga::before,
    .harga.inner::before {
        content: "Rp."
    }
    .layanan::before {
        content: "/"
    }
    @media screen and (min-width: 800px) {
        .modal {padding: 20px}
        form {align-items: center;}
        form button { grid-area: auto; grid-column-end: 3; }
    }
</style>

<div class="main-container">
    <h1>Daftar Paket</h1>
    <button class="tambah" data-modal="tambah">Tambah</button>
    <?= $data['link'] ?>
    <div class="input-container">
        <label for="name">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by name or ID" required autocomplete="on" data-path="manage/searchpaket" required>
    </div>
    <?php foreach($data['paket'] as $paket) : ?>
        <div class="list-container">
            <h3><?= $paket['nama'] ?></h3>
            <div class="action">
                <button class="detail" data-modal="detail" data-id="<?= $paket['id'] ?>" data-diskon="<?= $paket['id_diskon'] ?>">Detail</button>
                <button class="edit" data-modal="update" data-id="<?= $paket['id'] ?>">Edit</button>
                <a href="<?= BASEURL ?>/paket/deletepaket/<?= $paket['id'] ?>" class="delete">Delete</a>
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
            <form action="<?= BASEURL ?>/paket/tambahpaket" method="post">
                <div class="input-container">
                    <label for="nama-tambah">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <input type="text" name="nama" id="nama-tambah" placeholder="Nama Paket" required>
                    <p>Nama Paket</p>
                </div>
                <div class="input-container">
                    <label for="jenis-tambah">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="jenis icon">
                    </label>
                    <select name="jenis" id="jenis-tambah">
                        <option value="kilogram">kiloan</option>
                        <option value="bed cover">bed cover</option>
                        <option value="jeans">jeans</option>
                        <option value="selimut">selimut</option>
                        <option value="sepatu">sepatu</option>
                        <option value="delivery">delivery</option>
                        <option value="fast wash">fast wash</option>
                    </select>
                    <p>Jenis Paket</p>
                </div>
                <div class="input-container">
                    <label for="pay-tambah">
                        <img src="<?= BASEURL ?>/img/pay.svg" alt="pay icon">
                    </label>
                    <input type="number" name="pay" id="pay-tambah" placeholder="Harga" required>
                    <p>Harga</p>
                </div>
                <div class="input-container">
                    <label for="service-tambah">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="service icon">
                    </label>
                    <input type="text" name="service" id="service-tambah" placeholder="Layanan" required>
                    <p style="color: red;">Layanan pisahkan dengan koma.</p>
                </div>
                <div class="input-container">
                    <label for="iddiskon-tambah">
                        <img src="<?= BASEURL ?>/img/percent.svg" alt="jenis icon">
                    </label>
                    <select name="id_diskon" id="iddiskon-tambah">
                        <option value="" selected></option>
                        <?php foreach ($data['diskon'] as $diskon) : ?>
                            <option value="<?= $diskon['id'] ?>"><?= $diskon['nama'] ?></option>
                        <?php endforeach ; ?>
                    </select>
                    <p>Diskon</p>
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
            <form action="<?= BASEURL ?>/paket/updatepaket" method="post">
                <input type="text" name="id" id="id-update" style="display: none;">
                <div class="input-container">
                    <label for="nama-update">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <input type="text" name="nama" id="nama-update" placeholder="Nama Paket" required>
                    <p>Nama Paket</p>
                </div>
                <div class="input-container">
                    <label for="layanan-update">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="jenis icon">
                    </label>
                    <select name="jenis" id="layanan-update">
                        <option value="kilogram">kiloan</option>
                        <option value="bed cover">bed cover</option>
                        <option value="jeans">jeans</option>
                        <option value="selimut">selimut</option>
                        <option value="sepatu">sepatu</option>
                        <option value="delivery">delivery</option>
                        <option value="fast wash">fast wash</option>
                    </select>
                    <p>Jenis Paket</p>
                </div>
                <div class="input-container">
                    <label for="harga-update">
                        <img src="<?= BASEURL ?>/img/pay.svg" alt="pay icon">
                    </label>
                    <input type="number" name="pay" id="harga-update" placeholder="Harga" required>
                    <p>Harga</p>
                </div>
                <div class="input-container">
                    <label for="service-update">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="service icon">
                    </label>
                    <input type="text" name="service" id="service-update" placeholder="Layanan" required>
                    <p style="color: red;">Layanan pisahkan dengan koma.</p>
                </div>
                <div class="input-container">
                    <label for="id_diskon-update">
                        <img src="<?= BASEURL ?>/img/percent.svg" alt="jenis icon">
                    </label>
                    <select name="id_diskon" id="id_diskon-update">
                        <option value="" selected></option>
                        <?php foreach ($data['diskon'] as $diskon) : ?>
                            <option value="<?= $diskon['id'] ?>"><?= $diskon['nama'] ?></option>
                        <?php endforeach ; ?>
                    </select>
                    <p>Diskon</p>
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
            <h1 class="nama inner"></h1>
            <span class="id inner"></span>
        </div>
        <div class="modal-body">
            <img src="<?= BASEURL ?>/img/jeans.png" alt="Image of sepatu" height="100" id="img-detail">
            <p class="diskon inner">0</p>
            <p class="harga inner"></p>
            <p class="final_harga inner"></p>
            <p class="layanan inner"></p>
            <ul class="service inner">
                <li></li>
                <li></li>
                <li></li>
            </ul>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="detail">Close</button>
        </div>
    </div>
</div>