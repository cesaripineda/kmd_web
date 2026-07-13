<?= $this->Html->css(
    array(
        '/vendors/select2/css/select2.min',
        '/vendors/datatables/css/scroller.bootstrap.min',
        '/vendors/datatables/css/colReorder.bootstrap.min',
        '/vendors/datatables/css/dataTables.bootstrap.min',
        'backoffice/pages/dataTables.bootstrap',
        'backoffice/plugincss/responsive.dataTables.min',
        'backoffice/pages/tables'
    ),
    array('inline' => false)
);

$certificados_tipos = array(1 => 'Parve', 2 => 'Carne', 3 => 'Lácteo', 4 => 'Parve Mehadrin', 5 => 'Carne Mehadrin', 6 => 'Lácteo Mehadrin', 7 => 'Jalab Israel Mehadrín', 8 => 'Parve Mehadrín D.E.');
$status_tipos = array(1 => 'No certificado', 2 => 'Certificado', 3 => 'Certificado Vencido');
?>

<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-4 px-4"
                        style="border-bottom: 2px solid #f8f9fa;">
                        <div class="d-flex align-items-center">
                            <h3 class="m-0" style="font-weight: 800; color: #2c3e50; letter-spacing: -0.5px;">
                                <i class="fa fa-cubes text-primary mr-2"></i> Listado de Mis Productos
                            </h3>
                            <div class="ml-3">
                                <?= $this->Html->link('<i class="fa fa-globe mr-1"></i> Configurar Vista Pública', 'http://localhost/kmd/productos/list_productos_empresa_externo_alterno/' . $unique_id, array('escape' => false, 'class' => 'btn btn-primary shadow-sm', 'style' => 'border-radius: 10px; font-weight: 700;', 'target' => '_blank')) ?>
                            </div>
                        </div>
                        <div class="text-muted" style="font-weight: 600;">
                            Total: <span class="badge badge-primary badge-pill"><?= count($productos) ?></span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive p-4">
                            <table id="productos_table" class="table table-hover align-middle"
                                style="width:100% !important; border-collapse: separate !important; border-spacing: 0 12px;">
                                <thead class="text-uppercase text-secondary"
                                    style="font-size: 0.75rem; letter-spacing: 1px;">
                                    <tr>
                                        <th class="border-0 px-4">ID Kosher</th>
                                        <th class="border-0">Marca</th>
                                        <th class="border-0">Nombre del Producto</th>
                                        <th class="border-0">Clave</th>
                                        <th class="border-0">Clasificación</th>
                                        <th class="border-0">Restricciones</th>
                                        <th class="border-0 text-center">Estatus</th>
                                        <th class="border-0 text-center">Certificado</th>
                                        <th class="border-0 text-center">Acciones</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                        <tr class="product-row shadow-sm" style="background: #ffffff; border-radius: 10px;">
                                            <td class="px-4" style="font-weight: 700; color: #344767; font-size: 0.95rem;">
                                                <span
                                                    class="text-muted">#</span><?= h($producto['Producto']['empresa_id'] . "-" . $producto['Producto']['id']) ?>
                                            </td>
                                            <td style="color: #67748e; font-weight: 600;">
                                                <?= h($producto['Producto']['marca']) ?>
                                            </td>
                                            <td style="color: #344767; font-weight: 700;">
                                                <?= h($producto['Producto']['nombre_producto']) ?>
                                            </td>
                                            <td style="color: #67748e;"><code
                                                    style="background: #f8f9fa; padding: 4px 8px; border-radius: 5px; color: #5e72e4;"><?= h($producto['Producto']['clave']) ?></code>
                                            </td>
                                            <td style="color: #67748e;">
                                                <?= isset($certificados_tipos[$producto['Producto']['clasificacion']]) ? h($certificados_tipos[$producto['Producto']['clasificacion']]) : 'N/A' ?>
                                            </td>
                                            <td style="color: #67748e; font-size: 0.85rem;">
                                                <?= !empty($producto['Producto']['restricciones']) ? h($producto['Producto']['restricciones']) : '<span class="text-muted italic">Sin restricciones</span>' ?>
                                            </td>
                                            <td class="text-center">
                                                <?php
                                                $s = $producto['Producto']['status'];
                                                $badge_class = 'bg-gradient-secondary';
                                                $status_label = isset($status_tipos[$s]) ? $status_tipos[$s] : 'Desconocido';

                                                if ($s == 2)
                                                    $badge_class = 'bg-gradient-success';
                                                elseif ($s == 3)
                                                    $badge_class = 'bg-gradient-danger';
                                                ?>
                                                <span class="badge <?= $badge_class ?>"
                                                    style="padding: 8px 16px; border-radius: 8px; font-size: 0.75rem; color: #fff; <?= $s == 2 ? 'background: linear-gradient(310deg, #2dce89, #2dcecc);' : ($s == 3 ? 'background: linear-gradient(310deg, #f5365c, #f56036);' : 'background: linear-gradient(310deg, #8898aa, #adb5bd);') ?>">
                                                    <?= h($status_label) ?>
                                                </span>
                                            </td>
                                            <td class="text-center">
                                                <?php if (!empty($producto['Certificado'])): ?>
                                                    <?php
                                                    // Tomamos el primer certificado activo (la asociación ya filtra por vigencia)
                                                    $cert = $producto['Certificado'][0];
                                                    ?>
                                                    <?= $this->Html->link('<i class="fa fa-file-pdf-o mr-1"></i> Ver Certificado', 'https://sistema.kosher.com.mx/certificados/view_esp/' . $cert['id'] . "/" . $producto['Producto']['id'] . ".pdf", array('escape' => false, 'class' => 'btn btn-sm btn-outline-info shadow-sm', 'style' => 'border-radius: 8px; font-weight: 700;', 'target' => '_blank')) ?>
                                                <?php else: ?>
                                                    <span class="text-muted" style="font-size: 0.8rem; font-style: italic;">No
                                                        disponible</span>
                                                <?php endif; ?>
                                            </td>
                                            <td class="text-center">
                                                <?php 
                                                    // Prepare selected MPs for the select2
                                                    $selectedMps = array();
                                                    if (!empty($producto['Mp'])) {
                                                        foreach ($producto['Mp'] as $mp) {
                                                            $selectedMps[] = $mp['id'];
                                                        }
                                                    }
                                                    $selectedMpsJson = json_encode($selectedMps);
                                                ?>
                                                <button type="button" class="btn btn-sm btn-outline-primary shadow-sm" style="border-radius: 8px; font-weight: 700;" onclick='abrirModalReformular(<?= h(json_encode(array(
                                                    "id" => $producto["Producto"]["id"],
                                                    "nombre" => $producto["Producto"]["nombre_producto"],
                                                    "marca" => $producto["Producto"]["marca"],
                                                    "materias_primas" => $selectedMps
                                                ))) ?>)'>
                                                    <i class="fa fa-flask mr-1"></i> Reformular
                                                </button>
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

