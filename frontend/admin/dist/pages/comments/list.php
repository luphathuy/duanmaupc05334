<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Bình luận từ người dùng</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Người dùng</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Sản phẩm bình luận</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Nội dung bình luận</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold text-center">Ngày bình luận</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (getAllComment() as $item) : ?>
        <tr>
          <td class="font-weight-bold align-middle text-center">
            <img class="rounded-circle" src="/admin/uploaded_img/<?= $item['user_image'] ?>" width="50" height="50" alt="">
            <p><?= $item['user_name'] ?></p>
          </td>
          <td class="font-weight-bold align-middle text-center"><?= $item['product_name'] ?></td>
          <td class="font-weight-bold align-middle text-center"><?= $item['content'] ?></td>
          <td class="font-weight-bold align-middle text-center"><?= $item['comment_at'] ?></td>
          <td colspan="2" class="font-weight-bold align-middle text-center">
            <a class="btn btn-danger mb-2" title="Xem chi tiết" href="./index.php?pages=users&action=view"><i class="fa fa-eye"></i></a>
            <a href="./index.php?pages=comments&action=list&delete=<?= $item['id']; ?>" class="btn btn-danger mb-2" title="Xóa" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>