<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Bình luận từ người dùng</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Mã sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Tên sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Tổng số bình luận</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (countCommentId() as $item) :
      ?>
        <tr>
          <td class="font-weight-bold align-middle text-center">#<?= $item['id'] ?></td>
          <td class="font-weight-bold align-middle text-center"><?= $item['product_name'] ?></td>
          <td class="font-weight-bold align-middle text-center"><?= $item['total_comment'] ?> bình luận</td>
          <td colspan="2" class="font-weight-bold align-middle text-center">
            <a class="btn btn-danger mb-2" title="Xem chi tiết" href="./index.php?pages=comments&action=view&view=<?= $item['id'] ?>"><i class="fa fa-eye"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>