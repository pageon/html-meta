<?php

namespace Brendt\Html\Meta;

use PHPUnit\Framework\TestCase;

class MetaTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_constructed() {
        $meta = Meta::create();

        $this->assertNotNull($meta);
    }
}
