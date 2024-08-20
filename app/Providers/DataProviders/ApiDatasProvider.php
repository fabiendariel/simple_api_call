<?php

namespace App\Providers\DataProviders;

use Illuminate\Support\Collection;
use App\Providers\DataProviders\Classes\PlanetsDatas;

interface ApiDatasProvider
{
  public function getApiDatas(): Collection;

  public function getApiDatasForId($id): PlanetsDatas;
}
