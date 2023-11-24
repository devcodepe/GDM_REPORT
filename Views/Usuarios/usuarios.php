<?php 
    headerAdmin($data);
    getModal('modalUsuarios', $data);

?>
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1><?= $data['page_title'] ?>
                  <button type="button" onclick="openModal();" class="btn btn-success"><i class="fa-solid fa-circle-plus mr-2"></i>Nuevo</button>

                </h1>
                
              </div>
              <div class="col-sm-6">
                <ol class="breadcrumb float-sm-right">
                  <li class="breadcrumb-item"><a href="#">Home</a></li>
                  <li class="breadcrumb-item active"><?= $data['page_title'] ?>
                      
                  </li>
                </ol>
              </div>
            </div>
          </div>
          <!-- /.container-fluid -->
        </section>

        <!-- Main content -->
        <section class="content">
          <!-- Default box -->
          <div class="card">
            
            <div class="card-body">

            <div class="row">
              <div class="col-12">
           
                  <!-- /.card -->
                  <div class="card">
                    
                    <!-- /.card-header -->
                    <div class="card-body">
                      <table id="usuariotable" name="usuariotable" class="table table-bordered table-striped">
                        <thead>
                        <tr>
                          <th>ID</th>
                          <th>IDENTIFICACION</th>
                          <th>NOMBRE</th>
                          <th>APELLIDOS</th>
                          <th>TELEFONO</th>
                          <th>ROL</th>
                          <th>STATUS</th>
                          <th>ACCIONES</th>
                        </tr>
                        </thead>
                        <tbody>
                          <td>1</td>
                          <td>Aarom Michael</td>
                          <td>Viza Sosa</td>
                          <td>dev.aaron0197@gmail.com</td>
                          <td>917447158</td>
                          <td>Administrador</td>
                          <td>Activo</td>

                        
                        </tbody>
                        
                      </table>
                    </div>
                    <!-- /.card-body -->
                  </div>
                
                  <!-- /.card -->
                </div>
                <!-- /.col -->
              </div>





            </div>
            <!-- /.card-body -->
            <div class="card-footer">Footer</div>
            <!-- /.card-footer-->
          </div>
          <!-- /.card -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->

<?php 
    footerAdmin($data);
?>