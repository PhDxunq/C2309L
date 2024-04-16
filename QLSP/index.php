<?php
require_once "./model/model.php";

$listStudent = [];

$model = new Model();

$listStudent = $model->all('offices');