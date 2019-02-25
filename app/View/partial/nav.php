<nav>
    <ul class="nav nav-pills">
        <?php if(!$isConnected): ?>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('main_home') ? 'active' : '' ?>  " href="<?= $router->generate('main_home'); ?>">Accueil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('user_signin_view') ? 'active' : '' ?>  " href="<?= $router->generate('user_signin_view'); ?>">Connexion</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('user_signup_view') ? 'active' : '' ?>  " href="<?= $router->generate('user_signup_view'); ?>">Inscription</a>
            </li>
        <?php else: ?>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('user_profile') ? 'active' : '' ?>  " href="<?= $router->generate('user_profile'); ?>">Mon profil</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('letter_list') ? 'active' : '' ?>  " href="<?= $router->generate('letter_list'); ?>">Mes lettres de motvation</a>
            </li>
            <li class="nav-item">
                <a class="nav-link <?= $_SERVER['REQUEST_URI'] === $router->generate('letter_create') ? 'active' : '' ?>  " href="<?= $router->generate('letter_create'); ?>">Nouvelle lettre de motivation</a>
            </li>
        <?php endif; ?>
    </ul>
</nav>