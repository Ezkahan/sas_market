<?php

namespace Domain\Setting;

use Domain\Setting\Models\Setting;
use Illuminate\Support\Facades\Log;

class SettingRepository
{
    protected Setting $model;

    public function __construct(Setting $setting)
    {
        $this->model = $setting;
    }

    public function add($data)
    {
        $setting = $this->findByKey($data["key"]);

        if (!$setting) {
            return $this->model->create($data);
        }

        $setting->update(['value' => $data["value"]]);
    }

    public function findByKey(string $key)
    {
        return $this->model->where('key', '=', $key)->first();
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
