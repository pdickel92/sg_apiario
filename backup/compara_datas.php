<?php
$dt1 = '2022-05-02';
$dt2 = '2013-05-22';

if (strtotime($dt1) > strtotime($dt2)) {
    echo 'A data 1 é maior que a data 2.';}
else if (strtotime($dt1) == strtotime($dt)) {
    echo 'A data 1 é igual a data 2.';}
else {
    echo 'A data 1 é menor a data 2.';
}
?>

