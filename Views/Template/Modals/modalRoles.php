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