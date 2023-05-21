<?php

namespace Domain\Brand;

use Arr;
use Log;
use Domain\Brand\Models\Brand;

class BrandManager {
    protected Brand $brand;

    public function __construct(Brand $brand)
    {
        $this->brand = $brand;
    }

    public function save(array $data)
    {
        $arr = Arr::only($data, ['name', 'category_id']);
        $brand = $this->brand->create($arr);

        if(array_key_exists('logo', $data) && $data['logo'])
        {
            $this->saveLogo($brand, $data['logo']);
        }

        return;
    }

    public function saveLogo(Brand $brand, UploadedFile $logo)
    {
        $path = '/assets/images/brands/';
        $logo->save(public_path().$path);

        return $brand->update(['logo' => $path]);
    }

    public function delete($id): string
    {
        return $this->brand->where('id', '=', $id)->delete();
    }
}
