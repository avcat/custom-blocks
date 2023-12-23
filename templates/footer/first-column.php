<?php
    [
        'footer_logo' => $footer_logo,
        'address' => $addresses,
        'email' => $emails,
        'contacts' => $contacts,
    ] = $args['first_column'];
?>

<?php if ($footer_logo) { ?>
    <a class="footer-logo-link" href="<?= get_bloginfo('url') ?>">
        <img class="footer-logo" src="<?= $footer_logo ?>" alt="<?= get_bloginfo('name') ?>">
    </a>
<?php } ?>

<div class="column column-first">
    <?php if (!empty($addresses)) { ?>
        <div class="footer-contacts-block" data-contacts-type="addresses">
            <h2 class="footer-contacts-heading">
                <svg>
                    <use href="<?= CB_IMG_DIR; ?>/icons.svg#map-marker"></use>
                </svg>
                <span>
                    <?= rbtr('Address') ?>
                </span>
            </h2>

            <ul class="footer-contacts-list">
                <?php foreach ($addresses as $address) { ?>
                    <li class="footer-contacts-item">
                        <strong class="footer-contacts-item-primary">
                            <?= $address['city'] ?>
                        </strong>
                        <span class="footer-contacts-item-secondary">
                            <?= $address['street'] ?>
                        </span>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <?php if (!empty($emails)) { ?>
        <div class="footer-contacts-block" data-contacts-type="emails">
            <h2 class="footer-contacts-heading">
                <svg>
                    <use href="<?= CB_IMG_DIR; ?>/icons.svg#mail"></use>
                </svg>
                <span>
                    <?= rbtr('Email') ?>
                </span>
            </h2>
            <ul class="footer-contacts-list">
                <?php foreach ($emails as $email) { ?>
                    <li class="footer-contacts-item">
                        <a class="footer-contacts-link" href="<?= $email['link']['url'] ?>">
                            <?= $email['link']['title'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

    <?php if (!empty($contacts)) { ?>
        <div class="footer-contacts-block" data-contacts-type="contacts">
            <h2 class="footer-contacts-heading">
                <svg>
                    <use href="<?= CB_IMG_DIR; ?>/icons.svg#phone"></use>
                </svg>
                <span>
                    <?= rbtr('Contacts') ?>
                </span>
            </h2>
            <ul class="footer-contacts-list">
                <?php foreach ($contacts as $contact) { ?>
                    <li class="footer-contacts-item">
                        <a class="footer-contacts-link" href="<?= $contact['link']['url'] ?>">
                            <?= $contact['link']['title'] ?>
                        </a>
                    </li>
                <?php } ?>
            </ul>
        </div>
    <?php } ?>

</div>