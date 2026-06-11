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
<header class="head">
  <div class="main-bar">
    <div class="row m-t-10">
      <div class="col-sm-12 col-lg-6">
        <h5 class="text-white">
          Usuarios
        </h5>
      </div>
      <div class="col-sm-12 col-lg-6">
        <?= $this->Html->link('<i class="fa fa-plus"></i><span class="link-title menu_hide"> Agregar usuario</span>', '/Users/Add/', array('escape'=>False, 'class'=>'float-right text-white')) ?>
      </div>
    </div>
  </div>
</header>
<div class="outer">
  <div class="inner bg-light lter bg-container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-block card_block_top_align ">
            <div class="m-t-70">
              <div class="">
                <div class="pull-sm-right">
                  <div class="tools pull-sm-right"></div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover table-sm" id="sample_1">
                <thead>
                  <tr>
                    <th>Nombre</th>
                    <th>Email</th>
                    <th>Puesto</th>
                    <th>Group</th>
                    <th>Editar</th>
                    <th>Dar de baja</th>
                    <th style="width: 100px;">Cambiar password</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($users as $user): ?>
                    <tr>
                      <td><?php echo $this->Html->link(($user['User']['nombre']." ". $user['User']['apellido_paterno']." ". $user['User']['apellido_materno']),array('controller'=>'users','action'=>'view',$user['User']['id'])); ?>&nbsp;</td>
                      <td><?php echo h($user['User']['email']); ?>&nbsp;</td>
                      <td><?php echo h($user['User']['puesto']); ?>&nbsp;</td>
                      <td><?php echo h($user['Group']['nombre']); ?>&nbsp;</td>
                      <td style="text-align:center;"><?php echo $this->Html->link('<i class="fa fa-edit fa-lg"></i>', array('action' => 'edit', $user['User']['id']),array('escape' => false)); ?></td>
                      <td style="text-align:center;"><?php echo $this->Form->postLink('<i class="fa fa-times-circle fa-lg"></i>', array('action' => 'delete', $user['User']['id']), array('escape' => false), __('Are you sure you want to delete # %s?', $user['User']['id'])); ?></td>

                      <td style="text-align:center;"><?php echo $this->Html->link('<i class="fa fa-unlock fa-lg"></i>', array('action' => 'recover_password', $user['User']['id']),array('escape' => false)); ?></td>
                      
                    </tr>
                  <?php endforeach; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>
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