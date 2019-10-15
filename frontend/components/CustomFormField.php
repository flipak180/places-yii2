<?php
namespace frontend\components;

use yii\widgets\ActiveField;

// todo: Решить нужен ли вообще такой класс

class CustomFormField extends ActiveField {

    //public $options = ['class' => 'form__item'];
    //public $labelOptions = ['class' => 'filter__label'];
    //public $hintOptions = ['class' => 'icon'];
    public $inputOptions = [];
    public $errorOptions = ['class' => 'message', 'tag' => 'span'];

    public function init() {
        switch ($this->template) {
            case 'reg__passport__cell':
                $this->options = ['class' => 'reg__passport__cell'];
                $this->template = '{label}{input}{error}{hint}';
                break;
            case 'checkbox':
                $this->options = ['tag' => false];
                $this->template = '<label class="-checkbox">{input}{label}</label>';
                break;
            case 'clean':
                $this->options = ['tag' => false];
                $this->template = '{input}{error}';
                break;
            default:
                $this->template = '{label}{input}{error}';
                break;
        }
        parent::init();
    }

}
