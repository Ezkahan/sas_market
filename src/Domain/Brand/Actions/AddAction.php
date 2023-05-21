<?php

namespace Domain\Brand\Actions;

use Domain\Brand\BrandManager;

class AddAction {
    protected BrandManager $manager;

    public function __construct(BrandManager $manager)
    {
        $this->manager = $manager;
    }

    public function run(array $data)
    {
        try {
            return $this->manager->save($data);
        }
        catch (Exception $exception) {
            throw new Exception("Error not saved");
        }
    }
}
