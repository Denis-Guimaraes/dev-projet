<?= $this->layout('layout', ['myTitle' => 'Entête']); ?>

<section class="section">
    <h2 class="section__title">Entreprise</h2>
    <form class="section__content" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
        <div class="form-group">
            <label for="name">Date</label>
            <input type="date" class="form-control" id="date" name="date" value="<?=
            date("Y-m-d", strtotime($letter->getDate())); ?>" placeholder="Date">
        </div>
        <div class="form-group">
            <label for="title">Titre de la lettre</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=
            $letter->getTitle(); ?>" placeholder="Titre de la lettre">
        </div>
        <div class="form-group">
            <label for="object">Objet de la lettre</label>
            <input type="text" class="form-control" id="object" name="object" value="<?=
            $letter->getObject(); ?>" placeholder="Objet de la lettre">
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
</section>