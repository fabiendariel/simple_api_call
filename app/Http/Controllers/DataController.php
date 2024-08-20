<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Providers\DataProviders\ApiDatasProvider;
use Illuminate\Http\Request;

class DataController extends Controller
{

    public function __construct(protected ApiDatasProvider $apiDatasProvider) {}

    /**
     * Display the specified resource.
     */
    public function buildDatasFromSource(Request $request)
    {
        
        //$apiKey = config('app.API_KEY');
        //$apiSecret = config('app.API_SECRET');

        try {            
            if (isset($request->id)) {
                //If we come from a specific id url we filter the call for that specific planet
                $api_datas = $this->apiDatasProvider->getApiDatasForId($request->id);
                return view('api/planet', ['planet' => $api_datas]);
            } else {
                //Elsewhere we get all datas from the API 
                $api_datas = $this->apiDatasProvider->getApiDatas();
                return view('api/planets', ['planetsDatas' => $api_datas]);
            }
        } catch (\Exception $e) {
            // Handle any errors that occur during the API request
            return view('api_error', ['error' => $e->getMessage()]);
        }
    }

    
}
