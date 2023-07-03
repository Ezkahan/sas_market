<?php

namespace Domain\Category;

use Domain\Category\DTO\CategoryDTO;
use Domain\Category\Models\Category;
use Illuminate\Http\UploadedFile;

class CategoryRepository
{
    protected Category $model;

    public function __construct(Category $category)
    {
        $this->model = $category;
    }

    public function save(CategoryDTO $data)
    {
        $category = $this->model->create($data->toArray());

        if ($data->icon) {
            $this->saveIcon($category, $data->icon);
        }

        if ($data->image) {
            $this->saveImage($category, $data->image);
        }

        return $category;
    }

    public function update(CategoryDTO $data, int $id)
    {
        $category = $this->model->find($id);

        $category->update($data->toArray());

        return $category;
    }

    public function saveIcon(Category $category, UploadedFile $icon)
    {
        $path = saveImage(
            $icon,
            time(),
            '/assets/images/categories/icons/'
        );

        return $category->update(['icon_path' => $path]);
    }

    public function saveImage(Category $category, UploadedFile $image)
    {
        $path = saveImage($image, time(), '/assets/images/categories/');
        return $category->update(['image_path' => $path]);
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
