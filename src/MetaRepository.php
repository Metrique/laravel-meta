<?php

namespace Metrique\Meta;

use Metrique\Meta\Contracts\MetaRepositoryInterface;

class MetaRepository implements MetaRepositoryInterface
{
    private $slug;
    private $tags;
    private $title;

    public function __construct(\Illuminate\Contracts\Config\Repository $config)
    {
        $this->slug = new MetaSlug($config);
        $this->tags = new MetaTags($config);
        $this->title = new MetaTitle($config);
    }

    /**
     * {@inheritdoc}
     */
    public function tags()
    {
        return $this->tags;
    }

    /**
     * {@inheritdoc}
     */
    public function title()
    {
        return $this->title;
    }

    /**
     * {@inheritdoc}
     */
    public function slug()
    {
        return $this->slug;
    }

    /**
     * {@inheritdoc}
     */
    public function setTitleAsSlug()
    {
        $slug = (string) $this->title()->toSlug();

        return $this->slug()->set($slug)->toString();
    }
}
