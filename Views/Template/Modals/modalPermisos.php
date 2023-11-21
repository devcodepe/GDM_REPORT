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
              
              <form action="" id="formPermisos" name="formPermisos">
                <input type="hidden" id="idrol" name="idrol" value="<?= $data['idrol']; ?>" require="">
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

                      <?php
                        $no = 1;
                        $modulos = $data['modulos'];
                        for ($i = 0; $i < count($modulos); $i++)
                        {
                          $permisos = $modulos[$i]['permisos'];
                          $rCheck = $permisos['r'] == 1 ? " checked " : "";
                          $valueCheck = $permisos['r'] == 1 ? " ON " : " OFF ";
                          $rCheck = $permisos['w'] == 1 ? " checked " : "";
                          $valueCheck = $permisos['w'] == 1 ? " ON " : " OFF ";
                          $rCheck = $permisos['u'] == 1 ? " checked " : "";
                          $valueCheck = $permisos['u'] == 1 ? " ON " : " OFF ";
                          $rCheck = $permisos['d'] == 1 ? " checked " : "";
                          $valueCheck = $permisos['d'] == 1 ? " ON " : " OFF ";


                          $idmod = $modulos[$i]['idmodulo'];
                      ?>
                      <tr>
                        <td><?= $no; ?>
                            <input type="hidden" name="modulos[<?= $i; ?>][idmodulo]" value="<?= $idmod ?>" require >
                        </td> 
                        <td><?= $modulos[$i]['titulo']; ?></td>
                        <td>
                          <input type="checkbox" name="modulos[<?= $i; ?>][r]" <?= $rCheck ?>> <?= $valueCheck ?>
                        </td>
                        <td>
                          <input type="checkbox" name="modulos[<?= $i; ?>][w]" <?= $rCheck ?>> <?= $valueCheck ?>
                        </td>
                        <td>
                          <input type="checkbox" name="modulos[<?= $i; ?>][u]" <?= $rCheck ?>> <?= $valueCheck ?>
                        </td>
                        <td>
                          <input type="checkbox" name="modulos[<?= $i; ?>][d]" <?= $rCheck ?>> <?= $valueCheck ?>
                        </td>
                      </tr>
                      <?php  
                          $no++;
                        }
                      ?>
                    
                
                    </tbody>
                  </table>
                </div>
                <div style="display:flex; gap: 10px; justify-content:center; width:100%; margin:20px">
                  <button type="submit" class="btn btn-success">Guardar</button>
                  <button type="button" class="btn btn-danger">Cancelar</button>
                </div>        
              </form>          
              <!-- /.card-body -->
            </div>
            <!-- /.card -->
          </div>
        </div>
      </div>    
    </div>
  </div>
</div>