<?php

namespace App\Services;

interface CRUDService
{
    public function create(array $attributes);
    public function show($model);
    public function update($model, array $attributes);
    public function delete($model);
}