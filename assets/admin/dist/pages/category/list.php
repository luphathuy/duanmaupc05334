<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Phân loại</h1>
    <table class="table">
      <a class="btn btn-success float-end me-2" href="./index.php?pages=category&action=add"><i class="fa fa-plus"></i> Thêm mới</a>
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Mã Loại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tên Loại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Số lượng</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Giá trung bình</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Giá cao nhất</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Giá thấp nhất</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (getProductCountByCategory() as $item) : ?>
        <tr>
          <td class="font-weight-bold align-middle">#<?= $item['id'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['name'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['product_count'] ?> sản phẩm</td>
          <td class="font-weight-bold align-middle"><?= number_format($item['avg_sale'], 3) ?> đ</td>
          <td class="font-weight-bold align-middle"><?= number_format($item['max_sale'], 3) ?> đ</td>
          <td class="font-weight-bold align-middle"><?= number_format($item['min_sale'], 3) ?> đ</td> 
          <td colspan="2" class="font-weight-bold align-middle text-end">
            <a class="btn btn-danger mb-2" href="./index.php?pages=category&action=views&view=<?= $item['id'] ?>"><i class="fa fa-eye"></i></a>
            <a class="btn btn-danger mb-2" href="./index.php?pages=category&action=edit&edit=<?= $item['id'] ?>"><i class="fa fa-edit"></i></a>
            <a href="./index.php?pages=category&action=list&delete=<?= $item['id'] ?>" class="btn btn-danger mb-2" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>