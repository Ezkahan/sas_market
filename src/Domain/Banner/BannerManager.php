<?php

namespace Domain\Banner;

use Arr;
use Domain\Banner\Models\Banner;

class BannerManager {
    protected Banner $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function save(array $data)
    {
        $arr = Arr::only($data, ['link', 'category_id', 'position']);
        $banner = $this->banner->create($arr);

        if($data['image'])
        {
            $this->saveImage($banner, $data['image']);
        }

        return;
    }

    public function saveImage(Banner $banner, UploadedFile $image)
    {
        $path = '/assets/images/banners/';
        $image->save(public_path().$path);

        return $banner->update(['image' => $path]);
    }

    public function delete($id): string
    {
        return $this->banner->where('id', '=', $id)->delete();
    }
}
