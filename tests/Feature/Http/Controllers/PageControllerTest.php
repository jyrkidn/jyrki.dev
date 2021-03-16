<?php

namespace Tests\Feature\Http\Controllers;

use Tests\TestCase;

/**
 * @see \App\Http\Controllers\PageController
 */
class PageControllerTest extends TestCase
{
    /**
     * @test
     */
    public function show_displays_view()
    {
        $page = Page::factory()->create();

        $response = $this->get(route('page.show', $page));

        $response->assertOk();
        $response->assertViewIs('page.show');
        $response->assertViewHas('page');
    }
}
