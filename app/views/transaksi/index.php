<style>
    .link a.tambah {width: auto;}
    .link {flex-direction: column; display: flex}
    .filter {text-align: center;}
    .form-edit {
        grid-template-rows: auto;
        gap: 0;
    }
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
    <?php foreach ($data['transaksi'] as $transaksi) : ?>
        <div class="list-container">
            <h3><?= $transaksi['nama'] ?></h3>
            <div class="action">
                <a href="<?= BASEURL ?>/home/detail/<?= $transaksi['id'] ?>" class="detail">Detail</a>
                <?php if ($transaksi['dibayar'] == "belum dibayar") : ?>
                    <a href="<?= BASEURL ?>/transaksi/update/<?= $transaksi['id'] ?>" class="edit">Edit</a>
                <?php elseif ($transaksi['dibayar'] == "sudah dibayar" || $transaksi['status'] != 'diambil') : ?>
                    <button data-modal="update" data-id=<?= $transaksi['id'] ?> class="edit status">Status</button>
                <?php endif ?>
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
            <form action="<?= BASEURL ?>/transaksi/updatestatus" class="form-edit" method="post">
                <input type="text" name="id" id="id-update" style="display: none;">
                <div class="input-container">
                    <label for="status-update">
                        <img src="<?= BASEURL ?>/img/service.svg" alt="id status icon">
                    </label>
                    <select name="status" id="status-update" >
                        <option value="masuk">masuk</option>
                        <option value="proses">proses</option>
                        <option value="selesai">selesai</option>
                        <option value="diambil">diambil</option>
                    </select>
                    <p>status cucian</p>
                </div>
                <button name="submit" type="submit">Update</button>
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