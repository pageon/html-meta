<?php

namespace Brendt\Html\Meta\Config;

use Brendt\Html\Meta\Meta;

class DefaultConfigurator implements MetaConfigurator
{
    /**
     * @var array
     */
    protected $config = [
        'charset'        => 'UTF-8',
        'truncate'       => null,
        'socialPrefixes' => ['', 'og:', 'twitter:'],
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
    public function configure(Meta $meta) : void {
        $meta->charset($this->config['charset'])
            ->setSocialPrefixes($this->config['socialPrefixes'])
            ->setTruncate($this->config['truncate'])
        ;
    }
}
