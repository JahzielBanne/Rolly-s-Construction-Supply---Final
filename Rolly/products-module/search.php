<?php
include_once '../classes/class.product.php';
//include '../config/config.php';
$product = new Product();

// get the q parameter from URL
$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
  <th>#</th>
  <th>Name</th>
  <th>Product Category</th>
  <th>Price</th>
</tr>';
$data = $product->list_product_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);

        //$hint .= '<li>'.$prod_name. '</li>';
        $hint .= '
       <tr>
        <td>'.$count.'</td>
        <td><a href="index.php?page=settings&subpage=products&action=profile&id='.$product_id.'">'.$product_name.'</a></td>
        <td>'.$category_name.'</td>
        <td>'.$product_price.'</td>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

// Output "no suggestion" if no hint was found or output correct values
echo $hint === "" ? "No result(s)" : $hint;
?>