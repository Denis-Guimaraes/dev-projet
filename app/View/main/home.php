<?= $this->layout('layout', ['myTitle' => 'Motiv\'Online']); ?>
<div class="d-flex flex-column flex-md-row">
    <section class="section section--half-width mr-md-3">
        <h2 class="section__title">Des <strong>lettres de motivation</strong> un peu plus fun !</h2>
        <p class="section__content section__content--space">
            Ecrivez vos <strong class="font-weight-normal">lettres de motivation</strong> <em>en ligne</em>.
            Choisissez leurs styles.
            Choisissez leurs animations.
            Partagez-les avec des liens unique.
        </p>
    </section>
    <section class="section section--half-width ml-md-3 p-0">
        <video autoplay playsinline muted loop class="d-block w-100 rounded">
            <source src="<?= $basePath ?>/asset/image/mo-vid_380x.webm" type="video/webm">
            <source src="<?= $basePath ?>/asset/image/mo-vid_380x.mp4" type="video/mp4">
            <img src="<?= $basePath ?>/asset/image/mo-img_380x.png" alt="exemple de lettre" class="d-block w-100 rounded">
        </video>
    </section>
</div>

