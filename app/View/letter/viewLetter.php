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
            <span class="mt-3"><?= $letter->getUserCity() ?>, le <?= date("d/m/Y", strtotime($letter->getDate())) ?></span>
        </div>
        <div class="section__content d-flex flex-column mb-3">
            <h3 class="title-style--<?= $letter->getStyleName() ?> mb-3"><?= $letter->getTitle() ?></h3>
            <h4 class="object-style--<?= $letter->getStyleName() ?>">Objet : <?= $letter->getObject() ?></h4>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'entete']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer entête</a>
        </div>
        <div class="section__content--space d-flex flex-column mb-3">
            <h4 class="subtitle-style--<?= $letter->getStyleName() ?> content-animation"><?= $letter->getTitleSection1() ?></h4>
            <p class="content-style--<?= $letter->getStyleName() ?> content-animation--<?= $letter->getAnimationName() ?>" data-animation="content-animation--basique"><?= $letter->getContentSection1() ?></p>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'section1']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer section 1</a>
        </div>
        <div class="section__content--space d-flex flex-column mb-3">
            <h4 class="subtitle-style--<?= $letter->getStyleName() ?> content-animation"><?= $letter->getTitleSection2() ?></h4>
            <p class="content-style--<?= $letter->getStyleName() ?> content-animation--<?= $letter->getAnimationName() ?>" data-animation="content-animation--basique"><?= $letter->getContentSection2() ?></p>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'section2']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer section 2</a>
        </div>
        <div class="section__content--space d-flex flex-column mb-3">
            <h4 class="subtitle-style--<?= $letter->getStyleName() ?> content-animation"><?= $letter->getTitleSection3() ?></h4>
            <p class="content-style--<?= $letter->getStyleName() ?>  content-animation--<?= $letter->getAnimationName() ?>" data-animation="content-animation--basique"><?= $letter->getContentSection3() ?></p>
            <p class="mt-5"><?= $letter->getConclusion() ?></p>
            <a href="<?= $router->generate('letter_update_view', ['id' => $letter->getId(), 'section' => 'section3']) ?>"
            class="btn btn-primary btn-sm mr-auto">Editer section 3</a>
        </div>
    </section>
</div>
