<?= $this->layout('layout', ['myTitle' => 'Accueil']); ?>
<div class="d-flex flex-column flex-md-row">
    <section class="section mr-md-3">
        <h2 class="section__title">Des <strong>lettres de motivations</strong> un peu plus fun !</h2>
        <p class="section__content section__content--space">
            Ecrivez vos <strong class="font-weight-normal">lettres de motivations</strong> <em>en ligne</em>.
            Choisissez leurs styles.
            Choisissez leurs animations.
            Partagez-les avec des liens unique.
        </p>
    </section>
    <section class="section ml-md-3 p-0">
        <img src="<?= $basePath ?>/asset/image/mo-gif.gif" alt="Exemple de lettre" class="rounded w-100">
    </section>
</div>

