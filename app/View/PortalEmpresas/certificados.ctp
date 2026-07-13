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

$clasificaciones = array(
    1 => 'Kosher Parve', 
    2 => 'Kosher Carne', 
    3 => 'Kosher Lácteo', 
    4 => 'Kosher Parve Mehadrin', 
    5 => 'Kosher Carne Mehadrin', 
    6 => 'Kosher Lácteo Mehadrin', 
    7 => 'Jalab Israel Mehadrín', 
    8 => 'Parve Mehadrín D.E.'
);
?>

<style>
    .cert-row { transition: all 0.3s ease; }
    .cert-row:hover { background-color: #f8f9fa !important; }
    .btn-outline-primary:hover, .btn-outline-info:hover { transform: translateY(-2px); color: #fff !important; }
    .page-item.active .page-link { background-color: #2dce89; border-color: #2dce89; border-radius: 8px !important; }
    .page-link { border: none; margin: 0 4px; border-radius: 8px !important; font-weight: 600; color: #8898aa; }
    #certificados_table { border: none !important; }
    .child-row-container { background-color: #f8f9fe; padding: 25px; border-radius: 12px; margin: 10px 20px; border: 1px solid #e9ecef; }
    .id-kmd-link { color: #5e72e4; font-weight: 800; text-decoration: none; border-bottom: 2px dashed #5e72e4; cursor: pointer; transition: all 0.2s; }
    .id-kmd-link:hover { color: #32325d; border-bottom-color: #32325d; background: rgba(94, 114, 228, 0.1); padding: 2px 5px; border-radius: 4px; }
    .badge-soft-primary { background: #eef2ff; color: #4338ca; }
    .shown .id-kmd-link { background: #5e72e4; color: #fff; border-bottom: none; padding: 4px 8px; border-radius: 6px; }
</style>

<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-lg" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header bg-white d-flex justify-content-between align-items-center py-4 px-4"
                        style="border-bottom: 2px solid #f8f9fa;">
                        <h3 class="m-0" style="font-weight: 800; color: #2c3e50; letter-spacing: -0.5px;">
                            <i class="fa fa-certificate text-success mr-2"></i> Mis Certificados de Supervisión
                        </h3>
                        <div class="text-muted" style="font-weight: 600;">
                            Total Vigentes: <span class="badge badge-success badge-pill"><?= count($certificados) ?></span>
                        </div>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive p-4">
                            <table id="certificados_table" class="table table-hover align-middle"
                                style="width:100% !important; border-collapse: separate !important; border-spacing: 0 12px;">
                                <thead class="text-uppercase text-secondary"
                                    style="font-size: 0.75rem; letter-spacing: 1px;">
                                    <tr>
                                        <th class="border-0 px-4">ID KMD</th>
                                        <th class="border-0">Firma</th>
                                        <th class="border-0">Rabino que Certifica</th>
                                        <th class="border-0 text-center">Productos</th>
                                        <th class="border-0">Fecha Emisión</th>
                                        <th class="border-0">Vigencia</th>
                                        <th class="border-0 text-center">Descargar Certificado</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($certificados as $certificado): ?>
                                        <tr class="cert-row shadow-sm" id="row-<?= $certificado['Certificado']['id'] ?>" style="background: #ffffff; border-radius: 10px;">
                                            <td class="px-4">
                                                <a class="id-kmd-link toggle-subtable" data-id="<?= $certificado['Certificado']['id'] ?>">
                                                    <?= h($certificado['Certificado']['empresa_id'] . "-" . $certificado['Certificado']['id']) ?>
                                                </a>
                                            </td>
                                            <td style="color: #67748e; font-weight: 600;">
                                                <i class="fa fa-pencil-square-o mr-2 text-muted opacity-5"></i>
                                                <?= !empty($certificado['Certificado']['firma']) ? h($certificado['Certificado']['firma']) : 'N/A' ?>
                                            </td>
                                            <td style="color: #67748e; font-weight: 600;">
                                                <i class="fa fa-user-circle mr-2 text-primary opacity-5"></i>
                                                <?= !empty($certificado['User']['nombre']) ? h($certificado['User']['nombre'] . " " . $certificado['User']['apellido_paterno']) : 'N/A' ?>
                                            </td>
                                            <td class="text-center">
                                                <span class="badge badge-soft-primary px-3 py-2" style="border-radius: 6px; font-weight: 700;">
                                                    <?= count($certificado['Producto']) ?>
                                                </span>
                                            </td>
                                            <td style="color: #67748e;">
                                                <i class="fa fa-calendar-o mr-2 text-muted"></i><?= date('d/m/Y', strtotime($certificado['Certificado']['fecha'])) ?>
                                            </td>
                                            <td style="color: #344767; font-weight: 700;">
                                                <span class="text-success mr-2"><i class="fa fa-calendar-check-o"></i></span><?= date('d/m/Y', strtotime($certificado['Certificado']['vigencia'])) ?>
                                            </td>
                                            <td class="text-center">
                                                <div class="d-flex align-items-center justify-content-center">
                                                    <div class="mx-2 text-center">
                                                        <span class="d-block text-muted mb-1" style="font-size: 8px; font-weight: 800; text-transform: uppercase;">Grupo</span>
                                                        <?= $this->Html->link('ES', 'https://sistema.kosher.com.mx/certificados/viewes/' . $certificado['Certificado']['id'] . ".pdf", array('escape' => false, 'class' => 'btn btn-xs btn-outline-primary shadow-sm', 'style' => 'border-radius: 4px; font-weight: 700; font-size: 9px; padding: 2px 5px;', 'target' => '_blank', 'title' => 'Grupo Español')) ?>
                                                        <?= $this->Html->link('EN', 'https://sistema.kosher.com.mx/certificados/viewen/' . $certificado['Certificado']['id'] . ".pdf", array('escape' => false, 'class' => 'btn btn-xs btn-outline-info shadow-sm', 'style' => 'border-radius: 4px; font-weight: 700; font-size: 9px; padding: 2px 5px;', 'target' => '_blank', 'title' => 'Grupo Inglés')) ?>
                                                    </div>
                                                    <div class="mx-2 text-center" style="border-left: 1px solid #eee; padding-left: 10px;">
                                                        <span class="d-block text-muted mb-1" style="font-size: 8px; font-weight: 800; text-transform: uppercase;">Indiv.</span>
                                                        <?= $this->Html->link('ES', 'https://sistema.kosher.com.mx/certificados/viewesind/' . $certificado['Certificado']['id'] . ".pdf", array('escape' => false, 'class' => 'btn btn-xs btn-outline-primary shadow-sm', 'style' => 'border-radius: 4px; font-weight: 700; font-size: 9px; padding: 2px 5px;', 'target' => '_blank', 'title' => 'Individual Español')) ?>
                                                        <?= $this->Html->link('EN', 'https://sistema.kosher.com.mx/certificados/viewenind/' . $certificado['Certificado']['id'] . ".pdf", array('escape' => false, 'class' => 'btn btn-xs btn-outline-info shadow-sm', 'style' => 'border-radius: 4px; font-weight: 700; font-size: 9px; padding: 2px 5px;', 'target' => '_blank', 'title' => 'Individual Inglés')) ?>
                                                    </div>
                                                </div>
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

<!-- Hidden templates for child rows -->
<div id="child-row-templates" style="display: none;">
    <?php foreach ($certificados as $certificado): ?>
        <div class="product-data-<?= $certificado['Certificado']['id'] ?>">
            <div class="child-row-container shadow-sm">
                <h6 class="mb-4" style="font-weight: 800; color: #32325d; border-bottom: 1px solid #e9ecef; padding-bottom: 10px;">
                    <i class="fa fa-list-ul mr-2 text-primary"></i> Productos certificados en el folio <?= h($certificado['Certificado']['empresa_id'] . "-" . $certificado['Certificado']['id']) ?>
                </h6>
                <div class="table-responsive">
                    <table class="table table-sm table-borderless m-0">
                        <thead class="text-muted" style="font-size: 0.7rem; text-transform: uppercase; border-bottom: 2px solid #f4f5f7;">
                            <tr>
                                <th class="pb-3">Marca</th>
                                <th class="pb-3">Nombre del Producto</th>
                                <th class="pb-3">Clave</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach ($certificado['Producto'] as $producto): ?>
                                <tr style="border-bottom: 1px solid #f4f5f7;">
                                    <td class="py-3" style="font-weight: 600; color: #525f7f;"><?= h($producto['marca']) ?></td>
                                    <td class="py-3" style="font-weight: 700; color: #32325d;"><?= h($producto['nombre_producto']) ?></td>
                                    <td class="py-3"><code style="color: #5e72e4; background: #f4f5f7; padding: 4px 8px; border-radius: 6px; font-weight: 700;"><?= h($producto['clave']) ?></code></td>
                                </tr>
                            <?php endforeach; ?>
                            <?php if(empty($certificado['Producto'])): ?>
                                <tr><td colspan="3" class="text-center text-muted italic p-4">No hay productos vinculados a este certificado.</td></tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    <?php endforeach; ?>
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
    $(document).ready(function () {
        var table = $('#certificados_table').DataTable({
            dom: "<'row mb-4 px-4'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-4 px-4 pb-4'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 text-right'p>>",
            responsive: true,
            order: [[0, 'desc']], 
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Buscar certificados...",
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

        $('#certificados_table tbody').on('click', '.toggle-subtable', function (e) {
            e.preventDefault();
            var tr = $(this).closest('tr');
            var row = table.row(tr);
            var id = $(this).data('id');

            if (row.child.isShown()) {
                row.child.hide();
                tr.removeClass('shown');
            } else {
                table.rows('.shown').every(function() {
                    this.child.hide();
                    $(this.node()).removeClass('shown');
                });

                var childContent = $('.product-data-' + id).html();
                row.child(childContent).show();
                tr.addClass('shown');
                $(row.child()).find('.child-row-container').hide().slideDown(300);
            }
        });

        $('.dataTables_filter input').addClass('form-control shadow-none border-light bg-light').css({ 'width': '300px', 'display': 'inline-block', 'border-radius': '10px' });
        $('.dataTables_length select').addClass('form-control shadow-none border-light bg-light').css({ 'width': '80px', 'display': 'inline-block', 'border-radius': '10px' });
    });
</script>
