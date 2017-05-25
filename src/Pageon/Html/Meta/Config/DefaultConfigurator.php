<?php

namespace Pageon\Html\Meta\Config;

use Pageon\Html\Meta\Meta;
use Pageon\Html\Meta\Social\GooglePlusMeta;
use Pageon\Html\Meta\Social\OpenGraphMeta;
use Pageon\Html\Meta\Social\TwitterMeta;

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
