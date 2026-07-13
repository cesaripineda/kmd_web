<?= $this->Html->css(
	array(
		'/vendors/datepicker/css/bootstrap-datepicker.min'
	),
	array('inline' => false)
);
?>
<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <!-- Dashboard de Renovaciones de Materias Primas -->
        <div class="row mb-4">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; background: linear-gradient(to right, #ffffff, #f8f9fa);">
                    <div class="card-header bg-transparent border-0 py-4 px-4 d-flex justify-content-between align-items-center">
                        <h4 class="m-0" style="font-weight: 800; color: #2c3e50;">
                            <i class="fa fa-clock-o text-warning mr-2"></i> Dashboard de Renovaciones (MPs)
                        </h4>
                        <span class="badge badge-pill badge-warning px-3 py-2" style="font-weight: 700;"><?= count($renovaciones_mps) ?> Pendientes</span>
                    </div>
                    <div class="card-body px-4 pb-4">
                        <?php if (empty($renovaciones_mps)): ?>
                            <div class="text-center py-5">
                                <div class="icon-shape bg-soft-success rounded-circle mb-3 mx-auto" style="width: 80px; height: 80px; display: flex; align-items: center; justify-content: center; background: #e8f5e9;">
                                    <i class="fa fa-check text-success" style="font-size: 40px;"></i>
                                </div>
                                <h5 class="font-weight-bold text-success">¡Todo al día!</h5>
                                <p class="text-muted">No tienes materias primas por vencer en los próximos 30 días.</p>
                            </div>
                        <?php else: ?>
                            <div class="table-responsive">
                                <table class="table table-hover align-middle mb-0">
                                    <thead class="text-muted small text-uppercase font-weight-bold" style="background: #fcfcfc;">
                                        <tr>
                                            <th class="border-0">Materia Prima</th>
                                            <th class="border-0">Expiración Actual</th>
                                            <th class="border-0">Estatus</th>
                                            <th class="border-0 text-right">Acción</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php 
                                        $today_ts = strtotime(date('Y-m-d'));
                                        foreach ($renovaciones_mps as $rmp): 
                                            $exp_ts = strtotime($rmp['Mp']['expiracion_certificado']);
                                            $is_expired = ($exp_ts < $today_ts && $rmp['Mp']['expiracion_certificado'] != '0000-00-00' && !empty($rmp['Mp']['expiracion_certificado']));
                                            $has_pending = isset($solicitudes_pendientes[$rmp['Mp']['id']]);
                                        ?>
                                            <tr style="border-bottom: 1px solid #f8f9fa;">
                                                <td class="py-3">
                                                    <div class="font-weight-bold text-dark"><?= h($rmp['Mp']['nombre_ingrediente']) ?></div>
                                                    <div class="small text-muted"><?= h($rmp['Mp']['marca_comercial']) ?></div>
                                                </td>
                                                <td>
                                                    <span class="<?= $is_expired ? 'text-danger' : 'text-warning' ?> font-weight-bold">
                                                        <?= !empty($rmp['Mp']['expiracion_certificado']) ? h($rmp['Mp']['expiracion_certificado']) : 'Sin fecha' ?>
                                                    </span>
                                                </td>
                                                <td>
                                                    <?php if ($has_pending): ?>
                                                        <span class="badge badge-info" style="border-radius: 4px; padding: 5px 10px;">EN VALIDACIÓN</span>
                                                    <?php elseif ($is_expired): ?>
                                                        <span class="badge badge-danger" style="border-radius: 4px; padding: 5px 10px;">VENCIDO</span>
                                                    <?php else: ?>
                                                        <span class="badge badge-warning text-white" style="border-radius: 4px; padding: 5px 10px;">PRÓXIMO A VENCER</span>
                                                    <?php endif; ?>
                                                </td>
                                                <td class="text-right">
                                                    <?php if (!$has_pending): ?>
                                                        <button type="button" class="btn btn-sm btn-primary update-btn" 
                                                                data-id="<?= $rmp['Mp']['id'] ?>" 
                                                                data-nombre="<?= h($rmp['Mp']['nombre_ingrediente']) ?>"
                                                                data-clave="<?= h($rmp['Mp']['clave']) ?>"
                                                                data-marca="<?= h($rmp['Mp']['marca_comercial']) ?>"
                                                                data-clasificacion="<?= isset($rmp['Mp']['clasificacion']) ? h($rmp['Mp']['clasificacion']) : '' ?>"
                                                                data-fabricante='<?= isset($rmp['MpFabricante']) ? json_encode($rmp['MpFabricante']) : "[]" ?>'
                                                                data-kosher="<?= isset($rmp['Mp']['clasificacion_kosher']) ? h($rmp['Mp']['clasificacion_kosher']) : '' ?>"
                                                                data-proveedor="<?= isset($rmp['Mp']['proveedor']) ? h($rmp['Mp']['proveedor']) : '' ?>"
                                                                data-notas="<?= h($rmp['Mp']['notas']) ?>"
                                                                style="border-radius: 8px; font-weight: 700;">
                                                            <i class="fa fa-upload mr-1"></i> Actualizar
                                                        </button>
                                                    <?php else: ?>
                                                        <button class="btn btn-sm btn-light disabled" style="border-radius: 8px; font-weight: 700;">Pendiente</button>
                                                    <?php endif; ?>
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php endif; ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-lg-12">
                <div class="card" style="border-radius: 12px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.05); overflow: hidden;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center" style="padding: 20px 25px; border-bottom: 1px solid #f1f1f1;">
                        <h4 class="card-title m-0 text-primary">
                            <i class="fa fa-building-o"></i> Perfil de <?= h($empresa['Empresa']['razon_social']) ?>
                        </h4>
                    </div>
                    <div class="card-body" style="padding: 40px 25px;">
                        <div class="row">
                            <div class="col-md-4 text-center border-right">
                                <div class="user-wrapper m-b-20">
                                    <div style="width: 150px; height: 150px; margin: 0 auto; background: #f8f9fa; border-radius: 50%; display: flex; align-items: center; justify-content: center; border: 4px solid #fff; box-shadow: 0 5px 15px rgba(0,0,0,0.08);">
                                        <i class="fa fa-building text-muted" style="font-size: 60px;"></i>
                                    </div>
                                </div>
                                <h3 class="m-t-20" style="font-weight: 700; color: #333;"><?= h($empresa['Empresa']['nombre_comercial']) ?></h3>
                                <?php 
                                    $status_class = 'badge-secondary';
                                    $status = $empresa['Empresa']['status'];
                                    if ($status == 'Activo') $status_class = 'badge-success';
                                    elseif ($status == 'Vencida') $status_class = 'badge-danger';
                                    elseif ($status == 'Inactivo') $status_class = 'badge-secondary';
                                    elseif ($status == 'En Trámite') $status_class = 'badge-primary';
                                ?>
                                <div class="m-b-10">
                                    <span class="badge badge-pill <?= $status_class ?> px-4 py-2" style="font-size: 0.9rem; border-radius: 30px;"><?= h($status) ?></span>
                                </div>
                                
                                <?php 
                                    $box_style = 'background: #f8f9fa; border: 1px solid #e9ecef;';
                                    $text_class = 'text-muted';
                                    if ($status == 'Activo') { $box_style = 'background: #f0fff4; border: 1px solid #c6f6d5;'; $text_class = 'text-success'; }
                                    elseif ($status == 'Vencida') { $box_style = 'background: #fff5f5; border: 1px solid #fed7d7;'; $text_class = 'text-danger'; }
                                    elseif ($status == 'En Trámite') { $box_style = 'background: #ebf8ff; border: 1px solid #bee3f8;'; $text_class = 'text-primary'; }
                                ?>
                                <div class="m-t-20 p-3" style="<?= $box_style ?> border-radius: 12px;">
                                    <p class="text-muted m-0" style="font-size: 0.8rem; text-uppercase; font-weight: 700;">Fecha de Vencimiento</p>
                                    <h2 class="<?= $text_class ?> m-0" style="font-weight: 800;"><?= !empty($empresa['Empresa']['fecha_vencimiento']) ? date('d-M-Y', strtotime($empresa['Empresa']['fecha_vencimiento'])) : 'N/A' ?></h2>
                                </div>
                            </div>
                            
                            <div class="col-md-8 px-5">
                                <h5 class="m-b-20" style="font-weight: 700; color: #555;"><i class="fa fa-info-circle mr-2"></i> Información General</h5>
                                <div class="table-responsive">
                                    <table class="table table-borderless table-sm">
                                        <tbody>
                                            <tr>
                                                <th scope="row" style="width: 200px; color: #888; font-weight: 500;">Razón Social:</th>
                                                <td style="font-weight: 600; color: #444;"><?= h($empresa['Empresa']['razon_social']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="color: #888; font-weight: 500;">RFC:</th>
                                                <td style="font-weight: 600; color: #444;"><?= h($empresa['Empresa']['rfc']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="color: #888; font-weight: 500;">Dirección:</th>
                                                <td style="font-weight: 600; color: #444;">
                                                    <?php 
                                                        if (!empty($empresa['Direccion']['id'])) {
                                                            echo h($empresa['Direccion']['calle'] . " #" . $empresa['Direccion']['exterior']);
                                                            if (!empty($empresa['Direccion']['interior'])) echo " Int. " . h($empresa['Direccion']['interior']);
                                                            echo ", Col. " . h($empresa['Direccion']['colonia']) . ", " . h($empresa['Direccion']['municipio']) . ", CP " . h($empresa['Direccion']['cp']) . ", " . h($empresa['Direccion']['estado']);
                                                        } else {
                                                            echo '<span class="text-muted italic">No disponible</span>';
                                                        }
                                                    ?>
                                                </td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="color: #888; font-weight: 500;">Teléfono:</th>
                                                <td style="font-weight: 600; color: #444;"><?= h($empresa['Empresa']['telefono']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="color: #888; font-weight: 500;">Sitio Web:</th>
                                                <td style="font-weight: 600; color: #444;"><?= h($empresa['Empresa']['pagina_Web']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="color: #888; font-weight: 500;">Horario:</th>
                                                <td style="font-weight: 600; color: #444;"><?= h($empresa['Empresa']['horario_trabajo']) ?></td>
                                            </tr>
                                            <tr>
                                                <th scope="row" style="color: #888; font-weight: 500;">Giro / Actividad:</th>
                                                <td style="font-weight: 600; color: #444;"><?= h($empresa['Empresa']['giro']) ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                                
                                <hr class="m-y-30">
                                
                                <h5 class="m-b-20" style="font-weight: 700; color: #555;"><i class="fa fa-users mr-2"></i> Contactos KMD</h5>
                                <div class="row">
                                    <?php 
                                        $contacts = array(
                                            array('title' => 'Rabino Responsable', 'data' => $empresa['Rabino'], 'icon' => 'fa-user-circle', 'color' => 'info'),
                                            array('title' => 'Asesor de Renovación', 'data' => $empresa['Renovacion'], 'icon' => 'fa-handshake-o', 'color' => 'success'),
                                            array('title' => 'Promotor', 'data' => $empresa['Promotor'], 'icon' => 'fa-bullhorn', 'color' => 'warning')
                                        );
                                        
                                        foreach ($contacts as $contact): 
                                            if (!empty($contact['data']['id'])):
                                    ?>
                                        <div class="col-md-4">
                                            <div class="p-3 border rounded bg-light" style="height: 100%;">
                                                <h6 style="font-weight: 700; font-size: 0.85rem;" class="text-<?= $contact['color'] ?>"><i class="fa <?= $contact['icon'] ?> mr-1"></i> <?= $contact['title'] ?></h6>
                                                <p class="m-b-5" style="font-weight: 600; font-size: 0.9rem;"><?= h($contact['data']['nombre'] . " " . $contact['data']['apellido_paterno']) ?></p>
                                                <p class="m-0" style="font-size: 0.8rem;"><i class="fa fa-envelope-o mr-1"></i> <a href="mailto:<?= h($contact['data']['email']) ?>"><?= h($contact['data']['email']) ?></a></p>
                                                <?php if (!empty($contact['data']['telefono'])): ?>
                                                    <p class="m-0" style="font-size: 0.8rem;"><i class="fa fa-phone mr-1"></i> <?= h($contact['data']['telefono']) ?></p>
                                                <?php endif; ?>
                                            </div>
                                        </div>
                                    <?php 
                                            endif;
                                        endforeach; 
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                </div>
            </div>
        </div>
        <div class="row m-t-40 mb-5">
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-center bg-white p-4 action-card">
                    <div class="card-body">
                         <div class="icon-shape bg-soft-info mb-4">
                             <i class="fa fa-flask text-info" style="font-size: 40px;"></i>
                         </div>
                         <h4 style="font-weight: 700;">Materias Primas</h4>
                         <p class="text-muted px-3">Gestione el catálogo completo de materias primas e insumos.</p>
                         <div class="m-t-25">
                            <?= $this->Html->link('Administrar <i class="fa fa-arrow-right ml-2"></i>', array('action' => 'mps'), array('escape' => false, 'class' => 'btn btn-info btn-block py-2', 'style' => 'border-radius: 8px; font-weight: 600;')) ?>
                         </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-center bg-white p-4 action-card">
                    <div class="card-body">
                         <div class="icon-shape bg-soft-primary mb-4">
                             <i class="fa fa-cubes text-primary" style="font-size: 40px;"></i>
                         </div>
                         <h4 style="font-weight: 700;">Mis Productos</h4>
                         <p class="text-muted px-3">Consulte su catálogo de productos certificados y vigentes.</p>
                         <div class="m-t-25">
                            <?= $this->Html->link('Ver Productos <i class="fa fa-arrow-right ml-2"></i>', array('action' => 'productos'), array('escape' => false, 'class' => 'btn btn-primary btn-block py-2', 'style' => 'border-radius: 8px; font-weight: 600;')) ?>
                         </div>
                    </div>
                </div>
            </div>

            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-center bg-white p-4 action-card">
                    <div class="card-body">
                         <div class="icon-shape bg-soft-success mb-4">
                             <i class="fa fa-certificate text-success" style="font-size: 40px;"></i>
                         </div>
                         <h4 style="font-weight: 700;">Certificados</h4>
                         <p class="text-muted px-3">Descargue sus certificados de supervisión vigentes.</p>
                         <div class="m-t-25">
                            <?= $this->Html->link('Ver Certificados <i class="fa fa-arrow-right ml-2"></i>', array('action' => 'certificados'), array('escape' => false, 'class' => 'btn btn-success btn-block py-2', 'style' => 'border-radius: 8px; font-weight: 600;')) ?>
                         </div>
                    </div>
                </div>
            </div>
            
            <div class="col-lg-3 col-md-6 col-sm-12">
                <div class="card text-center bg-white p-4 action-card">
                    <div class="card-body">
                         <div class="icon-shape bg-soft-warning mb-4">
                             <i class="fa fa-lock text-warning" style="font-size: 40px;"></i>
                         </div>
                         <h4 style="font-weight: 700;">Seguridad</h4>
                         <p class="text-muted px-3">Actualice su contraseña de acceso periódicamente.</p>
                         <div class="m-t-25">
                            <?= $this->Html->link('Seguridad <i class="fa fa-arrow-right ml-2"></i>', array('controller' => 'users', 'action' => 'password'), array('escape' => false, 'class' => 'btn btn-warning btn-block py-2', 'style' => 'border-radius: 8px; font-weight: 600; color: #fff;')) ?>
                         </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Modal para Actualizar Certificado -->
<div class="modal fade" id="updateModal" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content border-0 shadow-lg" style="border-radius: 20px;">
            <div class="modal-header bg-primary text-white py-4 px-4" style="border-radius: 20px 20px 0 0;">
                <h5 class="modal-title" style="font-weight: 800;">
                    <i class="fa fa-upload mr-2"></i> Solicitar Actualización de Materia Prima
                </h5>
                <button type="button" class="close text-white" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->Form->create('AutorizacionMp', array('url' => array('controller' => 'portal_empresas', 'action' => 'solicitar_cambio_mp'), 'type' => 'file')) ?>
            <div class="modal-body p-4">
                <?= $this->Form->hidden('mp_id', array('id' => 'modal_mp_id')) ?>
                
                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Clave</label>
                        <?= $this->Form->input('clave', array('label' => false, 'id' => 'modal_mp_clave', 'class' => 'form-control border-light shadow-none bg-light', 'style' => 'border-radius: 10px; height: 45px;')) ?>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Nombre *</label>
                        <?= $this->Form->input('nombre_ingrediente', array('label' => false, 'id' => 'modal_mp_nombre_ingrediente', 'class' => 'form-control border-light shadow-none bg-light', 'style' => 'border-radius: 10px; height: 45px;', 'required' => true)) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-6 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Marca Comercial</label>
                        <?= $this->Form->input('marca_comercial', array('label' => false, 'id' => 'modal_mp_marca', 'class' => 'form-control border-light shadow-none bg-light', 'style' => 'border-radius: 10px; height: 45px;')) ?>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Clasificación</label>
                        <?= $this->Form->input('clasificacion', array('label' => false, 'id' => 'modal_mp_clasificacion', 'class' => 'form-control border-light shadow-none bg-light', 'style' => 'border-radius: 10px; height: 45px;')) ?>
                    </div>
                </div>

                <div class="row">
                    <div class="col-md-12 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Clasificación Kosher</label>
                        <?= $this->Form->input('clasificacion_kosher', array('label' => false, 'id' => 'modal_mp_clasificacion_kosher', 'class' => 'form-control border-light shadow-none bg-light', 'options' => array('Parve' => 'Parve', 'Lácteo' => 'Lácteo', 'Cárnico' => 'Cárnico', 'Parve Mehadrin' => 'Parve Mehadrin', 'Lácteo Mehadrin' => 'Lácteo Mehadrin', 'Cárnico Mehadrin' => 'Cárnico Mehadrin'), 'style' => 'border-radius: 10px; height: 45px;')) ?>
                    </div>
                </div>

                <div class="mt-4 mb-2 d-flex justify-content-between align-items-center">
                    <h6 class="font-weight-bold text-uppercase mb-0" style="color: #2c3e50;"><i class="fa fa-industry mr-2"></i> Fabricantes</h6>
                    <button type="button" class="btn btn-sm btn-outline-primary" id="btn-add-fabricante" style="border-radius: 8px; font-weight: 700;">
                        <i class="fa fa-plus mr-1"></i> Agregar Fabricante
                    </button>
                </div>
                
                <div id="fabricantes-container" class="mb-4">
                    <!-- Los items de fabricante se agregarán aquí dinámicamente -->
                </div>
                
                <div class="form-group mb-4">
                    <label class="text-muted text-uppercase small font-weight-bold">Notas</label>
                    <?= $this->Form->input('notas', array('type' => 'textarea', 'label' => false, 'id' => 'modal_mp_notas', 'class' => 'form-control border-light shadow-none bg-light', 'style' => 'border-radius: 10px;', 'rows' => 2)) ?>
                </div>

                <div class="alert alert-info border-0 shadow-none" style="border-radius: 12px; background-color: #e8f5fd; color: #0088cc; font-size: 0.9rem;">
                    <i class="fa fa-info-circle mr-2"></i> Su solicitud será enviada a validación. Al ser aprobada, se actualizará automáticamente.
                </div>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 10px; font-weight: 700;">Cancelar</button>
                <button type="submit" class="btn btn-primary px-5 shadow" style="border-radius: 10px; font-weight: 700;">Enviar a Validación</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
echo $this->Html->script(
	array(
		'/vendors/datepicker/js/bootstrap-datepicker.min'
	),
	array('inline' => false)
);
?>

<script>
$(document).ready(function() {
    $('.datepicker-plugin').datepicker({
        format: 'dd-mm-yyyy',
        todayHighlight: true,
        autoclose: true,
        orientation: "bottom"
    });

    var fabricanteIndex = 0;

    function addFabricanteItem(data = null) {
        var index = fabricanteIndex++;
        
        var fabricanteVal = data && data.fabricante ? data.fabricante : '';
        var proveedorVal = data && data.proveedor ? data.proveedor : '';
        var expiracionVal = data && data.expiracion_certificado && data.expiracion_certificado != '0000-00-00' ? data.expiracion_certificado : '';
        
        // Convert Y-m-d to d-m-Y if needed for datepicker
        if (expiracionVal && expiracionVal.indexOf('-') === 4) {
            var parts = expiracionVal.split('-');
            expiracionVal = parts[2] + '-' + parts[1] + '-' + parts[0];
        }

        var html = `
            <div class="fabricante-item p-3 mb-3 border bg-white" style="border-radius: 12px; position: relative;">
                <button type="button" class="btn btn-sm btn-danger remove-fabricante-btn" style="position: absolute; top: 10px; right: 10px; border-radius: 50%; width: 28px; height: 28px; padding: 0; line-height: 28px;"><i class="fa fa-times"></i></button>
                
                <div class="row pr-4">
                    <div class="col-md-6 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Nombre de Fabricante *</label>
                        <input type="text" name="data[MpFabricante][${index}][fabricante]" class="form-control border-light shadow-none bg-light" style="border-radius: 10px; height: 40px;" value="${fabricanteVal}" required>
                    </div>
                    <div class="col-md-6 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Proveedor</label>
                        <input type="text" name="data[MpFabricante][${index}][proveedor]" class="form-control border-light shadow-none bg-light" style="border-radius: 10px; height: 40px;" value="${proveedorVal}">
                    </div>
                </div>
                
                <div class="row">
                    <div class="col-md-6 form-group mb-0">
                        <label class="text-muted text-uppercase small font-weight-bold">Nueva Fecha Expiración *</label>
                        <input type="text" name="data[MpFabricante][${index}][expiracion_certificado]" class="form-control border-light shadow-none bg-light datepicker-fabricante" style="border-radius: 10px; height: 40px;" placeholder="dd-mm-yyyy" required>
                    </div>
                    <div class="col-md-6 form-group mb-0">
                        <label class="text-muted text-uppercase small font-weight-bold">Nuevo Certificado (PDF) *</label>
                        <div class="custom-file">
                            <input type="file" name="data[MpFabricante][${index}][file]" class="custom-file-input cert-file-input" id="customFile_${index}" required>
                            <label class="custom-file-label border-light shadow-none bg-light" for="customFile_${index}" style="border-radius: 10px; height: 40px; line-height: 28px; overflow: hidden; text-overflow: ellipsis; white-space: nowrap;">Elegir archivo...</label>
                        </div>
                    </div>
                </div>
            </div>
        `;
        
        $('#fabricantes-container').append(html);
        
        var $newItem = $('#fabricantes-container .fabricante-item').last();
        
        $newItem.find('.datepicker-fabricante').datepicker({
            format: 'dd-mm-yyyy',
            todayHighlight: true,
            autoclose: true,
            orientation: "bottom"
        });
        
        if (expiracionVal) {
            $newItem.find('.datepicker-fabricante').datepicker('update', expiracionVal);
        }

        $newItem.find('.cert-file-input').on('change', function() {
            var fileName = $(this).val().split('\\\\').pop();
            $(this).next('.custom-file-label').html(fileName || 'Elegir archivo...');
        });
    }

    $('#btn-add-fabricante').on('click', function() {
        addFabricanteItem();
    });

    $(document).on('click', '.remove-fabricante-btn', function() {
        $(this).closest('.fabricante-item').remove();
    });

    $('.update-btn').on('click', function() {
        var id = $(this).data('id');
        var nombre = $(this).data('nombre');
        var clave = $(this).data('clave');
        var marca = $(this).data('marca');
        var clasificacion = $(this).data('clasificacion');
        var fabricantes = $(this).data('fabricante'); // This is now a JSON array of MpFabricante objects
        var kosher = $(this).data('kosher');
        var notas = $(this).data('notas');

        $('#modal_mp_id').val(id);
        $('#modal_mp_nombre_ingrediente').val(nombre);
        $('#modal_mp_clave').val(clave);
        $('#modal_mp_marca').val(marca);
        $('#modal_mp_clasificacion').val(clasificacion);
        $('#modal_mp_clasificacion_kosher').val(kosher);
        $('#modal_mp_notas').val(notas);

        $('#fabricantes-container').empty();
        fabricanteIndex = 0;
        
        if (fabricantes && fabricantes.length > 0) {
            fabricantes.forEach(function(fab) {
                addFabricanteItem(fab);
            });
        } else {
            // Add at least one empty item if none exist
            addFabricanteItem();
        }

        $('#updateModal').modal('show');
    });

    $(".custom-file-input").on("change", function() {
        var fileName = $(this).val().split("\\").pop();
        $(this).siblings(".custom-file-label").addClass("selected").html(fileName);
    });
});
</script>

<style>
.bg-soft-success { background-color: #e8f5e9; }
.btn-primary { background: linear-gradient(310deg, #5e72e4, #825ee4); border: none; }
.btn-primary:hover { transform: translateY(-1px); box-shadow: 0 7px 14px rgba(50,50,93,.1), 0 3px 6px rgba(0,0,0,.08); }
.custom-file-label::after { background-color: #5e72e4; color: #fff; font-weight: 700; border: none; border-radius: 0 10px 10px 0; }
</style>

<style>
.m-t-40 { margin-top: 40px; }
.icon-shape {
    width: 80px;
    height: 80px;
    margin: 0 auto;
    display: flex;
    align-items: center;
    justify-content: center;
    border-radius: 20px;
}
.bg-soft-info { background-color: #e7f6f8; }
.bg-soft-primary { background-color: #e8ebf1; }
.bg-soft-success { background-color: #e8f5e9; }
.bg-soft-warning { background-color: #fff8e1; }
.action-card {
    border-radius: 15px;
    transition: all 0.3s ease;
    border: 1px solid #f1f1f1 !important;
}
.action-card:hover {
    transform: translateY(-10px);
    box-shadow: 0 15px 35px rgba(0,0,0,0.1) !important;
    border-color: #ddd !important;
}
.border-right {
    border-right: 1px solid #f1f1f1;
}
@media (max-width: 768px) {
    .border-right { border-right: none; border-bottom: 1px solid #f1f1f1; padding-bottom: 30px; margin-bottom: 30px; }
}
</style>

