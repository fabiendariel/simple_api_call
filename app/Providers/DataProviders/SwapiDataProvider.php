<?php

namespace App\Providers\DataProviders;

use App\Providers\DataProviders\Classes\PlanetsDatas;
use DateTime;
use Exception;
use Illuminate\Support\Collection;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class SwapiDataProvider implements ApiDatasProvider
{
    public function getApiDatas(): Collection
    {
        $url = config('external-api.swapi.base_url') . 'planets/';
                
        return $this->doRequest($url);
    }

    public function getApiDatasForId($id): PlanetsDatas
    {
      $url = config('external-api.swapi.base_url') . 'planets/'.$id;

      return $this->doRequestOne($url);
    }
  
    public function doRequest(string $url): Collection
    {
        try {
            $response = Http::get($url);
            if (!$response->successful()) {
                return Collection::make();
            }
            $data = $response->json();

            return collect($data['results'])
            ->map(function ($line) {
                $line['created'] = new DateTime($line['created']);
                $line['edited'] = new DateTime($line['edited']);
                return new PlanetsDatas(
                    Name: $line['name'],
                    Rotation_period: intval($line['rotation_period']),
                    Orbital_period: intval($line['orbital_period']),
                    Diameter: intval($line['diameter']),
                    Climate: $line['climate'],
                    Gravity: $line['gravity'],
                    Terrain: $line['terrain'],
                    Surface_water: intval($line['surface_water']),
                    Population: intval($line['population']),
                    Residents: $line['residents'],
                    Films: $line['films'],
                    Created: $line['created'],
                    Edited: $line['edited'],
                    Url: str_replace('https://swapi.dev/api', '',$line['url']),
                );
            });
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return Collection::make();
        }
    }

    public function doRequestOne(string $url): PlanetsDatas
    {
        try {
            $response = Http::get($url);
            if (!$response->successful()) {
                return Collection::make();
            }
            $data = $response->json();
            
            $line = $data;
            $line['created'] = new DateTime($line['created']);
            $line['edited'] = new DateTime($line['edited']);
            return new PlanetsDatas(
                Name: $line['name'],
                Rotation_period: intval($line['rotation_period']),
                Orbital_period: intval($line['orbital_period']),
                Diameter: intval($line['diameter']),
                Climate: $line['climate'],
                Gravity: $line['gravity'],
                Terrain: $line['terrain'],
                Surface_water: intval($line['surface_water']),
                Population: intval($line['population']),
                Residents: $line['residents'],
                Films: $line['films'],
                Created: $line['created'],
                Edited: $line['edited'],
                Url: str_replace('https://swapi.dev/api', '',$line['url']),
            );
            
        } catch (Exception $e) {
            Log::error($e->getMessage());
            Log::error($e->getTraceAsString());

            return Collection::make();
        }
    }
}