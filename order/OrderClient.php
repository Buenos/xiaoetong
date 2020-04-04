<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: OrderClient.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 6:05 下午
 */

namespace xiaoetong\order;


use xiaoetong\BaseClient;
use xiaoetong\RequestObj;

class OrderClient extends BaseClient
{
    /**
     * 拉取用户下订单列表
     * @param $user_id
     * @param UserOrdersRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function userOrders($user_id, UserOrdersRequest $request) {
        if (empty($user_id)) {
            throw new \Exception("user_id 不能为空");
        }
        $api = 'http://api.xiaoe-tech.com/xe.get.user.orders/1.0.0';
        $obj = new RequestObj();
        $access_token = $this->getAccessToken();
        $obj->access_token = $access_token;
        $obj->user_id = $user_id;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }

    /**
     * 获取订单列表
     * @param OrderListRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function orderList(OrderListRequest $request) {
        $api = 'https://api.xiaoe-tech.com/xe.order.list.get/1.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token = $access_token;
        $obj->app_id = $this->app_id;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }

    /**
     * 开课接口：一步生成订购关系：合并下单和订阅两个接口
     * @param DeliveryRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function delivery(DeliveryRequest $request)
    {
        if (empty($request->user_id)) {
            throw new \Exception("user_id 不能为空");
        }
        if (empty($request->payment_type)) {
            throw new \Exception("payment_type 不能为空");
        }
        if (empty($request->resource_type)) {
            throw new \Exception("resource_type 不能为空");
        }
        if (empty($request->resource_id)) {
            throw new \Exception("resource_id 不能为空");
        }
        if (empty($request->product_id)) {
            throw new \Exception("product_id 不能为空");
        }
        $api = 'http://api.xiaoe-tech.com/xe.order.delivery/1.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token  =$access_token;
        $obj->user_id = $request->user_id;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }
}