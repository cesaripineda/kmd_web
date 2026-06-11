<?php
include 'lib/Cake/bootstrap.php';
App::uses('AppModel', 'Model');
class TempModel extends AppModel { public $useTable = 'empresas'; }
$model = new TempModel();
print_r($model->schema());
?>
