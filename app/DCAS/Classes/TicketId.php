<?php

namespace DCAS\Classes;

class TicketId
{
    /**
     * Generate a variable length ticket ID.
     *
     * @param int $length ticket Length
     *
     * @return string ticket ID
     */
    public static function generate($length = 10): string
    {
        return self::compileTicketString(
            $length,
            $chars = self::getChars(),
            $result = srand((float) microtime(true) * 1000000)
        );
    }

    /**
     * Compile the ticket ID.
     *
     * @param $length
     * @param $chars
     * @param $result
     *
     * @return string
     */
    protected static function compileTicketString($length, $chars, $result): string
    {
        for ($rand = 0; $rand < $length; $rand++) {
            $result .= $chars[rand(0, count($chars) - 1)];
        }

        return strtoupper(
            substr($result.uniqid(), 0, $length)
        );
    }

    /**
     * Get input characters.
     *
     * @return array
     */
    private static function getChars(): array
    {
        return array_flatten(
            array_merge(
                range('A', 'Z'),
                range(1, 9)
            )
        );
    }
}
