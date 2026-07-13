<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-lg-12">
                <div class="card">
                    <div class="card-header bg-white">
                        <i class="fa fa-edit"></i> <?= $this->action == 'agregar_mp' ? 'Agregar' : 'Editar' ?> Materia Prima
                    </div>
                    <div class="card-body">
                        <?= $this->Form->create('Mp', array('class' => 'form-horizontal')) ?>
                        <?php if ($this->action == 'editar_mp') echo $this->Form->input('id'); ?>
                        
                        <div class="row m-t-20">
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $this->Form->input('mp_general_id', array('options' => $mpGenerals, 'empty' => 'Seleccionar categoría...', 'class' => 'form-control', 'label' => 'Categoría Central (MP General)')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('nombre_ingrediente', array('class' => 'form-control', 'label' => 'Nombre del Ingrediente')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('marca_comercial', array('class' => 'form-control', 'label' => 'Marca Comercial')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('proveedor', array('class' => 'form-control', 'label' => 'Proveedor')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('clasificacion_kosher', array('class' => 'form-control', 'label' => 'Clasificación Kosher')) ?>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="form-group">
                                    <?= $this->Form->input('num_certificado', array('class' => 'form-control', 'label' => 'N° Certificado')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('expiracion_certificado', array('type' => 'date', 'class' => 'form-control', 'label' => 'Expiración del Certificado')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('datos_fabricante', array('type' => 'textarea', 'rows' => 2, 'class' => 'form-control', 'label' => 'Datos del Fabricante')) ?>
                                </div>
                                <div class="form-group">
                                    <?= $this->Form->input('notas', array('type' => 'textarea', 'rows' => 2, 'class' => 'form-control', 'label' => 'Notas adicionales')) ?>
                                </div>
                            </div>
                        </div>
                        
                        <div class="form-actions m-t-20">
                            <div class="row">
                                <div class="col-md-12 text-center">
                                    <?= $this->Form->submit('Guardar Materia Prima', array('class' => 'btn btn-primary', 'div' => false)) ?>
                                    <?= $this->Html->link('Cancelar', array('action' => 'mps'), array('class' => 'btn btn-secondary')) ?>
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
