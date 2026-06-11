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
          Cambiar contraseña
        </h5>
      </div>
      <div class="col-sm-12 col-lg-6">
        <?php echo $this->Html->link('&nbsp; <i class="fa fa-angle-double-right fa-lg"></i> Lista de Usuarios &nbsp; ', array('controller'=>'Users' ,'action' => 'index'),array('escape' => false, 'class'=>'float-right text-white')); ?>

        <?php echo $this->Html->link('&nbsp; <i class="fa fa-home"></i> Dashboard', array('controller'=>'Users','action' => 'Dashboard'),array('escape' => false, 'class'=>'float-right text-white')); ?>
      </div>
    </div>
  </div>
</header>

<div class="outer">
  <div class="inner bg-light lter bg-container">
    <div class="row">
      <dov class="col-sm-12 col-lg-6 offset-lg-3">
        <div class="card">
          <div class="card-block">
            <div class="row m-t-20">
              <div class="col-sm-12">
                <h6>
                  Al cambiar el password se enviara un email al usuario con la nueva contraseña que elegirás
                </h6>
              </div>
            </div>
            <?php echo $this->Form->create('User'); ?>
              <div class="form-group">
                <?php
                  echo $this->Form->input(
                    'password',
                    array(
                      'class'    =>'form-control fs-20',
                      'div'      =>'col-sm-12 m-t-10',
                      'label'    => array('text'=>'Password*', 'class'=>'required fs-22'),
                      'required' => True,
                      'style'    => 'font-weight: 500;'
                    )
                  );

                  echo $this->Form->input(
                    'password2',
                    array(
                      'class'    =>'form-control fs-20',
                      'div'      =>'col-sm-12 m-t-10',
                      'label'    => array('text'=>'Confirmar Password*', 'class'=>'required fs-22 '),
                      'required' => True,
                      'style'    => 'font-weight: 500;',
                      'type'     => 'password'
                    )
                  );

                ?>
              </div>

              <div class="row">
                <div class="col-sm-12">
                   <?= $this->Form->button('Cambiar contraseña', array('div'=>array('class'=>'text-xs-center'),'class'=>'btn btn-success btn-block m-t-20', 'type'=>'submit')); ?>
                </div>
              </div>
            <?php echo $this->Form->end(); ?>
          </div>
        </div>
      </dov>
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