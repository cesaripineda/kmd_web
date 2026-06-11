<?php
	// title for the layout default
	$this->assign('title', 'KMD Sistema de control | KMD');
	echo $this->Html->css(
    array(
      'pages/login3.css',
      '/vendors/sweetalert/css/sweetalert2.min.css',
      'pages/sweet_alert.css',
      '/vendors/Buttons/css/buttons.min.css',
      'pages/buttons.css',
      'components.css',
      'custom.css',
      'style_hs',
      'default_ctp',
    ),
    array('inline'=>false)
  );
?>
<style>
  .card{
    background-color: rgba(245, 245, 245, 0.84) !important;
  }
</style>
<div class="container" style="min-height: 95.1vh;">
  <div class="row">
    <!-- <div class="col-xl-6 push-xl-0 col-lg-8 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_section login_section_black"> -->
    <div class="col-xl-5 push-xl-4 col-lg-6 push-lg-2 col-md-10 push-md-1 col-sm-10 push-sm-1 login_section login_section_black">
          <div class="card" style="height: 100vh; text-align: center">
            <div class="card-block m-t-30">
              <div class="login_logo login_border_radius1">
                <h4 class="text-xs-center">
                  <p class="m-t-15">Bienvenidos al portal de establecimientos y fábricas.</p>
                </h4>
              </div>
              <div class="col-sm-12 m-b-30">
                <?= $this->Form->create(); ?>
                  <div class="form-group">
                    <div class="input-group">
                      <input class="form-control" type="email" name="data[User][email]" required="true" placeholder="Email" value="<?php if(!empty($_COOKIE["name"])){echo htmlspecialchars($_COOKIE["name"]); }?>" id="email_form">
                    </div>
                  </div>
                  <div class="form-group">
                    <div class="input-group">
                      <input id="password" class="form-control" type="password" name="data[User][password]" required="true" placeholder="Password" value="<?php if(!empty($_COOKIE["pass"])){echo htmlspecialchars($_COOKIE["pass"]); }?>">
                    </div>
                  </div>

                  <div class="row">
                    <div class="col-xs-12">
                      <?= $this->Form->button('Iniciar Sesión', array('div'=>array('class'=>'text-xs-center'),'class'=>'btn btn-success btn-block m-t-20', 'type'=>'submit')); ?>
                    </div>
                  </div>

                <?= $this->Form->end(); ?>
              </div>


            </div>
          </div>
    </div>
  </div>
</div>
<?=
$this->Html->script(array('components.js', 'custom.js', 'tether.min.js', 'bootstrap.min.js', '/vendors/bootstrapvalidator/js/bootstrapValidator.min.js', '/vendors/jquery.backstretch/js/jquery.backstretch.js', 'pages/login3.js', '/vendors/sweetalert/js/sweetalert2.min' ), array('inline'=>false))
?>
<script>
$(document).ready(function() {
  /*$( "#email_form" ).focus(function() {
    $("#group-addon-email").css("border-bottom: 2px solid #8a0013 !important;");
    document.getElementById("group-addon-email").style.border-bottom = "8a0013";
  });*/

<?php if($this->Session->flash('error')){ ?>
  swal('', '<?php echo $this->Session->flash('m_error') ?>', 'error');
<?php } ?>

<?php if($this->Session->flash('success')){ ?>
  swal('', '<?php echo $this->Session->flash('m_success') ?>', 'success');
<?php } ?>
});
