<?php

use Illuminate\Foundation\Testing\DatabaseTransactions;

class ApiSmokeTest extends TestCase
{
    use DatabaseTransactions;
    /**
     * @test
     */
    function test_api_ops_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->get('/api/ops/?'. $this->apiToken($user));
        $this->seeJson();
    }

    /**
     * @test
     */
    function test_api_cycles_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->get('/api/cycles/?' . $this->apiToken($user));
        $this->seeJson();
    }

    /**
     * @test
     */
    function test_api_stages_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->get('/api/stages/?' . $this->apiToken($user));
        $this->seeJson();
    }

    /**
     * @test
     */
    function test_api_plants_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->visit('/api/plants/?' . $this->apiToken($user));
        $this->seeJson();
    }

    /**
     * @test
     */
    function test_api_strains_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->visit('/api/strains/?' . $this->apiToken($user));
        $this->seeJson();
    }

    /**
     * @test
     */
    function test_api_data_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->visit('/api/data/?' . $this->apiToken($user));
        $this->seeJson();
    }

    /**
     * @test
     */
    function test_api_journals_returns_json()
    {
        $user = factory(Groid\User::class)->create([]);
        $this->visit('/api/journals/?' . $this->apiToken($user));
        $this->seeJson();
    }
}