<style>
    .filter {width: auto !important; margin-left: auto;}
    #semua-tambah,
    #berakhir-update {
        width: 0.8rem;
        height: 0.8rem;
        margin-right: 10px;
    }
    .semua-tambah {font-size: 0.9rem;}
    .semua { font-size: 0.8rem; }
    .modal p {color: black;}
    .modal-title {margin-bottom: 10px;}
</style>

<div class="main-container">
    <h1>Tambah Diskon</h1>
    <button class="tambah" data-modal="tambah">Tambah</button>
    <?= $data['link'] ?>
    <div class="input-container">
        <label for="name">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by name or ID" required autocomplete="off" data-path="manage/searchdiskon" required>
    </div>
    <?php foreach ($data['diskon'] as $diskon): ?>
        <div class="list-container">
            <h3><?= $diskon['nama'] ?></h3>
            <div class="action">
                <a class="detail" href="<?= BASEURL ?>/manage/diskondetail/<?= $diskon['id'] ?>">Detail</a>
                <?php if($diskon['berlangsung'] == true): ?>
                    <button class="edit" data-modal="update" data-id="<?= $diskon['id'] ?>">Edit</button>
                <?php endif ; ?>
                <a href="<?= BASEURL ?>/diskon/deletediskon/<?= $diskon['id'] ?>" class="delete">Delete</a>
            </div>
        </div>
    <?php endforeach; ?>
</div>

<div class="container-modal" data-name="tambah">
    <div class="modal">
        <div class="modal-title">
            <h1>Tambah Diskon</h1>
        </div>
        <div class="modal-body">
            <form method="POST" action="<?= BASEURL ?>/diskon/tambahdiskon">
                <div class="input-container">
                    <input type="text" name="nama" id="nama-tambah" placeholder="Nama diskon" maxlength="99" required>
                    <p>Nama Diskon</p>
                </div>
                <div class="input-container">
                    <label for="diskon-tambah">
                        <img src="<?= BASEURL ?>/img/percent.svg" alt="diskon icon">
                    </label>
                    <input type="number" name="diskon" id="diskon-tambah" placeholder="Diskon" maxlength="4" min="1" required>
                    <p>Diskon</p>
                </div>
                <div class="input-container">
                    <input type="date" name="tgl_berakhir" id="tgl-berakhir-tambah" required>
                    <p>Tanggal Berakhir</p>
                </div>
                <div class="input-container">
                    <input type="checkbox" name="semua" id="semua-tambah" value="true">
                    <label for="semua-tambah" class="semua-tambah">Diskon untuk semua layanan</label>
                </div>
                <button type="submit">Tambahkan</button>
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
            <form method="POST" action="<?= BASEURL ?>/diskon/updatediskon">
                <input type="text" name="id" id="id-update" style="display: none;">
                <div class="input-container">
                    <input type="text" name="nama" id="nama-update" placeholder="Nama diskon" maxlength="99" required>
                    <p>Nama Diskon</p>
                </div>
                <div class="input-container">
                    <label for="diskon-update">
                        <img src="<?= BASEURL ?>/img/percent.svg" alt="diskon icon">
                    </label>
                    <input type="number" name="diskon" id="diskon-update" placeholder="Diskon" minlength="1" maxlength="4" required>
                    <p>Diskon</p>
                </div>
                <div class="input-container">
                    <input type="date" name="tgl_berakhir" id="date_end-update" required>
                    <p>Tanggal Berakhir</p>
                </div>                
                <div class="input-container check">
                    <input type="checkbox" name="berakhir" id="berakhir-update" value="true" checked>
                    <label for="berakhir-update" class="berakhir-update">Diskon masih berlangsung</label>
                </div>
                <button type="submit">Tambahkan</button>
            </form>
        </div>
        <div class="modal-footer">
            <button class="close-modal" data-name="update">Close</button>
        </div>
    </div>
</div>