<!-- Modal Reformular -->
<div class="modal fade" id="modalReformular" tabindex="-1" role="dialog" aria-labelledby="modalReformularLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content" style="border-radius: 15px; border: none; box-shadow: 0 10px 30px rgba(0,0,0,0.1);">
            <div class="modal-header bg-light" style="border-radius: 15px 15px 0 0; padding: 20px 25px;">
                <h5 class="modal-title" id="modalReformularLabel" style="font-weight: 800; color: #2c3e50;">
                    <i class="fa fa-flask text-primary mr-2"></i> Reformular Producto
                </h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <?= $this->Form->create('Producto', array('url' => array('controller' => 'PortalEmpresas', 'action' => 'solicitar_cambio_producto'))) ?>
            <div class="modal-body p-4">
                <div class="alert alert-info text-sm mb-4" style="border-radius: 10px; background-color: #f8f9fe; border-color: #e9ecef; color: #32325d;">
                    <i class="fa fa-info-circle mr-2"></i> Modifique la información necesaria. Los cambios serán enviados para su revisión por parte de los supervisores antes de ser aplicados al sistema general.
                </div>
                
                <?= $this->Form->hidden('id', array('id' => 'ref_producto_id')) ?>
                
                <div class="row">
                    <div class="col-md-6 form-group">
                        <label style="font-weight: 600; color: #344767; font-size: 0.9rem;">Nombre del Producto</label>
                        <?= $this->Form->input('nombre_producto', array('type' => 'text', 'id' => 'ref_nombre', 'class' => 'form-control', 'label' => false, 'required' => true)) ?>
                    </div>
                    <div class="col-md-6 form-group">
                        <label style="font-weight: 600; color: #344767; font-size: 0.9rem;">Marca</label>
                        <?= $this->Form->input('marca', array('type' => 'text', 'id' => 'ref_marca', 'class' => 'form-control', 'label' => false, 'required' => true)) ?>
                    </div>
                </div>
                
                <div class="form-group mt-3">
                    <label style="font-weight: 600; color: #344767; font-size: 0.9rem;">Materias Primas (Fórmula)</label>
                    <p class="text-muted small mb-2">Seleccione todas las materias primas validadas que componen este producto.</p>
                    <?= $this->Form->select('materias_primas', $materias_primas, array(
                        'multiple' => true, 
                        'class' => 'form-control select2-multiple', 
                        'id' => 'ref_materias_primas', 
                        'style' => 'width: 100%;',
                        'data-placeholder' => 'Buscar materias primas...'
                    )) ?>
                </div>
            </div>
            <div class="modal-footer bg-light" style="border-radius: 0 0 15px 15px;">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" style="border-radius: 8px; font-weight: 600;">Cancelar</button>
                <button type="submit" class="btn btn-primary shadow" style="border-radius: 8px; font-weight: 600;"><i class="fa fa-paper-plane mr-1"></i> Enviar Solicitud</button>
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
    ),
    array('inline' => false)
);
?>

