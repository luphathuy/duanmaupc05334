<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Tài Khoản Người Dùng</h1>
    <table class="table">
      <a class="btn btn-success float-end me-2" href="./index.php?pages=users&action=add"><i class="fa fa-plus"></i> Thêm</a>
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tài Khoản</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Ảnh đại diện</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Họ và tên</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Email</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Số điện thoại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Giới tính</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Số CCCD</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Ngày Sinh</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Ngày Tạo</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (getAllUser() as $item) : ?>
        <?php if (!empty($item['image'])) {
          $item['image'];
        } else {
          $item['image'] = "default_img.jpg";
        }
        if ($item['role'] == 1) {
          $item['role'] = 'Admin';
        } elseif ($item['role'] == 2) {
          $item['role'] = 'Nhân viên';
        } else {
          $item['role'] = 'Khách hàng';
        }
        ?>
        <tr>
          <td class="font-weight-bold align-middle"><?= $item['role'] ?></td>
          <td class="font-weight-bold align-middle"><img class="rounded-circle" src="../admin/uploaded_img/<?= $item['image']; ?>" width="100" height="100" alt=""></td>
          <td class="font-weight-bold align-middle"><?= $item['name'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['email'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['phone'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['sex'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['citizen_id'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['date_birth'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['create_at'] ?></td>
          <td colspan="2" class="font-weight-bold align-middle">
            <a class="btn btn-danger mb-2" href="./index.php?pages=users&action=edit&edit=<?= $item['id'] ?>"><i class="fa fa-edit"></i></a>
            <a href="./index.php?pages=users&action=list&delete=<?= $item['id']; ?>" class="btn btn-danger mb-2" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>