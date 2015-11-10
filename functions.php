<?php
/**
 * login_restration auto login users by Username and verfication key/hash
 * This code need to be added in functions.php
 * please be sure to use an child-theme.
 */
function login_registration() {
	// get username
	$loginusername = $_GET['login'];

	// use a unique verification key for each user! - This is just an example code.
	$verificationkey = $_GET['verification_key'];

	if ( ! is_user_logged_in() && $_REQUEST['login'])
	{
		$user    = get_user_by( 'login', $loginusername );
		$user_id = $user->ID;

		wp_set_current_user( $user_id, $loginusername );
		wp_set_auth_cookie( $user_id );
		do_action( 'wp_login', $loginusername );

		// Enter your target URL
		wp_redirect( 'http://target-of-redirect.com/', 301 );
		exit;
	}
}

add_action( 'wp', 'login_registration' );