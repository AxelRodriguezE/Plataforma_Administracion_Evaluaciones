<?php
//    echo $saluda;
    
    foreach ($query as $query):
        echo $query->id_academico;
        echo $query->nombre_academico;
        echo $query->rut_academico;
    endforeach;
    
?>