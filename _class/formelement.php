<?php
class FormElement {

    /**
     * label
     * @var string
     */
    private $_label;

    /**
     * attributes
     * @var array
     */
    private $_attr;

    /**
     * tag
     * @var string
     */
    private $_tag;

    /**
     * tooltip
     * @var type 
     */
    private $_tooltip;

    /**
     * Constructeur
     * @param string $tag
     * @param array $attributs
     * @param string $label 
     */
    function __construct($tag, $attributs = array(), $label = null, $tooltip = null) {
        $this->_tag = $tag;
        $this->_attr = $attributs;
        $this->_label = $label;
        $this->_tooltip = $tooltip;
    }

    /**
     * return name attribut
     * @return string
     */
    function getName() {
        return $this->_attr['name'];
    }

    /**
     * retourne le label de l'élément
     * @return string
     */
    function getLabel() {
        return $this->_label;
    }

    /**
     * affecte un attribut
     * @param string $attr
     * @param string $value 
     */
    function __set($attr, $value) {
        $this->_attr[$attr] = $value;
    }

    function __isset($attr) {
        return isset($this->_attr[$attr]);
    }

    function addClass($class) {
        if (!isset($this->_attr['class'])) {
            $this->_attr['class'] = '';
        }
        $this->_attr['class'].=' ' . $class;
        return $this;
    }

    /**
     * génère une version string
     * @return string
     */
    public function __toString() {
        $method = 'toString' . ucFirst($this->_tag);
        $html = $this->$method();

        if (!is_null($this->_tooltip)) {
            $html.=Vue::tooltip($this->_tooltip);
        }
        return $html;
    }

    /**
     * génère l'affichage pour champ input
     * @return string
     */
    private function toStringInput() {
        $html = '<input' . Form::attrToHTML($this->_attr) . ' />';
        return $html;
    }

    /**
     * génère l'affichage pour champ textarea
     * @return string
     */
    private function toStringTextarea() {
        if (isset($this->_attr['value'])) {
            $_value = $this->_attr['value'];
            unset($this->_attr['value']);
        } else {
            $_value = '';
        }

        return '<textarea' . Form::attrToHTML($this->_attr) . ' >' . $_value . '</textarea>';
    }

    private function toStringSelect() {
        if (isset($this->_attr['value'])) {
            $_value = $this->_attr['value'];
            unset($this->_attr['value']);
        } else {
            $_value = '';
        }

        $list = $this->_attr['_list'];
        unset($this->_attr['list']);

        $html = '<select ' . Form::attrToHTML($this->_attr) . '>';
        foreach ($list as $val => $label) {
            if ($val == $_value) {
                $html.='<option value="' . $label . '" selected>' . $label . '</option>';
            } else {
                $html.='<option value="' . $label . '">' . $label . '</option>';
            }
        }
        $html.='</select>';
        return $html;
    }

    private function toStringCheckbox() {

        if (isset($this->_attr['value'])) {
            $_value = $this->_attr['value'];
            unset($this->_attr['value']);
        } else {
            $_value = '';
        }

        $list = $this->_attr['_list'];
        unset($this->_attr['list']);
        $html = '';
        foreach ($list as $val => $label) {
            if (!isset($this->_attr['id'])) {
                $this->_attr['id'] = uniqid();
            }
            if ($val == $_value) {
                $this->_attr['checked'] = 'checked';
            } else {
                unset($this->_attr['selected']);
            }
            $html.='<input  type="checkbox" ' . Form::attrToHTML($this->_attr) . '  value="' . $val . '">';
            $html.='<label for="' . $this->_attr['id'] . '">' . $label . '</label><br />';
        }
        return $html;
    }

    private function toStringButton() {
        $content = $this->_attr['_content'];
        unset($this->_attr['_content']);
        $html = '<button ' . Form::attrToHTML($this->_attr) . '>' . $content . '</button>';
        return $html;
    }

    /**
     * génère le label pour l'affichage
     * @return string 
     */
    function labelToString() {
        if ($this->_label != '') {
            return $this->_label . '&nbsp;:&nbsp;';
        } else {
            return $this->_label;
        }
    }

    /**
     * génère l'affichage en mode table
     * @return string 
     */
    function table() {
        $html = '<tr><td>'
                . $this->labelToString()
                . '</td><td>'
                . $this->__toString()
                . '</td></tr>';
        return $html;
    }

}
