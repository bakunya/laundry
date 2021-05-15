<?php if($data['code'] == "403") : ?>
    <img src="<?= BASEURL ?>/img/403.svg" alt="403 image" id="errorpage">
<?php else : ?>
    <img src="<?= BASEURL ?>/img/404.svg" alt="404 image" id="errorpage">
<?php endif ; ?>


<h2 id="errormessage">Ups... <?= $data['message']; ?>.</h2>