<section class='py-5 mt-4'>
  <?php
  if (isset($_POST['payCart'])) {
    $id = $_POST['id'];
    $name = $_POST['name'];
    $emails = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    $note = $_POST['note'];
    $total = $_POST['total'];
    $pay = $_POST['pay'];
    if (empty($name) || empty($emails) || empty($phone) || empty($address)) {
      $message[] = 'Vui lòng điền đầy đủ thông tin!';
    } else {
      $id_bill = insertBill($id, $name, $emails, $phone, $address, $note, $total, $pay);
      if ($id_bill) {
        for ($i = 0; $i < sizeof($_SESSION['cart']); $i++) {
          $names = $_SESSION['cart'][$i]['name'];
          $image = $_SESSION['cart'][$i]['image'];
          $price = $_SESSION['cart'][$i]['price'];
          $quantity = $_SESSION['cart'][$i]['quantity'];
          $totals = $price * $quantity;
          insertCart($names, $image, $price, $quantity, $totals, $id_bill);
        }
        if (isset($user_id)) {
          foreach (getBill($user_id) as $date) {
            $date_bill = $date['create_at'];
          }
        } else {
          echo '';
        }


        if ($pay === '0') {
          $pay_show = 'Thanh toán khi nhận hàng';
        } else {
          $pay_show = 'Chuyển khoản';
        }

        $heading = "GWine_Hoa don dien tu_don hang so: $id_bill";

        $body = array();
        foreach ($_SESSION['cart'] as $data) {
          $body[] = "
        <tr class='order_item'>
          <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
          $data[name] </td>
          <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
          $data[quantity] </td>
          <td class='td text-center' style='color: #636363;border: 1px solid #e5e5e5;padding: 12px;text-align: left;vertical-align: middle;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' align='left'>
            <span class='woocommerce-Price-amount amount'>" . number_format($data['price'] * $data['quantity'], 3) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span>
          </td>
        </tr>
        ";
        }
        $item = implode($body);
        echo '
        <div class="pt-3 text-center">
          <img src="https://i.pinimg.com/originals/9b/0e/8a/9b0e8a959f1c77bf0eb46bd737457a30.gif" width="100%" height="300px" alt="">
          <h3 class="mt-4">Cảm ơn bạn đã mua hàng!</h3>
          <h4 class="mt-3">Chi tiết đơn hàng đã gửi về email của bạn!</h4>
          <p class="mt-3">Ấn vào <a href="./index.php?pages=home"><b>Đây</b></a> để trở về trang chủ!</p>
        </div>
      ';


        $mess = "<table width='100%' id='outer_wrapper' style='background-color: #f7f7f7' 'bgcolor='#f7f7f7'>
        <tbody>
          <tr>
          
            <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
            <td width='600'>
              <div id='wrapper' dir='ltr' style='margin: 0 auto;padding: 70px 0;width: 100%;max-width: 600px'>
                <table border='0' cellpadding='0' cellspacing='0' width='100%'>
                  <tbody>
                    <tr>
                      <td align='center' valign='top'>
                        <div id='template_header_image'>
                        </div>
                        <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_container' style='background-color: #fff;border: 1px solid #dedede;border-radius: 3px' bgcolor='#fff'>
                          <tbody>
                            <tr>
                              <td align='center' valign='top'>
                                <!-- Header -->
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_header' style='background-color: #7f54b3;color: #fff;border-bottom: 0;font-weight: bold;line-height: 100%;vertical-align: middle;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;border-radius: 3px 3px 0 0' bgcolor='#7f54b3'>
                                  <tbody>
                                    <tr>
                                      <td id='header_wrapper' class='bg-dark' style='padding: 36px 48px;display: block'>
                                        <h1 style='font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 30px;font-weight: 300;line-height: 150%;margin: 0;text-align: left;color: #fff;'>Cảm ơn bạn đã đặt hàng</h1>
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!-- End Header -->
                              </td>
                            </tr>
                            <tr>
                              <td align='center' valign='top'>
                                <!-- Body -->
                                <table border='0' cellpadding='0' cellspacing='0' width='100%' id='template_body'>
                                  <tbody>
                                    <tr>
                                      <td valign='top' id='body_content' style='background-color: #fff' bgcolor='#fff'>
                                        <!-- Content -->
                                        <table border='0' cellpadding='20' cellspacing='0' width='100%'>
                                          <tbody>
                                            <tr>
                                              <td valign='top' style='padding: 48px 48px 32px'>
                                                <div id='body_content_inner' style='color: #636363;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 14px;line-height: 150%;text-align: left' align='left'>
  
                                                  <p style='margin: 0 0 16px'><b>GWine</b> xin chào</p>
                                                  <p style='margin: 0 0 16px'>Đơn hàng đang được xử lí và sẽ gửi đi sớm!</p>
  
  
                                                  <h2 style='color: #7f54b3;display: block;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left'>
                                                    [Mã đơn hàng: $id_bill] ($date_bill) </h2>
  
                                                  <div style='margin-bottom: 40px'>
                                                    <table class='td' cellspacing='0' cellpadding='6' border='1' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;width: 100%;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif' width='100%'>
                                                      <thead>
                                                        <tr>
                                                          <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Sản phẩm</th>
                                                          <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Số lượng</th>
                                                          <th class='td' scope='col' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Giá</th>
                                                        </tr>
                                                      </thead>
                                                      <tbody>
                                                        $item
                                                      </tbody>
                                                      <tfoot>
                                                        <tr>
                                                          <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left;border-top-width: 4px' align='left'>Tổng số phụ:</th>
                                                          <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left;border-top-width: 4px' align='left'><span class='woocommerce-Price-amount amount'>" . number_format($total, 3) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></td>
                                                        </tr>
                                                        <tr>
                                                          <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Phương thức thanh toán:</th>
                                                          <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>$pay_show</td>
                                                        </tr>
                                                        <tr>
                                                          <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Tổng cộng:</th>
                                                          <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'><span class='woocommerce-Price-amount amount'>" . number_format($total, 3) . "<span class='woocommerce-Price-currencySymbol'>₫</span></span></td>
                                                        </tr>
                                                        <tr>
                                                          <th class='td' scope='row' colspan='2' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>Lưu ý:</th>
                                                          <td class='td' style='color: #636363;border: 1px solid #e5e5e5;vertical-align: middle;padding: 12px;text-align: left' align='left'>$note</td>
                                                        </tr>
                                                      </tfoot>
                                                    </table>
                                                  </div>
  
                                                  <table id='addresses' cellspacing='0' cellpadding='0' border='0' style='width: 100%;vertical-align: top;margin-bottom: 40px;padding: 0' width='100%'>
                                                    <tbody>
                                                      <tr>
                                                        <td valign='top' width='50%' style='text-align: left;font-family: ' Helvetica Neue', Helvetica, Roboto, Arial, sans-serif;border: 0;padding: 0' align='left'>
                                                          <h2 style='color: #7f54b3;display: block;font-family: &quot;Helvetica Neue&quot;,Helvetica,Roboto,Arial,sans-serif;font-size: 18px;font-weight: bold;line-height: 130%;margin: 0 0 18px;text-align: left'>Địa chỉ thanh toán</h2>
                                                          <address class='address' style='padding: 12px;color: #636363;border: 1px solid #e5e5e5'>
                                                          $name <br>
                                                          $address <br>
                                                            <a href='tel:$phone' style='color: #7f54b3;font-weight: normal;text-decoration: underline'>$phone</a> 
                                                            <br>$emails
                                                          </address>
                                                        </td>
                                                      </tr>
                                                    </tbody>
                                                  </table>
                                                  <p style='margin: 0 0 16px'>Cảm ơn bạn đã tin dùng dịch vụ của GWine!</p>
                                                </div>
                                              </td>
                                            </tr>
                                          </tbody>
                                        </table>
                                        <!-- End Content -->
                                      </td>
                                    </tr>
                                  </tbody>
                                </table>
                                <!-- End Body -->
                              </td>
                            </tr>
                          </tbody>
                        </table>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </td>
            <td><!-- Deliberately empty to support consistent sizing and layout across multiple email clients. --></td>
          </tr>
        </tbody>
      </table> ";

        require './PHPMailer-master/src/Exception.php';
        require './PHPMailer-master/src/PHPMailer.php';
        require './PHPMailer-master/src/SMTP.php';

        $email = $emails;
        $mail = new PHPMailer\PHPMailer\PHPMailer();
        $mail->IsSMTP();
        $mail->SMTPAuth = true;
        $mail->SMTPSecure = 'tls';
        $mail->Host = 'smtp.gmail.com';
        $mail->Port = '587';
        $mail->Username = 'huylppc05334@fpt.edu.vn';
        $mail->Password = 'lenl ztdz evcs foia';
        $mail->FromName = 'GWine';
        $mail->addAddress($email);
        $mail->Subject = $heading;
        $mail->isHTML(TRUE);
        $mail->Body = $mess;
        if (!$mail->send()) {
          exit();
        }
      } else {
        echo 'Lối';
      }
    }
    unset($_SESSION['cart']);
  }
  ?>
</section>