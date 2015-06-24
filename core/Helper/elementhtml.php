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
 * Description of ElementHtml
 *
 * @author fabien.sanchez
 */
class ElementHtml {

	/**
	 * formate une liste d'attributs HTML
	 * @param array $listeAttributs
	 * @return string
	 */
	protected function concatAttributs(array $listeAttributs) {
		$strAttribut = array();
		foreach ($listeAttributs as $key => $value) {
			if (!is_bool($value)) {
				if (strlen($value) > 0) {
					$strAttribut[] = strtolower($key) . '="' . $value . '"';
				}
			} else {
				if ($value) {
					$strAttribut[] = strtolower($key);
				}
			}
		}
		return join(' ', $strAttribut);
	}

	protected function startElement($tag, $attrbs = array()) {
		$attrb = $this->concatAttributs($attrbs);
		return "<$tag $attrb>";
	}

	protected function endElement($tag) {
		return "</$tag>";
	}

	protected function element($tag, $attrbs = array(), $content = '') {
		return $this->startElement($tag, $attrbs)
			. $content
			. $this->endElement($tag);
	}

	protected function elementAutoClose($tag, $attrbs = array()) {
		$attrb = $this->concatAttributs($attrbs);
		return "<$tag $attrb />";
	}

}
