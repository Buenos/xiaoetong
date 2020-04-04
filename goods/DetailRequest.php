<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: DetailRequest.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 5:27 下午
 */

namespace xiaoetong\goods;


class DetailRequest
{
    /**
     * @var string 商品id
     */
    public $goods_id;
    /**
     * @var int 图文-1，音频-2，视频-3，直播-4，会员-5，专栏-6，大专栏-8，电子书-20
     */
    public $goods_type;
}