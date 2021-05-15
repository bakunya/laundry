<style>
    main {max-width: 800px; margin: 50px auto;}
    li {display: flex; justify-content: space-between; padding: 10px}
    span {text-transform: capitalize;}
    li:nth-child(odd) {background-color: #dcdcdc;}
    ul:nth-child(odd) {margin-top: 50px;}
    main * {font-size: 1rem;}
    main h1.title,
    main h2.subtitle {
        font-family: 'IBM-Medium';
        font-weight: normal;
        font-size: 1.5rem;
        margin:20px;
        text-align: center;
    }
    main h2.subtitle {
        font-size: 1.2rem;
        color: #0375c0;
        text-align: left;
    }
    ul.content::after,
    section.content::after{    
        content: "";
        border-bottom: 1px solid black;
        width: 50%;
        margin: 50px auto;
        display: block;
    }
    p {
        display: flex; 
        justify-content: space-between; 
        margin: 10px; 
        padding: 10px;
    }
    .red {color: red; border-bottom: 1px solid;}
    .green {color: green; border-bottom: 1px solid;}
</style>

<main>
    <button class="no-print" id="back" onclick="history.back()"><img src="<?= BASEURL ?>/img/arrow-left.svg"> Kembali</button>
    <h1 class="title">Diskon Detail</h1>
    <section class="content">
        <p><span>Diskon: </span><span><?= $data['diskon']['diskon'] ?>%</span></p>
        <p><span>Nama Diskon: </span><span><?= $data['diskon']['nama'] ?></span></p>
        <p><span>ID Diskon: </span><span><?= $data['diskon']['id'] ?></span></p>
        <p><span>Semua Layanan: </span><span class="<?= $data['diskon']['semua_layanan'] == true ? "red" : "green" ?>"><?= $data['diskon']['semua_layanan'] == true ? "Semua Layanan" : "Tidak" ?></span></p>
        <p><span>Masih Berlangsung: </span><span class="<?= $data['diskon']['berlangsung'] == true ? "red" : "green" ?>"><?= $data['diskon']['berlangsung'] == true ? "Berlangsung" : "Berakhir" ?></span></p>
        <p><span>Tanggal Berakhir: </span><span><?= $data['diskon']['date_end'] ?></span></p>
    </section>
    <h2 class="subtitle">Data Paket Terkait</h2>
    <?php foreach ($data['paket'] as $paket) : ?>
        <ul class="content">
            <li><span>paket: </span><?= $paket['layanan'] ?></li>
            <li><span>ID paket: </span><?= $paket['id'] ?></li>
        </ul>
    <?php endforeach ; ?>
</main>