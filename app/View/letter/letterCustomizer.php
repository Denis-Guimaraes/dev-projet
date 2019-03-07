<section class="section">
    <form class="section__content section__content--row" method="post" action="
    <?= $router->generate('letter_update', ['id' => $letter->getId(), 'section' => 'style']); ?>">
        <div class="form-group">
            <input type="text" class="form-control form-control-lg" id="name" name="name"
            value="<?= $letter->getName(); ?>" placeholder="Nom de la lettre">
        </div>
        <div class="mb-3">
            <label for="styleList">Style</label>
            <select class="form-control" name="styleId" id="styleList">
                <?php foreach ($letterStyleList as $letterStyle) : ?>
                    <option value="<?= $letterStyle->getId(); ?>"
                    <?= $letter->getLetterStyleId() === $letterStyle->getId() ? 'selected' : ''; ?>>
                    <?= $letterStyle->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <div class="mb-3">
            <label for="animationList">Animation</label>
            <select class="form-control" name="animationId" id="animationList">
                <?php foreach ($letterAnimationList as $letterAnimation) : ?>
                    <option value="<?= $letterAnimation->getId(); ?>"
                    <?= $letter->getLetterAnimationId() === $letterAnimation->getId() ? 'selected' : ''; ?>>
                    <?= $letterAnimation->getName(); ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <button type="submit" class="btn btn-primary mb-3">Sauvegarder</button>
    </form>
</section>