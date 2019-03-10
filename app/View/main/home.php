<?= $this->layout('layout', ['myTitle' => 'Accueil']); ?>
<div class="d-flex flex-column flex-md-row">
    <section class="section mr-md-3">
        <h2 class="section__title">Des <strong>lettres de motivation</strong> un peu plus fun !</h2>
        <p class="section__content section__content--space">
            Ecrivez vos <strong class="font-weight-normal">lettres de motivation</strong> <em>en ligne</em>.
            Choisissez leurs styles.
            Choisissez leurs animations.
            Partagez-les avec des liens unique.
        </p>
    </section>
    <section class="section ml-md-3 p-0">
        <video autoplay="true" muted loop class="d-block w-100 rounded">
            <source src="<?= $basePath ?>/asset/image/mo-vid_764x.mp4" type="video/mp4">
            <img src="<?= $basePath ?>/asset/image/mo-img_766x.png" alt="exemple de lettre" class="d-block w-100 rounded">
        </video>
    </section>
</div>

