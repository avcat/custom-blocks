<?php
    [
        'left' => $left,
        'right' => $right,
    ] = $fields;
?>

<div class="container">

    <?php
        [
            'title' => $title,
            'keyword_case_study_pdf' => $keyword_case_study_pdf,
            'button_title' => $button_title,
        ] = $left;
    ?>
    <div class="left">

        <?php if ($title) { ?>
            <h2 class="title">
                <?= $title; ?>
            </h2>
        <?php } ?>

        <?php if ($keyword_case_study_pdf) {
            echo do_shortcode("[form_mailing keyword='" . $keyword_case_study_pdf . "' btn_title='" . $button_title . "']");
        } ?>

    </div>

    <?php
        [
            'image' => $image,
        ] = $right;
    ?>
    <div class="right">

        <?php if ($image['url']) { ?>
            <img 
                class="form-image" 
                src="<?= $image['url']; ?>" 
                alt="<?= $keyword_case_study_pdf; ?>"
            >
        <?php } ?>

    </div>

</div>