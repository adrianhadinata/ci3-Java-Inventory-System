<?php

defined('BASEPATH') OR exit('No direct script access allowed');

use GuzzleHttp\Client;

class ProductModel extends CI_Model {

    public function getAll(){
        $api_url = 'http://localhost:9191/products';

        // Read JSON file
        $json_data = file_get_contents($api_url);

        // Decode JSON data into PHP array
        return json_decode($json_data);
    }

    public function addNew($data){
        $api_url = 'http://localhost:9191/addProduct';

        $client = new Client();

        try {
            $response = $client->post($api_url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($data)
            ]);

            $responseBody = $response->getBody()->getContents();
            $result = array(
                'status' => 'success',
                'message' => 'Response: ' . $responseBody
            );

            return $result;
        } catch (Exception $e) {
            $result = array(
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            );
            return $result;
        }

    }

    public function delete($id)
    {
        $api_url = 'http://localhost:9191/delete/' . $id;

        $client = new Client();

        try {
            $response = $client->delete($api_url);

            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $result = array(
                    'status' => 'success',
                    'message' => 'Data deleted successfully.'
                );
                return $result;
            } else {
                $result = array(
                    'status' => 'error',
                    'message' => 'Unexpected response: ' . $statusCode
                );
                return $result;
            }
        } catch (Exception $e) {
            $result = array(
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            );
            return $result;
        }
    }

    public function loadById($id)
    {
        $api_url = 'http://localhost:9191/productById/' . $id;

        $client = new Client();

        $response = $client->get($api_url)->getBody()->getContents();
        $data = json_decode($response, true);

        return $data;
    }

    public function update($data)
    {
        $api_url = 'http://localhost:9191/update';

        $client = new Client();

        try {
            $response = $client->put($api_url, [
                'headers' => [
                    'Content-Type' => 'application/json'
                ],
                'body' => json_encode($data)
            ]);

            $statusCode = $response->getStatusCode();
            if ($statusCode === 200) {
                $result = array(
                    'status' => 'success',
                    'message' => 'Data updated successfully.'
                );
                return $result;
            } else {
                $result = array(
                    'status' => 'error',
                    'message' => 'Unexpected response: ' . $statusCode
                );
                return $result;
            }
        } catch (Exception $e) {
            $result = array(
                'status' => 'error',
                'message' => 'Error: ' . $e->getMessage()
            );
            return $result;
        }
    }
}

?>