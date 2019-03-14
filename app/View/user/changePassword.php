<?= $this->layout('layout', ['myTitle' => 'MO - changer de mot de passe']); ?>

<section class="section">
    <h2 class="section__title">Changer de mot de passe</h2>
    <form class="section__content" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email"
            aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmer mot de passe</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword"
            placeholder="Confirmer mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
    <?php if (isset($error) && !empty($error)) : ?>
        <ul class="alert alert-danger" role="alert">
            <?php foreach ($error as $errorText) : ?>
                <li>
                    <?= $errorText; ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>