<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Sản Phẩm</h1>
    <table class="table">
      <a class="btn btn-success float-end me-2" href="./index.php?pages=products&action=add"><i class="fa fa-plus"></i> Thêm mới</a>
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Mã sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tên sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Giá gốc</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Giá giảm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Hình ảnh</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Phân loại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Loại sản phẩm</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Mô tả</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Bình luận</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold"></th>
        </tr>
      </thead>
      <?php foreach (getAllProduct() as $item) : ?>
        <?php 
          if ($item['toggle'] == 0) {
            $item['toggle'] = 'Bật';
          } else {
            $item['toggle'] = 'Tắt';
          }
          ?>
        <tr>
          <td class="font-weight-bold align-middle">#<?= $item['id'] ?></td>
          <td class="font-weight-bold align-middle truncate-text"><?= $item['product_name'] ?></td>
          <td class="font-weight-bold align-middle"><?= number_format($item['product_price'], 3) ?>đ</td>
          <td class="font-weight-bold align-middle"><?= number_format($item['product_sale'], 3) ?>đ</td>
          <td class="font-weight-bold align-middle"><img class="rounded-circle" src="../admin/uploaded_img/<?= $item['image'] ?>" width="100" height="100" alt=""></td>
          <td class="font-weight-bold align-middle"><?= $item['name_cate'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['name_type'] ?></td>
          <td class="font-weight-bold align-middle truncate-text"><?= $item['describe'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['toggle'] ?></td>
          <td colspan="2" class="font-weight-bold align-middle">
            <a class="btn btn-danger mb-2" href="./index.php?pages=products&action=edit&edit=<?= $item['id'] ?>&category=<?= $item['category'] ?>&type=<?= $item['type'] ?>"><i class="fa fa-edit"></i></a>
            <a href="./index.php?pages=products&action=list&delete=<?= $item['id']; ?>" class="btn btn-danger mb-2" onclick="return confirm('Bạn có chắc chắn muốn xóa?');"><i class="fa fa-trash"></i></a>
          </td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>