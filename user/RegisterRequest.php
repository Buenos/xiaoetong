<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: RegisterRequest.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 3:30 下午
 */

namespace xiaoetong\user;


class RegisterRequest
{
    /**
     * @var string 微信union_id
     */
    public $wx_union_id;

    /**
     * @var string 联系方式
     */
    public $phone;

    /**
     * @var 用户头像链接
     */
    public $avatar;

    /**
     * @var string 微信 用户昵称
     */
    public $nickname;

    /**
     * @var string 国家
     */
    public $country;

    /**
     * @var string 省份
     */
    public $province;

    /**
     * @var string 城市
     */
    public $city;

    /**
     * @var int 性别
     */
    public $gender;

}

