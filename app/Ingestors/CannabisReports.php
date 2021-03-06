<?php
namespace Groid\Ingestors;

use Groid\Strain;
use Groid\SeedCompany;
use GuzzleHttp\Client;

class CannabisReports
{

    // Warning, this ain't pretty, and is not meant to be. This is a blunt force tool, use with caution.
    
    public function client()
    {
        return new Client(['headers' => ['X-API-Key' => 'd4e47a6b49cdacb0524c12cfd5a3cadb9c102522', ]]);
    }

    /**
     * @param integer $i
     */
    public function makeRequest($i)
    {
        $request = $this->client()->get('https://cannabisreports.com/api/v1.0/strains?sort=name&page='.$i);
        $response = $request->getBody();
        $data = $this->parseStrainsPage(json_decode($response, true));

        return $data;
    }

    public function iterateOverPages()
    {
        for ($i = 1; $i < 1000; ++$i) {
            $this->makeRequest($i);
            sleep(7);
        }

        return;
    }


    public function parseStrainsPage($data)
    {
        for ($i = 0; $i < 10; $i++) {
            try {
                SeedCompany::where('ucpc', '=', $data['data'][$i]['seedCompany']['ucpc'])->firstOrFail();
            } catch (\Exception $e) {
                $seedCompany = new SeedCompany([
                    'name' => $data['data'][$i]['seedCompany']['name'],
                    'ucpc' => $data['data'][$i]['seedCompany']['ucpc'],
                    'cannabis_reports_link' => $data['data'][$i]['seedCompany']['link'],
                ]);
                $seedCompany->save();
            }


            try {
                Strain::where('ucpc', '=', $data['data'][$i]['ucpc'])->firstOrFail();
            } catch (\Exception $e) {
                $strain = new Strain([
                    'name' => $data['data'][$i]['name'],
                    'ucpc' => $data['data'][$i]['ucpc'],
                    'seed_company' => $data['data'][$i]['seedCompany']['name'],
                    'genetics' => $data['data'][$i]['genetics']['names'],
                    'cannabis_reports_link' => $data['data'][$i]['url'],
                    'ucpc' => $data['data'][$i]['ucpc'],
                    'image' => $data['data'][$i]['image']
                ]);
                $strain->save();
            }


        }

        return;
    }

    public function getSeedCompanyDetails()
    {
        for ($i = 1; $i < 570; ++$i) {
            try {

                $seedco = SeedCompany::where('id', '=', $i)->firstOrFail();
                $request = $this->client()->get('https://cannabisreports.com/api/v1.0/seed-companies/'.$seedco->ucpc);
                $response = $request->getBody();
                $data = json_decode($response, true);
                $seedco->image = $data['data']['image'];
                $seedco->url = $data['data']['url'];
                $seedco->save();
            } catch (\Exception $e) {
                continue;
            }
        }
        return;
    }

    public function getStrainDetails()
    {
        for ($i = 1; $i < 569; ++$i) {
            try {
                sleep(7);
                $strain = Strain::where('id', '=', $i)->firstOrFail();
                $request = $this->client()->get('https://cannabisreports.com/api/v1.0/strains/'.$strain->ucpc);
                $response = $request->getBody();
                $data = json_decode($response, true);
                $strain->image = $data['data']['image'];
                $strain->url = $data['data']['url'];
                $strain->save();
            } catch (\Exception $e) {
                continue;
            }
        }
        return;
    }
}