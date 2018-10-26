<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

/* E-mail Messages */

// Account verification
$lang['aauth_email_verification_subject'] = 'Account Verification';
$lang['aauth_email_verification_code'] = 'Your verification code is: ';
$lang['aauth_email_verification_link'] = " You can also click on (or copy and paste) the following link\n\nhttp://yourdomain/account/verification/";

// Password reset
$lang['aauth_email_reset_subject'] = 'Reset Password';
$lang['aauth_email_reset_link'] = "To reset your password click on (or copy and paste in your browser address bar) the link below:\n\nhttp://yourdomain/account/reset_password/";

// Password reset success
$lang['aauth_email_reset_success_subject'] = 'Successful Pasword Reset';
$lang['aauth_email_reset_success_new_password'] = 'Your password has successfully been reset. Your new password is : ';


/* Error Messages */

// Account creation errors
$lang['aauth_error_email_exists'] = 'Email pengguna sudah ada, silakan anda ganti dengan email lainnya.';
$lang['aauth_error_username_exists'] = "Username sudah ada.";
$lang['aauth_error_email_invalid'] = 'e-mail harus diisi.';
$lang['aauth_error_password_invalid'] = 'password harus lebih dari 5 huruf.';
$lang['aauth_error_username_invalid'] = 'Username haru diisi.';
$lang['aauth_error_username_required'] = 'Username tidak boleh kosong.';

// Access errors
$lang['aauth_error_no_access'] = 'Sorry, you do not have access to the resource you requested.';
$lang['aauth_error_login_failed'] = 'E-mail dan Password tidak ditemukan..';
$lang['aauth_error_login_attempts_exceeded'] = 'You have exceeded your login attempts, your account has now been locked.';
$lang['aauth_error_recaptcha_not_correct'] = 'Sorry, the reCAPTCHA text entered was incorrect.';


// Misc. errors
$lang['aauth_error_no_user'] = 'User does not exist';
$lang['aauth_error_account_not_verified'] = 'Your account has not been verified. Please check your e-mail and verify your account.';
$lang['aauth_error_no_group'] = 'Group does not exist';
$lang['aauth_error_self_pm'] = 'It is not possible to send a Message to yourself.';
$lang['aauth_error_no_pm'] = 'Private Message not found';


/* Info messages */
$lang['aauth_info_already_member'] = 'Pengguna sudah ada.';
$lang['aauth_info_group_exists'] = 'Kelompok sudah ada';
$lang['aauth_info_perm_exists'] = 'Akses sudah ada.';
