<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Phân loại</h1>
    <table class="table">
      <a class="btn btn-success float-end me-2" href="/admin/index.php?pages=category&action=add"><i class="fa fa-plus"></i> Thêm</a>
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tên Loại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (getAllCategory() as $item) : ?>
        <tr>
          <td class="font-weight-bold align-middle"><?= $item['name'] ?></td>
          <td colspan="2" class="font-weight-bold align-middle text-end">
            <a class="btn btn-danger mb-2" href="./index.php?pages=category&action=edit&edit=<?= $item['id'] ?>"><i class="fa fa-edit"></i></a>
            <a href="./index.php?pages=category&action=list&delete=<?= $item['id'] ?>" class="btn btn-danger mb-2" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>