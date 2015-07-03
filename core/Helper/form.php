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
 * Description of form
 *
 * @author fabien.sanchez
 */
class form extends ElementHtml {

    private $data;
    private $error;

    /**
     * Ouvre la balise form
     * @param string $action
     * @param array $attributs
     * @param string $id
     * @return string
     */
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
        if (isset($attributs['data'])) {
            $this->_daraForm = $attributs['data'];
            unset($attributs['data']);
        }
        if (strlen($id) > 0 && !isset($attributs['name'])) {
            $attributs['name'] = $id;
        }
        if (is_array($action)) {
            $action = $this->ctrAction($action);
        }
        $attributs = array_merge($defaultAttrbs, $attributs, array(
            'action' => $action,
            'id' => $id
        ));
        return $this->startElement('form', $attributs);
    }

    /**
     * Ferme la balise form
     * @return string
     */
    public function end() {
        $this->_daraForm = array();
        return $this->endElement('form');
    }

    /**
     * Initialise les données du formulaire
     * @param array $data
     * @return \form
     */
    public function setData(array $data) {
        $this->data = $data;
        return $this;
    }

    /**
     * Initialise les messages d'erreurs du formulaire
     * @param array $error
     * @return \form
     */
    public function setError(array $error) {
        $this->error = $error;
        return $this;
    }

    /**
     * Retourne le message d'erreur d'un champ dans un span
     * @param string $field
     * @return string
     */
    protected function getError(/* string */$field) {
        if (isset($this->error[$field])) {
            return $this->element(
                    'span', array('class' => 'error'), $this->error[$field]
            );
        }
        return '';
    }

    /**
     * Génère un tag label
     * @param string $libelle
     * @param array $attributs
     * @return string
     */
    public function label(/* string */$libelle, array $attributs = array()) {
        $label = $this->element('label', $attributs, $libelle);
        return $label;
    }

    /**
     * Génère un tag input
     * @param string $field
     * @param string $label
     * @param array $attributs
     * @return string
     */
    public function input(/* string */ $field, /* string */ $label = null, array $attributs = array()) {
        $defautAttibuts = array(
            'autocomplete' => '',
            // on
            // off
            'autofocus' => false,
            'disabled' => false,
            'list' => '',
            // id from data_list tag
            'max' => '',
            // max pour type date et number
            'min' => '',
            // min pour type date et number
            'step' => '',
            // min pour type number
            'type' => 'text',
            // button cf : $this->button
            // checkbox
            // color
            // date
            // datetime
            // datetime-local
            // email
            // file cf : $this->file
            // hidden cf : $this->hidden
            // image cf : $this->image
            // month
            // number
            // password
            // radio
            // range
            // reset cf : $this->reset
            // search
            // submit cf : $this->submit
            // tel
            // text
            // time
            // url
            // week
            'value' => '',
            'pattern' => '',
            'placeholder' => '',
            'readonly' => false,
            'required' => false,
            'maxlength' => '',
            'size' => ''
        );
        if (!isset($attributs['value']) && isset($this->data[$field])) {
            $attributs['value'] = $this->data[$field];
        }
        $attributs = array_merge($defautAttibuts, $attributs);
        $input = '';
        if (is_null($label)) {
            if (!isset($attributs['id'])) {
                $attributs['id'] = 'form' . ucfirst($field);
            }
            $input .= $this->label($label, array('for' => $attributs['id']));
        }
        $input .= $this->elementAutoClose('input', $attributs);
        $input .= $this->getError($field);
        return $input;
    }

    public function hidden(/* string */ $field, array $attributs = array()) {

    }

    public function textarea(/* string */ $field, /* string */ $label = null, array $attributs = array()) {

    }

    public function file(/* string */ $field, /* string */ $label = null, array $attributs = array()) {
        $defautAttibuts = array(
            'accept' => '',
            // audio/*
            // video/*
            // image/*
            // MIME_type
            'autofocus' => false,
            'disabled' => false,
            'type' => 'file',
            'multiple' => false,
            'placeholder' => '',
            'readonly' => false,
            'required' => false,
            'size' => ''
        );
        $attributs = array_merge($defautAttibuts, $attributs);
    }

    public function submit(/* string */ $field, /* string */ $label = null, array $attributs = array()) {

    }

    public function reset(/* string */ $field, /* string */ $label = null, array $attributs = array()) {

    }

    public function select(/* string */ $field, /* string */ $label = null, array $attributs = array()) {

    }

}