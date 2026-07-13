<?= $this->Html->css(
	array(
		'/vendors/select2/css/select2.min',
		'/vendors/datatables/css/scroller.bootstrap.min',
		'/vendors/datatables/css/colReorder.bootstrap.min',
		'/vendors/datatables/css/dataTables.bootstrap.min',
		'backoffice/pages/dataTables.bootstrap',
		'backoffice/plugincss/responsive.dataTables.min',
		'backoffice/pages/tables',
		'/vendors/datepicker/css/bootstrap-datepicker.min'
	),
	array('inline' => false)
);
?>

<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-4 px-4" style="border-bottom: 2px solid #f8f9fa;">
                        <h3 class="m-0" style="font-weight: 800; color: #2c3e50; letter-spacing: -0.5px;">
                            <i class="fa fa-flask text-primary mr-2"></i> Mis Materias Primas
                        </h3>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive p-4">
                            <table id="mps_table" class="table table-hover align-middle" style="width:100% !important; border-collapse: separate !important; border-spacing: 0 12px;">
                                <thead class="text-uppercase text-secondary" style="font-size: 0.75rem; letter-spacing: 1px;">
                                    <tr>
                                        <th class="border-0 px-4">Clave</th>
                                        <th class="border-0">Nombre</th>
                                        <th class="border-0">Marca</th>
                                        <th class="border-0">Fabricantes / Proveedores</th>
                                        <th class="border-0 text-center">Actualizar</th>
                                    </tr>
                                </thead>
                                <tbody style="font-size: 14px;">
                                    <?php 
                                    $today = strtotime(date("Y-m-d"));
                                    foreach ($mps as $mp): 
                                        $is_expired = false;
                                        if (!empty($mp['MpFabricante'])) {
                                            foreach ($mp['MpFabricante'] as $fab) {
                                                $exp_time = strtotime($fab['expiracion_certificado']);
                                                if ($exp_time < $today && !empty($fab['expiracion_certificado']) && $fab['expiracion_certificado'] != '0000-00-00') {
                                                    $is_expired = true;
                                                    break;
                                                }
                                            }
                                        } else {
                                            $exp1 = strtotime($mp['Mp']['expiracion_certificado']);
                                            $exp2 = strtotime($mp['Mp']['expiracion_certificado_proveedor_2']);
                                            $is_expired = ($exp1 < $today && !empty($mp['Mp']['expiracion_certificado']) && $mp['Mp']['expiracion_certificado'] != '0000-00-00') || 
                                                         ($exp2 < $today && !empty($mp['Mp']['expiracion_certificado_proveedor_2']) && $mp['Mp']['expiracion_certificado_proveedor_2'] != '0000-00-00');
                                        }
                                    ?>
                                    <tr class="mp-row shadow-sm" style="background: #ffffff; border-radius: 10px;">
                                        <td class="px-4" style="font-weight: 700; color: #344767;">
                                            <?= h($mp['Mp']['clave']) ?>
                                        </td>
                                        <td style="font-weight: 600; color: #2c3e50; max-width: 250px;" class="text-truncate">
                                            <?= h($mp['Mp']['nombre_ingrediente']) ?>
                                        </td>
                                        <td style="color: #67748e;"><?= h($mp['Mp']['marca_comercial']) ?></td>
                                        <td>
                                            <?php if (!empty($mp['MpFabricante'])): ?>
                                                <ul class="list-unstyled mb-0">
                                                    <?php foreach ($mp['MpFabricante'] as $i => $fab): ?>
                                                        <li class="mb-2 pb-2" style="<?= ($i < count($mp['MpFabricante']) - 1) ? 'border-bottom: 1px solid #f1f3f5;' : '' ?>">
                                                            <div style="font-weight: 700; color: #344767; font-size: 0.85rem; line-height: 1.2;">
                                                                <?= h($fab['fabricante']) ?>
                                                            </div>
                                                            <?php if (!empty($fab['proveedor'])): ?>
                                                                <div class="text-muted small" style="line-height: 1.2;">
                                                                    <i class="fa fa-truck mr-1"></i> <?= h($fab['proveedor']) ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            <?php if (!empty($fab['pagina_producto'])): ?>
                                                                <div class="text-muted small" style="line-height: 1.2; margin-top: 2px;">
                                                                    <i class="fa fa-file-text-o mr-1"></i> Pág: <?= h($fab['pagina_producto']) ?>
                                                                </div>
                                                            <?php endif; ?>
                                                            
                                                            <?php if (!empty($fab['expiracion_certificado']) && $fab['expiracion_certificado'] != '0000-00-00'): ?>
                                                                <?php 
                                                                $exp_time = strtotime($fab['expiracion_certificado']);
                                                                $is_fab_exp = ($exp_time < $today);
                                                                $style = $is_fab_exp ? 'color: #f5365c; font-weight: 700;' : 'color: #2dce89; font-weight: 600;';
                                                                $cert_url = !empty($fab['certificado']) ? "https://sistema.kosher.com.mx" . $fab['certificado'] : "#";
                                                                ?>
                                                                <div style="margin-top: 2px;">
                                                                    <a href="<?= $cert_url ?>" target="_blank" style="<?= $style ?> font-size: 0.75rem;">
                                                                        <i class="fa fa-calendar-times-o mr-1"></i>Vence: <?= date('d/m/Y', $exp_time) ?> 
                                                                    </a>
                                                                </div>
                                                            <?php else: ?>
                                                                <div class="text-muted small" style="margin-top: 2px;"><i class="fa fa-exclamation-triangle mr-1"></i>Sin certificado</div>
                                                            <?php endif; ?>
                                                        </li>
                                                    <?php endforeach; ?>
                                                </ul>
                                            <?php else: ?>
                                                <span class="text-muted small font-italic">Sin fabricantes asignados</span>
                                            <?php endif; ?>
                                        </td>
                                        <td class="text-center">
                                            <?php if (isset($pendientes[$mp['Mp']['id']])): ?>
                                                <span class="badge bg-soft-info text-info" style="font-size: 0.75rem; padding: 6px 12px; border-radius: 5px; background-color: #e3f2fd;">EN TRÁMITE</span>
                                            <?php elseif ($is_expired): ?>
                                                <button type="button" class="btn btn-sm btn-warning shadow-sm update-btn" 
                                                        data-id="<?= $mp['Mp']['id'] ?>" 
                                                        data-nombre="<?= h($mp['Mp']['nombre_ingrediente']) ?>"
                                                        data-clave="<?= h($mp['Mp']['clave']) ?>"
                                                        data-marca="<?= h($mp['Mp']['marca_comercial']) ?>"
                                                        data-clasificacion="<?= isset($mp['Mp']['clasificacion']) ? h($mp['Mp']['clasificacion']) : '' ?>"
                                                        data-fabricante='<?= isset($mp['MpFabricante']) ? json_encode($mp['MpFabricante']) : "[]" ?>'
                                                        data-kosher="<?= isset($mp['Mp']['clasificacion_kosher']) ? h($mp['Mp']['clasificacion_kosher']) : '' ?>"
                                                        data-notas="<?= h($mp['Mp']['notas']) ?>"
                                                        style="border-radius: 8px; font-weight: 700; font-size: 0.75rem; color: #fff; padding: 6px 15px;">
                                                    <i class="fa fa-upload mr-1"></i> Actualizar
                                                </button>
                                            <?php else: ?>
                                                <span class="badge bg-soft-success text-success" style="font-size: 0.75rem; padding: 6px 12px; border-radius: 5px;">VIGENTE</span>
                                            <?php endif; ?>
                                        </td>
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
                    <i class="fa fa-info-circle mr-2"></i> Su solicitud será revisada por el personal administrativo antes de ser aplicada.
                </div>
            </div>
            <div class="modal-footer border-0 p-4">
                <button type="button" class="btn btn-secondary border-0 px-4 py-2" data-dismiss="modal" style="border-radius: 10px; font-weight: 700;">Cancelar</button>
                <button type="submit" class="btn btn-primary px-5 py-2 shadow" style="border-radius: 10px; font-weight: 700;">Enviar Solicitud</button>
            </div>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>

