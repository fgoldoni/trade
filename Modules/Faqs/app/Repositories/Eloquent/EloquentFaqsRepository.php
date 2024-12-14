<?php

namespace Modules\Faqs\Repositories\Eloquent;

use Goldoni\CoreRepositories\Repositories\RepositoryAbstract;
use Modules\Faqs\Models\Faq;
use Modules\Faqs\Repositories\Contracts\FaqsRepository;

class EloquentFaqsRepository extends RepositoryAbstract implements FaqsRepository
{
    #[\Override]
    public function model(): string
    {
        return Faq::class;
    }
}
