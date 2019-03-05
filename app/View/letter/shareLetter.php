<?= $this->layout('layout', ['myTitle' => 'Lettre de motivation']); ?>

<div class="letter">
    <section class="section section--print d-flex flex-column">
        <div class="section__content d-flex flex-column">
            <span><?= $letter->getUserFirstname() ?> <?= $letter->getUserLastname() ?></span>
            <span><?= $letter->getUserAddress() ?></span>
            <span><?= $letter->getUserZipCode() ?> <?= $letter->getUserCity() ?></span>
            <span><?= $letter->getUserPhoneNumber() ?></span>
            <span><?= $letter->getUserEmail() ?></span>
        </div>
        <div class="section__content d-inline-flex flex-column align-self-end">
            <span><?= $letter->getCompanyName() ?></span>
            <span><?= $letter->getCompanyRecipientName() ?></span>
            <span><?= $letter->getCompanyAddress() ?></span>
            <span><?= $letter->getCompanyZipCode() ?> <?= $letter->getCompanyCity() ?></span>
        </div>
        <div class="section__content d-flex flex-column mb-5">
            <span class="text-right"><?= $letter->getUserCity() ?>, le <?= date("d/m/Y", strtotime($letter->getDate())) ?></span>
            <h3 class="mt-5"><?= $letter->getTitle() ?></h3>
            <h4><?= $letter->getObject() ?></h4>
        </div>
        <div class="section__content--space d-flex flex-column mb-5">
            <h4><?= $letter->getTitleSection1() ?></h4>
            <p><?= $letter->getContentSection1() ?></p>
        </div>
        <div class="section__content--space d-flex flex-column mb-5">
            <h4><?= $letter->getTitleSection2() ?></h4>
            <p><?= $letter->getContentSection2() ?></p>
        </div>
        <div class="section__content--space d-flex flex-column mb-5">
            <h4><?= $letter->getTitleSection3() ?></h4>
            <p><?= $letter->getContentSection3() ?></p>
            <p class="mt-5"><?= $letter->getConclusion() ?></p>
        </div>
    </section>
</div>
