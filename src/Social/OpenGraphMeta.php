<?php

namespace Brendt\Html\Meta\Social;

use Brendt\Html\Meta\Meta;
use Brendt\Html\Meta\SocialMeta;

final class OpenGraphMeta implements SocialMeta
{
    private $meta;

    public function __construct(Meta $meta, string $type = 'article') {
        $this->meta = $meta;

        $this->meta->property('og:type', $type);
    }

    public function title(string $title) : SocialMeta {
        $this->meta->property('og:title', $title);

        return $this;
    }

    public function description(string $description) : SocialMeta {
        $this->meta->property('og:description', $description);

        return $this;
    }

    public function image(string $image) : SocialMeta {
        $this->meta->property('og:image', $image);

        return $this;
    }
}
