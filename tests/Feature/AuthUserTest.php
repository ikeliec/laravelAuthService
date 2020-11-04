<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use Illuminate\Support\Str;

class AuthUserTest extends TestCase
{
    /**
     * User registration feature test.
     *
     * @return void
     */
    public function testUserRegistration()
    {
        $name = Str::random(10);

        $response = $this->post('/api/auth/register', [
            'name' => $name,
            'email' => "{$name}@mailinator.com",
            'password' => 'kkkkkkkkK1@',
            'password_confirmation' => 'kkkkkkkkK1@'
        ], [
            'HTTP_Content-Type' => 'application/json',
            'HTTP_Accept' => 'application/json'
        ]);

        $response->assertStatus(201);
    }

    /**
     * User login feature test.
     *
     * @return void
     */
    public function testUserLogin()
    {
        $response = $this->post('/api/auth/login', [
            'email' => 'john.doe@mailinator.com',
            'password' => 'kkkkkkkkK1@'
        ], [
            'HTTP_Content-Type' => 'application/json',
            'HTTP_Accept' => 'application/json'
        ]);

        $response->assertStatus(200);
    }

    /**
     * Fetch authenticated user feature test.
     * 
     * login user via postman to get the token.
     * Copy and paste/assign the token generated from postman to the $token variable in the function
     *
     * @return void
     */
    public function testFetchAuthenticatedUser()
    {
        $token = 'eyJ0eXAiOiJKV1QiLCJhbGciOiJSUzI1NiJ9.eyJhdWQiOiIxIiwianRpIjoiZjM2YTQxZTE4YjRkNDAyNTJlY2RhOWQ1YzEwN2Q1YzdjNGY2MWE4ZjI4NjU1Mjk2MDNkY2MzMDU4MDYwY2IzOGZjZDJiMjNkOGIyM2QyZGQiLCJpYXQiOjE2MDQ0NTY0NjUsIm5iZiI6MTYwNDQ1NjQ2NSwiZXhwIjoxNjA0NTQyODY0LCJzdWIiOiIxIiwic2NvcGVzIjpbXX0.k0eOOjU5dBGGWTBu7qxlCHEnRvrmb5M8Wa28y7ge3QmsubLjQTVESvDKO-VLxEuRUa-HGSz48gX9StdwDgOw2b58kmTZwYt8fa08rUrrlcnqlTSoBUb0DF1bpf3_FZ55-ijH85YHjx7mGyIl9TftrLvZWDJDvQ5tB2qu-k3U7J7uyRYB9KFHHK4jBbJckYiR3YwpszDDHE-ds1M4j6xXYghnXwNqjoVBFrhmrnqKDAj67HWRPU3GuK7_ekqhAIQILTu0RZKHc-kSKh9VHr_efdF7bCnzOX9_WPTLzmTXxY5XmcghHTYSsIUGIV9i7w3cOY5tqAuGGED3dacI34WpYWkE5598YALQXX0Mz530cY47TBAAPcaOy0cYtdKqjE9DX2_TbEZBsED6sYJn6y7s-ij7CIw40CkBa2lFUjJcGLgqkhRe0bjDCNjTXvkgFRFl7Iv-WajFffu6OU5NS-smDNeoOtidAOZbOmsc8pnPu0duXr0w2hv7ZaLO635s2aK-fQq1jaukNgv69G64ZL_i1SqsyeqspO77EOlCYhXKuBPPI7dLnI72kTxqeWZKC-TjZ4qgk8VvTBiAecAyxVekT0mCHQaJvDz_Es-Zj2X6dB8199baX8W5Y0X_WjQphfffi9jfn_N6Q9nbXfTady-GZi8ox4E4C0zgOWZOFlDZMlA';

        $response = $this->get('/api/user', [
            'HTTP_Content-Type' => 'application/json',
            'HTTP_Accept' => 'application/json',
            'HTTP_Authorization' => "Bearer {$token}"
        ]);

        $response->assertStatus(200);
    }
}
