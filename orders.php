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
$orders = shopify_call($token, $shop, "/admin/orders.json", array("status"=>"any", "limit"=>5), 'GET');

// Convert product JSON information into an array
$orders = json_decode($orders['response'], TRUE);

// echo '<pre>'; print_r($orders); echo '</pre>';
?>
<h4>Orders</h4>
<table class="table table-bordered my-5" width="100%" border="0">
	<thead>
		<tr>
			<th scope="col">Order #</th>
			<th scope="col">Name</th>
			<th scope="col">Email</th>
			<th scope="col">Order Date</th>
			<th scope="col">Sub Total</th>
			<th scope="col">Status</th>
		</tr>
	</thead>
	<tbody>
		<?php
			foreach ($orders as $order) {
				
					foreach ($order as $key => $value) {
						// echo '<pre>'; print_r($value); echo '</pre>';
					?><tr>
						<td><?php echo $value['order_number']; ?></td>
						<td><?php echo $value['name']; ?></td>
						<td><?php echo $value['email']; ?></td>
						<td><?php echo $value['created_at']; ?></td>
						<td><?php echo $value['subtotal_price']; ?></td>
						<td><?php echo $value['financial_status']; ?></td>
					</tr><?php	
					}
					
			}
		?>
	</tbody>
</table>