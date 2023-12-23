<?php
    [
        'title' => $title,
        'is_slider' => $is_slider,
        'amount_to_display' => $amount_to_display,
        'choose_case_studies_manually' => $choose_case_studies_manually,
        'case_studies' => $case_studies,
    ] = $fields;

    if (!$choose_case_studies_manually) {
        $case_studies = get_posts([
            'post_status' => 'publish',
            'posts_per_page' => $amount_to_display,
            'post_type' => 'case_study',
        ]);
    }
?>

<div class="container">

    <?php if ($title) { ?>
        <h2 class="title">
            <?= $title; ?>
        </h2>
    <?php } ?>

    <?php if ($case_studies && !empty($case_studies)) { ?>
        <ul
            class="other-case-studies"
            <?php if ($is_slider) { ?>
                data-slider="other-case-studies"
            <?php } ?>
        >
            <?php foreach ($case_studies as $case_study) { ?>
                <?php
                    $id = $case_study->ID;
                    $title = $case_study->post_title;
                    $excerpt = get_field('exerpt', $id);
                    $link = get_permalink($id);

                    $thumbnail_url = get_the_post_thumbnail_url($case_study, [365, 263]);
                    $thumbnail_srcset = '';
                    if (!$thumbnail_url) {
                        $case_study_company_logo = get_field('cs_logo', $id);
                        $thumbnail_url = $case_study_company_logo ? $case_study_company_logo['url'] : false;
                    } else {
                        $thumbnail_srcset = wp_get_attachment_image_srcset(get_post_thumbnail_id($case_study));
                    }
                ?>
                <li class="other-case-study">

                    <?php if ($thumbnail_url) { ?>
                        <a 
                            class="thumbnail-link"
                            href="<?= $link; ?>"
                        >
                            <img 
                                class="thumbnail-image"
                                src="<?= $thumbnail_url; ?>" 
                                alt="<?= $title; ?>"
                                <?php if ($thumbnail_srcset) { ?>
                                    srcset="<?= $thumbnail_srcset; ?>"
                                <?php } ?>
                            >
                        </a>
                    <?php } ?>

                    <a 
                        class="title-link"
                        href="<?= $link; ?>"
                    >
                        <h3>
                            <?= $title; ?>
                        </h3>
                    </a>

                    <div class="country">

                        <?php
                            $country_flag_url = null;
                            $country_name = null;
                            $country = get_field('cs_country_term', $id);
                            if ($country) {
                                $country_flag_url = CB_IMG_DIR . '/flags.svg#' . $country['value'];
                                $country_name = $country['label'];
                            }
                        ?>
                        <?php if ($country_flag_url) { ?>
                            <svg 
                                class="country-flag"
                                width="25"
                                height="25"
                                title="<?= $country_name; ?>"
                            >
                                <use href="<?= $country_flag_url; ?>"></use>
                            </svg>
                        <?php } ?>
                        
                        <?php if ($country_name) { ?>
                            <span class="country-name">
                                <?= $country_name; ?>
                            </span>
                        <?php } ?>

                    </div>

                    <div class="excerpt">
                        <?= $excerpt; ?>
                    </div>

                </li>
            <?php } ?>
        </ul>
    <?php } ?>

</div>