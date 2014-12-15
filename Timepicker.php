<?php

/**
 * Wrapper for bootstrap-timepicker, http://jdewit.github.com/bootstrap-timepicker
 */
class Timepicker extends CInputWidget
{
    /**
     * @var array
     */
    public $options = array();

    /**
     * http://www.yiiframework.com/doc/api/1.1/CClientScript#registerScriptFile-detail
     * @var integer Script position
     */
    public $scriptPosition=null;

    /**
     * @var string Html element selector
     */
    public $selector;

    public static function initClientScript($scriptPosition = null) {
        $ds = DIRECTORY_SEPARATOR;
        $bujs = Yii::app()->assetManager->publish(dirname(__FILE__)."{$ds}..{$ds}..{$ds}jdewit{$ds}bootstrap-timepicker{$ds}js");
        $bucss = Yii::app()->assetManager->publish(dirname(__FILE__)."{$ds}..{$ds}..{$ds}jdewit{$ds}bootstrap-timepicker{$ds}css");
        $cs = Yii::app()->clientScript;
        if ($scriptPosition === null)
            $scriptPosition = $cs->coreScriptPosition;
        $cs->registerScriptFile($bujs.'/bootstrap-timepicker'.(YII_DEBUG ? '' : '.min').'.js', $scriptPosition);
        $cs->registerCssFile($bucss.'/bootstrap-timepicker'.(YII_DEBUG ? '' : '.min').'.css');

    }

    public function run() {
        if ($this->selector === null) {
            list($this->name, $this->id) = $this->resolveNameId();
            $this->selector = '#'.$this->id;
        }

        if (!isset($this->htmlOptions['value'])) {
            if ($this->hasModel()) {
                $this->value = CHtml::resolveValue($this->model, $this->attribute);
            }
        } else {
            $this->value = $this->htmlOptions['value'];
            unset($this->htmlOptions['value']);
        }

        $this->htmlOptions['autocomplete'] = 'off';

        self::initClientScript($this->scriptPosition);
        $options = $this->options !== null ? CJavaScript::encode($this->options) : '';
        Yii::app()->clientScript->registerScript(__CLASS__.'#'.$this->id, "jQuery('{$this->selector}').timepicker({$options})");

        echo '<div class="input-append bootstrap-timepicker">'.
            CHtml::textField($this->name, $this->value, $this->htmlOptions).
            '<span class="add-on"><i class="icon-time"></i></span></div>';
    }
}
