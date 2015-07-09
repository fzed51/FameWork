<?php

/*
 * The MIT License
 *
 * Copyright 2015 fzed51.
 *
 * Permission is hereby granted, free of charge, to any person obtaining a copy
 * of this software and associated documentation files (the "Software"), to deal
 * in the Software without restriction, including without limitation the rights
 * to use, copy, modify, merge, publish, distribute, sublicense, and/or sell
 * copies of the Software, and to permit persons to whom the Software is
 * furnished to do so, subject to the following conditions:
 *
 * The above copyright notice and this permission notice shall be included in
 * all copies or substantial portions of the Software.
 *
 * THE SOFTWARE IS PROVIDED "AS IS", WITHOUT WARRANTY OF ANY KIND, EXPRESS OR
 * IMPLIED, INCLUDING BUT NOT LIMITED TO THE WARRANTIES OF MERCHANTABILITY,
 * FITNESS FOR A PARTICULAR PURPOSE AND NONINFRINGEMENT. IN NO EVENT SHALL THE
 * AUTHORS OR COPYRIGHT HOLDERS BE LIABLE FOR ANY CLAIM, DAMAGES OR OTHER
 * LIABILITY, WHETHER IN AN ACTION OF CONTRACT, TORT OR OTHERWISE, ARISING FROM,
 * OUT OF OR IN CONNECTION WITH THE SOFTWARE OR THE USE OR OTHER DEALINGS IN
 * THE SOFTWARE.
 */

namespace Core\Helper;

/**
 * Description of FormBootstrap
 *
 * @author fzed51
 */
class FormBootstrap {

    private $error;
    private $nom;
    private $data;
    private $html;

    public function __construct($nom = 'data', $data = array(), $error = array()) {
        $this->nom = $nom;
        $this->data = $data;
        $this->error = $error;
        $this->html = new Html();
    }

    public function start($action, array $attributs = array(), /* string */ $id = '') {
        $defaultAttrbs = array(
            'accept-charset' => '',
            // ISO-8859-1
            // ISO-8859-15
            // UTF-8
            'autocomplete' => '', // on | off
            'enctype' => '',
            // application/x-www-form-urlencoded
            // multipart/form-data
            // text/plain
            'method' => 'POST', // GET | POST
            'name' => '',
            'novalidate' => false,
            'target' => ''
            // _blank
            // _self
            // _parent
            // _top
        );

        if (strlen($this->nom) > 0 && !isset($attributs['name'])) {
            $attributs['name'] = $this->nom;
        } elseif (strlen($id) > 0 && !isset($attributs['name'])) {
            $attributs['name'] = $id;
        }

        $attributs = array_merge($defaultAttrbs, $attributs, array(
            'action' => $action
        ));

        if (strlen($id) > 0) {
            $attributs = array_merge($attributs, array(
                'id' => $id
            ));
        }

        return $this->html->formStart($attributs);
    }

    public function end() {
        return $this->html->formEnd();
    }

    private function getData($field) {
        if (isset($this->data->$field)) {
            return $this->data->$field;
        } else {
            return null;
        }
    }

    /**
     *
     * @param string $field
     * @param string $label
     * @return string
     */
    public function input(/* string */ $field, /* string */ $label = null) {
        $labelHtml = '';
        if (!is_null($label)) {
            $labelHtml = $this->html->label(['for' => "{$this->nom}_{$field}"], $label);
        }
        return $this->html->div(
                ['class' => 'form-group']
                , ($labelHtml . $this->html->input([
                    'id' => "{$this->nom}_{$field}",
                    'class' => 'form-control',
                    'name' => "{$this->nom}[{$field}]",
                    'value' => $this->getData($field)
                ]))
        );
    }

    public function textarea(/* string */ $field, /* string */ $label = null, /* int */ $row = 4) {
        $labelHtml = '';
        if (!is_null($label)) {
            $labelHtml = $this->html->label(['for' => "{$this->nom}_{$field}"], $label);
        }
        return $this->html->div(
                ['class' => 'form-group']
                , ($labelHtml . $this->html->textarea([
                    'id' => "{$this->nom}_{$field}",
                    'class' => 'form-control',
                    'name' => "{$this->nom}[{$field}]",
                    'rows' => $row
                    ], $this->getData($field)))
        );
    }

}
