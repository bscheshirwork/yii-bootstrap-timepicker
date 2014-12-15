yii-bootstrap-timepicker
========================

Yii wrapper for jdewit/bootstrap-timepicker

usage:

First, import the widget class file / Импортируем виджет:

```php
Yii::import('application.vendor.bscheshir.yii-bootstrap-timepicker.Timepicker', true);
```

Next, call the widget / Вызываем виджет:

```php
$this->widget('Timepicker', [
    'model' => $model,
    'attribute' => 'TimeActual',
    // some options, see more at / Немного опций, см. http://jdewit.github.io/bootstrap-timepicker/
    'options' => [
        'showMeridian'=>false,
        'minuteStep'=>5,
        'showInputs'=>false,
        'disableFocus'=>true,
    ],
]);
```

