<?php

function redirect_to($url = '')
{
	header('Location: ' . $url);
	exit();
}

function cek_login()
{

	if (isset($_SESSION['user_id'])) {
		// do nothing
	} else {
		redirect_to("login.php");
	}
}

?>