<?php

namespace App;

use Product\Product;

class App
{
    public static function console_log($output)
    {
        $js_code = json_encode($output, JSON_HEX_TAG);
        echo $js_code;
    }

    public static function readFromFileOutputToCli()
    {
        $dataFile = fopen("data.txt", "r") or die("Unable to open file!");
        $dataArray = [];
        $totalSum = 0;
        while (!feof($dataFile)) {
            $str = fgets($dataFile);
            list($identifier, $name, $quantity, $price, $currency) = explode(';', $str);
            $product = new Product($identifier, $name, (int) $quantity, (float)$price, $currency);
            if ($product->quantity !== -1) {
                $dataArray[] = [$product->name, $product->price];
                $totalSum += ($product->price * $product->quantity);
            }
        }
        $dataArray['totalSumEur'] = round($totalSum, 2);
        fclose($dataFile);
        App::console_log($dataArray);
        return $dataArray;
    }
}
