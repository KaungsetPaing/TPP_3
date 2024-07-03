<?php

namespace App\Http\Controllers;

use GuzzleHttp\Client;
use Illuminate\Http\Request;

class ObjectController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth');
    // }

    public function index()
    {
        $client = new Client();

        $response = $client->get($this->baseUrl().'objects');

        $results = $response->getStatusCode() == 200 ? json_decode($response->getBody()->getContents()) : [];

        return view('objects.index', compact('results'));
    }

    public function create()
    {
        return view('objects.create');
    }

    public function store(Request $request)
    {
        $client = new Client();
        $response = $client->put($this->baseUrl().'objects',
            [
                'headers' => [ 'Content-Type' => 'application/json' ],
                'body' => json_encode([
                    'name' =>  $request->name,
                    'data' => json_encode($request->data)
                ])
            ]
        );

        $message = $response->getStatusCode() == 200 ? 'craete successful' : 'failed ';

        return redirect()->route('objects.index')->with('message', $message);
    }

    public function edit($id)
    {
        $client= new Client();
        $response = $client->get($this->baseUrl().'objects/'.$id);
        $results = $response->getStatusCode() == 200 ? json_decode($response->getBody()->getContents()) : [];
        return view('objects.edit', compact('results'));
    }

    public function update(Request $request, $id)
    {
        $client = new Client();

        $response = $client->put($this->baseUrl().'objects/'.$id,
            [
                'headers' => [ 'Content-Type' => 'application/json' ],
                'body' => json_encode([
                    'name' => $request->name,
                    'data' => json_encode($request->data)
                ])
            ]
        );

        $message = $response->getStatusCode() == 200 ? 'update successful' : 'failed ';

        return redirect()->route('objects.index')->with('message', $message);
    }

    public function delete($id)
    {
        $client = new Client();

        $response = $client->delete($this->baseUrl().'objects/'.$id);

        $message = $response->getStatusCode() == 200 ? 'delete successful' : 'failed ';

        return redirect()->route('objects.index')->with('message', $message);
    }

    private function baseUrl()
    {
        $url = 'https://api.restful-api.dev/';

        return $url;
    }
}
