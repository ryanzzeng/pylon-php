<?php

namespace App;

class Helper
{
    /**
     * Format array to a new key value array, ['key'] => 'value'
     * @param array $items
     * @param string $key
     * @param string $value
     * @return array
     */
    public static function formatArrayAsKeyValue(array $items, string $key, string $value): array
    {
        $result = [];
        foreach ($items as $item) {
            $result[$item[$key]] = $item[$value];
        }

        return $result;
    }
}