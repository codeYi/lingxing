<?php

namespace CodeYi\Lingxing\Constants;

interface ServeHttp
{
    /**
     * 基础数据
     */

    //获取亚马逊市场列表
    const QUERY_ALL_MARKETPLACE = '/erp/sc/data/seller/allMarketplace';

    //查询亚马逊国家下地区列表
    const QUERY_WORLD_STATE = '/erp/sc/data/worldState/lists';

    //查询亚马逊店铺列表
    const QUERY_SELLER = '/erp/sc/data/seller/lists';

    //批量修改店铺名称
    const UPDATE_BATCH_SELLER = '/erp/sc/data/seller/batchEditSellerName';

    //查询ERP用户信息列表
    const QUERY_ACCOUNT_LIST = '/erp/sc/data/account/lists';

    //查询汇率
    const QUERY_CURRENT = '/erp/sc/routing/finance/currency/currencyMonth';

    //修改我的汇率
    const UPDATE_CURRENT = '/basicOpen/settings/exchangeRate/update';

    //下载附件
    const EXPORT_FILE = '/erp/sc/routing/common/file/download';

    /**
     * 销售
     */

    //查询亚马逊订单列表
    const QUERY_AWS_ORDER = '/erp/sc/data/mws/orders';

    //查询亚马逊订单详情
    const QUERY_AWS_ORDER_DETAIL = '/erp/sc/data/mws/orderDetail';

    //查询亚马逊多渠道订单列表
    const QUERY_MULTI_ORDER = '/order/amzod/api/orderList';

    //查询亚马逊多渠道订单详情v2-商品信息
    const QUERY_MULTI_ORDER_DETAIL = '/order/amzod/api/orderDetails/productInformation';

    //查询亚马逊多渠道订单详情v2-物流信息
    const QUERY_MULTI_ORDER_DETAIL_LOGISTICS = '/order/amzod/api/orderDetails/logisticsInformation';

    //查询亚马逊多渠道订单详情v2-退货换货信息
    const QUERY_MULTI_ORDER_DETAIL_RETURN = '/order/amzod/api/orderDetails/logisticsInformation';

    //创建多渠道订单
    const CREATE_MULTI_ORDER = '/order/amzod/api/createOrder';

    //查询售后订单列表
    const QUERY_AFTER_ORDER = '/erp/sc/routing/amzod/order/afterSaleList';

}