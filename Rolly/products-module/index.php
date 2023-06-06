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
    xmlhttp.open("GET", "products-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>
<h1>PRODUCTS</h1>
<?php
include_once 'classes/class.product.php';
$product = new Product();
?>
<div id="third-submenu">
    <a href="index.php?page=products&subpage=view">List Product</a> | 
    <?php if($user-> get_user_access($user_id) == "Owner" OR $user-> get_user_access($user_id) == "Supervisor") {?> <a href="index.php?page=products&subpage=create">New Product</a> | <?php } else {} ?>  Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
    <?php
      switch($subpage){
                case 'create':
                    require_once 'products-module/create-user.php';
                break; 
                case 'modify':
                    require_once 'products-module/modify-user.php';
                break; 
                case 'prodprofile':
                    require_once 'products-module/view-profile.php';
                break;
                case 'view':
                    require_once 'products-module/main.php';
                break;
                case 'result':
                    require_once 'products-module/search-user.php';
                break;
                default:
                    require_once 'products-module/main.php';
                break; 
            }
    ?>
  </div>