<?php
namespace Groid\Http\Controllers\Ingestion;

use Groid\Ingestors\CannabisReports as CannabisReports;
use Groid\Http\Controllers\Controller;


class CannabisReportsController extends Controller {


    public function scrape()

    {
        $page = new CannabisReports();
        return $page->iterateOverPages();
    }
    public function seedco()
    {
        $page = new CannabisReports();
        return $page->getSeedCompanyDetails();
    }
}