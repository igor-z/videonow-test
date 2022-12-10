<?php

declare(strict_types=1);

namespace App;

require_once __DIR__ . '/../vendor/autoload.php';

final class ArrayUtil implements IArrayUtil
{
    public static function data_decode(array $data): array
    {
        $decoded = [];
        foreach ($data as $encodedKey => $value) {
            $parent = &$decoded;
            foreach (explode('.', $encodedKey) as $keyPart) {
                if (!isset($parent[$keyPart])) {
                    $parent[$keyPart] = [];
                }

                $parent = &$parent[$keyPart];
            }

            $parent = $value;
        }

        unset($parent);

        return $decoded;
    }

    public static function data_encode(array $data): array
    {
        return self::flatten($data);
    }

    private static function flatten(array $data, string $path = null): array
    {
        if ($path !== null) {
            $path .= '.';
        }

        $flatData = [];
        foreach ($data as $key => $value) {
            if (is_array($value)) {
                foreach (self::flatten($value, $path . $key) as $flatKey => $flatValue) {
                    $flatData[$flatKey] = $flatValue;
                }
            } else {
                $flatData[$path . $key] = $value;
            }
        }

        return $flatData;
    }
}