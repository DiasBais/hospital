<?php

namespace App\Libs;

class StringChange {
    public function stringFromTo($str, $from, $to) {
        $new_str = '';
        if ($to > $from) for ($i = $from; $i <= $to; $i++) $new_str += $str[$i];
        else for ($i = $to; $i >= $from; $i--) $new_str += $str[$i];
        return $new_str;
    }
}

?>
