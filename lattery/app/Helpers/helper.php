<?php 

use Illuminate\Support\Str;

if(!function_exists('trx_code')){
    function trx_code($model, $length=12, $column = 'trx_code'){
        $modelClass = "App\\Models\\{$model}";
        do {
            $code = randomCode($length);
        } while ($modelClass::where($column, $code)->exists());

        return $code;
    }
}

function randomCode($length = 8){
    $characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZ0123456789' . now()->format('YmdHis');
    $code = '';

    for ($i = 0; $i < $length; $i++) {
        $code .= $characters[random_int(0, strlen($characters) - 1)];
    }

    return $code;
}