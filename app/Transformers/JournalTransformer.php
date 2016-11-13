<?php

namespace Groid\Transformers;

use Groid\Journal;
use League\Fractal\TransformerAbstract;

class JournalTransformer extends TransformerAbstract
{
    public function transform(Journal $journal)
    {
        return [
            'id' 	=> (int) $journal->id,
            'title'  => $journal->title,
            'body'	=> $journal->body
        ];
    }
}