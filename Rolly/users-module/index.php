<?php
include_once 'classes/class.user.php';
/* instantiate class object */
$user = new User();
?>

<div id="second-submenu">
    <h4>Users</h4>
</div>
<div id="third-submenu">
    <a href="index.php?page=settings">List Users</a> | 
    <?php if($user-> get_user_access($user_id) == "Owner" OR $user-> get_user_access($user_id) == "Supervisor"){?> <a href="index.php?page=settings&subpage=users&action=create">New User</a> | <?php } else {} ?> 
    Search <input type="text" id="search" name="search" onkeyup="showResults(this.value)">
</div>
<div id="subcontent">
    <?php
      switch($action){
                case 'create':
                    require_once 'users-module/create-user.php';
                break; 
                case 'modify':
                    require_once 'users-module/modify-user.php';
                break; 
                case 'profile':
                    require_once 'users-module/view-profile.php';
                break;
                case 'result':
                    require_once 'users-module/search.php';
                break;
                default:
                    require_once 'users-module/main.php';
                break; 
            }
    ?>
  </div>
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
    xmlhttp.open("GET", "users-module/search.php?q=" + str, true);
    xmlhttp.send();
  }
}
</script>