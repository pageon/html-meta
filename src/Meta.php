<?php

namespace Brendt\Html\Meta;

use Brendt\Html\Meta\Config\DefaultConfigurator;
use Brendt\Html\Meta\Item\CharsetMeta;
use Brendt\Html\Meta\Item\HttpEquivMeta;
use Brendt\Html\Meta\Item\LinkMeta;
use Brendt\Html\Meta\Item\NameMeta;
use Brendt\Html\Meta\Config\MetaConfigurator;

class Meta
{
    /**
     * @var MetaItem[]
     */
    private $meta = [];

    /**
     * @var string[]
     */
    private $socialPrefixes = [];

    /**
     * @var int
     */
    private $truncate;

    /**
     * Meta constructor.
     *
     * @param MetaConfigurator $configurator
     */
    final public function __construct(MetaConfigurator $configurator = null) {
        $configurator = $configurator ?? new DefaultConfigurator();

        $configurator->configure($this);
    }

    /**
     * @param MetaConfigurator $configurator
     *
     * @return Meta
     */
    public static function create(MetaConfigurator $configurator = null) : Meta {
        return new self($configurator);
    }

    /**
     * @return string
     */
    public function render() : string {
        $html = '';

        foreach ($this->meta as $metaItem) {
            $html .= $metaItem->render() . "\n";
        }

        return $html;
    }

    /**
     * @param $charset
     *
     * @return Meta
     */
    public function charset(string $charset) : Meta {
        $item = CharsetMeta::create($charset);
        $this->meta['charset'] = $item;

        return $this;
    }

    /**
     * @param string $name
     * @param string $content
     *
     * @return Meta
     */
    public function name(string $name, string $content) : Meta {
        $item = NameMeta::create($name, $content);
        $this->meta[$name] = $item;

        return $this;
    }

    /**
     * @param string $httpEquiv
     * @param string $content
     *
     * @return Meta
     */
    public function httpEquiv(string $httpEquiv, string $content) : Meta {
        $item = HttpEquivMeta::create($httpEquiv, $content);
        $this->meta[$httpEquiv] = $item;

        return $this;
    }

    /**
     * @param string $rel
     * @param string $href
     *
     * @return Meta
     */
    public function link(string $rel, string $href) : Meta {
        $item = LinkMeta::create($rel, $href);
        $this->meta[$rel] = $item;

        return $this;
    }

    /**
     * @param string $name
     * @param string $content
     *
     * @return Meta
     */
    public function social(string $name, string $content) : Meta {
        foreach ($this->socialPrefixes as $socialPrefix) {
            $this->name("{$socialPrefix}{$name}", $content);
        }

        return $this;
    }

    /**
     * @param string $content
     *
     * @return Meta
     */
    public function title(string $content) : Meta {
        return $this->social('title', $content);
    }

    /**
     * @param string $content
     *
     * @return Meta
     */
    public function description(string $content) : Meta {
        return $this->social('description', $content);
    }

    /**
     * @param string $content
     *
     * @return Meta
     */
    public function image(string $content) : Meta {
        return $this->social('image', $content);
    }

    /**
     * @param string[] $socialPrefixes
     *
     * @return Meta
     */
    public function setSocialPrefixes(array $socialPrefixes) : Meta {
        $this->socialPrefixes = $socialPrefixes;

        return $this;
    }

    /**
     * @param int $truncate
     *
     * @return Meta
     */
    public function setTruncate(?int $truncate) : Meta {
        $this->truncate = $truncate;

        return $this;
    }
}
