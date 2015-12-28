<?php

namespace App\Lartests\Transformers;

abstract class Transformer {

    /**
     * Transform a collection of posts
     *
     * @param array $items
     * @return array
     */
    public function transformCollection(array $items)
    {
        return array_map([$this, 'transform'], $items);
    }

    public abstract function transform($item);
}