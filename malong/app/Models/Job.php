<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Job extends Model
{
    use HasFactory;

    protected $fillable = [
        'job_title',
        'job_description',
        'type_id',
        'condition_id',
        'category_id',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function condition()
    {
        return $this->belongsTo(Condition::class);
    }

    public function type()
    {
        return $this->belongsTo(Type::class);
    }

    public function scopeFilterSearchResult($query, $data)
    {
        $query->where('job_title', 'LIKE', "%".$data['job_title']."%")
            ->where('job_description', 'LIKE', "%".$data['job_title']."%")
            ->where(function ($query) use($data) {
                return array_key_exists('category_id', $data) && $data['category_id'] ? $query->where('category_id', $data['category_id']) : '';
            })
            ->where(function ($query) use ($data) {
                return array_key_exists('condition_id', $data) && $data['condition_id'] ? $query->where('condition_id', $data['condition_id']) : '';
            })
            ->where(function ($query) use ($data) {
                return array_key_exists('type_id', $data) && $data['type_id'] ? $query->where('type_id', $data['type_id']) : '';
            });
    }
}
