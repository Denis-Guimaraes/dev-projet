<?= $this->layout('layout', ['myTitle' => 'profil']); ?>

<section class="section">
    <h2 class="section__title">Mon profil</h2>
    <form class="section__content" method="post" action="<?= $router->generate('user_update') ?>">
        <div class="form-group">
            <span><?= $connectedUser->getEmail(); ?></span>
        </div>
        <div class="form-group">
            <label for="firstname">Prénom</label>
            <input type="text" class="form-control" id="firstname" name="firstname" value="<?=
            $connectedUser->getFirstname(); ?>" placeholder="Prénom">
        </div>
        <div class="form-group">
            <label for="lastname">Nom</label>
            <input type="text" class="form-control" id="lastname" name="lastname" value="<?=
            $connectedUser->getLastname(); ?>" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="phoneNumber">Numéro de téléphone</label>
            <input type="text" class="form-control" id="phoneNumber" name="phoneNumber" value="<?=
            $connectedUser->getPhoneNumber(); ?>" placeholder="Numéro de téléphone">
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="<?=
            $connectedUser->getAddress(); ?>" placeholder="Adresse">
        </div>
        <div class="form-group">
            <label for="zipCode">Code postal</label>
            <input type="text" class="form-control" id="zipCode" name="zipCode" value="<?=
            $connectedUser->getZipCode(); ?>" placeholder="Code postal">
        </div>
        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" class="form-control" id="city" name="city" value="<?=
            $connectedUser->getCity(); ?>" placeholder="Ville">
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
        <?php if (isset($error) && !empty($error)) : ?>
            <ul class="alert alert-danger mt-3" role="alert">
                <?php foreach ($error as $errorText) : ?>
                    <li>
                        <?= $errorText ?>
                    </li>
                <?php endforeach; ?>
            </ul>
        <?php endif; ?>
    </form>
    <div class="section__delete">
        <button type="button" class="btn btn-danger" id="deleteUser">Supprimer mon profil</button>
    </div>
    <?php if (isset($success)) : ?>
        <div class="modal" id="modalMessage" tabindex="-1" role="dialog"
        aria-labelledby="modalMessageTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalMessageTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= $success ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Fermer</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
    <div class="modal" id="modalAlert" tabindex="-1" role="dialog" aria-labelledby="modalAlertTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalAlertTitle">Message</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        Êtes-vous sûr de vouloir supprimer votre profil ?
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>
                        <form action="<?= $router->generate('user_delete') ?>" method="get">
                        <button type="submit" class="btn btn-danger">Supprimer</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
</section>