<span id="search-result">
  <h3>Order List</h3>
  <div id="subcontent">
    <table id="data-list">
      <tr>
        <th>#</th>
        <th>Order Date / ID</th>
        <th>Customer / Description</th>
        <th>Amount</th>
        <th>Status</th>
      </tr>
      <?php
      include_once 'classes/class.release.php';
      include_once 'classes/class.client.php';
      $order = new Order();
      $client = new Client();
      $count = 1;
      $ongoingOrders = array();
      $deliveredOrders = array();
      if ($order->list_order() != false) {
        foreach ($order->list_order() as $value) {
          extract($value);
          if ($order->get_order_status($order_id) == 0) {
            $ongoingOrders[] = $value;
          } else {
            $deliveredOrders[] = $value;
          }
        }
        // Display "Order Ongoing" first
        foreach ($ongoingOrders as $value) {
          extract($value);
          ?>
          <tr>
            <td><?php echo $count; ?></td>
            <td><a href="index.php?page=operations&action=addorder&id=<?php echo $order_id; ?>"><?php echo $order->get_order_dateadded($order_id) . ' - ' . $order_id; ?></a></td>
            <td><?php echo $client->get_client_name($client_id); ?></td>
            <td><?php echo $order->get_sum($order_id); ?></td>
            <td><?php echo "Order Ongoing"; ?></td>
          </tr>
          <tr>
          <?php
          $count++;
        }
        // Display "Order Delivered" next
        foreach ($deliveredOrders as $value) {
          extract($value);
          ?>
          <tr>
            <td><?php echo $count; ?></td>
            <td><a href="index.php?page=operations&action=addorder&id=<?php echo $order_id; ?>"><?php echo $order->get_order_dateadded($order_id) . ' - ' . $order_id; ?></a></td>
            <td><?php echo $client->get_client_name($client_id); ?></td>
            <td><?php echo $order->get_sum($order_id); ?></td>
            <td><?php echo "Order Delivered"; ?></td>
          </tr>
          <tr>
          <?php
          $count++;
        }
      } else {
        echo "No Record Found.";
      }
      ?>
    </table>
  </div>
</span>
