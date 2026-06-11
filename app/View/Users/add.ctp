<?php
  $this->assign('title', 'Dashboard | HolaSocio');
  echo $this->Html->css(
    array(
      '/vendors/inputlimiter/css/jquery.inputlimiter',
      '/vendors/chosen/css/chosen',
      '/vendors/bootstrap-colorpicker/css/bootstrap-colorpicker.min',
      '/vendors/jquery-tagsinput/css/jquery.tagsinput',
      '/vendors/daterangepicker/css/daterangepicker',
      '/vendors/datepicker/css/bootstrap-datepicker.min',
      '/vendors/bootstrap-timepicker/css/bootstrap-timepicker.min',
      '/vendors/bootstrap-switch/css/bootstrap-switch.min',
      '/vendors/jasny-bootstrap/css/jasny-bootstrap.min',
      '/vendors/fileinput/css/fileinput.min',
      '/vendors/select2/css/select2.min',
      'pages/form_elements',
    ),
    array('inline'=>false)
  );
?>
<header class="head">
  <div class="main-bar">
    <div class="row m-t-10">
      <div class="col-sm-12 col-lg-6">
        <h5 class="text-white">
          Usuario nuevo
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
      <div class="col-sm-12">
        <div class="card">
          <div class="card-block card_block_top_align ">
            <div class="m-t-40">
              <?= $this->Form->create('User'); ?>
                <div class="row">
                  <div class="form-group">
                    <?= $this->Form->input('nombre', array('label'=>array('for'=>'nombre', 'text'=>'Nombre'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required', 'required')) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('apellido_paterno', array('label'=>array('for'=>'apellido_paterno', 'text'=>'Apellido Paterno'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required', 'required')) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <?= $this->Form->input('apellido_materno', array('label'=>array('for'=>'apellido_materno', 'text'=>'Apellido Materno'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required', 'required')) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('email', array('label'=>array('for'=>'email', 'text'=>'Email'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required', 'required', 'type'=>'email')) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <?= $this->Form->input('password', array('label'=>array('for'=>'password', 'text'=>'Password'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required', 'required', 'type'=>'password')) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('pin', array('label'=>array('for'=>'pin', 'text'=>'Pin'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required')) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="form-group">
                    <?= $this->Form->input('puesto', array('label'=>array('for'=>'puesto', 'text'=>'Puesto'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required', 'required')) ?>
                  </div>
                  <div class="form-group">
                    <?= $this->Form->input('group_id', array('label'=>array('for'=>'group_id', 'text'=>'Group'), 'div'=>array('class'=>'col-sm-12 col-md-6'), 'class'=>'form-control required chzn-select', 'type'=>'select','options'=>$grupos)) ?>
                  </div>
                </div>
                <div class="row">
                  <div class="col-sm-12 m-t-20">
                    <?= $this->Form->button('Guardar', array('class'=>'btn btn-success', 'type'=>'submit')); ?>
                  </div>
                </div>
              <?= $this->Form->create('User'); ?>
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
    '/vendors/jquery.uniform/js/jquery.uniform',
    '/vendors/inputlimiter/js/jquery.inputlimiter',
    '/vendors/chosen/js/chosen.jquery',
    '/vendors/bootstrap-colorpicker/js/bootstrap-colorpicker.min',
    '/vendors/jquery-tagsinput/js/jquery.tagsinput',
    '/vendors/validval/js/jquery.validVal.min',
    '/vendors/moment/js/moment.min',
    '/vendors/daterangepicker/js/daterangepicker',
    '/vendors/datepicker/js/bootstrap-datepicker.min',
    '/vendors/bootstrap-timepicker/js/bootstrap-timepicker.min',
    '/vendors/bootstrap-switch/js/bootstrap-switch.min',
    '/vendors/autosize/js/jquery.autosize.min',
    '/vendors/inputmask/js/inputmask',
    '/vendors/inputmask/js/jquery.inputmask',
    '/vendors/inputmask/js/inputmask.date.extensions',
    '/vendors/inputmask/js/inputmask.extensions',
    '/vendors/fileinput/js/fileinput.min',
    '/vendors/fileinput/js/theme',
    'pages/form_elements',
    'form',
  ),
  array('inline'=>false)
);
?>