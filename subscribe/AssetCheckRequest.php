<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: AssetCheckRequest.php
 * Author: wangguosheng
 * Date: 2020/4/4
 * Time: 1:19 下午
 */

namespace xiaoetong\subscribe;


class AssetCheckRequest
{
    /**
     * @var string 资产类型：goods：产品包商品
     */
    public $asset_type;
    /**
     * @var string 商品id
     */
    public $goods_id;
}