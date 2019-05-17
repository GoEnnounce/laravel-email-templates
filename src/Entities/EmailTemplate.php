<?php

namespace GoEnnounce\LaravelEmailTemplates\Entities;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

/**
 * Class EmailTemplate.
 */
class EmailTemplate extends Model
{
    use SoftDeletes;

    /**
     * Fields for mass assignment.
     *
     * @var array
     */
    protected $fillable = [
        'handle',
        'subject',
        'content',
        'language',
    ];

    /**
     * The email layout associated with this template.
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasOne
     */
    public function layout()
    {
        return $this->hasOne(EmailLayout::class, 'id', 'layout_id');
    }
}
