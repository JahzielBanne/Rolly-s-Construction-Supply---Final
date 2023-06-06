<?php
include '../classes/class.product.php';

$action = isset($_GET['action']) ? $_GET['action'] : '';

switch($action){
	case 'new':
        create_new_product();
	break;
    case 'update':
        update_product();
	break;
    case 'deactivate':
        deactivate_product();
	break;
       case 'status&id':
        change_product_status();
	break;
        case 'delete':
        delete_product();
	break;
}
/* Create a New Product */ 
function create_new_product(){
	$product = new Product();
    $pname = ucwords($_POST['pname']);
    $category = ucwords($_POST['category']);
    $price = $_POST['price'];
    
    $result = $product->new_product($pname,$category,$price);
    if($result){
        $product_id = $product->get_product_id($pname);
        header('location: ../index.php?page=products&subpage=users&action=profile&id='.$product_id);
    }
}

/* Updates a Product */ 
function update_product(){
	$product = new Product();
    $pname = ucwords($_POST['pname']);
    $category = ucwords($_POST['category']);
    $price = $_POST['price'];
    $result = $product->update_product($pname,$category,$price);
    if($result){
        header('location: ../index.php?page=products&subpage=prodprofile&id='.$pid);
    }
}

function delete_product(){
    $product = new Product();
    $pid= isset($_GET['id']) ? $_GET['id'] : '';
    $result = $product->delete_product($pid);
    if($result){
        header('location: ../index.php?page=products');
    }
}
?>