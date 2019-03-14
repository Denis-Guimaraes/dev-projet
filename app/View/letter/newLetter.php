<?= $this->layout('layout', ['myTitle' => 'MO - nouvelle lettre de motivation']); ?>

<section class="section">
    <h2 class="section__title">Nouvelle lettre de motivation</h2>
    <form class="section__content" method="post" action="<?= $router->generate('letter_create'); ?>">
        <div class="form-group">
            <label for="name">Nom de la lettre</label>
            <input type="text" class="form-control" id="name" name="name"
            placeholder="Nom de la lettre">
        </div>
        <div class="form-group">
            <label for="companyName">Nom de l'entreprise</label>
            <input type="text" class="form-control" id="companyName" name="companyName"
            placeholder="Nom de l'entreprise">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
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