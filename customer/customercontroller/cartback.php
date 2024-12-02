<?php 

include '../../config.php';

$admin = new Admin();


//first time inserting to cart or adding quantity to existing cart item------------------------------------------------------------------
if(isset($_POST['insert'])){ 

	$pid = $_POST['pid']; 

	$imagedb = $_POST['image']; 

    $name = $_POST['name'];

	$price = $_POST['price'];

    $cid    =$_POST['cid'];

    $quantity =$_POST['quantity'];

    $total =$quantity *$price;

    $status= 'incart';

    $owner_id =$_POST['owner_pid'];



$query=$admin->ret("SELECT * from `cart` where `cid_f`='$cid' AND pid_f = '$pid' ");
$row=$query->fetch(PDO::FETCH_ASSOC);
    if($query->rowCount()>0) //if present
        {
            $new_quantity = $row['quantity'] + 1;

            $new_total = $new_quantity * $row['price_f'];

            $query=$admin->cud("UPDATE `cart` SET `quantity`='$new_quantity',`total`='$new_total' WHERE `cid_f`='$cid' AND `pid_f` = '$pid' ","updated successfully"); 
            echo "<script>alert('item added to cart again'); window.location.href='../../products.php';</script>";

        }
        else{ //not present 
            //isnert
            $query=$admin->cud("INSERT INTO `cart`(`pid_f`,`name_f`,`price_f`,`imagedb_f`,`cid_f`,`quantity`,`total`,`status`,`owner_id`) VALUES('$pid','$name','$price','$imagedb','$cid','$quantity','$total','$status','$owner_id')","saved");
            echo "<script>alert('item added to cart'); window.location.href='../../products.php';</script>";
        }

}          
?>

<?php
//decrementing quantity
if(isset($_GET['decrement_cartid'])){ 

	$cart_id = $_GET['decrement_cartid']; 
    $cid_f = $_GET['cid']; 

$query=$admin->ret("SELECT * from `cart` where `cid_f`=$cid_f AND `cart_id` = $cart_id");
$row=$query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount()>0){ //if present

        $cartid = $row['cart_id']; //from above cart table
        $cid = $row['cid_f']; //from above cart table
        $old =$row['quantity'];
        $new= $old -=1;

        $price=$row['price_f'];
        echo $total= $price * $new;

        
        $query=$admin->cud("UPDATE `cart` SET `quantity`='$new',`total`='$total' WHERE cart.cart_id=".$cartid,"updated successfully"); 
        echo "<script>window.location.href='../../cart.php';</script>";
}
}

?>

<?php
//increment quantity
if(isset($_GET['increment_cartid'])){ 

	$cart_id = $_GET['increment_cartid']; 
    $cid_f = $_GET['cid']; 

$query=$admin->ret("SELECT * from `cart` where `cid_f`=$cid_f AND `cart_id` = $cart_id");
$row=$query->fetch(PDO::FETCH_ASSOC);

    if($query->rowCount()>0){ //if present

        $cartid = $row['cart_id']; //from above cart table
        $cid = $row['cid_f']; //from above cart table
        $old =$row['quantity'];
        $new= $old +=1;

        $price=$row['price_f'];
        echo $total= $price * $new;

        $query=$admin->cud("UPDATE `cart` SET `quantity`='$new',`total`='$total' WHERE cart.cart_id=".$cartid,"updated successfully"); 
        echo "<script>window.location.href='../../cart.php';</script>";
}
}

?>



<?php 
//----------delete cart items
if(isset($_GET['removecart'])) 
{
$id=$_GET['removecart'];

$query=$admin -> cud("DELETE FROM `cart` WHERE `cart_id`=".$id,"deleted");
echo "<script>alert('deleted successfully'); window.location.href='../../cart.php';</script>";
}
?>


<?php
//update location 

if(isset($_POST['submit_pincode'])){ 

   $location_pincode = $_POST['location_pincode']; //['lid'] is <input tag name=""

    $customer_id = $_POST['customer_id']; 



$query=$admin->cud("UPDATE `customer` SET `location_id`='$location_pincode' WHERE customer.cid='$customer_id' ","updated successfully"); 

echo "<script>window.location.href='../../products.php';</script>";
}
?>
