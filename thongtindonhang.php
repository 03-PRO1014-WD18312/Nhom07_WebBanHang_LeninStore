<?php require_once 'view/globle/head.php'; ?>

<?php

$servername = "localhost";
$username = "root";
$password = "";
$database = "duan12023";

try {
  $conn = new PDO("mysql:host=$servername;dbname=$database", $username, $password);
  $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  // Retrieve order information from the database
  $orderQuery = $conn->prepare("SELECT * FROM orders");
  $orderQuery->execute();
  $orders = $orderQuery->fetchAll(PDO::FETCH_ASSOC);

  // Display order details
  if (!empty($orders)) {
    ?>
    <div class="container mt-5">
      <h2>Thông Tin Tất Cả Đơn Hàng</h2>
      <table class="table">
        <thead>
          <tr>
            <th>Tên Sản phẩm</th>
            <th>Ảnh</th>
            <th>Số lượng</th>
            <th>Giá</th>
            <th>Tên khách hàng</th>
            <th>Địa Chỉ</th>
            <th>SĐT</th>
            <th>Ngày Đặt</th>
          </tr>
        </thead>
        <tbody>
          <?php foreach ($orders as $order): ?>
            <tr>
              <td>
                <?php echo $order['product_name']; ?>
              </td>
              <td><img src='assets/imgs/item/<?php echo $order['product_img']; ?>' alt='Ảnh sản phẩm' style='width: 50px;'>
              </td>
              <td>
                <?php echo $order['quantity']; ?>
              </td>
              <td>
                <?php echo $order['product_price']; ?>
              </td>
              <td>
                <?php echo $order['customer_name']; ?>
              </td>
              <td>
                <?php echo $order['customer_address']; ?>
              </td>
              <td>
                <?php echo $order['phone_number']; ?>
              </td>
              <td>
                <?php echo $order['order_date']; ?>
              </td>
            </tr>
          <?php endforeach; ?>
        </tbody>
      </table>
    </div>
    <?php
  } else {
    echo "<div class='container mt-5'>Không có đơn hàng nào!</div>";
  }
} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

require_once 'view/globle/footer.php';
?>