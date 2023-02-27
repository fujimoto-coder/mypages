<?php

namespace App\Models\Traits;

trait WhereLike
{
    // 部分一致
    public function scopeWhereLike($query, string $column, string $keyword)
    {
        return $query->where($column, 'like', '%' . addcslashes($keyword, '%_\\') . '%');
    }
}