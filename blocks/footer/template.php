<?php
    $columns = get_field('fields_top_section_column');
?>

<section class="top">
    <div 
        class="container"
        style="
            --next-columns: <?= count($columns) ?>;
            --label-new: '<?= rbtr('New') ?>';
        "
    >
        <?php 
            $first_column = get_field('fields_top_section_first_column');
            cb_get_template(
                'footer/first-column',
                [
                    'first_column' => $first_column
                ]
            ); 
        ?>

        <?php
            if (!empty($columns)) { 
                foreach ($columns as $column) {
                    cb_get_template(
                        'footer/column-' . $column['column_type'],
                        [
                            'column' => $column
                        ]
                    );
                }
            } 
        ?>
    </div>
</section>

<section class="bottom">
    <div class="container">

        <div class="awards-socials">
            <?php
                $awards = get_field('fields_bottom_section_awards');
                if (!empty($awards)) {
            ?>
                <ul class="footer-awards">
                    <?php foreach ($awards as $award) { ?>
                        <li class="footer-award">
                            <a
                                class="footer-award-link"
                                href="<?= $award['link']['url'] ?>"
                            >
                                <img
                                    class="footer-award-image"
                                    src="<?= $award['image'] ?>"
                                    alt="<?= $award['link']['title'] ?>"
                                >
                            </a>
                        </li>
                    <?php } ?>
                </ul>
            <?php } ?>
            <?php
                $socials = get_field('fields_bottom_section_socials');
                if (!empty($socials)) {
                    cb_get_template(
                        'footer/socials',
                        [
                            'socials' => $socials
                        ]
                    );
                }
            ?>
        </div>

        <div class="languages-meta">
            <?php
                $meta_info = get_field('fields_bottom_section_meta_info');
                [
                    'copyright_text' => $copyright_text,
                    'additional_links' => $additional_links,
                ] = $meta_info;
            ?>
            <?php
                $languages = get_field('fields_bottom_section_languages');
                if (!empty($languages)) {
                    cb_get_template(
                        'footer/languages',
                        [
                            'languages' => $languages,
                        ]
                    );
                }
            ?>
            <div class="meta-info">
                <?php if ($copyright_text) { ?>
                    <div class="text-copyright">
                        <?= $copyright_text ?>
                    </div>
                <?php } ?>
                <?php if (!empty($additional_links)) { ?>
                    <ul class="additional-links">
                        <?php foreach ($additional_links as $additional_link) { ?>
                            <li class="additional-link-item">
                                <a
                                    class="additional-link"
                                    href="<?= $additional_link['link']['url'] ?>"
                                >
                                    <?= $additional_link['link']['title'] ?>
                                </a>
                            </li>
                        <?php } ?>
                    </ul>
                <?php } ?>
            </div>
        </div>
        
    </div>
</section>