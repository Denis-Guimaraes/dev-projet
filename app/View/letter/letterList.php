<?= $this->layout('layout', ['myTitle' => 'Mes lettre de motivation']); ?>

<div class="letter">
    <section class="section row justify-content-around">
        <h2 class="section__title col-12">Mes lettres de motivation</h2>
        <?php foreach ($letterList as $letter) : ?>
            <div class="section__content card col-md-5 p-0">
                <h3 class="section__subtitle card-header"><?= $letter->getName() ?></h3>
                <div class="card-body">
                    <p class="card-text">Entreprise : <?= $letter->getCompanyName() ?></p>
                    <p class="card-text">Objet : <?= $letter->getObject() ?></p>
                    <p class="card-text">Lien : 
                    <a href="<?= $router->generate('letter_share', ['hash' => $letter->getLink()])
                    ?>">http://localhost<?= $router->generate('letter_share', ['hash' => $letter->getLink()]) ?></a></p>
                    <div class="d-flex justify-content-end">
                        <a href="<?= $router->generate('letter_view', ['id' => $letter->getId()]) ?>"
                        class="btn btn-primary ml-2">Editer la lettre</a>
                    </div>
                    <div class="section__delete d-flex justify-content-end">
                        <a href="<?= $router->generate('letter_delete', ['id' => $letter->getId()]) ?>"
                        class="btn btn-danger">Supprimer la lettre</a>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>