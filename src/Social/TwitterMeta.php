<?php

namespace Brendt\Html\Meta\Social;

use Brendt\Html\Meta\Meta;
use Brendt\Html\Meta\SocialMeta;

final class TwitterMeta implements SocialMeta
{
    private $meta;

    public function __construct(Meta $meta, string $type = 'article') {
        $this->meta = $meta;

        $this->meta->name('twitter:card', $type);
    }

    public function title(string $title) : SocialMeta {
        $this->meta->name('twitter:title', $title);

        return $this;
    }

    public function description(string $description) : SocialMeta {
        $this->meta->name('twitter:description', substr($description, 0, 199));

        return $this;
    }

    public function image(string $image) : SocialMeta {
        $this->meta->name('twitter:image', $image);

        return $this;
    }
}
