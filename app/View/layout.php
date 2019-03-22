<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <title><?= $myTitle; ?></title>
        <meta name="description" content="Des lettres de motivations un peu plus fun ! Ecrivez vos lettres de motivation en ligne, choisissez leurs styles, leurs animations et partagez-les.">
        <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
        <link rel="stylesheet" href="<?= $basePath; ?>/asset/css/reset.css">
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.7.2/css/all.css" integrity="sha384-fnmOCqbTlWIlj8LyTjo7mOUStjsKC4pOpQbqyi7RrhN7udi9RwhKkMHpvLbHG9Sr" crossorigin="anonymous">
        <link rel="stylesheet" href="<?= $basePath; ?>/asset/css/style.css">
        <link rel="apple-touch-icon" sizes="57x57" href="<?= $basePath ?>/asset/image/apple-icon-57x57.png">
        <link rel="apple-touch-icon" sizes="60x60" href="<?= $basePath ?>/asset/image/apple-icon-60x60.png">
        <link rel="apple-touch-icon" sizes="72x72" href="<?= $basePath ?>/asset/image/apple-icon-72x72.png">
        <link rel="apple-touch-icon" sizes="76x76" href="<?= $basePath ?>/asset/image/apple-icon-76x76.png">
        <link rel="apple-touch-icon" sizes="114x114" href="<?= $basePath ?>/asset/image<?= $basePath ?>/asset/image/apple-icon-114x114.png">
        <link rel="apple-touch-icon" sizes="120x120" href="<?= $basePath ?>/asset/image<?= $basePath ?>/asset/image/apple-icon-120x120.png">
        <link rel="apple-touch-icon" sizes="144x144" href="<?= $basePath ?>/asset/image<?= $basePath ?>/asset/image/apple-icon-144x144.png">
        <link rel="apple-touch-icon" sizes="152x152" href="<?= $basePath ?>/asset/image<?= $basePath ?>/asset/image/apple-icon-152x152.png">
        <link rel="apple-touch-icon" sizes="180x180" href="<?= $basePath ?>/asset/image<?= $basePath ?>/asset/image/apple-icon-180x180.png">
        <link rel="icon" type="image/png" sizes="192x192"  href="<?= $basePath ?>/asset/image/android-icon-192x192.png">
        <link rel="icon" type="image/png" sizes="32x32" href="<?= $basePath ?>/asset/image/favicon-32x32.png">
        <link rel="icon" type="image/png" sizes="96x96" href="<?= $basePath ?>/asset/image/favicon-96x96.png">
        <link rel="icon" type="image/png" sizes="16x16" href="<?= $basePath ?>/asset/image/favicon-16x16.png">
        <link rel="manifest" href="<?= $basePath ?>/asset/image/manifest.json">
        <meta name="msapplication-TileColor" content="#ffffff">
        <meta name="msapplication-TileImage" content="<?= $basePath ?>/asset/image/ms-icon-144x144.png">
        <meta name="theme-color" content="#ffffff">
        <meta property="og:title" content="Motiv'Online"/>
        <meta property="og:image:secure_url" content="https://motivonline.fr/asset/image/mo-img_380x.png"/>
        <meta property="og:image:type" content="image/png"/>
        <meta property="og:image:width" content="380"/>
        <meta property="og:image:height" content="437"/>
        <meta property="og:image:alt" content="Exemple de lettre de motivation" />
        <meta property="og:description" content="Des lettres de motivations un peu plus fun !
        Ecrivez vos lettres de motivation en ligne, choisissez leurs styles, leurs animations et partagez-les."/>
        <meta property="og:url" content="https://motivonline.fr" />
    </head>
    <body class="body">
        <header class="header"> 
            <?= $this->insert('partial/nav'); ?>
        </header>
        <main class="main container-fluid">
            <?= $this->section('content'); ?>
        </main>
        <footer class="footer d-flex justify-content-between align-items-center px-2">
            <p class="m-0">Denis Guimaraes &copy; 2019</p>
            <ul class="text-right mb-0">
                <li class="m-0"><a href="<?= $router->generate('main_contact'); ?>" class="text-light">Contact</a></li>
                <li class="m-0"><a href="<?= $router->generate('main_legalNotice'); ?>" class="text-light">Mentions légales</a></li>
            </ul>
        </footer>
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>
        <script src="<?= $basePath; ?>/asset/js/app.js"></script>
    </body>
</html>