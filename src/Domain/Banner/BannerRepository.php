<?php

namespace Domain\Banner;

use Domain\Banner\DTO\BannerDTO;
use Domain\Banner\Models\Banner;
use Illuminate\Http\UploadedFile;

class BannerRepository
{
    protected Banner $model;

    public function __construct(Banner $banner)
    {
        $this->model = $banner;
    }

    public function save(BannerDTO $data)
    {
        $banner = $this->model->create($data->toArray());

        if ($data->image) {
            $this->saveImage($banner, $data->image);
        }

        return $banner;
    }

    public function saveImage(Banner $banner, UploadedFile $image)
    {
        $path = saveImage($image, time(), '/assets/images/banners/');
        return $banner->update(['image_path' => $path]);
    }

    public function delete(int $id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
