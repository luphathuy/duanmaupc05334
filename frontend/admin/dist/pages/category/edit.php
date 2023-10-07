<div id="layoutSidenav_content">
  <form action="" method="post" enctype="multipart/form-data" class="container-fluid px-4">
    <h1 class="text-black mt-4 mb-4 text-uppercase">Cập nhật tên loại</h1>
    <?php
    if (isset($message)) {
      foreach ($message as $message) {
        echo '<p class="text-primary">' . $message . '</p>';
      }
    }
    ?>
    <div class="form-floating">
      <span class="text-md-start d-block mb-md-2 text-black h6">Tên loại</span>
      <?php foreach (getOneCategory($id) as $item) : ?>
        <input type="text" class="w-100 p-2 rounded-2 border mb-md-3" name="name" value="<?= $item['name']; ?>">
    </div>
    <div class="modal-footer mb-3">
      <a class="btn btn-success float-end" href="./index.php?pages=category&action=list"><i class="fas fa-angle-left"></i> Trở Lại</a>
      <input type="submit" class="btn btn-success float-end ms-2" name="edit_category" value="Cập nhật">
      <?php endforeach ?>
    </div>
  </form>