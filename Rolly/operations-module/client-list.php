<script>
function showResults(str) {
  if (str.length == 0) {
    document.getElementById("search-result").innerHTML = "";
    return;
  } else {
    var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function() {
      if (this.readyState == 4 && this.status == 200) {
        document.getElementById("search-result").innerHTML = this.responseText;
      }
    };
    xmlhttp.open("GET", "operations-module/search-client.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>

<span id="search-result">
<h3>Customer List</h3>
<div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Address</th>
        <th>Number</th>
      </tr>
<?php
include_once 'classes/class.client.php';
$client = new Client();
$count = 1;
if($client->list_client() != false){
foreach($client->list_client() as $value){
   extract($value);
  
?>
      <tr>
        <td><?php echo $count;?></td>
        <td><a href="index.php?page=operations&action=clientprofile&id=<?php echo $client_id;?>"><?php echo $client_name;?></a></td>
        <td><?php echo $client_address;?></td>
        <td><?php echo $client_number;?></td>
      </tr>
      <tr>
<?php
 $count++;
}
}else{
  echo "No Record Found.";
}
?>
    </table>
</div>