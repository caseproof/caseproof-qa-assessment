<?php
/*
Plugin Name: Caseproof QA Assessment
Description: The purpose of this plugin is to assign the QA candidate with the responsibility of identifying bugs in a sample broken plugin. The plugin should intentionally contain bugs for the candidate to discover.
Version: 1.0.0
*/

if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

add_action( 'plugins_loaded', 
  function() {
    require_once 'class-contact-form.php';    
    new Caseproof_QA_Assessment_Plugin();
  }
);