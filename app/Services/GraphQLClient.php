<?php

namespace App\Services;

use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\Log;

class GraphQLClient
{
    protected string $endpoint;

    public function __construct()
    {
        // Tetap gunakan fallback hardcode agar aman dari cache environment lama
        $this->endpoint = env('GRAPHQL_ENDPOINT', 'https://graphql.kuitansiku.my.id/graphql');
    }

    /**
     * Mengeksekusi GraphQL query
     *
     * @param  string  $query
     * @param  array  $variables
     * @return array|null
     */
    public function query(string $query, array $variables = []): ?array
    {
        try {
            $response = Http::post($this->endpoint, [
                'query' => $query,
                'variables' => $variables,
            ]);

            if ($response->successful()) {
                $body = $response->json();

                if (isset($body['errors'])) {
                    Log::error('GraphQL Server returned errors: ', $body['errors']);
                    return null;
                }

                return $body['data'] ?? null;
            }

            Log::error('GraphQL Request failed with status: ' . $response->status());
        } catch (\Exception $e) {
            Log::error('GraphQL Client Exception: ' . $e->getMessage());
        }

        return null;
    }
}
