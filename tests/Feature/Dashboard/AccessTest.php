<?php

namespace Tests\Feature\Dashboard;

use Tests\TestCase;

class AccessTest extends TestCase
{
    public function testDashboardAuthorization()
    {
        $this->actingAsCustomer();

        $response = $this->get(route('dashboard.home'));

        $response->assertForbidden();

        $this->actingAsSupervisor();

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();

        $this->actingAsAdmin();

        $response = $this->get(route('dashboard.home'));

        $response->assertSuccessful();
    }
}
