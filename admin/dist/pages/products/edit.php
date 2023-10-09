<div id="layoutSidenav_content">
  <form action="" method="post" enctype="multipart/form-data" class="container-fluid px-4">
    <h1 class="text-black mt-4 mb-4">Cập nhật sản phẩm</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<p class="text-primary">' . $message . '</p>';
      }
    }
    ?>
    <?php foreach (getProductID($id) as $item) : ?>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Ảnh sản phẩm</span>
        <img src="../admin/uploaded_img/<?= $item['image'] ?>" style="width: 100px; height: 100px;" class="mb-md-3" alt="">
        <input type="file" name="image" accept="image/png, image/jpeg, image/jpg" class="w-100 p-2 rounded-2 border mb-md-3">
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Tên sản phẩm</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="product_name" value="<?= $item['product_name'] ?>" required>
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Giá gốc</span>
        <input type="number" class="w-100 p-2 rounded-2 border mb-md-3" name="product_price" value="<?= $item['product_price'] ?>" required>
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Giá sale</span>
        <input type="number" class="w-100 p-2 rounded-2 border mb-md-3" name="product_sale" value="<?= $item['product_sale'] ?>" required>
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Mô tả</span>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="describe" value="<?= $item['describe'] ?>" required>
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Phân loại</span>
        <select class="w-100 p-2 rounded-2 border mb-md-3" name="category">
          <?php foreach (getAllCategory() as $getAllCategory) : ?>
            <option class="text-black" <?= (isset($_GET['category']) && $_GET['category'] === $getAllCategory['id']) ? 'selected' : '' ?>
            value="<?= $getAllCategory['id'] ?>"><?= $getAllCategory['name'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="form-floating">
        <span class="text-md-start d-block mb-md-2 text-black h6">Loại sản phẩm</span>
        <select class="w-100 p-2 rounded-2 border mb-md-3" name="type">
          <?php foreach (getAllType() as $getAllType) : ?>
            <option class="text-black" <?= (isset($_GET['type']) && $_GET['type'] === $getAllType['id']) ? 'selected' : '' ?>
            value="<?= $getAllType['id'] ?>"><?= $getAllType['name'] ?></option>
          <?php endforeach ?>
        </select>
      </div>
      <div class="modal-footer mb-3">
        <a class="btn btn-success float-end" href="./index.php?pages=products&action=list"><i class="fas fa-angle-left"></i> Trở Lại</a>
        <input type="submit" class="btn btn-success float-end ms-2" name="edit_products" value="Cập nhật">
      </div>
    <?php
    endforeach
    ?>
  </form>