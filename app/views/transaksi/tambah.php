<style>
    .input-container p {text-transform: capitalize}
    form .keterangan {min-width: 300px;}

    @media screen and (min-width: 800px) {
        form {
            place-content: center;
            align-items: end;
        }
        }
        form button {
            width: 100%;
            grid-area: auto;
            grid-column-end: 3;
            grid-row-end: 8;
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
    <h1>Tambah Transaksi</h1>
    <button id="back" onclick="history.back()"><img src="<?= BASEURL ?>/img/arrow-left.svg"> Kembali</button>
    <form action="<?= BASEURL ?>/transaksi/tambahtransaksi" method="post" id="form-tambah">
        <div class="input-container">
            <select name="paket" id="paket" required>
                <?php foreach ($data['paket'] as $paket) : ?>
                    <option value="<?= $paket['id'] ?>"><?= $paket['nama'] ?></option>
                <?php endforeach; ?>
            </select>
            <p>Paket ID</p>
        </div>
        <div class="input-container telp">
            <label for="telephone-tambah">
                <img src="<?= BASEURL ?>/img/telephone.svg" alt="Password Icon">
            </label>
            <input list="telps" type="tel" name="telephone" id="telephone-tambah" placeholder="Nomor telephone" required autocomplete="off" maxlength="14">
            <datalist id="telps">
                <?php foreach($data['telp'] as $telp) : ?>
                    <option value="<?= $telp['telp'] ?>">
                <?php endforeach ; ?>
            </datalist>
            <p>No telp pelanggan</p>
        </div>
        <div class="input-container">
            <label for="invoice-tambah">
                <img src="<?= BASEURL ?>/img/invoice.svg" alt="invoice icon">
            </label>
            <input type="text" name="invoice" id="invoice-tambah" placeholder="Kode invoice" maxlength="100" required>
            <p>kode invoice</p>
        </div>
        <div class="input-container">
            <label for="tgl-diterima">
                <img src="<?= BASEURL ?>/img/date.svg" alt="id date icon">
            </label>
            <input type="date" name="tgl_diterima" id="tgl-diterima-tambah" required>
            <p>tanggal diterima</p>
        </div>
        <div class="input-container">
            <label for="batas-waktu">
                <img src="<?= BASEURL ?>/img/date-batas.svg" alt="id date icon">
            </label>
            <input type="date" name="batas_waktu" id="batas-waktu" required>
            <p>batas waktu</p>
        </div>
        <div class="input-container">
            <label for="diskon">
                <img src="<?= BASEURL ?>/img/percent.svg" alt="id diskon icon">
            </label>
            <input type="number" name="diskon" id="diskon" min="0" placeholder="Diskon" value="0">
            <p>diskon</p>
        </div>
        <div class="input-container">
            <label for="qty">
                <img src="<?= BASEURL ?>/img/qty.svg" alt="qty icon">
            </label>
            <input type="number" name="qty" id="qty" placeholder="qty" step="0.1" min="0" placeholder="QTY" required>
            <p>QTY</p>
        </div>
        <div class="input-container keterangan">
            <textarea name="keterangan" id="keterangan" placeholder="keterangan"></textarea>
            <p>keterangan</p>
        </div>
        <button id="button-tambah" name="submit" type="submit">Tambahkan</button>
    </form>
</div>