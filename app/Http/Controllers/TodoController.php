<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;

class TodoController extends Controller
{
    private Client $client;

    const URL = 'https://jsonplaceholder.typicode.com/todos';

    public function __construct()
    {
        $this->client = new Client(['base_uri' => self::URL]);
    }

    public function index()
    {
        $todos = json_decode(
            $this->client->get('')->getBody()->getContents(),
            true
        );

        return view('todos', compact('todos'));
    }
}
