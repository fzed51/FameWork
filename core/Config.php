<?php

/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */

namespace Core;

/**
 * Description of Config
 *
 * @author fabien.sanchez
 */
class Config extends Collection {

    public function __construct($filename) {
        if (!file_exists($filename)) {
            throw new \Exception("Le fichier '$filename' n'existe pas");
        }
        $config = parse_ini_file($filename, true);
        parent::__construct($config);
    }

}
