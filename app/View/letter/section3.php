<?= $this->layout('layout', ['myTitle' => 'MO - éditer Section 3']); ?>

<section class="section">
    <h2 class="section__title">Section 3</h2>
    <form class="section__content" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
        <div class="form-group">
            <label for="title">Titre section 3</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=
            $letter->getTitleSection3(); ?>" placeholder="Titre Section 3">
        </div>
        <div class="form-group">
            <label for="content">Contenu Section 3</label>
            <textarea class="form-control" id="content" name="content" rows="10" placeholder="Contenu section 3"><?= $letter->getContentSection3(); ?></textarea>
        </div>
        <div class="form-group">
            <label for="conclusion">Conclusion</label>
            <textarea class="form-control" id="conclusion" name="conclusion" rows="3" placeholder="Contenu section 3"><?= $letter->getConclusion(); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
</section>