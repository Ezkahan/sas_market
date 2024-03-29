<?php

namespace Domain\Brand;

use Domain\Brand\DTO\BrandDTO;
use Domain\Brand\Models\Brand;
use Illuminate\Http\UploadedFile;

class BrandRepository
{
    protected Brand $model;

    public function __construct(Brand $brand)
    {
        $this->model = $brand;
    }

    public function save(BrandDTO $data)
    {
        if ($data->id) {
            $brand = $this->model->find($data->id);
            $brand->update($data->toArray());
        } else {
            $brand = $this->model->create($data->toArray());
        }

        if ($data->logo) {
            $this->saveLogo($brand, $data->logo);
        }

        return $brand;
    }

    public function saveLogo(Brand $brand, UploadedFile $logo)
    {
        $brand->deleteLogo();
        $path = saveImage($logo, $brand->name, '/assets/images/brands/');
        return $brand->update(['logo_path' => $path]);
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
