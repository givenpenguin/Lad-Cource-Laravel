<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, HasUuids, SoftDeletes;

    protected $table = 'posts';

    protected $fillable = [
        'title',
        'text',
        'bool',
        'published_at',
    ];

//    protected $primaryKey = 'id';
//    public $incrementing = false;
//    protected $keyType = 'string';

    public $timestamps = false;

    const CREATED_AT = 'created_date';
    const UPDATED_AT = 'updated_date';

    protected $attributes = [
        'title' => '',
        'text' => '',
        'bool' => '1',
    ];

    public function users(): \Illuminate\Database\Eloquent\Relations\BelongsToMany
    {
        return $this->belongsToMany(User::class);
    }
}
