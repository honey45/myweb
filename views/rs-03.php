<?php

require_once("config.php");
require_once("class_session.php");
require"header.php";
require"headerpic.php";
require"list-right.php";

session_start();


if(isset($_GET['logout'])) {
	session_destroy();
	header('Location: ../index.php');
}

$link = mysql_connect(HOST, USER, PW);
if (!$link) {
  	die ("Error connecting to the database: " . mysql_error());
}

$db_selected = mysql_select_db(DB, $link);
if (!$db_selected) {
  	die ("Error selecting the database: " . mysql_error());
}

$error_flag = false;


?>

	 <div id="navigation">
          <div id="pagenav">
			
				<b>Store</b><br><br>
				<table>
				<tr>	
				<td><b><i>Product</i></b></td>
				<td><b><i>Price</i></b></td>
			
				<td><b><i>Quantity</i></b></td>
				<td><b><i>Select</i></b></td>
				</tr>
				</table>
			<?php	
				/* Database query for the products */
				$query = "SELECT * FROM products limit 10,11";
				$products = mysql_query($query);

				if (!$products) {
  					die("Query error  $query: " . mysql_error());
				}
				
				while($product = mysql_fetch_array($products) ) { ?>	
				<table>
				<tr>
			    <td><?php print $product['item'];?></td>
				<td><?php print $product['prize'];?> $;</td>
				<td>
				<form action="addcart.php" method="post">
				<input type="text" name="quantity[<?php print $product['id'];?>]" value="1" size="3">
				<input type="hidden" name="itemsid[]" value="<?php print $product['id'];?>">				
				</td>
				<td><input type="checkbox" name="sel[<?php print $product['id'];?>]" value="<?php print $product['item']?>"></td>
				</tr>
				</table>
			<?php
				}
			
			mysql_close();
                        if($error_flag == false) { ?>
			<br>
			<input type="submit" value="Add to Cart">
			</form>

			<?php } ?>
	   </div>
  	
                       
              <div id="cart">
				<b>Cart</b><br><br>
				<?php
				$query = "SELECT * FROM cart INNER JOIN products ON cart.id_item=products.id ";
				$res = mysql_query($query,$link) or die(mysql_error());
				if(mysql_num_rows($res) == 0) {
					echo "The cart is empty"; 
				}
				else {
					$t = 0;
					while($record = mysql_fetch_assoc($res)) {?>
						<table>
						<tr>
						<tr><?php print $record['item']. " [" .$record['quantity']. "]";?></tr>		
						</tr>
						</table>
				<?php
					$t += $record['prize']*$record['quantity'];
					}?>
					<br><b><i>Total:</i></b>
				<?php
					print " " .$t;?>USD;<br>
					<br><hr><br>
					<b><i><a href="showcart.php">Show Cart</a></i></b>
				<?php
				}	
				?>	
			</div>
		</div>
  </div>

<?php require "footer.php"; ?>