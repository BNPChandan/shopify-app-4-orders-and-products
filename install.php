<?php
// Set variables for our request
$shop = 'chandan-test-store-1';
$api_key = "7aa8fd514f1041e44774a271840164a8";
$scopes = "read_orders,write_orders,read_products,write_products";
$redirect_uri = "http://localhost/chandan/shopify-app/Advanced-Filter/generate_token.php";

// Build install/approval URL to redirect to
$install_url = "https://" . $shop . ".myshopify.com/admin/oauth/authorize?client_id=" . $api_key . "&scope=" . $scopes . "&redirect_uri=" . urlencode($redirect_uri);

// Redirect
header("Location: " . $install_url);
die();