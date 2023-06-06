<?php
include_once '../classes/class.release.php';
include_once '../classes/class.client.php';        

$order = new Order();
$client = new Client();   

$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>#</th>
        <th>Order Date / ID</th>
        <th>Customer / Description</th>
        <th>Amount</th>
        <th>Status</th>
      </tr>';

$data = $order->list_order_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);
        
        $status ="";
        
        if($order->get_order_status($order_id) == 0){
            $status = "Order Ongoing";
        } else {
            $status = "Order Delivered";
        }
        $hint .= '
       <tr>
        <td>'.$count.'</td>
        <td><a href=""index.php?page=operations&action=addorder&id='.$order_id.'">'.$order->get_order_dateadded($order_id).' - '.$order_id.'</a></td>
        <td>'.$client->get_client_name($client_id).'</td>
        <td>'.$order->get_sum($order_id).'</td>
        <td>'.$status.'</td>
      </tr>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

echo $hint === "" ? "No result(s)" : $hint;
?>