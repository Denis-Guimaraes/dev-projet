<?= $this->layout('layout', ['myTitle' => 'Section 1']); ?>

<section class="section">
    <h2 class="section__title">Section 2</h2>
    <form class="section__content" method="post" action="<?= $_SERVER['REQUEST_URI']; ?>">
        <div class="form-group">
            <label for="title">Titre section 2</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=
            $letter->getTitleSection2(); ?>" placeholder="Titre Section 2">
        </div>
        <div class="form-group">
            <label for="content">Contenu Section 2</label>
            <textarea class="form-control" id="content" name="content" rows="10" placeholder="Contenu section 2"><?= $letter->getContentSection2(); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
</section>