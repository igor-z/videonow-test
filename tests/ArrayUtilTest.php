<?php

namespace Tests;

use App\ArrayUtil;
use PHPUnit\Framework\TestCase;

class ArrayUtilTest extends TestCase
{
    private const FLAT_DATA = [
        'parent.child.field' => 1,
        'parent.child.field2' => 2,
        'parent2.child.name' => 'test',
        'parent2.child2.name' => 'test',
        'parent2.child2.position' => 10,
        'parent3.child3.position' => 10,
    ];

    private const HIERARCHICAL_DATA = [
        'parent' => [
            'child' => [
                'field' => 1,
                'field2' => 2,
            ],
        ],
        'parent2' => [
            'child' => [
                'name' => 'test',
            ],
            'child2' => [
                'name' => 'test',
                'position' => 10,
            ],
        ],
        'parent3' => [
            'child3' => [
                'position' => 10,
            ],
        ],
    ];

    public function testDataDecode(): void
    {
        $this->assertEquals(self::HIERARCHICAL_DATA, ArrayUtil::data_decode(self::FLAT_DATA));
    }

    public function testDataEncode(): void
    {
        $this->assertEquals(self::FLAT_DATA, ArrayUtil::data_encode(self::HIERARCHICAL_DATA));
    }
}

