<?php
    [
        'title' => $title,
        'subtitle' => $subtitle,
        'cards' => $cards,
    ] = $fields;
?>

<div class="container">

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php if ($subtitle) { ?>
        <div class="subtitle">
            <?= $subtitle; ?>
        </div>
    <?php } ?>

    <?php if (!empty($cards)) { ?>
        <div class="kit-cards">
            <?php foreach ($cards as $card) { 
                $thumbnail_url = $card['thumbnail']['url'];
                $link = $card['link'];
                $target = $link['target'] ? $link['target'] : '_self';

                if ($link) {
                    $link_title = $link['title'];
                    $link_url = $link['url'];
                }
            ?>
                <a 
                    class="kit-card"
                    href="<?= $link_url; ?>"
                    target="<?= $target; ?>"
                >

                    <?php if ($thumbnail_url) { ?>
                        <div class="thumbnail-wrapper">
                            <img
                                class="thumbnail-image" 
                                src="<?= $thumbnail_url; ?>" 
                                alt="<?= $link_title; ?>"
                            >
                        </div>
                    <?php } ?>

                    <h3 class="card-title">
                        <svg width="24" height="24">
                            <use href="<?= CB_IMG_DIR; ?>/icons.svg#arrow-right"></use>
                        </svg>
                        <span>
                            <?= $link_title; ?>
                        </span>
                    </h3>

                </a>
            <?php } ?>
        </div>
    <?php } ?>

</div>