<section class="py-5 pb-0 mb-3" style="overflow-x: scroll;">
  <a href="./index.php?pages=profile&action=order_his" class="d-flex mt-5 pt-2 ms-2"><i class="fa fa-arrow-left" style="font-size: 24px;"></i>
    <h4 class="ms-3 text-uppercase">Chi tiết đơn hàng</h4>
  </a>
  <table class="table mb-0">
    <thead>
      <tr>
        <th scope="col" class="ps-4 p-3">Mã đơn</th>
        <th scope="col" class="p-3">Hình ảnh</th>
        <th scope="col" class="p-3">Tên sản phẩm</th>
        <th scope="col" class="p-3">Giá</th>
        <th scope="col" class="p-3">Số lượng</th>
        <th scope="col" class="p-3">Tổng cộng</th>
        <th scope="col" class="p-3">Ngày đặt</th>
      </tr>
    </thead>
    <tbody>
      <?php
      if (isset($id_bill)) {
        foreach (getCart($id_bill) as $item) : ?>
          <tr>
            <td class="ps-4 p-3">#<?= $item['id_bill'] ?></td>
            <td class="p-3"><img src="./assets/admin/uploaded_img/<?= $item['image'] ?>" width="75" height="75" alt=""></td>
            <td class="p-3"><?= $item['name'] ?></td>
            <td class="p-3"><?= number_format($item['price'], 3) ?>đ</td>
            <td class="p-3"><?= $item['quantity'] ?></td>
            <td class="p-3"><?= number_format($item['total'], 3) ?>đ</td>
            <td class="p-3"><?= $item['create_at'] ?></td>
          </tr>
        <?php endforeach ?>
      <?php } else {
        echo '';
      } ?>
    </tbody>
  </table>
</section>