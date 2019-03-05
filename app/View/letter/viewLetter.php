<?= $this->layout('layout', ['myTitle' => 'Lettre de motivation']); ?>

<div class="letter">
    <?= $this->insert('letter/letterCustomizer', ['letter' => $letter, 'letterStyleList' => $letterStyleList, 'letterAnimationList' => $letterAnimationList]); ?>

    <section class="section section--print d-flex flex-column">
        <div class="section__content d-flex flex-column">
            <span><?= $connectedUser->getFirstname() ?> <?= $connectedUser->getLastname() ?></span>
            <span><?= $connectedUser->getAddress() ?></span>
            <span><?= $connectedUser->getZipCode() ?> <?= $connectedUser->getCity() ?></span>
            <span><?= $connectedUser->getPhoneNumber() ?></span>
            <a href="<?= $router->generate('user_profile') ?>"
            class="btn btn-primary btn-sm mr-auto">Editer profile</a>
        </div>
        <div class="section__content d-inline-flex flex-column align-self-end">
            <span><?= $letter->getCompanyName() ?></span>
            <span><?= $letter->getCompanyRecipientName() ?></span>
            <span><?= $letter->getCompanyAddress() ?></span>
            <span><?= $letter->getCompanyZipCode() ?> <?= $letter->getCompanyCity() ?></span>
            <a href="<?= $router->generate('company_view', ['id' => $letter->getId(), 'companyId' => $letter->getCompanyId()]) ?>"
            class="btn btn-primary btn-sm ml-auto">Editer entreprise</a>
        </div>
        <div class="section__content d-flex flex-column mb-5">
            <span class="text-right">Le <?= date("d/m/Y", strtotime($letter->getDate())) ?> à <?= $connectedUser->getCity() ?></span>
            <h3 class="mt-5"><?= $letter->getTitle() ?></h3>
            <h4><?= $letter->getObject() ?></h4>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'entete']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer entête</a>
        </div>
        <div class="section__content--space d-flex flex-column mb-5">
            <h4><?= $letter->getTitleSection1() ?></h4>
            <p><?= $letter->getContentSection1() ?></p>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'section1']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer section 1</a>
        </div>
        <div class="section__content--space d-flex flex-column mb-5">
            <h4><?= $letter->getTitleSection2() ?></h4>
            <p><?= $letter->getContentSection2() ?></p>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'section2']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer section 2</a>
        </div>
        <div class="section__content--space d-flex flex-column mb-5">
            <h4><?= $letter->getTitleSection3() ?></h4>
            <p><?= $letter->getContentSection3() ?></p>
            <p><?= $letter->getConclusion() ?></p>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'section3']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer section 3</a>
        </div>
    </section>
</div>
