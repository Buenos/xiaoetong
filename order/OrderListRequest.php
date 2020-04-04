<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: OrderListRequest.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 6:16 下午
 */

namespace xiaoetong\order;


class OrderListRequest
{
    /**
     * @var string 排序方式。格式为column:asc/desc，column可选值：created_at ，默认为created_at:desc
     */
    public $order_by;

    /**
     * @var string 页码，从0开始 ,默认为0
     */
    public $page_index;

    /**
     * @var string 每页请求条数，最大支持50,默认取10条
     */
    public $page_size;

    /**
     * @var string 用户id
     */
    public $user_id;

    /**
     * @var string 查询起始时间，unix 时间戳。与end_time的差值不能超过86400（24小时），如果为空，则默认取以end_time为准24小时前的时间戳
     */
    public $begin_time;

    /**
     * @var string 查询结束时间，unix 时间戳。与begin_time的差值不能超过86400（24小时），如果为空，则默认取当前最新时间戳
     */
    public $end_time;

    /**
     * @var int 订单状态：0-未支付 1-支付成功 2-支付失败 3-已退款(如拼团未成功等情况) 6-订单超时未支付，自动取消
     */
    public $order_state;

    /**
     * @var int 查询单笔资源时(即payment_type=2时)需传入该参数，1-图文 2-音频 3-视频 4-直播 5-活动 7-社群 不填查全部类型
     */
    public $resource_type;

    /**
     * @var int 付费类型 2-单笔 3-订阅付费产品包(专栏和会员) 4-购买赠送 5-拼团 默认取出这四种类型的所有订单
     */
    public $payment_type;

    /**
     * @var int 购买时使用的客户端类型，0-公众号 1-小程序 10-其他，不填查全部类型
     */
    public $client_type;

    /**
     * @var string 商品编码
     */
    public $goods_no;
}