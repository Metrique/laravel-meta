<?php

namespace Metrique\Meta;

use Metrique\Meta\Contracts\MetaTitleInterface;

class MetaTitle implements MetaTitleInterface
{
    /**
     * Title tag data populated with defaults.
     * @var array
     */
    public $title = [
        'decorate' => true,
        'default' => '',
        'prefix' => '',
        'suffix' => '',
        'seperator' => '',
        'value' => '',
    ];

    public function __construct(\Illuminate\Contracts\Config\Repository $config)
    {
        // Populate the defaults
        $this->title = array_merge($this->title, $config->get('meta.title'));
    }

    /**
     * {@inheritdoc}
     */
    public function toString()
    {
        if(empty($this->title['value']))
        {
            $this->title['value'] = $this->title['default'];
        }

        $title = $this->title['value'];

        // Prefix
        $prefix = '';

        if(!empty($title) && !empty($this->title['prefix']))
        {
            $prefix = $this->title['prefix'] . $this->title['seperator'];
        }

        // Suffix
        $suffix = '';

        if(!empty($title) && !empty($this->title['suffix']))
        {
            $suffix = $this->title['seperator'] . $this->title['suffix'];
        }

        if($this->title['decorate'])
        {
            return $prefix . $title . $suffix;
        }
        
        return $title;
    }

    /**
     * {@inheritdoc}
     */
    public function set($title)
    {
        // Title
        if(is_string($title)) {
            $this->title['value'] = $title;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function decorate($bool)
    {
        $this->title['decorate'] = $bool;

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function prefix($prefix)
    {
        if(is_string($prefix))
        {
            $this->title['prefix'] = $prefix;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function suffix($suffix)
    {
        if(is_string($suffix))
        {
            $this->title['suffix'] = $suffix;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function seperator($seperator)
    {
        if(is_string($seperator))
        {
            $this->title['seperator'] = $seperator;
        }

        return $this;
    }
}