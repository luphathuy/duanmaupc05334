<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Liên hệ từ người dùng</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tên</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Email</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Số điện thoại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Nội dung liên hệ</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (getAllContact() as $item) : ?>
        <tr>
          <td class="font-weight-bold align-middle"><?= $item['name'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['email'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['phone'] ?></td>
          <td class="font-weight-bold align-middle w-50"><?= $item['content'] ?></td>
          <td colspan="2" class="font-weight-bold align-middle text-end">
            <a href="./index.php?pages=contacts&action=list&delete=<?= $item['id']; ?>" class="btn btn-danger mb-2" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>