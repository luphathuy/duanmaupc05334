<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Lượt xem sản phẩm</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Ảnh sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tên sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Lượt xem</th>
        </tr>
      </thead>
      <?php foreach (getAllView() as $item) : ?>
        <tr>
          <td class="font-weight-bold align-middle"><img src="../admin/uploaded_img/<?= $item['image'] ?>" width="100" height="100" alt=""></td>
          <td class="font-weight-bold align-middle"><?= $item['product_name'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['view_count'] ?> Lượt xem</td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>