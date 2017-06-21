<?php

    /**
     * Created by PhpStorm.
     * User: mac
     * Date: 6/20/17
     * Time: 10:35 AM
     */
    if (!function_exists('fmtCurrency')) {
        function fmtCurrency($number = '0', $fmtCurrency = 'THB') {
            $formatter = new NumberFormatter("th-TH", NumberFormatter::CURRENCY);
            if ($formatter instanceof NumberFormatter) {
                return $formatter->formatCurrency($number, $fmtCurrency);
            } else {
                return $number;
            }
        }
    }