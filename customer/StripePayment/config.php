<?php
	require_once "stripe-php-master/init.php";
	require_once "products.php";

$stripeDetails = array(
		"secretKey" => "sk_test_51PAVMbSCuF2v0HMW5GCOkcFiMREZlS40GaXa283DuYrPUiFdHXYSLH2D0MW05NFR40XLXlBYHKeHFLzmolrUJmZH00UpQ10feX",  //Your Stripe Secret key
		"publishableKey" => "pk_test_51PAVMbSCuF2v0HMWiL1KkuOpNzf3VBLGhZ8PoyJpYJXsT0Io20iqxLaTpy5bH8EA370gaAVO5hCy3czdI1VZcaqK00niSUUJPK"  //Your Stripe Publishable key
	);

	// Set your secret key: remember to change this to your live secret key in production
	// See your keys here: https://dashboard.stripe.com/account/apikeys
	\Stripe\Stripe::setApiKey($stripeDetails['secretKey']);

	
?>
