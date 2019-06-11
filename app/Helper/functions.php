<?php
/**
 * guzzlehttp获取远程资源
 */
function guzzleHttp($url, $action = 'get', $params = []) {
    try {
        $client = new GuzzleHttp\Client();
        $data = $client->request($action, $url, $params)->getBody()->getContents();
        return $data;
    } catch (GuzzleHttp\Exception\GuzzleException $e) {
        return $e->getMessage();
    }
}