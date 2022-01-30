<?php

namespace App\Http\Controllers;

use Faker\Factory;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function getCategories(?string $category = null):array {

        $fake = Factory::create();
        $data = [];

        if($category) {
            return[
                'title' => $category,
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'id' => $i,
                'title' => $fake->jobTitle(),
            ];
        }

        return $data;
    }


    public function getNews(?int $id = null) {

        $fake = Factory::create();
        $data = [];

        if($id) {
            return [
                'id' => $id,
                'title' => $fake->jobTitle(),
                'description' => $fake->text(100)
            ];
        }

        for ($i = 1; $i <= 5; $i++) {
            $data[] = [
                'id' => $i,
                'title' => $fake->jobTitle(),
                'description' => $fake->text(100)
            ];
        }
        return $data;
    }
}
