<?php 

require("controller\CasaDAL.php");

$id = $_REQUEST['remove'];

$casaDAL = new CasaDAL();
$casaDAL->deletar($id);

header("Location: index.php?remove=success");