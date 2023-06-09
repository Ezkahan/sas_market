<?php

namespace Domain\Brand;

use Domain\Brand\DTO\BrandDTO;
use Domain\Brand\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class BrandRepository
{
    protected Brand $model;

    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }

    public function save(BrandDTO $data)
    {
        $arr = Arr::only($data, ['name', 'category_id']);
        $brand = $this->model->create($arr);

        if ($data['logo']) {
            $this->saveLogo($brand, $data['logo']);
        }

        return;
    }

    public function saveLogo(Brand $brand, UploadedFile $logo)
    {
        $path = saveImage($logo, $brand->name, '/assets/images/brands/');
        return $brand->update(['logo' => $path]);
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
