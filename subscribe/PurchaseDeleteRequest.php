<?php
/**
 * Copyright (c) 2020 Allwith Technology (Beijing) Co.,Ltd. All Rights Reserved.
 * File: PurchaseDeleteRequest.php
 * Author: wangguosheng
 * Date: 2020/4/4
 * Time: 1:27 下午
 */

namespace xiaoetong\subscribe;


class PurchaseDeleteRequest
{
    /**
     * @var string 购买方式（只支持）：2-单笔（单个商品）、3-付费产品包（专栏会员等）、15-超级会员
     */
    public $payment_type;
    /**
     * @var string 单笔购买时为必要参数，资源类型：1-图文、2-音频、3-视频、4-直播、23-超级会员
     */
    public $resource_type;
    /**
     * @var string 单笔购买时为必要参数，资源id
     */
    public $resource_id;

    /**
     * @var string 购买产品包时和超级会员时为必要参数，产品包id
     */
    public $product_id;

    /**
     * @var string 购买商品的用户id
     */
    public $user_id;
}