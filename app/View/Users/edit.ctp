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
          Editar usuario
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
      <dov class="col-sm-12">
        <div class="card">
          <div class="card-block">
            <?php echo $this->Form->create('User'); ?>
			  <?= $this->Form->input('id')?>
              <div class="row">
                <div class="form-group">
                  <?php
                    echo $this->Form->input('nombre', array('class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6 required')));
                    echo $this->Form->input('apellido_paterno', array('class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6')));
                  ?>
                </div>
              </div>

			  <div class="row">
                <div class="form-group">
                  <?php
                    echo $this->Form->input('apellido_materno', array('class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6 required')));
                    echo $this->Form->input('email', array('class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6')));
                  ?>
                </div>
              </div>

			  <div class="row">
				  <div class="form-group">
					  <?php
						  echo $this->Form->input('celular', array('class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6 required')));
						  echo $this->Form->input('puesto', array('class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6 required')));
					  ?>
				  </div>
			  </div>

              <div class="row">
                <div class="form-group">
                  <?php
                    echo $this->Form->input('group_id', array('type'=>'select','options'=>$grupos, 'class'=>'form-control', 'div'=>array('class'=>'col-sm-12 col-lg-6')));
                  ?>
                </div>
              </div>
              <div class="row m-t-20">
                <div class="col-sm-12">
                  <?php echo $this->Form->button('Guardar', array('class'=>'btn btn-success', 'type'=>'submit')); ?>
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
