<?php

namespace App\Services;

use App\Models\Term;
use Illuminate\Support\Facades\Auth;
use Illuminate\Database\Eloquent\Builder;

class TermService
{
    /**
     * @return mixed
     */
    public function getTag()
    {
        return Term::tag();
    }
}
