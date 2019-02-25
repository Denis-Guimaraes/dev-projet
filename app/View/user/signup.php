<?= $this->layout('layout', ['myTitle' => 'Inscription']); ?>

<section class="signup">
    <h2 class="signup__title">Inscription</h2>
    <form class="signup__form" method="post" action="<?= $router->generate('user_signup') ?>">
        <div class="form-group">
            <label for="email">Email</label>
            <input type="email" class="form-control" id="email" name="email" aria-describedby="emailHelp" placeholder="Email">
        </div>
        <div class="form-group">
            <label for="password">Mot de passe</label>
            <input type="password" class="form-control" id="password" name="password" placeholder="Mot de passe">
        </div>
        <div class="form-group">
            <label for="confirmPassword">Confirmer mot de passe</label>
            <input type="password" class="form-control" id="confirmPassword" name="confirmPassword" placeholder="Confirmer mot de passe">
        </div>
        <button type="submit" class="btn btn-primary">Inscription</button>
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
    <?php if(isset($success)) : ?>
        <div class="modal" id="modalMessage" tabindex="-1" role="dialog" aria-labelledby="modalMessageTitle" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="modalMessageTitle">Bienvenue sur Motiv'Online</h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                        <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="modal-body">
                        <?= $success ?>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    </div>
                </div>
            </div>
        </div>
    <?php endif; ?>
</section>