<?php

namespace App\Lartests\Transformers;

class PostTransformer extends Transformer {

    /**
     * If at some point in the future we decide to change some parameter entirely
     * it's not going to matter when it comes to our API
     *
     * @param $post
     * @return array
     */
    public function transform($post)
    {
        return [
            'title' => $post['title'],
            'description' => $post['description'],
        ];
    }
}