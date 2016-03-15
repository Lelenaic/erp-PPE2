<?php

class FormBootstrap extends Form {

    public function table($attributs = array()) {
        $table = '<form role="form" action="." method="POST">';
        foreach ($this->_hiddens as $hiddenElement) {
            $table.=$hiddenElement;
        }
        foreach ($this->_elements as $element) {
            $element->addClass('form-control');
            $table.='<div class="form-group">
                        <label>' . $element->getLabel() . '</label>
                        ' . $element . '
                    </div>';
        }

        if ($this->_buttons) {
            $table.='<button type="submit" class="btn btn-info">' . _('Valider') . '</button>';
        }
        $table.='</form>';
        return $table;
    }

    public function inline($attributs = array()) {
        $table = '<form class="form-inline">';
        foreach ($this->_hiddens as $hiddenElement) {
            $table.=$hiddenElement;
        }
        foreach ($this->_elements as $element) {
            $element->addClass('form-control');
            $table.='<div class="form-group">
                        <label>' . $element->getLabel() . '</label>
                        ' . $element . '
                    </div>';
        }
        if ($this->_buttons) {
            $table.='<button type="submit" class="btn btn-default">' . _('Valider') . '</button>';
        }
        $table.='</form>';
        return $table;
    }

}
