<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: Client.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 4:09 下午
 */

namespace xiaoetong\user;


use mysql_xdevapi\Exception;
use xiaoetong\BaseClient;
use xiaoetong\RequestObj;

class UserClient extends BaseClient
{

    /**
     * 注册新用户
     * @param RegisterRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function register(RegisterRequest $request)
    {
        $union_id = $request->wx_union_id;
        $phone = $request->phone;
        if (empty($union_id) && empty($phone)) {
            throw new \Exception("wx_union_id和phone至少有一个");
        }
        $api = 'https://api.xiaoe-tech.com/xe.user.register/1.0.0';
        $access_token = $this->getAccessToken();
        $obj = new RequestObj();
        $obj->access_token = $access_token;
        $obj->data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }

    /**
     * 更新用户信息
     * @param $user_id
     * @param UpdateRequest $request
     * @return bool|string
     * @throws \Exception
     */
    public function update($user_id, UpdateRequest $request)
    {
        if (empty($user_id)) {
            throw new \Exception("user_id为必填参数");
        }
        $obj = new RequestObj();
        $api = 'https://api.xiaoe-tech.com/xe.user.info.update/1.0.0';
        $access_token = $this->getAccessToken();
        $obj->access_token = $access_token;
        $obj->user_id = $user_id;
        $obj->data->update_data = $request;
        $json = json_encode($obj);
        $response = $this->httpPost($api, $json);
        return $response;
    }
}