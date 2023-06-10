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
        return $category = $this->model->create($data->toArray());

        // if ($data['icon']) {
        //     $this->saveIcon($category, $data['icon']);
        // }
    }

    public function update(array $data, int $id)
    {
        $category = $this->model->find($id);
        $category->update($data);

        return;
    }

    public function saveIcon(Category $category, UploadedFile $icon)
    {
        $path = saveImage($icon, $category->getTranslation('name', 'tm'), '/assets/images/categories/icons/');
        return $category->update(['icon' => $path]);
    }

    public function saveImage(Category $category, UploadedFile $image)
    {
        $path = saveImage($image, $category->getTranslation('name', 'tm'), '/assets/images/categories/');
        return $category->update(['image' => $path]);
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}