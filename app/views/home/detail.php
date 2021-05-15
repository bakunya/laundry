<button class="no-print" id="back" onclick="history.back()"><img src="<?= BASEURL ?>/img/arrow-left.svg"> Kembali</button>

<div class="container-list">

    <ul>
        <li>
            <h1>Pemilik</h1>
            <div><span>nama</span><span><?= $data['detail']['pelanggan'] ?></span></div>
            <div><span>telephone</span><span><?= $data['detail']['pelanggan_telp'] ?></span></div>
            <div class="alamat"><span>alamat: </span><span><?= $data['detail']['pelanggan_alamat'] ?></span></div>
        </li>
        <li>
            <h1>Waktu</h1>
            <div><span>Tanggal diterima</span><span><?= $data['detail']['tgl_masuk'] ?></span></div>
            <div><span>batas waktu</span><span><?= $data['detail']['batas_waktu'] ?></span></div>
            <div><span>tanggal bayar</span><span><?= $data['detail']['tgl_bayar'] ?></span></div>
        </li>
        <li>
            <h1>Jenis Cucian</h1>
            <div><span>invoice</span><span><?= $data['detail']['invoice'] ?></span></div>
            <div><span>paket</span><span><?= $data['detail']['paket'] ?></span></div>
            <div><span>layanan</span><span><?= $data['detail']['layanan'] ?></span></div>
        </li>
        <li>
            <h1>status</h1>
            <div>
                <span>status cucian</span>
                <span class="
                    <?= 
                        ( $data['detail']['status'] == "selesai" 
                            ? "selesai" 
                            : $data['detail']['status'] == "diambil" )
                                ? "primary" 
                                : "pending" ?>"
                >
                    <?= $data['detail']['status'] ?>
                </span>
            </div>
            <div><span>status pembayaran</span><span class="<?= $data['detail']['dibayar'] == "lunas" ? "selesai" : "belum" ?>"><?= $data['detail']['dibayar'] ?></span></div>
        </li>
        <li>
            <h1>Biaya</h1>
            <div><span>biaya satuan</span><span>Rp.<?=$data ['detail']['harga'] ?></span></div>
            <div><span>Qty</span><span><?=$data ['detail']['qty'] ?></span></div>
            <div><span>biaya cuci</span><span>Rp.<?= $data['detail']['harga'] * $data['detail']['qty'] ?></span></div>
            <div><span>biaya tambahan</span><span>Rp.<?= $data['detail']['biaya_tambahan'] ?></span></div>
            <div><span>pajak</span><span>Rp.<?= $data['detail']['pajak'] ?></span></div>
            <div><span>diskon</span><span><?= $data['detail']['diskon'] ?>%</span></div>
            <div><span class="total">total</span><span>Rp.<?= $data['detail']['total'] ?></span></div>
        </li>
        <li>
            <h1>Pegawai</h1>
            <div><span>nama</span><span><?= $data['detail']['pegawai'] ?></span></div>
            <div><span>outlet</span><span><?= $data['detail']['outlet'] ?></span></div>
            <div><span>telephone</span><span><?= $data['detail']['outlet_telp'] ?></span></div>
            <div class="alamat"><span>alamat outlet: </span><span><?= $data['detail']['outlet_alamat'] ?></span></div>
        </li>
        <li>
            <h1>Keterangan</h1>
            <div><span><?= $data['detail']['keterangan'] ?></span></div>
        </li>
    </ul>

    <button class="print no-print">Export PDF</button>

</div>