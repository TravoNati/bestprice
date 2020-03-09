<?php
require_once('Http.php');
class HotelAPI{
    private $http;
    private $session;
    function __construct()
    {
        $this->http = new Http();
    }
    function GrabHotels($location, $radius){
        $request = '
        {
            "rqst": {
                "Credentials": {
                    "UserName": "natsearch",
                    "Password": "121314a"
                },
                "Request": {
                    "__type": "HotelsServiceSearchRequest",
                    "ClientIP": null,
                    "DesiredResultCurrency": "USD",
                    "Residency": "US",
                    "CheckIn": "\/Date(1584991020000)\/",
              "CheckOut": "\/Date(1585250220000)\/",
                    "ContractIds": null,
                    "DetailLevel": 9,
                  "TimeoutSeconds": 3,
                    "ExcludeHotelDetails": false,
                    "HotelLocation": ' . $location.',
                  "GeoLocationInfo": null,        
                    "HotelIds": null,
                    "IncludeCityTax": false,
                    "Nights": 0,
                    "RadiusInMeters": ' . $radius . ',
                    "Rooms": [{
                            "AdultsCount": 2,
                        
                        }
                    ],
                    "SupplierIds": null
                },
                "RequestType": 1,
                "TypeOfService": 2,
        
            }
        }';
        $response = $this->http->PostJson('https://services.carsolize.com/BookingServices/DynamicDataService.svc/json/ServiceRequest', $request);
        //echo $response;
        //grab hotels ids
        $hotels = $this->http->GetBetweenAll($response, 'HotelId":', ',');

        $json = json_decode($response, true);
        $finalPrices = array();
        //grab all entries
        foreach ($json['ServiceRequestResult']['HotelsSearchResponse'] as $resEx){
            foreach ($resEx as $js){
                $string = json_encode($js);
                $fPrice = $this->http->GetBetween($string, 'FinalPrice":', ',');
                $finalPrices[] = $fPrice;
            }
        }
        $this->session = $json['ServiceRequestResult']['SessionID'];
        $results = array();
        $id = 0;
        foreach ($hotels as $hotel){
            $temp = $this->GrabHotelInfo($hotel);
            $info = array();
            $info['contract_id'] = $this->http->GetBetween($temp, 'ContractId":', ',');
            //$info['final_price'] = $this->http->GetBetween($temp, 'FinalPrice":', ',');
            $allPrices = $this->http->GetBetweenAll($temp, 'FinalPrice":', ',');
            sort($allPrices, SORT_NUMERIC);
            $info['final_price'] = $allPrices[0];
            $info['hotel_id'] = $hotel;
            $info['supplier_id'] = $this->http->GetBetween($temp, 'SupplierId":', ',');
            $info['room_name'] = $this->http->GetBetween($temp, 'RoomName":', ',');
            $info['first_price'] = $finalPrices[$id];
            $results[] = $info;
            $id++;
        }
        return $results;
    }
    function GrabHotelInfo($id){
        $request = '{
        "rqst": {
            "Request": {
                "__type": "GetPackagesRequest:GetPackages",
                "ClientIP": null,
                "HotelID": ' . $id . ',
                "ReturnTaxesAndFees": true,
                "TimeoutSeconds": 2
            },
            "RequestType": 22,
            "SessionID": "'.$this->session.'",
            "TypeOfService": 2
        }
    }';
        $response = $this->http->PostJson('https://services.carsolize.com/BookingServices/DynamicDataService.svc/json/ServiceRequest', $request);

        return $response;
    }
}