<script>
    function abrirModalReformular(data) {
        $('#ref_producto_id').val(data.id);
        $('#ref_nombre').val(data.nombre);
        $('#ref_marca').val(data.marca);
        
        // Configurar select2 y setear valores
        if (!$('#ref_materias_primas').hasClass('select2-hidden-accessible')) {
            $('#ref_materias_primas').select2({
                placeholder: "Buscar materias primas...",
                allowClear: true,
                dropdownParent: $('#modalReformular')
            });
        }
        $('#ref_materias_primas').val(data.materias_primas).trigger('change');
        
        $('#modalReformular').modal('show');
    }

    $(document).ready(function () {
        $('#productos_table').DataTable({
            dom: "<'row mb-4 px-4'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-4 px-4 pb-4'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 text-right'p>>",
            responsive: true,
            order: [[2, 'asc']], // Ordenar por nombre del producto
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Buscar productos...",
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

        $('.dataTables_filter input').addClass('form-control shadow-none border-light bg-light').css({ 'width': '300px', 'display': 'inline-block', 'border-radius': '10px' });
        $('.dataTables_length select').addClass('form-control shadow-none border-light bg-light').css({ 'width': '80px', 'display': 'inline-block', 'border-radius': '10px' });
    });
</script>

<style>
    .product-row {
        transition: all 0.3s ease;
    }

    .product-row:hover {
        background-color: #f8f9fa !important;
        transform: translateY(-2px);
        box-shadow: 0 8px 25px rgba(0, 0, 0, 0.08) !important;
    }

    .btn-outline-info:hover {
        background-color: #11cdef;
        color: #fff;
        transform: translateY(-2px);
    }

    .page-item.active .page-link {
        background-color: #5e72e4;
        border-color: #5e72e4;
        border-radius: 8px !important;
    }

    .page-link {
        border: none;
        margin: 0 4px;
        border-radius: 8px !important;
        font-weight: 600;
        color: #8898aa;
    }

    #productos_table {
        border: none !important;
    }

    .bg-gradient-success {
        background: linear-gradient(310deg, #2dce89, #2dcecc);
    }

    .bg-gradient-danger {
        background: linear-gradient(310deg, #f5365c, #f56036);
    }

    .bg-gradient-secondary {
        background: linear-gradient(310deg, #8898aa, #adb5bd);
    }
</style>