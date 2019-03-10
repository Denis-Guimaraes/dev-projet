<?= $this->layout('layoutShare', [
    'myTitle' => 'LM - ' . $letter->getUserFirstname() . ' ' . $letter->getUserLastname(),
    'description' => 'La lettre de motivation de ' . $letter->getUserFirstname() . ' ' . $letter->getUserLastname() . ' pour ' . $letter->getCompanyName() . '.',
    ]); ?>

<div class="letter">
    <section class="section section--print d-flex flex-column">
        <div class="info-style--<?= $letter->getStyleName(); ?> d-flex flex-column flex-md-row justify-content-between px-3">
            <div class="section__content d-flex flex-column">
                <span><?= $letter->getUserFirstname() ?> <?= $letter->getUserLastname(); ?></span>
                <span><?= $letter->getUserAddress(); ?></span>
                <span><?= $letter->getUserZipCode(); ?> <?= $letter->getUserCity(); ?></span>
                <span><?= $letter->getUserPhoneNumber(); ?></span>
                <span><?= $letter->getUserEmail(); ?></span>
            </div>
            <div class="section__content d-flex align-self-end flex-column mt-md-5">
                <span><?= $letter->getCompanyName(); ?></span>
                <span><?= $letter->getCompanyRecipientName(); ?></span>
                <span><?= $letter->getCompanyAddress(); ?></span>
                <span><?= $letter->getCompanyZipCode(); ?> <?= $letter->getCompanyCity(); ?></span>
                <span class="mt-3"><?= $letter->getUserCity(); ?>, le <?= date("d/m/Y", strtotime($letter->getDate())); ?></span>
            </div>
        </div>
        <div class="section__content d-flex flex-column mb-3">
            <h3 class="title-style--<?= $letter->getStyleName(); ?> mb-3"><?= $letter->getTitle(); ?></h3>
            <p  class="object-style--<?= $letter->getStyleName(); ?>">Objet : <?= $letter->getObject(); ?></p>
        </div>
        <div class="section__content--space d-flex flex-column mb-3">
            <h4 class="subtitle-style--<?= $letter->getStyleName(); ?> content-animation"><i class="fas fa-arrow-circle-down icon-style--<?= $letter->getStyleName(); ?>"></i><?= $letter->getTitleSection1(); ?></h4>
            <p class="content-style--<?= $letter->getStyleName(); ?> content-animation--<?= $letter->getAnimationName(); ?>" data-animation="content-animation--basique"><?= $letter->getContentSection1(); ?></p>
        </div>
        <div class="section__content--space d-flex flex-column mb-3">
            <h4 class="subtitle-style--<?= $letter->getStyleName(); ?> content-animation"><i class="fas fa-arrow-circle-down icon-style--<?= $letter->getStyleName(); ?>"></i><?= $letter->getTitleSection2(); ?></h4>
            <p class="content-style--<?= $letter->getStyleName() ?> content-animation--<?= $letter->getAnimationName(); ?>" data-animation="content-animation--basique"><?= $letter->getContentSection2(); ?></p>
        </div>
        <div class="section__content--space d-flex flex-column mb-3">
            <h4 class="subtitle-style--<?= $letter->getStyleName(); ?> content-animation"><i class="fas fa-arrow-circle-down icon-style--<?= $letter->getStyleName(); ?>"></i><?= $letter->getTitleSection3(); ?></h4>
            <p class="content-style--<?= $letter->getStyleName(); ?> content-animation--<?= $letter->getAnimationName(); ?>" data-animation="content-animation--basique"><?= $letter->getContentSection3(); ?></p>
            <p class="mt-5"><?= $letter->getConclusion(); ?></p>
        </div>
    </section>
</div>
