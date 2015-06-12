<?php

$config_alias = include_if_exist('./app/alias.php');


foreach ($config_alias as $alias => $classe) {
    class_alias($classe, $alias);
}