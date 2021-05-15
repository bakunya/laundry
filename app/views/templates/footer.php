<script src="<?= BASEURL ?>/js/swal.min.js"></script>
<script src="<?= BASEURL ?>/js/script.js?v=5"></script>
<?php Flasher::flash(); ?>
<?php if(isset($data['js'])) : ?>
    <?php foreach ($data['js'] as $js) : ?>
        <script src="<?= BASEURL ?>/js/<?= $js ?>.js?v=2"></script>
    <?php endforeach; ?>
<?php endif; ?>
</body>
</html>