<?php

class Form {

    /**
     * store form's elements
     * @var AssociativeArray(FormElement)
     */
    protected $_elements;

    /**
     * store hidden elements
     * @var array
     */
    protected $_hiddens;

    /**
     * store form's attributs
     * @var AssociativeArray
     */
    protected $_attributs;

    /**
     * to display buttons
     * @var boolean true
     */
    protected $_buttons;
    protected $_js;

    /**
     * Constructor
     * @param String $name name of the form
     * @param String $action attribute action of the form
     * @param String $method attribute method of the form
     */
    public function __construct($name = null, $action = 'index.php', $method = "POST") {
        if (is_null($name)) {
            $name = uniqid();
        }
        $this->_elements = array();
        $this->_hiddens = array();
        $this->_buttons = true;
        $this->_js = array();
        $this->_attributs = array(
            'name' => $name,
            'action' => $action,
            'method' => $method
        );
        $this->popup = false;
    }

    public function getName() {
        return $this->_attributs['name'];
    }

    /**
     * method to hide submit and reset buttons
     */
    public function noButtons() {
        $this->_buttons = false;
    }

    /**
     * add an attribute to the form
     * @param String $keyarray
     * @param String $value
     */
    public function addAttribute($key, $value) {
        $this->_attributs[$key] = $value;
    }

    /**
     * add an element to the form
     * @param FormElement $element
     * @return FormElement
     */
    private function addElement(FormElement $element) {
        return $this->_elements[$element->getName()] = $element;
    }

    /**
     * Add an input element to the form
     * @param String $name
     * @param array $attributs
     * @param String $label
     * @return FormElement
     */
    private function addInput($name, $attributs, $label = '', $tooltip = null) {
        $attributs['name'] = $name;

        if (!isset($attributs['class'])) {
            $attributs['class'] = '';
        }
        $attributs['class'].=' mws-textinput';
        return $this->addElement(new FormElement('input', $attributs, $label, $tooltip));
    }

    public function __set($key, $value) {
        return $this->addHidden($key, $value);
    }

    /**
     * Add an hidden element to the Form
     * @param String $key
     * @param String $value
     * @return FormElement
     */
    public function addHidden($key, $value) {
        $hidden = new FormElement(
                'input', array('name' => $key, 'type' => 'hidden', 'value' => $value)
        );
        return $this->_hiddens[$key] = $hidden;
    }

    /**
     * Add a text input to the form
     * @param String $name
     * @param array $attributs
     * @param String $label
     * @return FormElement
     */
    public function addText($name, $attributs = array(), $label = '', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'text';
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addNumeric($name, $attributs = array(), $label = '', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'number';
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addFile($name, $attributs = array(), $label = '', $tooltip = null) {
        $attributs['type'] = 'file';
        $attributs['name'] = $name;
        $this->_attributs['enctype'] = 'multipart/form-data';
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addDate($name, $attributs = array(), $label = 'Date', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'date';
        $attributs['size'] = 10;
        if (!isset($attributs['value']) or $attributs['value'] == '') {
            $attributs['value'] = date('d/m/Y');
        }
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addDateTime($name, $attributs = array(), $label = 'Date', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'datetime';
        $attributs['size'] = 10;
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addTime($name, $attributs = array(), $label = 'Heure', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'text';
        $attributs['size'] = 6;
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addEmail($name, $attributs = array(), $label = 'Heure', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'phone';
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    /**
     * Add a password input to the form
     * @param String $name
     * @param array $attributs
     * @param String $label
     * @return FormElement
     */
    public function addPassword($name, $attributs = array(), $label = '', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'password';
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    public function addButton($name, $content = '', $attributs = array()) {
        $attributs['name'] = $name;
        $attributs['_content'] = $content;
        return $this->addElement(
                        new FormElement('button', $attributs)
        );
    }

    /**
     * Add a textarea to the form
     * @param String $name
     * @param array $attributs
     * @param String $label
     * @return FormElement
     */
    public function addTextarea($name, $attributs = array(), $label = '', $tooltip = null) {
        $attributs['name'] = $name;
        return $this->addElement(
                        new FormElement('textarea', $attributs, $label, $tooltip)
        );
    }

    /**
     * Add a select to the form
     * @param String $name
     * @param array $list
     * @param String $attributs
     * @param String $label
     * @return FormElement
     */
    public function addSelect($name, $list = array(), $attributs = array('value'), $label = '', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['_list'] = $list;
        return $this->addElement(
                        new FormElement('select', $attributs, $label, $tooltip)
        );
    }

    public function addCheckbox($name, $attributs = array(), $label = '', $tooltip = null) {
        $attributs['name'] = $name;
        $attributs['type'] = 'checkbox';
        return $this->addInput($name, $attributs, $label, $tooltip);
    }

    /**
     * Add a submit button
     * @param array $attributs
     * @return FormElement
     */
    public function addSubmit($attributs = array()) {
        $attributs['type'] = 'submit';
        return $this->addInput('_submit', $attributs);
    }

    /**
     * Add a reset button
     * @param array $attributs
     * @return FormElement
     */
    public function addReset($attributs = array()) {
        $attributs['type'] = 'reset';
        return $this->addInput('_reset', $attributs);
    }

    /**
     * getter
     * @param String $name
     * @return FormElement
     */
    public function get($name) {
        if (isset($this->_elements[$name])) {
            return $this->_elements[$name];
        } elseif (isset($this->_hiddens[$name])) {
            return $this->_hiddens[$name];
        } else {
            throw new Exception("Index undefined " . $name, 1);
        }
    }

    /**
     * methods to display form
     * @return String
     */
    public function header() {
        return '<form ' . self::attrToHTML($this->_attributs) . '>';
    }

    /**
     * method to close form tag
     * @return string
     */
    public function footer() {

        return '</form>';
    }

    public function tablepartiel($attributs = array(), $elements = array()) {
        $html = '';
        foreach ($this->_hiddens as $hiddenElement) {
            if (in_array($hiddenElement->getName(), $elements)) {
                $html.=$hiddenElement;
            }
        }
        $html .= '<table' . Form::attrToHTML($attributs) . '><tbody>';
        foreach ($this->_elements as $element) {
            if (in_array($element->getName(), $elements)) {
                $html.=$element->table();
            }
        }

        $html.='</tbody></table>';
        return $html;
    }

    /**
     * generate html to display form with a table
     * @param array $attributs
     * @return string
     */
    public function table($attributs = array()) {
        $html = $this->header();

        foreach ($this->_hiddens as $hiddenElement) {
            $html.=$hiddenElement;
        }
        $html .= '<table' . self::attrToHTML($attributs) . '><tbody>';
        foreach ($this->_elements as $element) {
            $html.=$element->table();
        }
        if ($this->_buttons) {
            $submit = $this->addSubmit();
            $reset = $this->addReset();
            $html.='<tr><td colspan="2" align="center">'
                    . $reset
                    . $submit
                    . '</td></tr>';
        }
        $html.='</tbody></table>';
        $html.=$this->footer();
        return $html;
    }

    /**
     * static method to display attributs
     * @param array $attr
     * @return string
     */
    public static function attrToHTML($attr) {
        $html = '';
        foreach ($attr as $key => $value) {
            if (substr($key, 0, 1) != '_') {
                $html.=' ' . $key . '="' . htmlentities($value) . '"';
                //$html.=' ' . $key . '="' . $value . '"';
            }
        }
        return $html;
    }


}
