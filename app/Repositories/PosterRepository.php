<?php
namespace App\Repositories;

use App\Models\Poster;

class PosterRepository
{
    public function clearCache(Poster $poster)
    {

        $medias   = $poster->posterMedias()->get();
        $material = app('wechat')->material;

        foreach ($medias as $media) {
            // 删除海报对应的缓存media_id
            $media->delete();
            // 删除所有海报对应的缓存的素材（微信中）
            $material->delete($media->media_id);
        }
    }

}
