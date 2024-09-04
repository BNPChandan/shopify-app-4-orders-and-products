<?php
// Get our helper functions
require_once("inc/functions.php");

// Set variables for our request
$shop = "chandan-test-store-1";
$token = "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";
$query = array(
	"Content-type" => "application/json" // Tell Shopify that we're expecting a response in JSON format
);

// echo 'Hiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiiii';
?>


<ul>
	<li><a href="http://localhost/chandan/shopify-app/Advanced-Filter/index.php" title="">Products</a></li>
	<li><a href="http://localhost/chandan/shopify-app/Advanced-Filter/orders.php" title="">Orders</a></li>
</ul>


<?php
// Run API call to get products
$products = shopify_call($token, $shop, "/admin/products.json", array("status"=>"active", "limit"=>5), 'GET');

// Convert product JSON information into an array
$products = json_decode($products['response'], TRUE);

// echo '<pre>'; print_r($products); echo '</pre>';
?>
<div class="product-container">
	<?php
	foreach ($products as $product) {
		// echo '<pre>'; print_r($product); echo '</pre>';
		?>
		<form name="productListFrm" action="" method="post" enctype="multipart/form-data">
			<table width="100%" cellpadding="10" cellspacing="0" border="0">
				<?php
				foreach ($product as $prdt) {
					// echo '<pre>'; print_r($prdt); echo '</pre>';
					?>
					<tr class="grid-container product-item product-item-<?php echo $prdt['id'];?>">
						<td class="grid-child product-item-col product-item-col-img" width="4%" align="center" valign="middle">
							<a href="#" title=""><img src="<?php echo $prdt['image']['src'];?>" height="48" width="48" alt="" /></a>
						</td>
						<td class="grid-child product-item-col product-item-col-ttl" width="40%" align="left" valign="middle">
							<a href="#" title=""><strong><?php echo $prdt['title'];?></strong></a>
						</td>
						<td class="grid-child product-item-col product-item-col-price" width="10%" align="right" valign="middle">
							<p><span><del><?php echo $prdt['variants'][0]['compare_at_price'];?></del> <?php echo $prdt['variants'][0]['price'];?></span></p>
						</td>
						<?php /*
						<td class="grid-child product-item-col product-item-col-variant" align="left" valign="middle">
						<?php 
							$variants = $prdt['variants'];
							echo '<select name="variant" >';
							foreach ($variants as $variant) {
								echo '<option value="'.$variant['id'].'" selected>'.$variant['title'].'</option>';
								// echo '<p><small>'.$variant['title'].'</small> <span> <del>'.$variant['compare_at_price'].'</del> '.$variant['price'].'</span></p>';
							}
							echo '</select>';
						?>
						</td>
						*/ ?>
					</tr>
					<?php
					// echo '<p>Product: '.$prdt['id'].' '.$prdt['title'].'</p>';
				}
				?>
			</table>
		</form>
		<?php
	}
	?>
</div>
<?php
// // Get the ID of the first product
// $product_id = $products['products'][0]['id'];

// // Modify product data
// $modify_data = array(
// 	"product" => array(
// 		"id" => $product_id,
// 		"title" => "My New Title"
// 	)
// );

// // Run API call to modify the product
// $modified_product = shopify_call($token, $shop, "/admin/products/" . $product_id . ".json", $modify_data, 'PUT');

// // Storage response
// echo $modified_product_response = $modified_product['response'];

?>
<style>
	/*.grid-container {
	    display: grid;
	    grid-template-columns: 1fr 3fr 4fr;
	    grid-gap: 20px;
	}
	.product-item {

	}
	.product-item-col {

	}*/
</style>
