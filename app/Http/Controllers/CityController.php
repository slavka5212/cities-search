<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\City;
use Sunra\PhpSimple\HtmlDomParser;
use App\Imports\CitiesImport;
use App\Exports\CitiesExport;
use DB;
use Excel;

class CityController extends Controller
{
    /**
     * Show the detail for the given city.
     *
     * @param  string  $city
     * @return View
     */
    public function show($city)
    {
        return view('city', ['city' => City::where('name', $city)->firstOrFail()]);
    }

    /**
    * @return \Illuminate\Support\Collection
    */
    public function import() 
    {
        set_time_limit(180*6); // 180sec = 3 min. *6
        $urlsToParse = [
            'https://www.e-obce.sk/zoznam_vsetkych_obci.html',
            'https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana=500',
            'https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana=1000',
            'https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana=1500',
            'https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana=2000',
            'https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana=2500'
        ];

        $startHref = "https://www.e-obce.sk/zoznam_vsetkych_obci.html?strana=2500"; 
        $lastHref = "http://www.efo.sk";
        $id = 0;

        // delete all rows
        City::truncate();
        
        foreach($urlsToParse as $urlParse) {
            $saveParse = FALSE;
            // Create DOM from URL or file
            $html = HtmlDomParser::file_get_html($urlParse, 0);

            // Find all cities names and detail page
            foreach($html->find('a') as $element) {
                if ($element->href == $lastHref) {
                    $saveParse = FALSE;
                }
                if ($saveParse) {
                    $id++;

                    print_r($id ." " . $element->plaintext. "\n");

                    // create $row with a city data
                    $row = ['name' => $element->plaintext, 'url' => $element->href, 'id' => $id];

                    // Parse city detail page
                    $htmlDetail = HtmlDomParser::file_get_html($element->href, 0);
                    $writeData = FALSE;
                    $trNumber = 0;
                    $nextData = NULL;
                    foreach($htmlDetail->find('tr') as $cityElement) {
                        $trNumber++;
                        if ($trNumber > 27 && $trNumber < 50) {
                            foreach($cityElement->children() as $raw) {
                                // parse city image
                                $image = $raw->find('img', 0);
                                if (isset($image) && 
                                    substr($image->getAttribute('alt'), 0,3) == "Erb") {
                                    //var_dump($image->getAttribute('src'));
                                    $row['img'] = $image->getAttribute('src');
                                }
                                
                                $trimText = strip_tags(trim($raw->plaintext));
                                if ($nextData != NULL) {
                                    $row[$nextData] = $trimText;
                                }
                                switch ($trimText) {
                                    case "Web:":
                                        $nextData = 'web';
                                        break;
                                    case "Samosprávny kraj:":
                                        $nextData = 'region';
                                        break;
                                    case "Okres:":
                                        $nextData = 'district';
                                        break;
                                    case "IČO:":
                                        $nextData = 'ico';
                                        break;
                                    case "Starosta:":
                                        $nextData = 'mayor';
                                        break;
                                    case "Mobil:":
                                        $nextData = 'tel';
                                        break;
                                    case "Fax:":
                                        $nextData = 'fax';
                                        break;
                                    case "Email:":
                                        $nextData = 'email';
                                        break;
                                    default:
                                        $nextData = NULL;
                                        break;
                                }
                                
                                $values[] = $raw->plaintext;
                             }
                        }
                    }
                    //print_r($row);
                    // Save data
                    try {
                        City::insert($row);
                    } catch(\Exception $e) {
                        if ($e->getCode() == 23000) { // Duplicite entry
                            $name = $row['name'];
                            unset($row['name']);
                            unset($row['id']);
                            City::where('name', $name)->update($row);
                        }
                        if (!City::where('id', '=', $id)->exists()) {
                            // city id not exist
                            $id--;
                            //print("minus id");
                         }
                        // handle exception
                        //print_r($e->getCode());
                        
                    }
                // test break
                // break;
                }
                else if ($element->href == $startHref) {
                    $saveParse = TRUE;
                }
            }
        }
    }

    public function importFromXLSX() 
    {
        // delete all rows
        City::truncate();
        Excel::import(new CitiesImport, 'cities.xlsx');
    }

    public function export() 
    {
        return Excel::download(new CitiesExport, 'cities.xlsx');
    }

    /**
     * Find GPS location of Cities in DB
     */
    public function geocode()
    {
        set_time_limit(180*6); // 180sec = 3 min. *6
        $data = City::all();

        foreach($data as $row){
            $address = $row->name; // e.g. "Zvolen";

            $geocoder = new \OpenCage\Geocoder\Geocoder('3e021277772949dbbfa20f9e1a66a235');
            $result = $geocoder->geocode($address .', Slovakia');

            if ($result && $result['total_results'] > 0) {
                $first = $result['results'][0];
                print $first['geometry']['lng'] . ';' . $first['geometry']['lat'] . '; ' . $first['formatted'] . "\n";

                $result = array( 'lat' => $first['geometry']['lat'], 'lng' => $first['geometry']['lng']);
                City::where('name', $address)->update($result);
                //return $result;
            } else {
                //return false;
                print("Error address: ". $address);
            }
        }
        /** Google geocoder 
        // google map geocode api url
        $url = "https://maps.googleapis.com/maps/api/geocode/json?address={$address}&key=API_KEY";
    
        // get the json response
        $resp_json = file_get_contents($url);
        
        // decode the json
        $resp = json_decode($resp_json, true);
    
        print_r($resp);
        // response status will be 'OK', if able to geocode given address 
        if($resp['status']=='OK'){
    
            // get the important data
            $lat = isset($resp['results'][0]['geometry']['location']['lat']) ? $resp['results'][0]['geometry']['location']['lat'] : "";
            $long = isset($resp['results'][0]['geometry']['location']['lng']) ? $resp['results'][0]['geometry']['location']['lng'] : "";
            $formatted_address = isset($resp['results'][0]['formatted_address']) ? $resp['results'][0]['formatted_address'] : "";
            
            // verify if data is complete
            if($lat && $long) {
                $result = array( 'lat' => $lat, 'long' => $long);
                print_r($result);
                return $result;
            } else {
                return false;
            }  
        }
        else {
            echo "<strong>ERROR: {$resp['status']}</strong>";
            return false;
        }*/
    }
}