<style>
    .card-body {position: relative;}
    .card-footer a {
        margin: 20px;
        display: inline-box;
        display: -webkit-inline-box;
        text-align: right;
        padding: 10 20px;
        background-color: #bbe1fa;
        width: auto;
        width: fit-content;
        width: -moz-fit-content;
        border-radius: 10px;
        color: black;
        font-family: 'IBM-Regular';
        box-shadow: 2px 2px 3px 0px rgb(0 0 0 / 46%);
        transition: 200ms ease-in-out;
    }
    .card-footer a:hover,
    .card-footer a:active,
    .card-footer a:focus { box-shadow: none; }
    .card-price-content {flex-direction: column;}
    .diskon {
        width: 100%;
        padding: 0 20px;
    }
    .actual,
    .price {
        font-size: 2.5rem !important;
        text-align: center;
        font-family: 'IBM-Medium';
    }
    #diskon {
        position: absolute;
        top: 0;
        right: 0;
        width: auto;
        height: 30%;
        background: red;
        display: flex;
        flex-direction: column;
        align-items: flex-end;
        padding: 0 10px;
        color: white;
        justify-content: center;
        font-size: 1.7rem;
        font-family: 'IBM-Bold';
    }
    #diskon > span {font-size: 4rem; font-family: 'IBM-Bold';}
    .card-body .harga { text-decoration: line-through; }
    .layanan {text-align: right;}
    #sidebar a.diskon {
        width: auto;
        padding: 0;
    }
    .hidden {visibility: hidden;}
</style>

<main>

<h1 class="title">Paket</h1>

<section class="card-container">

    <?php foreach($data['paket'] as $harga): ?>
        <div class="card-body">
            <h1 class="card-price-title"><?= $harga['nama'] ?></h1>
            <div class="card-price-content">
                <img src="<?= BASEURL ?>/img/<?= $harga['layanan'] ?>.png" alt="Image of layanan">
                <?php if($harga['diskon'] != NULL) : ?>
                    <div class="diskon">
                        <p class="harga">Rp.<?= $harga['harga'] ?></p>
                        <p class="actual">Rp.<?= $harga['final_harga'] ?></p>
                        <?php 
                            switch ($harga['layanan']) {
                                case "delivery":
                                    echo '<p class="layanan">/ Kilometer</p>';
                                    break;
                                case "fast wash":
                                    echo '<p class="layanan">/ Cucian</p>';
                                    break;
                                case "sepatu":
                                    echo '<p class="layanan">/ Pasang</p>';
                                    break;
                                default:
                                    echo '<p class="layanan">/ '.$harga['layanan'].'</p>';
                                    break;
                            }
                        ?>
                        <p id="diskon">-<?= $harga['diskon'] ?><span>%</span></p>
                    </div>
                <?php else : ?>
                        <div class="diskon">
                            <p class="harga hidden">null</p>
                            <p class="actual">Rp.<?= $harga['final_harga'] ?></p>
                            <?php 
                                switch ($harga['layanan']) {
                                    case "delivery":
                                        echo '<p class="layanan">/ Kilometer</p>';
                                        break;
                                    case "fast wash":
                                        echo '<p class="layanan">/ Cucian</p>';
                                        break;
                                    case "sepatu":
                                        echo '<p class="layanan">/ Pasang</p>';
                                        break;
                                    default:
                                        echo '<p class="layanan">/ '.$harga['layanan'].'</p>';
                                        break;
                                }
                            ?>
                        </div>
                <?php endif ; ?>
            </div>
            <ul>
                <?php foreach (explode(",", $harga['service']) as $service): ?>
                    <li><?= trim($service, " ") ?></li>
                <?php endforeach ; ?>
            </ul>
            <div class="card-footer">
                <a href="<?= BASEURL ?>/service/detailoutlet/<?= $harga['id_outlet'] ?>">Outlet</a>
            </div>
        </div>
    <?php endforeach ; ?>

</section>

</main>