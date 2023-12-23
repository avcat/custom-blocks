<?php
    [
        'column_title' => $column_title,
        'links' => $links,
        'links_show_more' => $links_show_more,
    ] = $args['column'];
?>

<div class="column column-next">

    <?php if ($column_title) { ?>
        <h2 
            class="footer-column-heading"
            data-js="show-more"
            onclick="this.classList.toggle('active')"
        >
            <span>
                <?= $column_title ?>
            </span>
            <svg width="12" height="8">
                <use href="<?= CB_IMG_DIR; ?>/icons.svg#chevron-down"></use>
            </svg>
        </h2>
    <?php } ?>

    <?php if (!empty($links)) { ?>
        <ul class="footer-column-links">
            <?php foreach ($links as $link) { ?>
                <?php
                    $url = $link['link']['url'];
                    $title = $link['link']['title'];
                    $new = $link['is_new'] ? 'new' : '';
                ?>
                <li class="footer-link-item <?= $new ?>">
                    <a 
                        class="footer-link" 
                        href="<?= $url ?>"
                    >
                        <?= $title ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

    <?php if (!empty($links_show_more)) { ?>
        <button
            class="show-more-btn"
            data-js="show-more"
            onclick="this.classList.toggle('active')"
        >
            <svg width="8px" height="5px">
                <use href="<?= CB_IMG_DIR; ?>/icons.svg#chevron-down"></use>
            </svg>
            <span>
                <?= rbtr('Show more') ?>
            </span>
        </button>

        <ul class="footer-column-links links-show-more">
            <?php foreach ($links_show_more as $link) { ?>
                <?php
                    $url = $link['link']['url'];
                    $title = $link['link']['title'];
                    $new = $link['is_new'] ? 'new' : '';
                ?>
                <li class="footer-link-item <?= $new ?>">
                    <a 
                        class="footer-link" 
                        href="<?= $url ?>"
                    >
                        <?= $title ?>
                    </a>
                </li>
            <?php } ?>
        </ul>
    <?php } ?>

</div>