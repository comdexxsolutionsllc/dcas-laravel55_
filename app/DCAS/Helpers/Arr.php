<?php

namespace DCAS\Helpers;

class Arr
{
    /**
     * Case in-sensitive array_search() with partial matches.
     *
     * @param string $needle the string to search for
     * @param array $haystack the array to search in
     *
     * @author Bran van der Meer <branmovic@gmail.com>
     *
     * @since 29-01-2010
     */
    public static function find($needle, array $haystack)
    {
        foreach ($haystack as $key => $value) {
            if (false !== stripos($value, $needle)) {
                // return $key;
                return true;
            }
        }

        return false;
    }

}