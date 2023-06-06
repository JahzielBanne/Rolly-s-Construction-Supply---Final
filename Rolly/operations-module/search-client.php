<?php
include_once '../classes/class.client.php';        

$client = new Client();   

$q = $_GET["q"];
$count = 1;
$hint=' <h3>Search Result(s)</h3><table id="data-list">
<tr>
        <th>#</th>
        <th>Name</th>
        <th>Address</th>
        <th>Number</th>
      </tr>';

$data = $client->list_client_search($q);
if($data != false){
    //$hint = '<ul>';
    foreach($data as $value){
        extract($value);
        
        $hint .= '
       <tr>
        <td>'.$count.'</td>
        <td><a href="index.php?page=operations&action=clientprofile&id='.$client_id.'">'.$client_name.'</a></td>
        <td>'.$client_address.'</td>
        <td>'.$client_number.'</td>
      </tr>
        </tr>';
        $count++;
    }
}
$hint .= '</table>';

echo $hint === "" ? "No result(s)" : $hint;
?>