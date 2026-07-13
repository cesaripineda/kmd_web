<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <i class="fa fa-edit"></i> Editar Información de Empresa
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create('Empresa', array('class' => 'form-horizontal')) ?>
                        <div class="row m-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $this->Form->input('razon_social', array('class' => 'form-control', 'label' => 'Razón Social')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('nombre_comercial', array('class' => 'form-control', 'label' => 'Nombre Comercial')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('rfc', array('class' => 'form-control', 'label' => 'RFC')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('telefono', array('class' => 'form-control', 'label' => 'Teléfono')) ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $this->Form->input('pagina_Web', array('class' => 'form-control', 'label' => 'Página Web')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('giro', array('type' => 'textarea', 'rows' => 3, 'class' => 'form-control', 'label' => 'Giro / Actividad Comercial')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('horario_trabajo', array('class' => 'form-control', 'label' => 'Horario de Trabajo')) ?>
                                </div>
                            </div>
                        </div>
                        <div class="form-actions m-t-20">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <?= $this->Form->submit('Guardar Cambios', array('class' => 'btn btn-primary', 'div' => false)) ?>
                                    <?= $this->Html->link('Cancelar', array('action' => 'index'), array('class' => 'btn btn-secondary')) ?>
                                </div>
                            </div>
                        </div>
                        <?= $this->Form->end() ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
.form-group label { font-weight: 600; margin-bottom: 5px; }
.form-horizontal .form-group { margin-bottom: 20px; }
</style>