<?php
echo $this->Html->script(
	array(
		'/vendors/select2/js/select2',
		'/vendors/datatables/js/jquery.dataTables.min',
		'/vendors/datatables/js/dataTables.bootstrap.min',
		'backoffice/pluginjs/jquery.dataTables.min',
		'/vendors/datatables/js/dataTables.responsive.min',
		'/vendors/datepicker/js/bootstrap-datepicker.min'
	),
	array('inline' => false)
);
?>

<script>
$(document).ready(function() {
    $('#mps_table').DataTable({
        dom: "<'row mb-4 col-md-12'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 d-flex justify-content-end'f>>" +
             "<'row'<'col-sm-12'tr>>" +
             "<'row mt-4 col-md-12'<'col-sm-12 col-md-6 text-left mb-3'i><'col-sm-12 col-md-6 d-flex justify-content-end'p>>",
        responsive: true,
        order: [[1, 'asc']],
        language: {
            search: "",
            searchPlaceholder: "Buscar materias primas...",
            lengthMenu: "Ver _MENU_ registros",
            info: "Mostrando _START_ a _END_ de _TOTAL_ entradas",
            paginate: {
                first: "Primero",
                last: "Último",
                next: '<i class="fa fa-angle-right"></i>',
                previous: '<i class="fa fa-angle-left"></i>'
            }
        }
    });

    $('.dataTables_filter input').addClass('form-control shadow-none border-light bg-light').css({'width': '350px', 'height': '45px', 'border-radius': '10px', 'padding-left': '15px'});
    $('.dataTables_length select').addClass('form-control shadow-none border-light bg-light').css({'width': '100px', 'height': '45px', 'border-radius': '10px', 'display': 'inline-block', 'margin': '0 10px'});
    $('.dataTables_filter').css('width', '100%');

    var fabricanteIndex = 0;

    function addFabricanteItem(data = null) {
        var index = fabricanteIndex++;
        
        var fabricanteVal = data && data.fabricante ? data.fabricante : '';
        var proveedorVal = data && data.proveedor ? data.proveedor : '';
        var paginaProductoVal = data && data.pagina_producto ? data.pagina_producto : '';
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
                    <div class="col-md-5 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Nombre de Fabricante *</label>
                        <input type="text" name="data[MpFabricante][${index}][fabricante]" class="form-control border-light shadow-none bg-light" style="border-radius: 10px; height: 40px;" value="${fabricanteVal}" required>
                    </div>
                    <div class="col-md-4 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Proveedor</label>
                        <input type="text" name="data[MpFabricante][${index}][proveedor]" class="form-control border-light shadow-none bg-light" style="border-radius: 10px; height: 40px;" value="${proveedorVal}">
                    </div>
                    <div class="col-md-3 form-group mb-3">
                        <label class="text-muted text-uppercase small font-weight-bold">Pág. Exacta</label>
                        <input type="text" name="data[MpFabricante][${index}][pagina_producto]" class="form-control border-light shadow-none bg-light" style="border-radius: 10px; height: 40px;" value="${paginaProductoVal}" placeholder="Ej. 5">
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
            var fileName = $(this).val().split('\\').pop();
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
        var fabricantes = $(this).data('fabricante');
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
.mp-row { transition: all 0.3s ease; }
.mp-row:hover {
    background-color: #f8f9fa !important;
    transform: translateY(-2px);
    box-shadow: 0 8px 25px rgba(0,0,0,0.08) !important;
}
.bg-soft-success { background-color: #e8f5e9; }
.btn-primary { background: linear-gradient(310deg, #5e72e4, #825ee4); border: none; }
.btn-primary:hover { transform: translateY(-1px); box-shadow: 0 7px 14px rgba(50,50,93,.1), 0 3px 6px rgba(0,0,0,.08); }
.custom-file-label::after { background-color: #5e72e4; color: #fff; font-weight: 700; border: none; border-radius: 0 10px 10px 0; height: 43px; line-height: 30px; }
.page-item.active .page-link { background-color: #5e72e4; border-color: #5e72e4; color: #fff; }
.page-link { border-radius: 8px !important; margin: 0 3px; border: none; color: #8898aa; font-weight: 600; }
.dataTables_info { color: #8898aa; font-weight: 600; }
.dataTables_length { color: #8898aa; font-weight: 600; }
</style>

