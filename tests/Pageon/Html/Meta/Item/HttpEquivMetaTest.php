<?php

namespace Pageon\Html\Meta\Item;

use PHPUnit\Framework\TestCase;

class HttpEquivMetaTest extends TestCase
{
    /**
     * @test
     */
    public function it_can_be_created() {
        $meta = HttpEquivMeta::create('Expires', '3000');

        $this->assertNotNull($meta);
    }

    /**
     * @test
     */
    public function it_can_be_rendered() {
        $meta = HttpEquivMeta::create('Expires', '3000');
        $tag = $meta->render();

        $this->assertContains('<meta http-equiv="Expires" content="3000">', $tag);
    }
}
