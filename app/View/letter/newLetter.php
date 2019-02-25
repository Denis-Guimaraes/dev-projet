<?= $this->layout('layout', ['myTitle' => 'Nouvelle lettre de motivation']); ?>

<section class="section">
    <h2 class="section__title">Nouvelle lettre de motivation</h2>
    <form class="section__content" method="post" action="<?= $router->generate('letter_create') ?>">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="title">Titre</label>
            <input type="text" class="form-control" id="title" name="title" placeholder="Titre">
        </div>
        <button type="submit" class="btn btn-primary">Créer</button>
    </form>
    <?php if(isset($error) && !empty($error)) : ?>
        <ul class="alert alert-danger" role="alert">
            <?php foreach($error as $errorText): ?>
                <li>
                    <?= $errorText ?>
                </li>
            <?php endforeach; ?>
        </ul>
    <?php endif; ?>
</section>