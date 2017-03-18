<?php

namespace Brendt\Html\Meta;

interface MetaItem
{
    /**
     * @return string
     */
    public function render() : string;
}
