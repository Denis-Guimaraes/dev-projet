<?= $this->layout('layout', ['myTitle' => 'Mot de passe oublié']); ?>

<section class="section">
    <h2 class="section__title">Mot de passe oublié</h2>
    <p>Entrez votre email pour recevoir un lien de réinitialisation.</p>
    <form class="section__content" method="post" action="<?= $router->generate('user_changePasswordLink') ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
            aria-describedby="emailHelp" placeholder="Email">
        </div>
        <button type="submit" class="btn btn-primary">Envoyer</button>
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