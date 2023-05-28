<?php

namespace Domain\Banner;

use Domain\Banner\Models\Banner;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class BannerRepository
{
    protected Banner $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function save(array $data)
    {
        $arr = Arr::only($data, ['link', 'category_id', 'position']);
        $banner = $this->banner->create($arr);

        if ($data['image']) {
            $this->saveImage($banner, $data['image']);
        }

        return;
    }

    public function saveImage(Banner $banner, UploadedFile $image)
    {
        $path = saveImage($image, $banner->name, '/assets/images/banners/');
        return $banner->update(['image' => $path]);
    }

    public function delete($id): string
    {
        return $this->banner->where('id', '=', $id)->delete();
    }
}
