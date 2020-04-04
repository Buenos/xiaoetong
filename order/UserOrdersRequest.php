<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: UserOrdersRequest.php
 * Author: wangguosheng
 * Date: 2020/4/3
 * Time: 6:00 下午
 */

namespace xiaoetong\order;


class UserOrdersRequest
{
    /**
     * @var string 订单id
     */
    public $order_id;

    /**
     * @var string 资源id

     */
    public $product_id;

    /**
     * @var string 订单创建开始时间，例如：2019-08-01 12:00:00 格式
     */
    public $begin_time;

    /**
     * @var string 订单创建结束时间，例如：2019-08-01 12:00:00 格式
     */
    public $end_time;

    /**
     * @var int 订单状态：0-未支付 1-支付成功 2-支付失败 6-订单过期 10-退款成功
     */
    public $order_state;

    /**
     * @var int 付费类型：2-单笔、3-付费产品包、4-团购、5-单笔的购买赠送、\
     * 6-产品包的购买赠送、7-问答提问、8-问答偷听、11-付费活动报名、12-打赏类型、\
     * 13-拼团单个资源、14-拼团产品包、15-超级会员
     */
    public $payment_type;

    /**
     * @var int 资源类型：0-无（不通过资源的购买入口）、\
     * 1-图文、2-音频、3-视频、4-直播、5-活动报名、6-专栏/会员、\
     * 7-社群、8-大专栏、20-电子书、21-实物商品、\
     * 23-超级会员 25-训练营 29-面授课
     */
    public $resource_type;

    /**
     * @var int 购买时使用的客户端类型，0-公众号 1-小程序 10-开放API，不填查全部类型
     */
    public $client_type;

    /**
     * @var int 当前页数，从1开始，默认为1
     */
    public $page_index;

    /**
     * @var int 每页个数，最大支持50,默认取10条
     */
    public $page_size;

    /**
     * @var string 排序方式，默认为created_at:desc
     */
    public $order_by;
}