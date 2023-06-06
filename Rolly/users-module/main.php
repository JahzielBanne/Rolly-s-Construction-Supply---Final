<span id="search-result">
  <h3>System Users</h3>
  <div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Name</th>
        <th>Access Level</th>
        <th>Email</th>
      </tr>
      <?php
      $count = 1;
      if ($user->get_user_access($user_id) == "Owner") {
        if ($user->list_users() != false) {
          foreach ($user->list_users() as $value) {
            extract($value);
            ?>
            <tr>
              <td><?php echo $count;?></td>
              <td><a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
              <td><?php echo $user_access;?></td>
              <td><?php echo $user_email;?></td>
            </tr>
            <?php
            $count++;
          }
        }
      } else {
        if ($user->list_one_user($user_id) != false) {
          foreach ($user->list_one_user($user_id) as $value) {
            extract($value);
            ?>
            <tr>
              <td><?php echo $count;?></td>
              <td><<a href="index.php?page=settings&subpage=users&action=profile&id=<?php echo $user_id;?>"><?php echo $user_lastname.', '.$user_firstname;?></a></td>
              <td><?php echo $user_access;?></td>
              <td><?php echo $user_email;?></td>
            </tr>
            <?php
            $count++;
          }
        } else {
          echo "No Record Found.";
        }
      }
      ?>
    </table>
  </div>
</span>
