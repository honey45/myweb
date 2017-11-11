<?php

require_once("config.php");
require_once("class_session.php");

session_start();



/* Get the parameters from the form */
$itemsid = $_POST['itemsid'];
$quantity = $_POST['quantity'];
$sel = $_POST['sel'];

$conn = mysql_connect(HOST,USER,PW);
mysql_select_db(DB, $conn) or die(mysql_error());

$error_log = false;



?>
	<div id="center">
		<div id="bar">
                     		</div>
		<div id="navigation">
                        <div id="pagenav">
				<?php
				/* Update the cart using the cart parameters */
				if(is_array($itemsid) && !empty($itemsid)) {
					$query = "LOCK TABLES cart WRITE";
					mysql_query($query,$conn) or die(mysql_error());
					foreach($itemsid as $id) {
						$q = $quantity[$id];
						if(isset($sel[$id])) {
							$s = $sel[$id];
							$query = "SELECT * FROM cart WHERE  id_item=".$id;
							//$res = mysql_query($query,$conn) or die(mysql_error());
							$res = mysql_query($query);
                                        		if(!$res) {
                                                		mysql_query("UNLOCK TABLES");
                                                		mysql_close();
                                                		print mysql_error();
                                        		}
							if(mysql_num_rows($res) == 0) {
								$query ="INSERT INTO cart (sid,id_item,quantity) VALUES ('".$_SESSION['']."',".$id.",".$q.")";
							}
							else {
								$query = "UPDATE cart SET quantity=quantity+".$q." WHERE id_item=".$id;
							}
						//mysql_query($query,$conn) or die(mysql_error());
							$result = mysql_query($query);
                                        		if(!$result) {
                                                		mysql_query("UNLOCK TABLES");
                                                		mysql_close();
                                                		print mysql_error();
                                        		}
						}
					}
					$query = "UNLOCK TABLES";
					mysql_query($query,$conn) or die(mysql_error());
				}		
 				
				/* Login error */
                mysql_close($conn);

            
				?> 
			</div>
                </div>
	</div>

