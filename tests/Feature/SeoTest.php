<?php

namespace Tests\Feature;

use Tests\TestCase;

class SeoTest extends TestCase
{
    public function test_root_redirects_to_default_localized_page(): void
    {
        $this->get('/')
            ->assertStatus(301)
            ->assertRedirect('/id');
    }

    public function test_landing_page_exposes_essential_seo_tags(): void
    {
        $response = $this->get('/id');

        $response->assertOk();
        $response->assertSee('<link rel="canonical" href="'.route('landing', ['locale' => 'id']).'">', false);
        $response->assertSee('hreflang="id-ID"', false);
        $response->assertSee('hreflang="en-US"', false);
        $response->assertSee('name="robots"', false);
        $response->assertSee('application/ld+json', false);
    }

    public function test_sitemap_contains_all_localized_urls(): void
    {
        $response = $this->get('/sitemap.xml');

        $response->assertOk();
        $response->assertSee(route('landing', ['locale' => 'id']), false);
        $response->assertSee(route('landing', ['locale' => 'en']), false);
    }

    public function test_robots_file_references_sitemap(): void
    {
        $response = $this->get('/robots.txt');

        $response->assertOk();
        $response->assertSee('User-agent: *', false);
        $response->assertSee('Sitemap: '.route('sitemap'), false);
    }
}
