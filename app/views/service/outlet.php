<style>
    p#outlet {
        font-size: 1.7rem;
        font-family: 'IBM-Medium';
        color: gray;
    }
    .card-price-title span {
        display: flex;
        justify-content: space-evenly;
        font-size: 0.9rem;
        font-weight: normal;
        font-family: 'IBM-Medium';
    }

    .card-body {
        display: grid;
        grid-template-rows: 45px 130px 200px 80px;
    }

    .card-body a { 
        font-size: 1rem; 
        transition: all 200ms ease-in-out;
        width: auto;
        text-align: right;
        display: block;
        margin: 20px 10px 10px 10px;
        margin-left: auto;
        color: #ffffff;
        background-color: #2196F3;
        padding: 10px 15px;
        border-radius: 10px;
        height: auto;
    }

    .card-body a:hover,
    .card-body a:focus,
    .card-body a:active { background-color: #0d69b3;}
    .input-container {
        max-width: 300px;
        margin: 10px 30px;
    }
    #main {
        max-width: 800px;
        margin: auto;
    }
    .card-body ul > li {font-size: 1rem;}
</style>

<main id="main">

    <h1 class="title">Outlet Kami</h1>
    
    <div class="input-container">
        <label for="search">
            <img src="<?= BASEURL ?>/img/search.svg" alt="Password Icon">
        </label>
        <input type="text" name="search" id="search" placeholder="Search by alamat or ID" required data-path="service/searchoutlet" autocomplete="on">
    </div>

    <section class="card-container">

        <?php foreach($data['outlet'] as $outlet): ?>
            <div class="card-body">
                <h1 class="card-price-title"><span><?= $outlet['id'] ?></span></h1>
                <div class="card-price-content">
                    <img src="<?= BASEURL ?>/img/store.jpg" alt="Image of sepatu">
                    <p id="outlet"><?= $outlet['nama'] ?></p>
                </div>
                <ul>
                    <li><?= $outlet['alamat'] ?></li>
                    <li><?= $outlet['telp'] ?></li>
                </ul>
                <a href="<?= BASEURL ?>/service/detailoutlet/<?= $outlet['id'] ?>">Lihat Harga</a>
            </div>
        <?php endforeach; ?>

    </section>

</main>