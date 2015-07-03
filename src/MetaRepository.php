<?php

namespace Metrique\Meta;

use Metrique\Meta\Contracts\MetaRepositoryInterface;
use Metrique\Meta\MetaTags;
use Metrique\Meta\MetaTitle;

class MetaRepository implements MetaRepositoryInterface
{
    private $tags;
    private $title;

    public function __construct(\Illuminate\Contracts\Config\Repository $config)
    {   
        $this->tags = new MetaTags($config);
        $this->title = new MetaTitle($config);
    }

    public function tags()
    {
        return $this->tags;
    }

    public function title()
    {
        return $this->title;
    }
}