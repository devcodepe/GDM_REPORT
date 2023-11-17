<div class="modal fade" id="modalFormRol" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Rol</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
            <div class="card card-primary">
              <!-- form start -->
              <form id="formRol" name="formRol">
                    <div class="card-body">
                      <input type="hidden" id="idrol" name="idrol" value="">
                      <div class="form-group">
                          <label for="txtName">Name</label>
                          <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Role Name" require>
                      </div>
                      <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" id="txtDescription" name="txtDescription" rows="2" placeholder="Role Description ..." require></textarea>
                      </div>
                      <div class="form-group">
                          <label for="listStatus">Select</label>
                          <select class="form-control" id="listStatus" name="listStatus" require>
                              <option value="1">Activo</option>
                              <option value="2">Inactivo</option>
                          </select>
                      </div>
                  
                    </div>
                    <!-- /.card-body -->

                    <div class="card-footer">
                        <a class="btn btn-Secondary" href="#" data-dismiss="modal">Close</a>
                        <button id="btnActionForm" type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk mr-2"></i><span id="btnText">Save</span></button>
                    </div>
                </form>
            </div>


      </div>
      
    </div>
  </div>
</div>


<div class="modal fade modalPermisos" tabindex="-1" role="dialog" aria-labelledby="myExtraLargeModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">

      <div class="modal-header">
        <h5 class="modal-title h4">Permiso Roles de Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">x</span>
        </button>
      </div>

      <div class="modal-body">
        <div class="row">
          <div class="col-12">
            <div class="card">
              
              <div class="card-body table-responsive p-0">
                <table class="table table-hover text-nowrap">
                  <thead>
                    <tr>
                      <th>#</th>
                      <th>Modulo</th>
                      <th>Leer</th>
                      <th>Escribir</th>
                      <th>Editar</th>
                      <th>Eliminar</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td>1</td>
                      <td>Usuario</td>
                      <td><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;"><div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div></div></td>
                      <td><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;"><div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div></div></td>
                      <td><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;"><div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div></div></td>
                      <td><div class="bootstrap-switch bootstrap-switch-wrapper bootstrap-switch-focused bootstrap-switch-animate bootstrap-switch-on" style="width: 86px;"><div class="bootstrap-switch-container" style="width: 126px; margin-left: 0px;"><span class="bootstrap-switch-handle-on bootstrap-switch-primary" style="width: 42px;">ON</span><span class="bootstrap-switch-label" style="width: 42px;">&nbsp;</span><span class="bootstrap-switch-handle-off bootstrap-switch-default" style="width: 42px;">OFF</span><input type="checkbox" name="my-checkbox" checked="" data-bootstrap-switch=""></div></div></td>
                    </tr>
              
                  </tbody>
                </table>
              </div>
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>    
    </div>
  </div>
</div>