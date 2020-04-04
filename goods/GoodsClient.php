<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: GoodsClient.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 5:25 下午
 */

namespace xiaoetong\goods;

use xiaoetong\BaseClient;
use xiaoetong\RequestObj;


class GoodsClient extends BaseClient
{
    /**
     * 获取资源详情
     * @param DetailRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function goodDetail(DetailRequest $request)
    {
        if (empty($request->goods_id)) {
            throw new \Exception("goods_id 未填写");
        }
        if (empty($request->goods_type)) {
            throw new \Exception("goods_type 未填写");
        }
        $api = 'https://api.xiaoe-tech.com/xe.goods.detail.get/3.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token = $access_token;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }

    /**
     * 拉取专栏的资源列表
     * @param RelationRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function goodRelation(RelationRequest $request)
    {
        if (empty($request->goods_id)) {
            throw new \Exception("goods_id 为空");
        }
        if (empty($request->goods_type)) {
            throw new \Exception("goods_type 为空");
        }
        if (empty($request->page_size)) {
            throw new \Exception("page_size 为空");
        }
        if (empty($request->resource_type) || !is_array($request->resource_type)) {
            throw new \Exception("resource_type 应当为非空数组");
        }
        $api = 'https://api.xiaoe-tech.com/xe.goods.relation.get/3.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token = $access_token;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }
}