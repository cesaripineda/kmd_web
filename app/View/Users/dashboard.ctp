<?php
  $this->assign('title', 'Dashboard | KMD');
  echo $this->Html->css(
    array(
      '/vendors/select2/css/select2.min',
      '/vendors/datatables/css/scroller.bootstrap.min',
      '/vendors/datatables/css/colReorder.bootstrap.min',
      '/vendors/datatables/css/dataTables.bootstrap.min',
      'pages/dataTables.bootstrap',
      'pages/tables',
    ),
    array('inline'=>false)
  );
?>
<header class="head flex-center-left">
  <div class="main-bar row">
    <div class="col-sm-12">
        Bienvenido <?= $user['User']['nombre']." ".$user['User']['apellido_paterno']." ".$user['User']['apellido_materno']?>
    </div>
  </div>
</header>
<div class="outer">
  <div class="inner bg-light lter bg-container">
    <div class="row">
      <div class="col-sm-12">
        <div class="card">
          <div class="card-header bg-white">
            <h5>
              Listado de Empresas vencidas y por vencer
            </h5>
          </div>
          <div class="card-block m-t-20">
            <div class="m-t-70">
              <table class="table table-striped table-bordered table-hover table-sm" id="sample_1">
                <thead>
                  <th>Id</th>
                  <th>Razon social</th>
                  <th>Fecha de creación</th>
                  <th>Fecha de vencimiento</th>
                  <th>Responsable renovación</th>
                  <th>Promotor</th>
                  <th>Rabino responsable</th>
                  <th>Status</th>
                </thead>
                <tbody>
                  <?php foreach ($empresas_vencer as $empresa): ?>
                    <tr>
                      <td><?php echo $empresa['Empresa']['id'] ?></td>
                      <td><?php echo $empresa['Empresa']['razon_social'] ?></td>
                      <td><?php echo date('Y-m-d', strtotime($empresa['Empresa']['date_create'])) ?></td>
                      <td><?php echo date('Y-m-d', strtotime($empresa['Empresa']['fecha_vencimiento'])) ?></td>
                      <td><?php echo $empresa['Renovacion']['nombre']." ".$empresa['Renovacion']['apellido_paterno'] ?></td>
                      <td><?php echo $empresa['Promotor']['nombre']." ".$empresa['Promotor']['apellido_paterno']  ?></td>
                      <td><?php echo$empresa['Rabino']['nombre']." ".$empresa['Rabino']['apellido_paterno']  ?></td>
                      <?php
                        $estilo="";
                        switch ($empresa['Empresa']['status']):
                            case ("Activo"):
                                $estilo = "activo";
                                break;
                            case ("Vencida"):
                                $estilo = "vencida";
                            break;
                        endswitch;
                      ?>
                      <td class="<?= $estilo?>"><?php echo $empresa['Empresa']['status'] ?></td> 
                    </tr>
                  <?php endforeach ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
    </div>


    <div class="row m-t-20">
      <!-- Tabla eventos proximos -->
      <div class="col-sm-12 col-lg-6 data_tables m-b-20-sm">
        <div class="card m-t-10-sm" style="overflow: hidden; overflow-y: scroll; height: 350px;">
          <div class="card-header bg-white">
            <h5>Mis eventos próximos</h5>
          </div>
          <div class="card-block">
            <div class="table-responsive">
              <div class="">
                <div class="pull-sm-right">
                  <div class="tools pull-sm-right"></div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover table-sm">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Titulo</th>
                    <th>Detalles</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user['Event'] as $evento):?>
                    <tr>
                      <td><?php echo $evento['start']?></td>
                      <td><?php echo $evento['title']?></td>
                      <td><?php echo $evento['details']?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin tabla eventos proximos -->
      <!-- Tabla mis pendientes -->
      <div class="col-sm-12 col-lg-6">
        <div class="card" style="overflow: hidden; overflow-y: scroll; height: 350px;">
          <div class="card-header bg-white">
            <h5>Mis Pendientes</h5>
          </div>
          <div class="card-block card_block_top_align">
            <div class="m-t-35 table-responsive">
              <div class="">
                <div class="pull-sm-right">
                  <div class="tools pull-sm-right"></div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover table-sm">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Empresa</th>
                    <th>Pendiente</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user['Actividad'] as $actividad):?>
                    <tr>
                      <td><?php echo $this->Date->fecha($actividad['fecha_evento'])?></td>
                      <td><?php echo $empresas[$actividad['empresa_id']]?>
                      <td><?php echo $this->Html->link($actividad['descripcion'],array('controller'=>'empresas','action'=>'view',$actividad['empresa_id']))?></td>
                      <?php $status = array(1=>'Pendiente', 2=>'Realizado')?>
                      <td><?php echo $status[$actividad['status']]?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin mis pendientes -->
    </div>

    <div class="row m-t-35">
      <div class="col-sm-12">
        <hr>
      </div>
    </div>
    <!-- Siguientes 2 tablas -->
    <div class="row">
      <!-- Tabla mis pendientes -->
      <div class="col-sm-12 col-lg-6">
        <div class="card m-t-10-sm" style="overflow: hidden; overflow-y: scroll; height: 350px;">
          <div class="card-header bg-white">
            <h5>Mis últimos reportes</h5>
          </div>
          <div class="card-block card_block_top_align">
            <div class="m-t-35 table-responsive">
              <div class="">
                <div class="pull-sm-right">
                  <div class="tools pull-sm-right"></div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Archivo</th>
                    <th>Comentarios</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user['Reporte'] as $reporte):?>
                    <tr>
                      <td><?php echo $this->Date->fecha($reporte['fecha'])?></td>
                      <td><?php echo $this->Html->link('<i class="fa fa-download fa-lg"></i>',$reporte['reporte'],array('escape'=>false))?></td>
                      <td><?php echo $reporte['comentarios']?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin mis pendientes -->
      <!-- Tabla mis últimos certificados -->
      <div class="col-sm-12 col-lg-6">
        <div class="card m-t-10-sm" style="overflow: hidden; overflow-y: scroll; height: 350px;">
          <div class="card-header bg-white">
            <h5>Mis últimos Certificados</h5>
          </div>
          <div class="card-block card_block_top_align">
            <div class="m-t-35 table-responsive">
              <div class="">
                <div class="pull-sm-right">
                  <div class="tools pull-sm-right"></div>
                </div>
              </div>
              <table class="table table-striped table-bordered table-hover">
                <thead>
                  <tr>
                    <th>Fecha</th>
                    <th>Vigencia</th>
                    <th>Empresa</th>
                    <th>Ver PDF</th>
                  </tr>
                </thead>
                <tbody>
                  <?php foreach ($user['Certificado'] as $certificado):?>
                    <tr>
                      <td><?php echo $this->Date->fecha($certificado['fecha'])?></td>
                      <td><?php echo $this->Date->fecha($certificado['vigencia'])?></td>
                      <td><?php echo $empresas[$certificado['empresa_id']]?></td>
                      <td><?php echo $this->Html->link('Ingl&eacute;s',array('controller'=>'Certificados','action'=>'viewen',$certificado['id'].".pdf"),array('escape'=>false))?> | <?php echo $this->Html->link('Espa&ntilde;ol',array('controller'=>'Certificados','action'=>'viewes',$certificado['id'].".pdf"),array('escape'=>false))?></td>
                    </tr>
                  <?php endforeach;?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>
      <!-- Fin mis pendientes -->
    </div>
  </div>
