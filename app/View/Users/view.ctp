<?php
  $this->assign('title', 'Dashboard | HolaSocio');
  echo $this->Html->css(
    array(
      '/vendors/select2/css/select2.min',
      '/vendors/datatables/css/scroller.bootstrap.min',
      '/vendors/datatables/css/colReorder.bootstrap.min',
      '/vendors/datatables/css/dataTables.bootstrap.min',
      'pages/dataTables.bootstrap',
      'pages/tables',
    ),
    array('inline'=>false)
  );
?>

<div class="outer">
  <div class="inner bg-light lter bg-container">
    <div class="row">
      <dov class="col-sm-12">
        <div class="card">
          <div class="card-header bg-white">
            <h5>Usuario</h5>
          </div>
          <div class="card-block">
            <!-- Menu adicional -->
            <div class="row m-t-10">
              <div class="col-sm-12">
                <h5>Actions</h5>
                <ul id="menu_emp">
                  <li><?php echo $this->Html->link(__('Edit User'), array('action' => 'edit', $user['User']['id'])); ?> </li>
                  <li><?php echo $this->Form->postLink(__('Delete User'), array('action' => 'delete', $user['User']['id']), null, __('Are you sure you want to delete # %s?', $user['User']['id'])); ?> </li>
                  <li><?php echo $this->Html->link(__('List Users'), array('action' => 'index')); ?> </li>
                  <li><?php echo $this->Html->link(__('New User'), array('action' => 'add')); ?> </li>
                  <li><?php echo $this->Html->link(__('List Certificados'), array('controller' => 'certificados', 'action' => 'index')); ?> </li>
                  <li><?php echo $this->Html->link(__('New Certificado'), array('controller' => 'certificados', 'action' => 'add')); ?> </li>
                  <li><?php echo $this->Html->link(__('List Reportes'), array('controller' => 'reportes', 'action' => 'index')); ?> </li>
                  <li><?php echo $this->Html->link(__('New Reporte'), array('controller' => 'reportes', 'action' => 'add')); ?> </li>
                </ul>
              </div>
            </div>
            <div class="row">
              <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                  <tbody>
                    <tr>
                      <td>ID</td>
                      <td><?= $user['User']['id'] ?></td>
                    </tr>
                    <tr>
                      <td>Email</td>
                      <td><?= $user['User']['email'] ?></td>
                    </tr>
                    <tr>
                      <td>Password</td>
                      <td><?= $user['User']['password'] ?></td>
                    </tr>
                    <tr>
                      <td>Nombre</td>
                      <td><?= $user['User']['nombre'] ?></td>
                    </tr>
                    <tr>
                      <td>Apellido Paterno</td>
                      <td><?= $user['User']['apellido_paterno'] ?></td>
                    </tr>
                    <tr>
                      <td>Apellido Materno</td>
                      <td><?= $user['User']['apellido_materno'] ?></td>
                    </tr>
                    <tr>
                      <td>Puesto</td>
                      <td><?= $user['User']['puesto'] ?></td>
                    </tr>
                    <tr>
                      <td>Group</td>
                      <td><?= $user['Group']['nombre'] ?></td>
                    </tr>

                  </tbody>
                </table>
              </div>
            </div>
          </div>
        </div>
      </dov>
    </div>
    <!-- / row end card 1 -->
    <div class="row">
      <div class="col-sm-12">
        <div class="card m-t-10">
          <div class="card-header bg-white">
            <h5>Related Certificados</h5>
          </div>
          <div class="card-block">
            <div class="row m-t-30">
              <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>Clave</th>
                      <th>Fecha</th>
                      <th>Vigencia</th>
                      <th>Empresa Id</th>
                      <th>User Id</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <?php if (!empty($user['Certificado'])): ?>
                    <tbody>
                      <?php foreach ($user['Certificado'] as $certificado): ?>
                        <tr>
                          <td><?php echo $certificado['id']; ?></td>
                          <td><?php echo $certificado['clave']; ?></td>
                          <td><?php echo $certificado['fecha']; ?></td>
                          <td><?php echo $certificado['vigencia']; ?></td>
                          <td><?php echo $certificado['empresa_id']; ?></td>
                          <td><?php echo $certificado['user_id']; ?></td>
                          <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('controller' => 'certificados', 'action' => 'view', $certificado['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'certificados', 'action' => 'edit', $certificado['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'certificados', 'action' => 'delete', $certificado['id']), null, __('Are you sure you want to delete # %s?', $certificado['id'])); ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  <?php endif ?>
                </table>
              </div>
              <div class="col-sm-12">
                <?php echo $this->Html->link(__('New Certificado'), array('controller' => 'certificados', 'action' => 'add')); ?> 
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- row end card 2 -->

    <div class="row">
      <div class="col-sm-12">
        <div class="card m-t-10">
          <div class="card-header bg-white">
            <h5>Related Reportes</h5>
          </div>
          <div class="card-block">
            <div class="row m-t-30">
              <div class="col-sm-12 table-responsive">
                <table class="table table-striped table-bordered table-hover" id="sample_1">
                  <thead>
                    <tr>
                      <th>Id</th>
                      <th>User Id</th>
                      <th>Fecha</th>
                      <th>Reporte</th>
                      <th>Comentarios</th>
                      <th>Empresa Id</th>
                      <th>Actions</th>
                    </tr>
                  </thead>
                  <?php if (!empty($user['Reporte'])): ?>
                    <tbody>
                      <?php foreach ($user['Reporte'] as $reporte): ?>
                        <tr>
                          <td><?php echo $reporte['id']; ?></td>
                          <td><?php echo $reporte['user_id']; ?></td>
                          <td><?php echo $reporte['fecha']; ?></td>
                          <td><?php echo $reporte['reporte']; ?></td>
                          <td><?php echo $reporte['comentarios']; ?></td>
                          <td><?php echo $reporte['empresa_id']; ?></td>
                          <td class="actions">
                            <?php echo $this->Html->link(__('View'), array('controller' => 'reportes', 'action' => 'view', $reporte['id'])); ?>
                            <?php echo $this->Html->link(__('Edit'), array('controller' => 'reportes', 'action' => 'edit', $reporte['id'])); ?>
                            <?php echo $this->Form->postLink(__('Delete'), array('controller' => 'reportes', 'action' => 'delete', $reporte['id']), null, __('Are you sure you want to delete # %s?', $reporte['id'])); ?>
                          </td>
                        </tr>
                      <?php endforeach; ?>
                    </tbody>
                  <?php endif ?>
                </table>
              </div>
              <div class="col-sm-12">
                <?php echo $this->Html->link(__('New Reporte'), array('controller' => 'reportes', 'action' => 'add')); ?>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- /row end card 3 -->
  </div>
</div>
<?=
$this->Html->script(
  array(
    '/vendors/select2/js/select2',
    '/vendors/datatables/js/jquery.dataTables.min',
    'pluginjs/dataTables.tableTools',
    '/vendors/datatables/js/dataTables.colReorder.min',
    '/vendors/datatables/js/dataTables.bootstrap.min',
    '/vendors/datatables/js/dataTables.buttons.min',
    '/vendors/datatables/js/dataTables.responsive.min',
    '/vendors/datatables/js/dataTables.rowReorder.min',
    '/vendors/datatables/js/buttons.colVis.min',
    '/vendors/datatables/js/buttons.html5.min',
    '/vendors/datatables/js/buttons.bootstrap.min',
    '/vendors/datatables/js/buttons.print.min',
    '/vendors/datatables/js/dataTables.scroller.min',
    'pages/datatable',
  ),
  array('inline'=>false)
);
?>