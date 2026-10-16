<?php

declare(strict_types=1);

function toRoman($number)
{
    $mapping = [
        1000 => 'M',
        900 => 'CM',
        500 => 'D',
        400 => 'CD',
        100 => 'C',
        90 => 'XC',
        50 => 'L',
        40 => 'XL',
        10 => 'X',
        9 => 'IX',
        5 => 'V',
        4 => 'IV',
        1 => 'I'
    ];

    $return = '';

    foreach ($mapping as $decimal => $roman) {
        $quantity = (int) ($number / $decimal);
        $return .= str_repeat($roman, $quantity);
        $number -= $decimal * $quantity;
    }

    return $return;
}

$__in = json_decode('[1, 2, 4, 6, 9, 27, 49, 59, 93, 163, 166, 575, 911, 1024, 3000, 3888]', true);
$__out = [];
foreach ($__in as $x) {
  try { $__out[] = ["ok" => true, "v" => toRoman($x)]; }
  catch (\Throwable $e) { $__out[] = ["ok" => false, "e" => get_class($e)]; }
}
echo json_encode(["out" => $__out]);
