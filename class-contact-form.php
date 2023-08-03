<?php

if(!defined('ABSPATH')) {die('You are not allowed to call this page directly.');}

if( ! class_exists('Caseproof_QA_Assessment_Plugin') ) {
	class Caseproof_QA_Assessment_Plugin {

	    public function __construct() {
	      add_action( 'init', array($this,'process_form') );
	      add_shortcode( 'caseproof_qa_assessment', array($this,'render_shortcode') );
	    }

	    public function render_shortcode( $atts = '', $content = '' ) {

	      if( ! is_singular() ) {
	        return;
	      }

	      ob_start();
	      global $post;
	      ?>
	      <style>
	        input#cspf_qa_first_name {
	          width:54%;
	        } 

	        input#cspf_qa_last_name {
	          width:66%;
	        }

	        input#cspf_qa_form_email {
	          width:83%;
	        }
	      
	        input#cspf_qa_phone {
	           width:77%;
	        }
	      
	        input#cspf_qa_message {
	          width:95%;
	        }

	        input#cspf_qa_assessment_form_submit {
	          border: 1px;
	          border-radius: 15px 15px 15px 15px;
	          background-color: #666 !important;
	          color: #777 !important;
	        }


	        @media only screen and (max-width: 640px) {
	          #cspf_qa_form {
	            width:1024px;
	          }

	          #cspf_qa_form label {
	            font-size: 1.3em;
	          }

	          #cspf_qa_form input:nth-child(odd) {
	            width:1024px;
	          }

	          #cspf_qa_form input:nth-child(even) {
	            width:64px;
	          }

	          #cspf_qa_form label:nth-child(odd) {
	            position: absolute;
	            right:-10px;
	          }
	        }
	  
	      </style>
	      <form id="cspf_qa_form" action="<?php echo get_the_permalink($post); ?>" method="post">
	        <label for="cspf_qa_first_name">First Name (required):</label><br/>
	        <input type="text" id="cspf_qa_first_name" name="cspf_qa_first_name" id="cspf_qa_first_name" value="" /><br/>
	        <label for="cspf_qa_last_name">Last Name:</label><br/>
	        <input type="text" id="cspf_qa_last_name" name="cspf_qa_last_name" id="cspf_qa_last_name" value="" /><br/>
	        <label for="cspf_qa_form_email">Enter your E-Mail Address (required):</label><br/>
	        <input type="text" id="cspf_qa_form_email" name="cspf_qa_form_email" id="cspf_qa_form_email" value="" /><br/>
	        <label for="cspf_qa_form_email">Enter your Phone number:</label><br/>
	        <input type="text" name="cspf_qa_phone" id="cspf_qa_phone" value="" /><br/>
	        <label for="cspf_qa_form_email">Enter your Message:</label><br/>
	        <input type="text" name="cspf_qa_message" id="cspf_qa_message" value="" /><br/><br/>
	        <input type="submit" id="cspf_qa_assessment_form_submit" name="cspf_qa_assessment_form_submit" value="Submit" />
	        <input type="hidden" name="cspf_qa_assessment_form_post_id" value="<?php echo (int) $post->ID; ?>" />
	      </form>
	      <?php
	      return ob_get_clean();
	    }

	    public function process_form() {
	      $errors = array();

	      if( ! isset( $_POST['cspf_qa_assessment_form_submit'] ) || ! isset( $_POST['cspf_qa_assessment_form_post_id'] ) ) {
	        return;
	      }

	      $post_id = (int) $_POST['cspf_qa_assessment_form_post_id'];
	      $url = get_the_permalink($post_id);

	      wp_safe_redirect( $url);
	      die();
	    }
	}
}