<?php

    if ( ! function_exists( 'ot_type_tabs' ) ) {

        function ot_type_tabs( $args = []) {
            new GMO\ThemeSettings\CustomField\Tabs($args);
        }
    }

    if ( ! function_exists( 'ot_type_textarea2' ) ) {

        function ot_type_textarea2( $args = []) {
            new GMO\ThemeSettings\CustomField\Textarea($args);
        }
    }

    if ( ! function_exists( 'ot_type_checkbox' ) ) {

        function ot_type_checkbox( $args = []) {
            new GMO\ThemeSettings\CustomField\checkbox($args);
        }
    }