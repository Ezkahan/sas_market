<?php

namespace Domain\Category;

use Domain\Category\Models\Category;
use Illuminate\Http\UploadedFile;
use Illuminate\Support\Arr;

class CategoryRepository
{
    protected Category $category;

    public function __construct(Category $category)
    {
        $this->category = $category;
    }

    public function save(array $data)
    {
        $arr = Arr::only($data, ['name', 'description', 'parent_id']);
        $category = $this->category->create($arr);

        if (array_key_exists('icon', $data) && $data['icon']) {
            $this->saveIcon($category, $data['icon']);
        }

        return;
    }

    public function update(array $data, int $id)
    {
        $category = $this->category->find($id);
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
        return $this->category->where('id', '=', $id)->delete();
    }
}
