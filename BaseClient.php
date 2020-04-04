<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: Client.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 4:12 下午
 */

namespace xiaoetong;


use http\QueryString;

class BaseClient
{
    protected $app_id;
    protected $client_id;
    protected $secret_key;
    protected $grant_type;

    private $access_token;

    public function __construct($app_id, $client_id, $secret_key, $grant_type)
    {
        $this->app_id = $app_id;
        $this->client_id = $client_id;
        $this->secret_key = $secret_key;
        $this->grant_type = $grant_type;
    }

    /**
     * 获取access_token
     * @param $app_id
     * @param $client_id
     * @param $secret_key
     * @param $grant_type
     * @return mixed
     * @throws \Exception
     */
    public function _getAccessToken($app_id, $client_id, $secret_key, $grant_type)
    {
        $url = 'https://api.xiaoe-tech.com/token?';
        $url .= "app_id={$app_id}";
        $url .= "client_id={$client_id}";
        $url .= "secret_key={$secret_key}";
        $url .= "grant_type={$grant_type}";
        $response = $this->httpGet($url);
        return $response->data->access_token;
    }

    /**
     * 发送http get 请求，基于curl实现
     * @param $api
     * @return mixed
     * @throws \Exception
     */
    public function httpGet($api)
    {
        $curl = curl_init($api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        $response = curl_exec($curl);
        $objResp  = json_decode($response);
        if ($objResp->code !== 0) {
            // 请求失败，抛出异常
            throw new \Exception($objResp->msg, $objResp->code);
        }
        return $objResp;
    }

    /**
     * 发送http post请求， 基于curl实现
     * @param $api
     * @param $json
     * @return bool|string
     * @throws \Exception
     */
    public function httpPost($api, $json)
    {
        $curl = curl_init($api);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1);
        curl_setopt($curl, CURLOPT_POST, 1);
        curl_setopt($curl, CURLOPT_HTTPHEADER, array("Content-Type:application/json"));
        curl_setopt($curl, CURLOPT_POSTFIELDS, $json);
        $response = curl_exec($curl);
        $objResp = json_decode($response);
        if ($objResp->code !== 0) {
            // 请求失败，抛出异常
            throw new \Exception($objResp->msg, $objResp->code);
        }
        return $objResp;
    }

    /**
     * 获取access_token
     * @return mixed
     * @throws \Exception
     */
    public function getAccessToken()
    {
        if ($this->access_token) {
            return $this->access_token;
        }
        $this->access_token = $this->_getAccessToken($this->app_id, $this->client_id, $this->secret_key, $this->grant_type);
        return $this->access_token;
    }
}