<?php

namespace Pageon\Html\Meta;

use Pageon\Html\Meta\Config\DefaultConfigurator;
use Pageon\Html\Meta\Item\CharsetMeta;
use Pageon\Html\Meta\Item\HttpEquivMeta;
use Pageon\Html\Meta\Item\ItemPropMeta;
use Pageon\Html\Meta\Item\LinkMeta;
use Pageon\Html\Meta\Item\NameMeta;
use Pageon\Html\Meta\Config\MetaConfigurator;
use Pageon\Html\Meta\Item\PropertyMeta;

class Meta
{
    /**
     * @var MetaItem[]
     */
    private $meta = [];

    /**
     * @var SocialMeta[]
     */
    private $socialMeta = [];

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

        /**
         * @var string     $type
         * @var MetaItem[] $metaItems
         */
        foreach ($this->meta as $type => $metaItems) {
            foreach ($metaItems as $metaItem) {
                $html .= $metaItem->render() . "\n";
            }
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
        $this->meta['charset'][] = $item;

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
        $this->meta['name'][$name] = $item;

        return $this;
    }

    /**
     * @param string $name
     * @param string $content
     *
     * @return Meta
     */
    public function itemprop(string $name, string $content) : Meta {
        $item = ItemPropMeta::create($name, $content);
        $this->meta['itemprop'][$name] = $item;

        return $this;
    }

    /**
     * @param string $property
     * @param string $content
     *
     * @return Meta
     */
    public function property(string $property, string $content) : Meta {
        $item = PropertyMeta::create($property, $content);
        $this->meta['property'][$property] = $item;

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
        $this->meta['httpEquiv'][$httpEquiv] = $item;

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
        $this->meta['link'][$rel] = $item;

        return $this;
    }

    /**
     * @param string $content
     *
     * @return Meta
     */
    public function title(string $content) : Meta {
        $this->name('title', $content);

        foreach ($this->socialMeta as $socialMeta) {
            $socialMeta->title($content);
        }

        return $this;
    }

    /**
     * @param string $content
     *
     * @return Meta
     */
    public function description(string $content) : Meta {
        $this->name('description', $content);

        foreach ($this->socialMeta as $socialMeta) {
            $socialMeta->description($content);
        }

        return $this;
    }

    /**
     * @param string $content
     *
     * @return Meta
     */
    public function image(string $content) : Meta {
        $this->name('image', $content);

        foreach ($this->socialMeta as $socialMeta) {
            $socialMeta->image($content);
        }

        return $this;
    }

    /**
     * @param int $truncate
     *
     * @return Meta
     */
    public function setTruncate(int $truncate = null) : Meta {
        $this->truncate = $truncate;

        return $this;
    }

    /**
     * @param SocialMeta[] $socialMeta
     *
     * @return Meta
     */
    public function setSocialMeta(array $socialMeta) : Meta {
        $this->socialMeta = $socialMeta;

        return $this;
    }
}
