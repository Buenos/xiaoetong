<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: RelationRequest.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 5:42 下午
 */

namespace xiaoetong\goods;


class RelationRequest
{
    /**
     * @var string 专栏id
     */
    public $goods_id;
    /**
     * @var int 类型;会员-5，专栏-6，大专栏-8
     */
    public $goods_type;
    /**
     * @var string 上一页数据最后一条数据的resource_id，\
     * 分页时使用，获取第一页数据时该参数为空
     */
    public $last_id;
    /**
     * @var int 页容量：每次获取资源条数
     */
    public $page_size;
    /**
     * @var array 要获取的资源类型，\
     * 如果只想获取某一种单独资源，则传相应的类型，\
     * 例如，传2只获取音频列表; \
     * 图文-1，音频-2，视频-3，直播-4，专栏-6，电子书-20
     */
    public $resource_type;
}