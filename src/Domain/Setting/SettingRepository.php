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
        Log::info($data);
    }

    public function delete($id): string
    {
        return $this->model->where('id', '=', $id)->delete();
    }
}
