<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="<?= BASEURL ?>/css/style.css?v=4">
    
    <!-- Load css -->
    <?php if(isset($data['css'])) : ?>
        <?php foreach($data['css'] as $css) : ?>
            <link rel="stylesheet" href="<?= BASEURL ?>/css/<?= $css ?>.css?v=12">
        <?php endforeach; ?>
    <?php endif; ?>

    <title><?= isset($data['title']) ? $data['title'] : "lauWash"; ?></title>
</head>