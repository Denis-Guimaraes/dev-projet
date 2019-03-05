<?= $this->layout('layout', ['myTitle' => 'Section 1']); ?>

<section class="section">
    <h2 class="section__title">Section 1</h2>
    <form class="section__content" method="post" action="<?= $_SERVER['REQUEST_URI'] ?>">
        <div class="form-group">
            <label for="title">Titre section 1</label>
            <input type="text" class="form-control" id="title" name="title" value="<?=
            $letter->getTitleSection1(); ?>" placeholder="Titre Section 1">
        </div>
        <div class="form-group">
            <label for="content">Contenu Section 1</label>
            <textarea class="form-control" id="content" name="content" rows="10" placeholder="Contenu section 1"><?= $letter->getContentSection1(); ?></textarea>
        </div>
        <button type="submit" class="btn btn-primary">Sauvegarder</button>
    </form>
</section>