</div>
<?=
$this->Html->script(
  array(
    '/vendors/select2/js/select2',
    '/vendors/datatables/js/jquery.dataTables.min',
    '/vendors/datatables/js/dataTables.colReorder.min',
    '/vendors/datatables/js/dataTables.bootstrap.min',
    '/vendors/datatables/js/dataTables.buttons.min',
    '/vendors/datatables/js/dataTables.responsive.min',
    '/vendors/datatables/js/dataTables.rowReorder.min',
    '/vendors/datatables/js/buttons.colVis.min',
    '/vendors/datatables/js/buttons.html5.min',
    '/vendors/datatables/js/buttons.bootstrap.min',
    '/vendors/datatables/js/buttons.print.min',
    '/vendors/datatables/js/dataTables.scroller.min',
    'pluginjs/dataTables.tableTools',
    // 'pages/datatable',
  ),
  array('inline'=>false)
);
$this->Html->scriptStart(array('inline' => false)); ?>
"use strict";
$(document).ready(function() {
  TableAdvanced.init();
    $(".dataTables_scrollHeadInner .table").addClass("table-responsive");
    $(".dataTables_wrapper .dt-buttons .btn").addClass('btn-secondary').removeClass('btn-default');
});
var TableAdvanced = function() {
    // ===============table 1====================
    var initTable1 = function() {
        var table = $('#sample_1');
        table.DataTable({
            order: [[3, 'desc']],
            dom: 'Bflr<"table-responsive"t>ip',
            buttons: [
                'copy', 'csv', 'print'
            ],
            lengthMenu: [
                [15, 20, 50, 100, -1],
                [15, 20, 50, 100, "All"] // change per page values here
            ],
        });
        var tableWrapper = $('#sample_1_wrapper'); // datatable creates the table wrapper by adding with id {your_table_id}_wrapper
        tableWrapper.find('.dataTables_length select').select2(); // initialize select2 dropdown
    }
    // ===============table 1===============

    return {
        //main function to initiate the module
        init: function() {
            if (!jQuery().dataTable) {
                return;
            }
            initTable1();
        }
    };
}();

<?php $this->Html->scriptEnd(); ?>
