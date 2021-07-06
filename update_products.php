<html>
<a href="logout.php">Logout</a><br>
<a href="http://eve.kean.edu/~castiyor/CPS3740/cps3740_p2.html">Return to Project 2 homepage</a><br>
</html>

<html>
<head>

    <?php

include "db_connect.php";
    $con=mysqli_connect($server,$username,$password,$dbname)
        or die("cannot connect to database");

$query = "select a.id,a.name,a.description,a.sell_price,a.cost,a.quantity ,u.login as user_id ,v.Name vendor_id from (CPS3740_2018S.Products_castiyor a,CPS3740.Vendors v,CPS3740.Users u) JOIN Vendors on Vendors.V_Id=vendor_id Join Users on Users.Id=a.id where a.id=u.id and Vendor_id=v.V_id group by a.id";
$result = mysqli_query($con,$query) or die(mysqli_error());

?>


<form method="post" action="<?php $_PHP_SELF ?>">
<table width="400" border="0" cellspacing="1" cellpadding="2">
<tr>

<title>The users in the database:</title>
	<h3> The items in the database:</h3>
	<body>
		<table border="1">
		<thread>
			<tr>
				<td>id</td>
				<td>name</td>
				<td>description</td>
				<td>sell_price</td>
				<td>cost</td>
				<td>quantity</td>
				<td>user_id</td>
				<td>vendor_id</td>                    
			</tr>
		</thread>
		<tbody>
            <?php
            
			     while($row = mysqli_fetch_array($result)){
			?>
				<tr>
					<td><?php echo $row['id']?></td>
					<td><?php echo $row['name']?></td>
					<td><?php echo $row['description']?></td>
					<td><?php echo $row['sell_price']?></td>
					<td><?php echo $row['cost']?></td>
					<td><?php echo $row['quantity']?></td>
					<td><?php echo $row['user_id']?></td>
					<td><?php echo $row['vendor_id']?></td>
				</tr>
            <?php
                 }
            
                ?>
				</tbody>
				</table>
	</body>
</table>
    <input name="update" type="submit" id="update" value="Update">
</form>



<?php

if(isset($_POST['update']))
{

                     
					 $description=$_POST['description'];
					 $sell=$_POST['sell_price'];
					 $cost= $_POST['cost'];
					 $quant=$_POST['quantity'];
					 

$sql =("UPDATE CPS3740_2018S.Products_castiyor SET description = $description  , sell_price = $sell, cost = $cost, quantity = $quant ");

$retval = mysqli_query( $sql, $con);
if(! $retval )
{
  die('Could not update data: ' . mysqli_error());
}
echo "Updated data successfully\n";

}


?>
</body>
</html>