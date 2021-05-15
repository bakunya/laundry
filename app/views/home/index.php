<main id="landing">
    <img src="<?= BASEURL ?>/img/bg/landing3.jpg" alt="landing">
    <section id="landing-section">
        <div class="blur">
            <h1>lauWash</h1>
            <p>Menyelesaikan semua masalah cucianmu hanya dalam satu hari.</p>
            <a href="<?= BASEURL ?>/auth/register">Mulai Sekarang</a>
        </div>
    </section>
</main>

<?php if($data["allservice"] != NULL) : ?>
    <main id="full-discount">

        <h1 class="diskon">DISKON</h1>
        <h1 class="jumlah"><?= $data["allservice"]['diskon'] ?>%</h1>
        <p class="detail">Untuk Semua Layanan!</p>
        <p class="date">Berlaku hingga <?= $data["allservice"]['date_end'] ?></p>

    </main>
<?php endif ; ?>
<main id="card-diskon">
    <?php foreach ($data['paketdiskon'] as $diskon) : ?>
        <div class="card">
            <div class="card-body">
                <img src="<?= BASEURL ?>/img/sepatu.png" alt="Image of sepatu">
                <p>
                    <span class="actual-harga">Rp.<?= $diskon['harga'] ?> </span>
                    <span class="diskon-harga">Rp.<?= $diskon['final_harga'] ?></span> /
                    <?php 
                        switch ($diskon['layanan']) {
                            case 'delivery':
                                echo "Kilometer";
                                break;
                            case 'fast wash':
                                echo "Cucian";
                                break;
                            case 'sepatu':
                                echo "Pasang";
                                break;
                            default:
                                echo $diskon['layanan'];
                                break;
                        }
                    ?>
                </p>
            </div>
            <div class="card-footer">
                <p class="date">Berlaku hingga <?= $diskon['date_end'] ?></p>
                <a class="link" href="<?= BASEURL ?>/service/detailoutlet/<?= $diskon['id_outlet'] ?>">Lihat Outlet</a>
            </div>
        </div>
    <?php endforeach; ?>
</main>
