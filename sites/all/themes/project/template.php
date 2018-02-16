<?php
/**
 * @file
 * The primary PHP file for this theme.
 */
$current_page = drupal_get_title();
if ($current_page == "Thank you"){
    drupal_goto("hvala");
}
