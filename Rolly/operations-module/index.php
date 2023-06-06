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
    xmlhttp.open("GET", "operations-module/search-order.php?q=" + str, true);
    xmlhttp.send();
  }
}    
</script>
<?php
include_once 'classes/class.release.php';
include_once 'classes/class.client.php';        
$order = new Order(); 
$client = new Client();   
?>

<div id="third-submenu">
    <a href="index.php?page=operations">Order List</a> |
    <?php if($user-> get_user_access($user_id) == "Owner" OR $user-> get_user_access($user_id) == "Supervisor") {?> <a href="index.php?page=operations&action=create">New Order</a>  | <?php } else {} ?>
    <a href="index.php?page=operations&action=clientlist">Customer List</a> | 
    <a href="index.php?page=operations&action=client">New Customer</a> | 

    Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'operations-module/create-transaction.php';
                break; 
                case 'clientlist':
                    require_once 'operations-module/client-list.php';
                break;
                 case 'clientprofile':
                    require_once 'operations-module/view-profile.php';
                break;
                case 'client':
                    require_once 'operations-module/createclient.php';
                break; 
              case 'order':
                    require_once 'operations-module/order-list.php';
                break;
              case 'addorder':
                    require_once 'operations-module/order-additems.php';
                break;
              case 'completeorder':
                    require_once 'operations-module/completedorders.php';
                break;
                default:
                    require_once 'operations-module/main.php';
                break; 
            }
    ?>
  </div>