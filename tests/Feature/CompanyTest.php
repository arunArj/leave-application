<?php

namespace Tests\Feature;

use App\Models\Company;
use App\Http\Resources\CompanyResource;
use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Http\Response;

class CompanyControllerTest extends TestCase
{
    use RefreshDatabase;
    use WithFaker;

    /** @test */
    public function store_creates_a_new_company()
    {
        $data = [
            'companyName' => $this->faker->company,
        ];

        $response = $this->json('POST', '/api/v1/companys', $data);

        $response->assertStatus(Response::HTTP_CREATED);
        $response->assertJson([
            'data' => [
                'companyName' => $data['company_name']
            ],
        ]);

        $this->assertDatabaseHas('companies', $data);
    }

    /** @test */
    public function store_validates_the_request()
    {
        $response = $this->json('POST', '/api/v1/companys', []);

        $response->assertStatus(Response::HTTP_UNPROCESSABLE_ENTITY);
        $response->assertJsonValidationErrors(['companyName']);
    }
}
