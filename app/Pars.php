<?php
namespace app;

class Pars
{
    /**
     * Адрес для парсера
     * @var string
     */
    public $url;

    /**
     * Элемент массива для очистки кода от HTML и извлечения колличества мест
     * @var array
     */
    public  $data;

    /**
     * Парсит адрес.
     * @param $url
     * @return mixed
     */
    public function parsUrl($url)
    {
        if($url === null){
            echo 'Нет данных.';
        }
        $doc = file_get_contents($url);
        $obj = json_decode($doc);
        return $obj;
    }

    /**
     * Чистит тект от тегов и дастает места
     * @param $data
     * @return array
     */
    public static function plainText($data)
    {
        $text = strip_tags($data);
        $arr = preg_split("#[^0-9]+#i", $text);
        return $arr;
    }
}