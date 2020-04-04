<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: AvailableProductRequest.php
 * Author: wangguosheng
 * Date: 2020/4/4
 * Time: 1:08 下午
 */

namespace xiaoetong\subscribe;


class AvailableProductRequest
{
    /**
     * @var string 资源id
     */
    public $product_id;

    /**
     * @var int 付费类型：2-单笔、3-付费产品包、\
     * 4-团购、5-单笔的购买赠送、6-产品包的购买赠送、\
     * 7-问答提问、8-问答偷听、11-付费活动报名、12-打赏类型、\
     * 13-拼团单个资源、14-拼团产品包、15-超级会员
     */
    public $payment_type;
}