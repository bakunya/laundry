<style>
    .link a.tambah {width: auto;}
    .link {flex-direction: column; display: flex}
    h1.total { text-align: right !important; width: initial !important; }
    .filter {text-align: center;}
    @media screen and (min-width: 800px) {
        .link {flex-direction: row;}
    }
</style>

<div class="main-container">
    <h1>Daftar Transaksi</h1>
    <div class="link">
        <a href="<?= BASEURL ?>/transaksi/tambah" class="tambah">Tambah</a>
        <?= $data['link'] ?>
        <?= isset($data['hutang']) ? $data['hutang'] : NULL ?>
    </div>
    <div class="input-container">
        <label for="name">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by invoice kode" required autocomplete="off" data-path="transaksi/searchtransaksi" required>
    </div>
    <h1 class="total">Total: Rp.<?= $data['transaksi']['total'] ?></h1>
    <?php foreach ($data['transaksi']['data'] as $transaksi) : ?>
        <div class="list-container">
            <h3><?= $transaksi['nama'] ?></h3>
            <div class="action">
                <a href="<?= BASEURL ?>/home/detail/<?= $transaksi['id'] ?>" class="detail">Detail</a>
                <a href="<?= BASEURL ?>/transaksi/update/<?= $transaksi['id'] ?>" class="edit">Edit</a>
                <a href="<?= BASEURL ?>/transaksi/delete/<?= $transaksi['id'] ?>" class="delete">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>


<div class="container-modal" data-name="update">
    <div class="modal">
        <div class="modal-title">
            <h1>Update Paket</h1>
        </div>
        <div class="modal-body">
            <form action="">
                <div class="input-container">
                    <label for="outlet">
                        <img src="<?= BASEURL ?>/img/shop.svg" alt="outlet icon">
                    </label>
                    <select name="outlet" id="outlet">
                        <option value="outlet 1">outlet 1</option>
                        <option value="outlet 2">outlet 2</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="jenis">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="jenis icon">
                    </label>
                    <select name="jenis" id="jenis">
                        <option value="">kiloan</option>
                    </select>
                </div>
                <div class="input-container">
                    <label for="harga">
                        <img src="<?= BASEURL ?>/img/pay.svg" alt="pay icon">
                    </label>
                    <input type="number" name="harga" id="harga" placeholder="Harga">
                </div>
                <div class="input-container">
                    <label for="service">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="service icon">
                    </label>
                    <input type="text" name="service" id="service" placeholder="Service">
                    <p>Service pisahkan dengan koma.</p>
                </div>
                <button type="submit">Update</button>
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
            <h1>Jeans <span class="id">0009123</span></h1>
        </div>
        <div class="modal-body">
            <img src="<?= BASEURL ?>/img/kilogram.png" alt="Image of sepatu" height="100">
            <p><span class="price">Rp.30K  </span> /kilogram</p>
            <ul>
                <li>Cuci</li>
                <li>Pewangi</li>
                <li>Setrika</li>
            </ul>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="detail">Close</button>
        </div>
    </div>
</div>