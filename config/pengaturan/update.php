<?php
$data[] = $_POST;
$data[] = $_FILES;
echo json_encode($data);
die();
