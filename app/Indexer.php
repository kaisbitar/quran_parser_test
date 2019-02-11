<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Indexer extends Model
{
    public function __construct()
    {
        return $this;
    }

    public function indexLettersInString($array)
    {
        $oneWordString = implode("", $array);
        $lettersArray = preg_split('//u', $oneWordString, -1, PREG_SPLIT_NO_EMPTY);
        $returnArray = [];

        foreach ($lettersArray as $index => $char) {
            if (!isset($returnArray[$char])) {
                $returnArray[$char] = [];
            }

            array_push($returnArray[$char], $index + 1);
        }

        return $returnArray;
    }

    public function indexWordsInString($string)
    {
        $string = \str_replace(",", " ", $string);

        $wordsArray = explode(" ", $string);
        $returnArray = [];

        foreach ($wordsArray as $index => $word) {
            if (!isset($returnArray[$word])) {
                $returnArray[$word] = [];
            }

            array_push($returnArray[$word], $index + 1);
        }

        return $returnArray;
    }
}
