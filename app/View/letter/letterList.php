<?= $this->layout('layout', ['myTitle' => 'Mes lettre de motivation']); ?>

<section class="section">
    <h2 class="section__title">Mes lettres de motivation</h2>
    <?php foreach ($letterList as $letter) : ?>
        <div class="section__content card">
            <h3 class="card-header"><?= $letter->getName() ?></h5>
            <div class="card-body">
                <h4 class="card-title"><?= $letter->getTitle() ?></h5>
                <p class="card-text">Lien : <?= $letter->getLink() ?></p>
                <div class="d-flex justify-content-end">
                    <a href="<?= $router->generate('letter_view', ['id' => $letter->getId()]) ?>" class="btn btn-info mr-2">Prévisualiser</a>
                    <a href="<?= $router->generate('letter_preview', ['id' => $letter->getId()]) ?>" class="btn btn-primary ml-2">Editer</a>
                </div>
                <div class="section__delete d-flex justify-content-end">
                    <a href="#" class="btn btn-danger">Supprimer</a>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
</section>