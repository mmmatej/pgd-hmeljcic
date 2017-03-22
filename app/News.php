<?php

namespace App;

use App\Scopes\PublishedScope;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Facades\Cache;

class News extends Model
{
    use SoftDeletes;

    /**
     * The "booting" method of the model.
     *
     * @return void
     */
    protected static function boot()
    {
        parent::boot();

        static::addGlobalScope(new PublishedScope());
    }

    public static function getCover()
    {
        return self::where('is_cover_news', true)->first();
    }

    public function getUrl()
    {
        return url('/novice/' . $this->slug);
    }

    public function scopeWithDraft($query)
    {
        return $query->withoutGlobalScope(PublishedScope::class);
    }

    public function images()
    {
        return $this->hasMany(Image::class);
    }

    public function getCoverImage()
    {
        return $this->images->first();
    }

    public function getCoverImageUrl()
    {
        return $this->getCoverImage()->getUrl();
    }

    public function getTranslatedDate()
    {
        //"16. julij 2016";
        return str_replace(
            ['January', 'February', 'March', 'May', 'June', 'July', 'August', 'October'],
            ['Januar', 'Februar', 'Marec', 'Maj', 'Junij', 'Julij', 'Avgust', 'Oktober'],
            $this->created_at->format('d. F Y')
        );
    }

    public function clearCache()
    {
        Cache::forget('news-' . $this->slug);
    }
}
