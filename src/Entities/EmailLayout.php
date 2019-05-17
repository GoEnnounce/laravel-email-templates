<?php

namespace GoEnnounce\LaravelEmailTemplates\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmailLayout.
 */
class EmailLayout extends Model
{
    use SoftDeletes;

    /**
     * Fields for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'layout',
    ];
}
