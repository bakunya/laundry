<style>
    .title-user {
        text-align: center;
        color: #0068ad;
    }

    .title-cuci {
        text-align: left;
        color: #0068ad;
        font-size: 1.3rem;
        font-weight: normal;
    }

    main {
        width: 90%;
        max-width: 900px;
        margin: auto;
    }

    .mt-10 {
        margin-top: 10px;
    }

    .text-capital {
        text-transform: capitalize;
    }

    section.header::after {
        content: "";
        border-bottom: 1px solid #8e8e8e;
        width: 90%;
        margin: 30px auto;
        display: block;
    }

    .action {
        justify-content: flex-end;
    }

    .action * {
        margin: 0 5px;
        border-radius: 10px;
        width: fit-content;
        width: -moz-fit-content;
        padding: 10px 15px;
        display: grid;
        place-content: center;
        transition: 200ms ease-in-out;
        box-shadow: 2px 2px 3px 0px rgb(0 0 0 / 46%);
    }
    
    .cucian-list .cucian {
        width: 100%;
        max-width: 700px;
        margin: auto;
        padding: 10px;
        border-radius: 10px;
        margin-top: 20px;
    }

    .cucian-list .cucian:nth-child(odd) {
        background: #bbe1fa;
    }

    .cucian-list .cucian:last-child {
        margin-bottom: 20px;
    }

    button#back {margin: 20px 0;}

    a#link {
        display: flex;
        align-items: center;
        width: 150px;
        justify-content: space-evenly;
        background-color: #bbe1fa;
        margin: 10px 20px;
        padding: 10px;
        transition: 200ms ease-in-out;
        border-radius: 10px;
        margin-left: auto;
        box-shadow: 2px 2px 3px 0px rgb(0 0 0 / 46%);
    }

    a#link:hover {
        box-shadow: none;
    }

    #alamat-update {
        width: 100%;
        margin: 0 5px;
        padding: 2px;
    }
</style>

<main>
    <button class="no-print" id="back" onclick="history.back()"><img src="<?= BASEURL ?>/img/arrow-left.svg"> Kembali</button>
    <section class="header">
        <h1 class="text-capital title-user">Data pelanggan dari: <?= $data['cucian'][0]['nama'] ?></h1>
        <p class="text-capital mt-10">Alamat: <?= $data['cucian'][0]['alamat'] ?></p>
        <p class="text-capital mt-10">No. telp: <?= $data['cucian'][0]['telp'] ?></p>
        <div class="action">
            <button class="edit" data-modal="update" data-id="<?= $data['cucian'][0]['id'] ?>">Edit</button>
            <a href="<?= BASEURL ?>/pelanggan/deletepelanggan/<?= $data['cucian'][0]['id'] ?>" class="edit delete">Delete</a>
        </div>
    </section>
    <div class="cucian-list">
            <?php if($data['cucian'][0]['transaksi_id'] != NULL) : ?>
                <h1 class="text-capital title-cuci">Data cucian</h1>
                <?php foreach($data['cucian'] as $cucian) : ?>
                        <section class="cucian">
                            <p class="text-capital mt-10">Layanan: <?= $cucian['layanan'] ?></p>
                            <p class="text-capital mt-10">qty: <?= $cucian['qty'] ?></p>
                            <p class="text-capital mt-10">invoice: <?= $cucian['invoice'] ?></p>
                            <p class="text-capital mt-10">status: <?= $cucian['status'] ?></p>
                            <p class="text-capital mt-10">dibayar: <?= $cucian['dibayar'] ?></p>
                            <p class="text-capital mt-10">tanggal masuk: <?= $cucian['tgl_masuk'] ?></p>
                            <a href="<?= BASEURL ?>/home/detail/<?=$cucian['transaksi_id']?>" id="link">Detail Cucian</a>
                        </section>
                <?php endforeach ; ?>
            <?php endif ; ?>
    </div>
</main>

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