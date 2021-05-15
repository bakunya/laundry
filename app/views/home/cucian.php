<style>
    p, h1, h2, span {text-transform: capitalize !important;}
    .total {
        text-align: right;
        font-size: 1.3rem;
        color: #424242;
        font-family: 'IBM-Regular';
        margin: 0 15px;
    }
</style>

<main>
    <?= $data['link'] ?>
    <div class="input-container">
        <label for="name">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by invoice kode" required autocomplete="off" data-path="home/searchcucian" required>
    </div>
    <?php if(isset($data['total'])) : ?>
        <h1 class="total">Total: Rp.<?= $data['total'] ?></h1>
    <?php endif; ?>
    <section class="card-container">

        <?php foreach($data['cucian'] as $cucian) : ?>
            <div class="card-body">
                <section class="card-header">
                    <img src="<?= BASEURL ?>/img/<?= $cucian['layanan']?>.png" alt="images">
                    <div>
                        <h1 class="title"><?= $cucian['nama']?></h1>
                        <h2 class="subtitle"><?= $cucian['layanan']?>, <?= $cucian['tgl_masuk']?>.</h2>
                    </div>
                </section>
                <section class="body">
                    <p class="
                        <?php 
                            switch ($cucian['status']) {
                                case 'selesai':
                                    echo "selesai";
                                    break;
                                case 'diambil':
                                    echo "primary";
                                    break;                                
                                default:
                                    echo "pending";
                                    break;
                            }
                        ?>
                    ">
                        <?= $cucian['status']?>.
                    </p>
                    <div class="status">
                        <span class="<?= $cucian['dibayar'] == "lunas" ? "selesai" : "belum" ?>"><?= $cucian['dibayar']?></span>
                    </div>
                </section>
                <section class="footer">
                    <div class="link">
                        <a href="<?= BASEURL ?>/home/detail/<?= $cucian['id'] ?>">Detail</a>
                        <a href="<?= BASEURL ?>/home/printdetail/<?= $cucian['id'] ?>" class="convert">Convert PDF</a>
                    </div>
                </section>
            </div>
        <?php endforeach; ?>

    </section>
</main>