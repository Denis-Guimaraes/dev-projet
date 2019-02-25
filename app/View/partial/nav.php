<nav class="navbar navbar-expand-md navbar-dark bg-dark">
    <a class="header__title navbar-brand" href="<?= $isConnected ? $router->generate('user_profile'): $router->generate('main_home') ?>">Motiv'Online</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>
    <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-auto">
            <?php if(!$isConnected): ?>
                <li class="nav-item">
                    <a class="header__link nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('main_home') ? 'active' : '' ?>  " href="<?= $router->generate('main_home'); ?>">Accueil</a>
                </li>
                <li class="nav-item">
                    <a class="header__link nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('user_signin_view') ? 'active' : '' ?>  " href="<?= $router->generate('user_signin_view'); ?>">Connexion</a>
                </li>
                <li class="nav-item">
                    <a class="header__link nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('user_signup_view') ? 'active' : '' ?>  " href="<?= $router->generate('user_signup_view'); ?>">Inscription</a>
                </li>
            <?php else: ?>
                <li class="nav-item">
                    <a class="header__link nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('user_profile') ? 'active' : '' ?>  " href="<?= $router->generate('user_profile'); ?>">Mon profil</a>
                </li>
                <li class="nav-item">
                    <a class="header__link nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('letter_list') ? 'active' : '' ?>  " href="<?= $router->generate('letter_list'); ?>">Mes lettres</a>
                </li>
                <li class="nav-item">
                    <a class="header__link nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('letter_create') ? 'active' : '' ?>  " href="<?= $router->generate('letter_create'); ?>">Ajouer une lettre</a>
                </li>
                <li class="nav-item">
                    <a class="header__link nav-link" href="<?= $router->generate('user_signout'); ?>">Déconnexion</a>
                </li>
            <?php endif; ?>
        </ul>
    </div>
</nav>