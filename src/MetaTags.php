<?php

namespace Metrique\Meta;

use Illuminate\Contracts\Config\Repository as Config;
use Metrique\Meta\Contracts\MetaTagsInterface;

class MetaTags implements MetaTagsInterface
{
    /**
     * Array to hold list of tags.
     * @var [type]
     */
    public $tags = [];

    /**
     * Meta tag template.
     * @var string
     */
    public $template = '<meta%s>';

    public function __construct(Config $config)
    {
        // Populate the defaults
        $this->tags = array_merge($this->tags, $config->get('meta.tags'));
    }

    /**
     * {@inheritdoc}
     */
    public function toArray()
    {
        $tags = [];

        foreach ($this->tags as $tag)
        {
            $attributes = '';

            foreach($tag as $attribute => $value)
            {
                $attributes .= ' ' . $attribute . '="' . $value . '"';
            }

            array_push($tags, sprintf($this->template, $attributes));
        }

        return array_unique($tags);
    }

    /**
     * {@inheritdoc}
     */
    public function add($attributes)
    {
        if($this->isList($attributes) === true)
        {
            foreach($attributes as $key => $value)
            {
                $this->add($value);
            }

            return $this;
        }

        array_push($this->tags, $attributes);

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function remove($attributes)
    {   
        if($this->isList($attributes) === true)
        {
            foreach ($attributes as $key => $value)
            {
                $this->remove($value);
            }

            return $this;
        }

        // Isn't a list.
        foreach ($this->tags as $tagKey => $tagValues)
        {
            // Reset match count...
            $matchCount = 0;

            foreach ($tagValues as $key => $value)
            {
                foreach($attributes as $matchKey => $matchValue)
                {
                    if($matchKey === $key && is_null($matchValue))
                    {
                        $matchCount++;
                        break;
                    }

                    if($matchKey === $key && $matchValue === $value)
                    {
                        $matchCount++;
                        break;
                    }
                }
            }

            // Remove the attributes entry.
            if($matchCount === count($tagValues) && $matchCount == count($attributes))
            {
                unset($this->tags[$tagKey]);
            }
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function clear()
    {
        $this->tags = [];

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    public function template($template)
    {
        if(is_string($template))
        {
            $this->template = $template;
        }

        return $this;
    }

    /**
     * {@inheritdoc}
     */
    protected function isList($array)
    {
        $isList = false;

        array_walk($array, function($value, $key) use(&$isList)
        {
            if(is_array($value) && $isList === false)
            {
                $isList = true;
            }
        });

        return $isList;
    }
}