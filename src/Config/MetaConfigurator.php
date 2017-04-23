<?php

namespace Brendt\Html\Meta\Config;

use Brendt\Html\Meta\Meta;

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
