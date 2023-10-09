<div id="layoutSidenav_content">
  <div class="container-fluid px-4" style="overflow-x: scroll;">
    <h1 class="text-black mt-4">Loại sản phẩm</h1>
    <table class="table">
      <thead>
        <tr>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Tên Loại</th>
          <th scope="col" class="text-black align-middle pt-3 pb-3 font-weight-bold">Ghi Chú</th>
        </tr>
      </thead>
      <?php foreach (getAllType() as $item) : ?>
        <tr>
          <td class="font-weight-bold align-middle"><?= $item['name'] ?></td>
          <td class="font-weight-bold align-middle"><?= $item['describe'] ?></td>
        </tr>
      <?php endforeach ?>
    </table>
  </div>