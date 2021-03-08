<?php

/**
 * Ajax actions
 *
 * @package PluginCube
 */

namespace PluginCube;



/**
 * Ajax support form
 */

function support_form_ajax () {
	if ( ! wp_verify_nonce($_POST['_wpnonce'], 'support_form') ) {
		wp_send_json_error([
			'message' => 'Invalid nonce'
		]);
	};

    $topic = sanitize_key($_POST['topic']) ?? null;
    $email = sanitize_email($_POST['email']) ?? null;
    $name = $_POST['name'] ?? null;
    $product = sanitize_key($_POST['product']) ?? null;
    $message = $_POST['message'] ?? null;
    $ip = esc_textarea(get_client_ip());
	
    if ( ! is_email($email) ) {
		wp_send_json_error([
			'message' => 'Invalid email'
		]);
	}

    switch ($topic) {
        case 'technical_issues':
            $subject = 'Technical Issues';
            break;

        case 'account_billing':
            $subject = 'Account/Billing';
            break;

        case 'pre_sale_questions':
            $subject = 'Pre-Sale Question';
            break;

        case 'custom_development':
            $subject = 'Custom Development';
            break;
        
        default:
            $subject = 'Technical Issues';
            break;
    }

    $headers = ["From: $email"];

    $message .= "\n____\n";
    $message .= "\nName: $name";
    $message .= "\nTopic: $subject";
    $message .= "\nProduct: $product";
    $message .= "\nIP: $ip";
    
    $send = wp_mail('support@plugincube.com', $subject, $message, $headers);

    if ($send) {
        wp_send_json_success([
            "message" => 'Your message has been successfully sent. We will contact you shortly.'
        ]);
    } else {
        wp_send_json_error([
			'message' => 'An error occurred while processing this request. Please try again later or reach us through Facebook or Twitter @plugincube'
		]);
    }
}

add_action('wp_ajax_support_form', 'PluginCube\support_form_ajax');
add_action('wp_ajax_nopriv_support_form', 'PluginCube\support_form_ajax');


