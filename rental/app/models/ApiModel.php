<?php

class ApiModel
{
    private $defaultHeaders;

    public function __construct()
    {
        // Set header default untuk API
        $this->defaultHeaders = [
            'Accept: application/json',
            'Content-Type: application/json'
        ];
    }

    /**
     * GET request ke API
     * @param string $endpoint
     * @param array $params
     * @return array
     */
    public function get($endpoint, $params = [])
    {
        $url = API_BASE_URL . $endpoint;

        // Tambahkan query string jika ada parameter
        if (!empty($params)) {
            $url .= '?' . http_build_query($params);
        }

        return $this->makeRequest('GET', $url);
    }

    /**
     * POST request ke API
     * @param string $endpoint
     * @param array $data
     * @return array
     */
    public function post($endpoint, $data = [])
    {
        $url = API_BASE_URL . $endpoint;
        return $this->makeRequest('POST', $url, $data);
    }

    /**
     * PUT request ke API
     * @param string $endpoint
     * @param array $data
     * @return array
     */
    public function put($endpoint, $data = [])
    {
        $url = API_BASE_URL . $endpoint;
        return $this->makeRequest('PUT', $url, $data);
    }

    /**
     * DELETE request ke API
     * @param string $endpoint
     * @param array $data
     * @return array
     */
    public function delete($endpoint, $data = [])
    {
        $url = API_BASE_URL . $endpoint;
        return $this->makeRequest('DELETE', $url, $data);
    }

    /**
     * Membuat request ke API menggunakan file_get_contents
     * @param string $method
     * @param string $url
     * @param array $data
     * @return array
     */
    private function makeRequest($method, $url, $data = [])
    {
        // Menyiapkan data untuk POST, PUT, DELETE
        $options = [
            'http' => [
                'method' => $method,
                'header' => implode("\r\n", $this->defaultHeaders),
                'content' => ''
            ]
        ];

        // Untuk POST, PUT, DELETE, tambahkan data ke body
        if (in_array($method, ['POST', 'PUT', 'DELETE']) && !empty($data)) {
            $options['http']['content'] = json_encode($data);
            $options['http']['header'] .= "\r\nContent-Length: " . strlen($options['http']['content']);
        }

        // Membuat konteks stream
        $context = stream_context_create($options);

        // Mengambil response dari file_get_contents
        $response = @file_get_contents($url, false, $context);

        // Error handling jika file_get_contents gagal
        if ($response === FALSE) {
            return [
                'success' => false,
                'message' => 'Error during API request.'
            ];
        }

        // Decode response
        $result = json_decode($response, true);

        // Return hasil berdasarkan status HTTP
        return $result;
    }
}
