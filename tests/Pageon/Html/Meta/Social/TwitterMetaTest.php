<?php

namespace Pageon\Html\Meta\Social;

use Pageon\Html\Meta\Meta;
use Pageon\Html\Meta\SocialMeta;
use PHPUnit\Framework\TestCase;

class TwitterMetaTest extends TestCase
{

    /**
     * @var Meta
     */
    private $meta;

    protected function setUp() {
        $this->meta = new Meta();
    }

    private function getSocialMeta() : SocialMeta {
        return new TwitterMeta($this->meta);
    }

    /**
     * @test
     */
    public function it_can_render_the_title() {
        $social = $this->getSocialMeta();

        $social->title('hello');

        $this->assertContains('<meta name="twitter:title" content="hello">', $this->meta->render());
        $this->assertContains('<meta name="twitter:card" content="article">', $this->meta->render());
    }

    /**
     * @test
     */
    public function it_can_render_the_description() {
        $social = $this->getSocialMeta();

        $social->description('hello');

        $this->assertContains('<meta name="twitter:description" content="hello">', $this->meta->render());
    }

    /**
     * @test
     */
    public function it_can_render_the_image() {
        $social = $this->getSocialMeta();

        $social->image('hello');

        $this->assertContains('<meta name="twitter:image" content="hello">', $this->meta->render());
    }
}
