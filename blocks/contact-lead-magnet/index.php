<?php

add_filter('acf/load_field/name=keyword_case_study_pdf', function ($field) {
    $case_study_mails = get_option('CaseStudyMailing_Plugin__templates', []);
    
    if (!empty($case_study_mails) && is_array($case_study_mails)) {
        $field['choices'] = array_map(function($mail) {
            return $mail['keyword'];
        }, $case_study_mails);
    }

    return $field;
});