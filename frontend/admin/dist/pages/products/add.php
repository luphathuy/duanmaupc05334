<div id="layoutSidenav_content">
  <form action="" method="post" enctype="multipart/form-data" class="container-fluid px-4">
    <h1 class="text-black mt-4 mb-4">Thêm sản phẩm</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<p class="text-black">' . $message . '</p>';
      }
    }
    ?>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Ảnh sản phẩm</span>
      <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-100 p-2 rounded-2 border mb-md-3">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Tên sản phẩm</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="product_name">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Giá gốc</span>
      <input type="number" class="w-100 p-2 rounded-2 border mb-md-3" name="product_price">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Giá sale</span>
      <input type="number" class="w-100 p-2 rounded-2 border mb-md-3" name="product_sale">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Mô tả</span>
      <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="describe">
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Phân loại</span>
      <select class="w-100 p-2 rounded-2 border mb-md-3" name="category">
        <?php foreach (getAllCategory() as $item_cate) : ?>
          <option class="text-black" value="<?= $item_cate['id'] ?>"><?= $item_cate['name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Loại sản phẩm</span>
      <select class="w-100 p-2 rounded-2 border mb-md-3" name="type">
        <?php foreach (getAllType() as $item_type) : ?>
          <option class="text-black" value="<?= $item_type['id'] ?>"><?= $item_type['name'] ?></option>
        <?php endforeach ?>
      </select>
    </div>
    <div class="modal-footer mb-3">
      <a class="btn btn-success float-end" href="index.php?pages=products&action=list"><i class="fas fa-angle-left"></i> Trở Lại</a>
      <input type="submit" class="btn btn-success float-end ms-2" name="add_products" value="Thêm Mới">
    </div>
  </form>