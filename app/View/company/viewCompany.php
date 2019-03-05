<?= $this->layout('layout', ['myTitle' => 'Entreprise']); ?>

<section class="section">
    <h2 class="section__title">Entreprise</h2>
    <form class="section__content" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <div class="form-group">
            <label for="name">Nom</label>
            <input type="text" class="form-control" id="name" name="name" value="<?=
            $company->getName(); ?>" placeholder="Nom">
        </div>
        <div class="form-group">
            <label for="recipientName">Nom du destinataire</label>
            <input type="text" class="form-control" id="recipientName" name="recipientName" value="<?=
            $company->getRecipientName(); ?>" placeholder="Nom du destinataire">
        </div>
        <div class="form-group">
            <label for="address">Adresse</label>
            <input type="text" class="form-control" id="address" name="address" value="<?=
            $company->getAddress(); ?>" placeholder="Adresse">
        </div>
        <div class="form-group">
            <label for="zipCode">Code postal</label>
            <input type="text" class="form-control" id="zipCode" name="zipCode" value="<?=
            $company->getZipCode(); ?>" placeholder="Code postal">
        </div>
        <div class="form-group">
            <label for="city">Ville</label>
            <input type="text" class="form-control" id="city" name="city" value="<?=
            $company->getCity(); ?>" placeholder="Ville">
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
</section>