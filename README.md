yii-bootstrap-timepicker
========================

Yii wrapper for jdewit/bootstrap-timepicker

usage:

Импортируем виджет:

```php
Yii::import('application.vendor.bscheshir.yii-bootstrap-timepicker.Timepicker', true);
```

Вызываем виджет:

```php

<div class="input-append bootstrap-timepicker">
<?php
$this->widget('Timepicker', [
    'model' => $model,
    'attribute' => 'TimeActual',
    // Немного опций, см. http://jdewit.github.io/bootstrap-timepicker/
    'options' => [
        'showMeridian'=>false,
        'minuteStep'=>5,
        'showInputs'=>false,
        'disableFocus'=>true,
    ],
]);
?>
    <span class="add-on"><i class="icon-time"></i></span>
</div>
```

