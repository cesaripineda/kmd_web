<div class="outer">
  <div class="inner bg-light lter bg-container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header bg-white">
            <div class="row">
                <div class="col-sm-12 col-lg-6">
                    <h5>Editar Contacto</h5>
                </div>
                <div class="col-sm-12 col-lg-6">
                    <?php echo $this->Html->link('<i class="fa fa-arrow-left"> Regresar </i>', array('action'=>'index'), array('escape' => false, 'class'=>'float-right'))?>
                </div>
            </div>
          </div>
          <div class="card-block p-4">
                <?php
                    echo $this->Form->create('Responsable');
                    echo $this->Form->input('id');
                ?>
                <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('nombre', array('class'=>'form-control', 'required' => true)); ?>
                    </div>
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('apellido_paterno', array('class'=>'form-control', 'required' => true)); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('apellido_materno', array('class'=>'form-control')); ?>
                    </div>
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('email', array('class'=>'form-control', 'required' => true, 'type' => 'email')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('telefono', array('class'=>'form-control', 'type'=>'tel', 'maxlength'=>'50')); ?>
                    </div>
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('fax', array('class'=>'form-control')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('ceular', array('label'=>'Celular', 'class'=>'form-control', 'type'=>'tel', 'maxlength'=>'50')); ?>
                    </div>
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('tipo_responsable', array('class'=>'form-control')); ?>
                    </div>
                </div>
                <div class="row">
                    <div class="form-group col-sm-12 col-lg-6">
                        <?php echo $this->Form->input('responsable_kmd', array('label'=>'Responsable de certificación KMD', 'class'=>'form-control', 'type'=>'checkbox')); ?>
                    </div>
                </div>
                <div class="row m-t-20">
                    <div class="col-sm-12">
                        <?php echo $this->Form->submit('Actualizar Contacto', array('class'=>'btn btn-success', 'style' => 'border-radius: 8px; font-weight: 700;')) ?>
                    </div>
                </div>
                <?php echo $this->Form->end(); ?>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
