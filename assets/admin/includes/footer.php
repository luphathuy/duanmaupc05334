<footer class="py-4 bg-light mt-auto">
  <div class="container-fluid px-4">
    <div class="d-flex align-items-center justify-content-between small">
      <div class="text-muted">Copyright &copy; GWine 2023</div>
      <div>
        <a href="#" class="text-decoration-none">Chính Sách Bảo Mật</a>
        &middot;
        <a href="#" class="text-decoration-none">Điều Khoản &amp; Điều Kiện</a>
      </div>
    </div>
  </div>
</footer>
</div>
</div>
<script type="text/javascript" src="https://www.gstatic.com/charts/loader.js"></script>
<script type="text/javascript">
  google.charts.load('current', {
    'packages': ['corechart']
  });
  google.charts.setOnLoadCallback(drawChart);

  function drawChart() {

    var data = google.visualization.arrayToDataTable([
      ['name_cate', 'number_cate'],
      <?php
      foreach ($data as $key) {
        echo "['" . $key['name_cate'] . "' , " . $key['number_cate'] . "],";
      }
      ?>
    ]);

    var chart = new google.visualization.PieChart(document.getElementById('piechart'));

    chart.draw(data);
  }
</script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous"></script>
<script src="dist/js/scripts.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js" crossorigin="anonymous"></script>
<script src="assets/demo/chart-area-demo.js"></script>
<script src="assets/demo/chart-bar-demo.js"></script>
<script src="https://cdn.jsdelivr.net/npm/simple-datatables@7.1.2/dist/umd/simple-datatables.min.js" crossorigin="anonymous"></script>
<script src="dist/js/datatables-simple-demo.js"></script>
</body>

</html>