<style>
    .input-container p {text-transform: capitalize}
    form .keterangan {min-width: 300px;}


    @media screen and (min-width: 800px) {
        form {
            place-content: center;
            align-items: end;
            grid-template-rows: repeat(5, 1fr);
            gap: 0px
        }
        }
        form button {
            width: 100%;
            grid-area: auto;
            grid-column-end: 3;
            grid-row-end: 7;
        }
        .keterangan {
            grid-column-end: 3;
            grid-column-start: 1;
            width: 100%;
            margin: initial auto;
            margin-left: auto;
            margin-right: auto;
        }
        .keterangan textarea {padding: 5px; width: 100%;}
    }
</style>

<div class="main-container">
    <h1>Update Transaksi</h1>
    <button id="back" onclick="history.back()"><img src="<?= BASEURL ?>/img/arrow-left.svg"> Kembali</button>
    <form action="<?= BASEURL ?>/transaksi/updatetransaksi/<?= $data['id'] ?>" method="post">
        <div class="input-container">
            <label for="tgl-bayar">
                <img src="<?= BASEURL ?>/img/date-masuk.svg" alt="id date icon">
            </label>
            <input type="date" name="tgl_bayar" id="tgl-bayar" value="<?= $data['update']['tgl_bayar'] ?>">
            <p>tanggal dibayar</p>
        </div>
        <div class="input-container">
            <label for="batas-waktu">
                <img src="<?= BASEURL ?>/img/date-batas.svg" alt="id date icon">
            </label>
            <input type="date" name="batas_waktu" id="batas-waktu" required value="<?= $data['update']['batas_waktu'] ?>">
            <p>batas waktu</p>
        </div>
        <div class="input-container">
            <label for="qty">
                <img src="<?= BASEURL ?>/img/qty.svg" alt="qty icon">
            </label>
            <input type="number" name="qty" id="qty" placeholder="qty" step="0.1" min="0" placeholder="QTY" required value="<?= $data['update']['qty'] ?>">
            <p>QTY</p>
        </div>
        <div class="input-container">
            <label for="tambahan">
                <img src="<?= BASEURL ?>/img/bag-plus.svg" alt="id pay icon">
            </label>
            <input type="number" name="biaya_tambahan" id="tambahan" max="11" min="0" placeholder="Biaya tambahan" value="<?= $data['update']['biaya_tambahan'] ?>" required>
            <p>biaya tambahan</p>
        </div>
        <div class="input-container">
            <label for="pajak">
                <img src="<?= BASEURL ?>/img/tax.svg" alt="id pajak icon">
            </label>
            <input type="number" name="pajak" id="pajak" min="0" max="11" placeholder="Pajak" value="<?= $data['update']['pajak'] ?>" required>
            <p>pajak</p>
        </div>
        <div class="input-container">
            <label for="status">
                <img src="<?= BASEURL ?>/img/service.svg" alt="id status icon">
            </label>
            <select name="status" id="status">
                <option value="masuk" <?= $data['update']['status'] == "masuk" ? "selected" : NULL ?>>masuk</option>
                <option value="proses" <?= $data['update']['status'] == "proses" ? "selected" : NULL ?>>proses</option>
                <option value="selesai" <?= $data['update']['status'] == "selesai" ? "selected" : NULL ?>>selesai</option>
                <option value="diambil" <?= $data['update']['status'] == "diambil" ? "selected" : NULL ?>>diambil</option>
            </select>
            <p>status cucian</p>
        </div>
        <div class="input-container">
            <label for="dibayar">
                <img src="<?= BASEURL ?>/img/bag-check.svg" alt="dibayar icon">
            </label>
            <select name="dibayar" id="dibayar">
                <option value="belum dibayar" <?= $data['update']['dibayar'] == "belum dibayar" ? "selected" : NULL ?>>belum dibayar</option>
                <option value="lunas" <?= $data['update']['dibayar'] == "lunas" ? "selected" : NULL ?>>lunas</option>
            </select>
            <p>status pembayaran</p>
        </div>
        <div class="input-container keterangan">
            <textarea name="keterangan" id="keterangan" placeholder="keterangan"><?= $data['update']['keterangan'] ?></textarea>
            <p>keterangan</p>
        </div>
        <button type="submit" id="button-tambah" name="submit">Update</button>
    </form>
</div>