<div class="modal fade" id="modalFormUsuario" tabindex="-1" role="dialog" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header headerRegister">
        <h5 class="modal-title" id="titleModal">Nuevo Usuario</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
              <!-- form start -->
          <form id="formUsuario" name="formUsuario" class="form-horizontal">
              <input type="hidden" name="idUsuario" id="idUsuario" value="">
              <div class="form-group">
                <input type="text" class="form-control" id="txtIdentification" name="txtIdentification" placeholder="Identificacion" require>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="txtName" name="txtName" placeholder="Nombres" require>
                </div>
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="txtLastName" name="txtLastName" placeholder="Apellidos" require>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <input type="text" class="form-control" id="txtPhone" name="txtPhone" placeholder="Telefono" require>
                </div>
                <div class="form-group col-md-6">
                  <input type="email" class="form-control" id="txtEmail" name="txtEmail" placeholder="Email" require>
                </div>
              </div>
              <div class="form-row">
                <div class="form-group col-md-6">
                  <label for="listRolid">Tipo Usuario</label>
                  <select class="form-control" id="listRolid" name="listRolid" require>
                  </select>
                </div>
                <div class="form-group col-md-6">
                <label for="listStatus">Status</label>
                <select class="form-control" id="listStatus" name="listStatus" require>
                  <option value="1">Activo</option>
                  <option value="2">Inactivo</option>
                </select>
              </div>
              </div>
              
              
              
              <div class="form-group">
                <input type="password" class="form-control" id="txtPassword" name="txtPassword" placeholder="Password" require>
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