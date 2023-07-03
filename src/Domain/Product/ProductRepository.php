<?php

namespace Domain\Product;

use Domain\Product\DTO\ProductDTO;
use Domain\Product\Models\Product;
use Illuminate\Support\Facades\Log;

class ProductRepository
{
    protected Product $model;

    public function __construct(Product $product)
    {
        $this->model = $product;
    }

    public function save(ProductDTO $data)
    {
        $product = $this->model->create($data->toArray());

        if ($data->images) {
            $this->saveImages($product, $data->images);
        }

        return $product;
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }

    public function saveImages(Product $product, $images)
    {
        $path = '/assets/images/products/';
        Log::info($product);
        foreach ($images as $key => $image) {
            $filename = saveImage($image, $key, $path);
            $product->images()->create([
                'image_path' => $path . $filename
            ]);
        }
    }
}
