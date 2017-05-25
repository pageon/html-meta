<?php

namespace Brendt\Html\Meta\Config;

use Brendt\Html\Meta\Meta;
use Brendt\Html\Meta\Social\GooglePlusMeta;
use Brendt\Html\Meta\Social\OpenGraphMeta;
use Brendt\Html\Meta\Social\TwitterMeta;

class DefaultConfigurator implements MetaConfigurator
{
    /**
     * @var array
     */
    protected $config = [
        'charset'  => 'UTF-8',
        'truncate' => null,
    ];

    /**
     * @param array $config
     */
    public function __construct(array $config = []) {
        $this->config = array_merge($this->config, $config);
    }

    /**
     * @param Meta $meta
     *
     * @return void
     */
    public function configure(Meta $meta) {
        $meta->charset($this->config['charset'])
            ->setTruncate($this->config['truncate'])
            ->setSocialMeta([
                new GooglePlusMeta($meta),
                new TwitterMeta($meta),
                new OpenGraphMeta($meta),
            ]);;
    }
}
