<?php

namespace Domain\Brand;

use Domain\Brand\DTO\BrandDTO;
use Domain\Brand\Models\Brand;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class BrandRepository
{
    protected Brand $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function save(BrandDTO $data)
    {
        $arr = Arr::only($data, ['name', 'category_id']);
        $brand = $this->brand->create($arr);

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
        return $this->brand->where('id', '=', $id)->delete();
    }
}
