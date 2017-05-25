<?php

namespace Pageon\Html\Meta\Config;

use Pageon\Html\Meta\Meta;

interface MetaConfigurator
{
    /**
     * @param array $config
     */
    public function __construct(array $config = []);

    /**
     * @param Meta $meta
     *
     * @return void
     */
    public function configure(Meta $meta);
}
