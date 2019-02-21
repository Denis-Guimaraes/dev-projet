<!DOCTYPE html>
<html lang="fr">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title><?= $this->e($myTitle); ?></title>
    </head>
    <body>
        <header> 
            <h1>Bienvenue sur Dev Projet</h1>
        </header>
        <main>
            <?= $this->section('content'); ?>
        </main>
        <footer>
            Denis Guimaraes &copy; 2019
        </footer>
    </body>
</html>