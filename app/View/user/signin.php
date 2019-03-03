<?= $this->layout('layout', ['myTitle' => 'Connexion']); ?>

<section class="section">
    <h2 class="section__title">Connexion</h2>
    <form class="section__content" method="post" action="<?= $router->generate('user_signin') ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
            aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Connexion</button>
    </form>
    <?php if (isset($error) && !empty($error)) : ?>
        <ul class="alert alert-danger" role="alert">
            <?php foreach ($error as $errorText) : ?>
                <li>
                    <?= $errorText ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>
