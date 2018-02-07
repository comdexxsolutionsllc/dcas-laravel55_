<?php

namespace DCAS\Helpers;

class Arr
{
    /**
     * Case in-sensitive array_search() with partial matches.
     *
     * @param string $needle   the string to search for
     * @param array  $haystack the array to search in
     *
     * @author Bran van der Meer <branmovic@gmail.com>
     *
     * @since  29-01-2010
     * @return bool
     */
    public static function find($needle, array $haystack): bool
    {
        foreach ($haystack as $value) {
            if (false !== stripos($value, $needle)) {
                return true;
            }
        }

        return false;
    }
}
