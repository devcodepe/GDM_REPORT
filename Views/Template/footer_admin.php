<footer class="main-footer">
        <div class="float-right d-none d-sm-block"><b>Version</b> 3.2.0</div>
        <strong
          >Copyright &copy; 2023
          <a href="https://www.geekdentalmarketing.com/">GeekDentalMarketingSoftware</a>.</strong
        >
        All rights reserved.
      </footer>

      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
    </div>
    <!-- ./wrapper -->

    <script>

          const base_url = "<?= base_url(); ?>";

    </script>

   <!-- jQuery -->
<script src="<?= media(); ?>js/jquery-3.3.1.min.js"></script>



<!-- Bootstrap Bundle (incluye Popper.js) -->
<script src="<?= media(); ?>css/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- SweetAlert -->
<script src="<?= media(); ?>js/sweetalert.min.js"></script>

<!-- Font Awesome -->
<script src="<?= media(); ?>js/fontawesome.js"></script>

<!-- Bootstrap Select -->
<script src="<?= media(); ?>js/bootstrap-select.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= media(); ?>css/dist/js/adminlte.min.js"></script>

<!-- AdminLTE for demo purposes -->
<script src="<?= media(); ?>css/dist/js/demo.js"></script>



   <!-- DataTables  & Plugins -->
    <script src="<?= media(); ?>js/plugins/datatables/jquery.dataTables.min.js"></script>
    <script src="<?= media(); ?>js/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
    <script src="<?= media(); ?>js/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
    <script src="<?= media(); ?>js/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
    <script src="<?= media(); ?>js/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
    <script src="<?= media(); ?>js/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
    <script src="<?= media(); ?>js/plugins/jszip/jszip.min.js"></script>
    <script src="<?= media(); ?>js/plugins/pdfmake/pdfmake.min.js"></script>
    <script src="<?= media(); ?>js/plugins/pdfmake/vfs_fonts.js"></script>



    <?php if ($data['page_name'] == "roles") {?>
    <script src="<?= media(); ?>js/functions_modals.js"></script>
    <?php } ?>
    <?php if ($data['page_name'] == "usuario") {?>
    <script src ="<?= media(); ?>js/function_usuarios.js"></script>
    <?php } ?>
  </body>
</html>
