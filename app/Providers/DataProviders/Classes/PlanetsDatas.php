<?php

namespace App\Providers\DataProviders\Classes;

use DateTime;

class PlanetsDatas
{
  public function __construct(
    public string $Name,
    public int $Rotation_period,
    public int $Orbital_period,
    public int $Diameter,
    public string $Climate,
    public string $Gravity,
    public string $Terrain,
    public int $Surface_water,
    public int $Population,
    public array $Residents,
    public array $Films,
    public DateTime $Created,
    public DateTime $Edited,
    public string $Url,   
  ) {
  }
}
