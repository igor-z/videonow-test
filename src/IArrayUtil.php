<?php

declare(strict_types=1);

namespace App;

interface IArrayUtil
{
    /*
     * Преобразования ключ/значение в многомерный ассоциативный массив
     */
    public static function data_decode(array $data): array;

    /*
     * Кодирование ассоциативного многомерного массива в key/value
     */
    public static function data_encode(array $data): array;
}
