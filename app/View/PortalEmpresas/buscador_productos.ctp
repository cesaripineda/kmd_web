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

$certificados_tipos = array(
    1 => 'Parve', 
    2 => 'Carne', 
    3 => 'Lácteo', 
    4 => 'Parve Mehadrin', 
    5 => 'Carne Mehadrin', 
    6 => 'Lácteo Mehadrin', 
    7 => 'Jalab Israel Mehadrín', 
    8 => 'Parve Mehadrín D.E.'
);
?>

<style>
    .search-container {
        background: linear-gradient(135deg, #5e72e4 0%, #825ee4 100%);
        padding: 40px;
        border-radius: 15px;
        margin-bottom: 30px;
        box-shadow: 0 10px 30px rgba(94, 114, 228, 0.2);
    }
    .search-input {
        height: 60px;
        border-radius: 12px !important;
        border: none;
        padding-left: 25px;
        font-size: 1.1rem;
        box-shadow: 0 4px 15px rgba(0,0,0,0.1);
    }
    .search-btn {
        height: 60px;
        border-radius: 12px !important;
        padding: 0 30px;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        background: #fff;
        color: #5e72e4;
        border: none;
        transition: all 0.3s;
    }
    .search-btn:hover {
        background: #f8f9fa;
        transform: translateY(-2px);
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    .product-card {
        transition: all 0.3s ease;
        border: 1px solid #f1f1f1;
        border-radius: 12px;
    }
    .product-card:hover {
        transform: translateY(-5px);
        box-shadow: 0 10px 25px rgba(0,0,0,0.05);
        border-color: #5e72e4;
    }
    .badge-kosher {
        padding: 6px 12px;
        border-radius: 6px;
        font-size: 0.7rem;
        text-transform: uppercase;
        font-weight: 800;
        background: #eef2ff;
        color: #4338ca;
    }
</style>

<div class="outer" style="width: 86vw;">
    <div class="inner bg-container">
        <!-- Search Header -->
        <div class="row">
            <div class="col-12">
                <div class="search-container text-white">
                    <h2 class="mb-4" style="font-weight: 800;">Buscador Avanzado de Productos</h2>
                    <p class="opacity-8 mb-4">Realice búsquedas por nombre, marca o categoría dentro de sus certificados vigentes.</p>
                    
                    <?= $this->Form->create(null, array('type' => 'get', 'url' => array('controller' => 'portal_empresas', 'action' => 'buscador_productos'))) ?>
                    <div class="input-group">
                        <input type="text" name="q" class="form-control search-input" placeholder="Escriba el nombre, marca o clave del producto..." value="<?= h($q) ?>">
                        <div class="input-group-append">
                            <button class="btn btn-white search-btn" type="submit">
                                <i class="fa fa-search mr-2"></i> Buscar
                            </button>
                        </div>
                    </div>
                    <?= $this->Form->end() ?>
                </div>
            </div>
        </div>

        <?php if (!empty($q) || !empty($productos)): ?>
        <div class="row">
            <div class="col-12">
                <div class="card border-0 shadow-sm" style="border-radius: 15px; overflow: hidden;">
                    <div class="card-header bg-white py-4 px-4 border-0 d-flex justify-content-between align-items-center">
                        <h4 class="m-0" style="font-weight: 700; color: #32325d;">Resultados de búsqueda</h4>
                        <span class="text-muted"><?= count($productos) ?> productos encontrados</span>
                    </div>
                    <div class="card-body p-0">
                        <div class="table-responsive p-4">
                            <table id="search_results" class="table table-hover align-middle" style="width:100% !important; border-collapse: separate !important; border-spacing: 0 12px;">
                                <thead class="text-uppercase text-secondary" style="font-size: 0.7rem; letter-spacing: 1px;">
                                    <tr>
                                        <th class="border-0 px-4">Empresa</th>
                                        <th class="border-0">Marca</th>
                                        <th class="border-0">Producto</th>
                                        <th class="border-0">Clave</th>
                                        <th class="border-0">Clasificación</th>
                                        <th class="border-0">Teléfono</th>
                                        <th class="border-0">Email de Contacto</th>
                                        <th class="border-0">Página Web</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php foreach ($productos as $producto): ?>
                                        <tr class="product-card" style="background: #ffffff;">
                                            <td class="px-4" style="color: #67748e; font-size: 0.8rem; font-weight: 600;">
                                                <i class="fa fa-building-o mr-1"></i> <?= h($producto['Empresa']['razon_social']) ?>
                                            </td>
                                            <td style="font-weight: 700; color: #525f7f;"><?= h($producto['Producto']['marca']) ?></td>
                                            <td style="font-weight: 800; color: #32325d;"><?= h($producto['Producto']['nombre_producto']) ?></td>
                                            <td><code style="color: #5e72e4; background: #f4f5f7; padding: 4px 8px; border-radius: 6px; font-weight: 700;"><?= h($producto['Producto']['clave']) ?></code></td>
                                            <td>
                                                <span class="badge-kosher">
                                                    <?= isset($certificados_tipos[$producto['Producto']['clasificacion']]) ? h($certificados_tipos[$producto['Producto']['clasificacion']]) : 'N/A' ?>
                                                </span>
                                            </td>
                                            <td style="color: #67748e; font-weight: 600; font-size: 0.85rem;">
                                                <i class="fa fa-phone mr-1 opacity-5"></i> <?= !empty($producto['Empresa']['telefono']) ? h($producto['Empresa']['telefono']) : 'N/A' ?>
                                            </td>
                                            <td style="font-size: 0.85rem;">
                                                <?php 
                                                    $email = 'N/A';
                                                    if (!empty($producto['Empresa']['Responsable'])) {
                                                        $email = $producto['Empresa']['Responsable'][0]['email'];
                                                    }
                                                ?>
                                                <i class="fa fa-envelope-o mr-1 opacity-5"></i> 
                                                <?= $email != 'N/A' ? $this->Html->link($email, 'mailto:' . $email, array('style' => 'color: #5e72e4; font-weight: 600;')) : 'N/A' ?>
                                            </td>
                                            <td style="font-size: 0.85rem;">
                                                <i class="fa fa-globe mr-1 opacity-5"></i> 
                                                <?= !empty($producto['Empresa']['pagina_Web']) ? $this->Html->link('Visitar', $producto['Empresa']['pagina_Web'], array('target' => '_blank', 'style' => 'color: #5e72e4; font-weight: 600;')) : 'N/A' ?>
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
        <?php elseif (!empty($q)): ?>
        <div class="row">
            <div class="col-12 text-center p-5">
                <div class="opacity-5 mb-4">
                    <i class="fa fa-search-minus" style="font-size: 80px;"></i>
                </div>
                <h3>No se encontraron resultados</h3>
                <p class="text-muted">No hay productos que coincidan con "<?= h($q) ?>" dentro de sus certificados vigentes.</p>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div>

<?php
echo $this->Html->script(
    array(
        '/vendors/select2/js/select2',
        '/vendors/datatables/js/jquery.dataTables.min',
        '/vendors/datatables/js/dataTables.bootstrap.min',
    ),
    array('inline' => false)
);
?>

<script>
    $(document).ready(function () {
        $('#search_results').DataTable({
            dom: "<'row mb-4'<'col-sm-12 col-md-6'l><'col-sm-12 col-md-6 text-right'f>>" +
                "<'row'<'col-sm-12'tr>>" +
                "<'row mt-4'<'col-sm-12 col-md-5'i><'col-sm-12 col-md-7 text-right'p>>",
            responsive: true,
            order: [[1, 'asc']], 
            language: {
                search: "_INPUT_",
                searchPlaceholder: "Filtrar resultados...",
                lengthMenu: "Ver _MENU_",
                info: "Mostrando _START_ a _END_ de _TOTAL_",
                paginate: {
                    first: "Primero",
                    last: "Último",
                    next: '<i class="fa fa-angle-right"></i>',
                    previous: '<i class="fa fa-angle-left"></i>'
                }
            }
        });
        
        $('.dataTables_filter input').addClass('form-control shadow-none border-light bg-light').css({ 'width': '250px', 'display': 'inline-block', 'border-radius': '10px' });
    });
</script>
