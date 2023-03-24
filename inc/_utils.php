<?php

function sanitize_phone_number( $phone, $leavePlus = true ) {
	if ($leavePlus) return preg_replace( '/[^\d+]/', '', $phone );
    else return preg_replace( '/[^\d]/', '', $phone );
}

function sanitize_telegram_number( $phone) {
	return preg_replace( '/[^\d+a-z]/', '', $phone );
}

function debug_to_console($data) {
    $output = $data;
    if (is_array($output))
        $output = implode(',', $output);

    echo "<script>console.log('Debug Objects: " . $output . "' );</script>";
}