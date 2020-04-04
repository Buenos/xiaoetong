<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: DeliveryRequest.php
 * Author: wangguosheng
 * Date: 2020/4/4
 * Time: 1:39 下午
 */

namespace xiaoetong\order;


class DeliveryRequest
{
    /**
     * @var int 付费类型, 2-单品，3-产品包
     */
    public $payment_type;
    /**
     * @var int 资源类型
     */
    public $resource_type;
    /**
     * @var string 单品ID,当payment_type=2时，必填
     */
    public $resource_id;
    /**
     * @var string 产品包ID, 当payment_type=3时，必填
     */
    public $product_id;
    /**
     * @var string 用户ID
     */
    public $user_id;
    /**
     * @var string 外部订单号
     */
    public $out_order_id;
    /**
     * @var int 支付渠道，默认是0, 0-线上微信，2-线上支付宝，1-未指定方式
     */
    public $pay_way;
    /**
     * @var string 渠道ID
     */
    public $channel_id;
    /**
     * @var string 渠道来源
     */
    public $channel_info;
    /**
     * @var string 有效期 秒数，超级会员订单：必传，详情见备注
     */
    public $period;
    /**
     * @var string 买会员的开始时间,2019-02-20 15:15:00，超级会员订单：必传
     */
    public $period_time;
    /**
     * @var string 用户设备信息
     */
    public $agent;
}