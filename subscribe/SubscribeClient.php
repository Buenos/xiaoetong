<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: SubscribeClient.php
 * Author: wangguosheng
 * Date: 2020/4/4
 * Time: 1:11 下午
 */

namespace xiaoetong\subscribe;


use xiaoetong\BaseClient;
use xiaoetong\RequestObj;

class SubscribeClient extends BaseClient
{
    /**
     * 查询用户是否真正购买某项资源
     * @param $user_id
     * @param AvailableProductRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function availableProduct($user_id, AvailableProductRequest $request)
    {
        if (empty($user_id)) {
            throw new \Exception("缺少 user_id");
        }
        if (empty($request->product_id)) {
            throw new \Exception("缺少 product_id");
        }
        if (empty($request->payment_type)) {
            throw new \Exception("缺少 payment_type");
        }
        $api = 'http://api.xiaoe-tech.com/xe.product.available/1.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token = $access_token;
        $obj->user_id = $user_id;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }

    /**
     * 用户是否拥有某项产品包资源权益
     * @param $user_id
     * @param AssetCheckRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function assetCheck($user_id, AssetCheckRequest $request)
    {
        if (empty($user_id)) {
            throw new \Exception("缺少 user_id");
        }
        if (empty($request->asset_type)) {
            throw new \Exception("缺少 asset_type");
        }
        if (empty($request->goods_id)) {
            throw new \Exception("缺少 goods_id");
        }
        $api = 'https://api.xiaoe-tech.com/xe.user.asset.check/1.0.0';
        $access_token = $this->getAccessToken();
        $request->access_token = $access_token;
        $request->app_id = $this->app_id;
        $request->user_id = $user_id;
        $json = json_encode($request);
        $response = $this->httpPost($api, $json);
        return $response;
    }

    /**
     * 客户平台在本地取消订阅关系的同时在小鹅通取消订阅关系，以此达到用户被取消的资源在各个平台得到同步
     * @param $user_id
     * @param PurchaseDeleteRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function purchaseDelete($user_id, PurchaseDeleteRequest $request)
    {
        if (empty($user_id)) {
            throw new \Exception("缺少 user_id");
        }
        if (empty($request->payment_type)) {
            throw new \Exception("缺少 payment_type");
        }
        if (empty($request->resource_type)) {
            throw new \Exception("缺少 resource_type");
        }
        if (empty($request->resource_id)) {
            throw new \Exception("缺少 resource_id");
        }
        if ($request->payment_type == 3 || $request->payment_type == 15) {
            if (empty($request->product_id)) {
                throw new \Exception("缺少 product_id");
            }
        }
        $api = 'https://api.xiaoe-tech.com/xe.purchase.delete/1.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token = $access_token;
        $obj->user_id = $user_id;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }
}