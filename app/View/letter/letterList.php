<?= $this->layout('layout', ['myTitle' => 'Mes lettre de motivation']); ?>

<div class="letter">
    <section class="section row justify-content-around">
        <h2 class="section__title col-12">Mes lettres de motivation</h2>
        <?php if (empty($letterList)) : ?>
            <p>Aucune lettre</p>
        <?php endif; ?>
        <?php foreach ($letterList as $letter) : ?>
            <div class="section__content card col-md-5 p-0">
                <h3 class="section__subtitle card-header"><?= $letter->getName(); ?></h3>
                <div class="card-body">
                    <p class="card-text">Entreprise : <?= $letter->getCompanyName(); ?></p>
                    <p class="card-text">Objet : <?= $letter->getObject(); ?></p>
                    <p class="card-text">Lien : 
                    <a href="<?= $router->generate('letter_share', ['id' => $letter->getId(),
                    'hash' => $letter->getLink()]); ?>">
                    <?= $baseUrl . $router->generate('letter_share', ['hash' => $letter->getLink()]); ?></a></p>
                    <div class="d-flex justify-content-end">
                        <a href="<?= $router->generate('letter_view', ['id' => $letter->getId()]); ?>"
                        class="btn btn-primary ml-2">Editer la lettre</a>
                    </div>
                    <div class="section__delete d-flex justify-content-end">
                        <button type="button" class="btn btn-danger delete-letter" data-link="
                        <?= $router->generate('letter_delete', ['id' => $letter->getId()]); ?>">
                        Supprimer la lettre</button>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </section>
</div>
<div class="modal" id="modalLetterDelete" tabindex="-1" role="dialog"
aria-labelledby="modalLetterDeleteTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLetterDeleteTitle">Message</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                Êtes-vous sûr de vouloir supprimer la lettre ?
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                <a href="#" class="btn btn-danger delete-letter-link">Supprimer</a>
            </div>
        </div>
    </div>
</div>