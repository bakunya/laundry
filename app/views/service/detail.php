<style>
    main.info {
        height: 50%;
        display: grid;
        margin:  20px auto;
        grid-template-rows: 1fr 1fr;
        max-width: 800px;
        margin-bottom: 30px;
        align-items: center;
    }
    .info img {
        width: 100%;
        height: 100%;
        object-fit: contain;
        object-position: center;
    }
    .info > section > * {
        color: rgb(58, 58, 58);
        font-size: 1rem;
        text-align: center;
        margin: 10px 0;
    }
    .info > section > h1 {
        font-size: 2rem;
        text-transform: capitalize;
    }
    @media screen and (min-width: 800px) {
        main.info {
            grid-template-columns: 1fr 1fr;
            grid-template-rows: auto;
        }
    }
</style>

<main class="info">
    <img src="<?= BASEURL ?>/img/store.jpg" alt="outlet">
    <section>
        <h1><?= $data['outlet']['nama'] ?></h1>
        <p><?= $data['outlet']['alamat'] ?></p>
        <p>Telp: <?= $data['outlet']['telp'] ?></p>
    </section>
</main>