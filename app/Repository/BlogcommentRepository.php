<?php

namespace App\Repository;
use App\Models\Blogcomment;

class BlogcommentRepository extends GenericRepository
{
    public function __construct(Blogcomment $blogcomment)
    {
        parent::__construct($blogcomment);
    }
}