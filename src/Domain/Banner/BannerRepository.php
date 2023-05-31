<?php

namespace Domain\Banner;

use Domain\Banner\DTO\BannerDTO;
use Domain\Banner\Models\Banner;
use Illuminate\Http\UploadedFile;

class BannerRepository
{
    protected Banner $banner;

    public function __construct(Banner $banner)
    {
        $this->banner = $banner;
    }

    public function save(BannerDTO $data)
    {
        $banner = $this->banner->create($data->toArray());

        if ($data['image']) {
            $this->saveImage($banner, $data['image']);
        }

        return $banner;
    }

    public function saveImage(Banner $banner, UploadedFile $image)
    {
        $path = saveImage($image, $banner->name, '/assets/images/banners/');
        return $banner->update(['image' => $path]);
    }

    public function delete(int $id): string
    {
        return $this->banner->where('id', '=', $id)->delete();
    }
}
