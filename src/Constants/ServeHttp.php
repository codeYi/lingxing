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

    //查询亚马逊Listing
    const QUERY_LISTING = '/erp/sc/data/mws/listing';

    //批量分配Listing负责人
    const UPDATE_LISTING_PRINCIPAL = '/listing/listing/open/api/asin/updatePrincipal';

    //批量添加/编辑Listing配对
    const UPDATE_LISTING_MATCH = '/erp/sc/storage/product/link';

    //批量修改Listing价格
    const UPDATE_LISTING_PRICE = '/erp/sc/listing/ProductPricing/pricingSubmit';

    //批量获取Listing费用
    const QUERY_LISTING_PRICES = '/listing/listing/open/api/listing/getPrices';

    //查询Listing标记标签列表
    const QUERY_LISTING_TAG_LABEL = '/basicOpen/listingManage/queryListingRelationTagList';

    //查询Listing标签列表
    const QUERY_LISTING_TAG = '/basicOpen/globalTag/listing/page/list';

    //添加Listing标签
    const CREATE_LISTING_LABEL = '/basicOpen/globalTag/listing/addTag';

    //删除Listing标签
    const DELETE_LISTING_LABEL = '/basicOpen/globalTag/listing/removeTag';

    //FBA费差异-异常订单-订单
    const  QUERY_DIFFERENCE_FEE = '/basicOpen/openapi/sale/fbaFeeDifference/order/list';

    //FBA费差异-异常订单-MSKU
    const  QUERY_DIFFERENCE_MSKU = '/basicOpen/openapi/sale/fbaFeeDifference/msku/list';

    //查询Listing操作日志列表
    const  QUERY_LISTING_LOGS = '/basicOpen/listingManage/listingOperateLog/pageList';

    //修改B2B价格
    const  UPDATE_B2B_PRICE = '/basicOpen/b2bPrice/modifyPrice';

    //查询亚马逊自发货订单列表
    const  QUERY_ROUTING_ORDER = '/erp/sc/routing/order/Order/getOrderList';

    //查询亚马逊自发货订单详情
    const  QUERY_ROUTING_ORDER_DETAIL = '/erp/sc/routing/order/Order/getOrderDetail';

    //亚马逊订单提交标发
    const  UPDATE_ORDER_SUBMIT = '/pb/mp/order/submitFulfillment';

    //获取亚马逊标发结果
    const  QUERY_FILL_RESULT = '/pb/mp/order/getFulfillmentResult';

    //查询促销活动列表-优惠券
    const  QUERY_ACTIVITIES_COUPON = '/basicOpen/promotionalActivities/coupon/list';

    //查询促销活动列表-秒杀
    const  QUERY_ACTIVITIES_SEC_KILL = '/basicOpen/promotionalActivities/secKill/list';

    //查询促销活动列表-管理促销
    const  QUERY_ACTIVITIES_MANAGE_LIST = '/basicOpen/promotionalActivities/manage/list';

    //查询促销活动列表-会员折扣
    const  QUERY_ACTIVITIES_DISCOUNT = '/basicOpen/promotionalActivities/vipDiscount/list';

    //查询商品折扣列表
    const  QUERY_DISCOUNT = '/basicOpen/promotion/listingList';


    #==================商品信息===================

    //创建UPC编码
    const CREATE_UPC = '/listing/publish/api/upc/addCommodityCode';

    //获取upc编码列表
    const QUERY_UPC_LIST = '/listing/publish/api/upc/upcList';

    //查询本地产品列表
    const QUERY_PRODUCT_LIST = '/erp/sc/routing/data/local_inventory/productList';

    //查询本地产品详情
    const QUERY_PRODUCT_INFO = '/erp/sc/routing/data/local_inventory/productInfo';

    //批量查询产品详情
    const QUERY_PRODUCT_INFO_BATCH = '/erp/sc/routing/data/local_inventory/batchGetProductInfo';

    //添加/编辑本地产品
    const UPDATE_PRODUCT = '/erp/sc/routing/storage/product/set';

    //查询产品属性列表
    const QUERY_PRODUCT_ATTRIBUTE = '/erp/sc/routing/storage/attribute/attributeList';

    //添加 / 编辑产品属性
    const UPDATE_PRODUCT_ATTRIBUTE = '/erp/sc/routing/storage/attribute/set';

    //查询多属性产品列表
    const QUERY_MULTI_ATTRIBUTE_PRODUCT = '/erp/sc/routing/storage/spu/spuList';

    //查询多属性产品详情
    const QUERY_MULTI_ATTRIBUTE_PRODUCT_DETAIL = '/erp/sc/routing/storage/spu/info';

    //添加/编辑多属性产品
    const UPDATE_MULTI_ATTRIBUTE_PRODUCT_DETAIL = '/erp/sc/routing/storage/spu/set';

    //查询捆绑产品关系列表
    const QUERY_BUNDLED_PRODUCT = '/erp/sc/routing/data/local_inventory/bundledProductList';

    //添加 / 编辑捆绑产品
    const UPDATE_BUNDLED_PRODUCT = '/erp/sc/routing/storage/product/setBundled';

    //查询产品辅料列表
    const QUERY_PRODUCT_AUX = '/erp/sc/routing/data/local_inventory/productAuxList';

    //添加、编辑辅料
    const UPDATE_PRODUCT_AUX = '/erp/sc/routing/storage/product/setAux';

    //查询产品品牌列表
    const QUERY_PRODUCT_BRAND = '/erp/sc/data/local_inventory/brand';

    //添加/编辑产品品牌
    const UPDATE_PRODUCT_BRAND = '/erp/sc/storage/brand/set';

    //查询产品分类列表
    const QUERY_PRODUCT_CATEGORY = '/erp/sc/routing/data/local_inventory/category';

    //添加/编辑产品分类
    const UPDATE_PRODUCT_CATEGORY = '/erp/sc/routing/storage/category/set';

    //上传本地产品图片
    const UPLOAD_PRODUCT_URL = '/erp/sc/routing/storage/product/uploadPictures';

    //查询产品标签
    const QUERY_PRODUCT_LABEL = '/label/operation/v1/label/product/list';


    //创建产品标签
    const CREATE_PRODUCT_LABEL = '/label/operation/v1/label/product/create';


    //标记产品标签
    const MARK_PRODUCT_LABEL = '/label/operation/v1/label/product/mark';

    //删除产品标签
    const DELETE_PRODUCT_LABEL = '/label/operation/v1/label/product/unmarkLabel';

    #========================仓库==========================
    //查询FBA库存列表
    const QUERY_FBA_STOCK = '/erp/sc/routing/fba/fbaStock/fbaList';

    //查询仓库库存明细
    const QUERY_INVENTORY_DETAIL = '/erp/sc/routing/data/local_inventory/inventoryDetails';

    //查询仓位库存明细
    const QUERY_INVENTORY_LOCATION_DETAIL = '/erp/sc/routing/data/local_inventory/inventoryBinDetails';

    //查询批次明细
    const QUERY_INVENTORY_BATCH_DETAIL = '/erp/sc/routing/data/local_inventory/getBatchDetailList';

    //查询批次流水
    const QUERY_INVENTORY_BATCH = '/erp/sc/routing/data/local_inventory/getBatchStatementList';

    //查询库存流水（旧）
    const QUERY_INVENTORY_LOG_OLD = '/erp/sc/routing/data/local_inventory/wareHouseStatement';

    //查询库存流水（新）
    const QUERY_INVENTORY_LOG_NEW = '/erp/sc/routing/inventoryLog/WareHouseInventory/wareHouseCenterStatement';

    //查询仓位流水
    const QUERY_LOCATION_LOG = '/erp/sc/routing/data/local_inventory/wareHouseBinStatement';

    #=======================广告=======================
    //查询广告账号列表
    const QUERY_ADVERTISING_ACCOUNT = '/basicOpen/baseData/account/list';

    //广告组合
    const QUERY_ADVERTISING_GROUP = '/pb/openapi/newad/portfolios';

    //SP广告组
    const QUERY_ADVERTISING_GROUP_SP = '/pb/openapi/newad/spAdGroups';

    //SP广告活动
    const QUERY_ADVERTISING_ACTIVITY_SP = '/pb/openapi/newad/spCampaigns';

    //SP关键词
    const QUERY_ADVERTISING_KEYWORDS_SP = '/pb/openapi/newad/spKeywords';

    //SP商品广告
    const QUERY_ADVERTISING_PRODUCT = '/pb/openapi/newad/spProductAds';

    //SP商品定位
    const QUERY_LOCATION_SP = '/pb/openapi/newad/spTargets';

    //SP否定投放
    const QUERY_PUT_IN_SP = '/pb/openapi/newad/spNegativeTargetsOrKeywords';

    //SB广告组
    const QUERY_ADVERTISING_GROUP_SB = '/pb/openapi/newad/hsaAdGroups';

    //SB广告活动
    const QUERY_ADVERTISING_ACTIVITY_SB = '/pb/openapi/newad/hsaCampaigns';

    //SB否定关键词
    const QUERY_ADVERTISING_KEYWORDS_SB = '/pb/openapi/newad/hsaNegativeKeywords';

    //SB否定商品投放
    const QUERY_ADVERTISING_PRODUCT_SB = '/pb/openapi/newad/hsaNegativeTargets';

    //SB、SBV广告的投放基础数据
    const QUERY_ADVERTISING_BASE_SB = '/pb/openapi/newad/sbTargeting';

    //SD广告组
    const QUERY_ADVERTISING_GROUP_SD = '/pb/openapi/newad/sdAdGroups';

    //SD广告活动
    const QUERY_ADVERTISING_ACTIVITY_SD = '/pb/openapi/newad/sdCampaigns';

    //SD是否商品定位
    const QUERY_LOCATION_PRODUCT_SD = '/pb/openapi/newad/sdNegativeTargets';

    //SD商品广告
    const QUERY_ADVERTISING_PRODUCT_SD = '/pb/openapi/newad/sdProductAds';

    //SD商品定位
    const QUERY_HAS_LOCATION_PRODUCT_SD = '/pb/openapi/newad/sdTargets';

    //SP广告组报表
    const QUERY_REPORTS_GROUP_SP = '/pb/openapi/newad/spAdGroupReports';

    //SP广告活动报表
    const QUERY_REPORTS_ACTIVITY_SP = '/pb/openapi/newad/spCampaignReports';

    //SP关键词报表
    const QUERY_REPORTS_KEYWORDS_SP = '/pb/openapi/newad/spKeywordReports';

    //SP广告商品报表
    const QUERY_REPORTS_PRODUCT_SP = '/pb/openapi/newad/spProductAdReports';

    //SP商品定位报表
    const QUERY_REPORTS_LOCATION_PRODUCT_SP = '/pb/openapi/newad/spTargetReports';

    //SP广告位报告
    const QUERY_REPORTS_LOCATION_SP = '/pb/openapi/newad/campaignPlacementReports';

    //SP已购买商品报表
    const QUERY_REPORTS_BOOKED_SP = '/pb/openapi/newad/asinReports';

    //SP用户搜索词报表
    const QUERY_REPORTS_SEARCH_KEYWORDS_SP = '/pb/openapi/newad/queryWordReports';

    //SB广告组报表
    const QUERY_REPORTS_GROUP_SB = '/pb/openapi/newad/hsaAdGroupReports';

    //SB广告活动报表
    const QUERY_REPORTS_ACTIVITY_SB = '/pb/openapi/newad/hsaCampaignReports';

    //SB关键词-广告位报告
    const QUERY_REPORTS_KEYWORDS_LOCATION_SB = '/pb/openapi/newad/listHsaKeywordPlacementReport';

    //SB广告的投放报告
    const QUERY_REPORTS_PUT_IN_SB = '/pb/openapi/newad/listHsaTargetingReport';

    //SB广告位报告
    const QUERY_REPORTS_LOCATION_SB = '/pb/openapi/newad/hsaCampaignPlacementReports';

    //SB用户搜索词报表
    const QUERY_REPORTS_KEYWORDS_SB = '/pb/openapi/newad/hsaQueryWordReports';

    //SB广告归因于广告的购买报告
    const QUERY_REPORTS_PURCHASE_SB = '/pb/openapi/newad/hsaPurchasedAsinReports';

    //SD广告组报表
    const QUERY_REPORTS_GROUP_SD = '/pb/openapi/newad/sdAdGroupReports';

    //SD广告活动报表
    const QUERY_REPORTS_ACTIVITY_SD = '/pb/openapi/newad/sdCampaignReports';

    //SD广告商品报表
    const QUERY_REPORTS_PRODUCT_SD = '/pb/openapi/newad/sdProductAdReports';

    //SD商品定位报表
    const QUERY_REPORTS_LOCATION_PRODUCT_SD = '/pb/openapi/newad/sdTargetReports';

    //SD已购买商品报表
    const QUERY_REPORTS_BOOKED_SD = '/pb/openapi/newad/sdAsinReports';

    //SD匹配的目标报表
    const QUERY_REPORTS_MATCH_SD = '/pb/openapi/newad/sdMatchTargetReports';

    //查询DSP报告列表-订单
    const QUERY_REPORTS_ORDER_LIST = '/basicOpen/dspReport/order/list';

    //ABA搜索词报告-按周维度
    const EXPORT_ABA_REPORT = '/pb/openapi/newad/abaReport';

    //操作日志（新）
    const QUERY_LOG_OPERATE = '/pb/openapi/newad/apiLogStandard';

    #===================财务=====================
    //查询回款记录
    const QUERY_FUND_TRANSFERS = '/erp/sc/data/mws/fundTransfers';
    //查询费用类型
    const QUERY_FUND_TYPE = '/bd/fee/management/open/feeManagement/otherFee/type';
    //查询费用明细列表
    const QUERY_FUND_DETAIL = '/bd/fee/management/open/feeManagement/otherFee/list';
    //创建费用单
    const CREATE_FUND = '/bd/fee/management/open/feeManagement/otherFee/create';
    //编辑费用单
    const EDIT_FUND = '/bd/fee/management/open/feeManagement/otherFee/edit';
    //作废费用单
    const DISCARD_FUND = '/bd/fee/management/open/feeManagement/otherFee/discard';
    //删除费用单
    const DELETE_FUND = '/bd/fee/management/open/feeManagement/otherFee/delete';
    //查询利润报表-MSKU
    const QUERY_PROFIT_MSKU = '/bd/profit/report/open/report/msku/list';
    //查询利润报表-ASIN
    const QUERY_PROFIT_ASIN = '/bd/profit/report/open/report/asin/list';
    //查询利润报表-父ASIN
    const QUERY_PROFIT_PARENT_ASIN = '/bd/profit/report/open/report/parent/asin/list';
    //查询利润报表-SKU
    const QUERY_PROFIT_SKU = '/bd/profit/report/open/report/sku/list';
    //查询利润报表-店铺
    const QUERY_PROFIT_SHOP = '/bd/profit/report/open/report/seller/list';
    //查询利润报表-店铺汇总
    const QUERY_PROFIT_SHOP_SUM = '/bd/profit/report/open/report/seller/summary/list';
    //查询利润报表-订单
    const QUERY_PROFIT_ORDER = '/bd/profit/report/open/report/order/list';
    //查询利润报表（旧）-MSKU
    const QUERY_PROFIT_OLD_MSKU = '/erp/sc/routing/finance/ProfitState/profitMsku';
    //查询利润报表（旧）-ASIN（父级）
    const QUERY_PROFIT_OLD_ASIN = '/erp/sc/routing/finance/ProfitState/profitAsin';
    //查询利润报表（旧）-ASIN（子级）
    const QUERY_PROFIT_OLD_CHILD_ASIN = '/erp/sc/routing/finance/ProfitState/profitAsinSon';
    //查询利润报表（旧）-结算明细
    const QUERY_PROFIT_OLD_SETTLEMENT = '/erp/sc/routing/finance/ProfitState/profitSettlement';
    //查询结算中心 - 结算汇总
    const QUERY_SETTLEMENT_CENTER = '/bd/sp/api/open/settlement/summary/list';
    //查询结算中心 - 交易明细
    const QUERY_SETTLEMENT_CENTER_DETAIL = '/bd/sp/api/open/settlement/transaction/detail/list';
    //查询亚马逊库存分类账detail数据
    const QUERY_AMAZON_INVENTORY = '/cost/center/ods/detail/query';
    //查询亚马逊库存分类账summary数据
    const QUERY_AMAZON_INVENTORY_SUMMARY = '/cost/center/ods/summary/query';
    //查询发货结算报告
    const QUERY_DELIVERY_SETTLEMENT = '/cost/center/api/settlement/report';
    //查询settlement下载URL
    const QUERY_SETTLEMENT_DOWNLOAD_URL = '/bd/sp/api/open/settlement/export/url/get';
    //查询FBA成本计价流水
    const QUERY_FBA_COST = '/cost/center/api/cost/stream';
    //查询广告发票列表
    const QUERY_AD_INVOICE = '/bd/profit/report/open/report/ads/invoice/list';
    //查询广告发票活动列表
    const QUERY_AD_INVOICE_ACTIVITY = '/bd/profit/report/open/report/ads/invoice/campaign/list';
    //查询广告发票基本信息
    const QUERY_AD_INVOICE_BASE = '/bd/profit/report/open/report/ads/invoice/detail';
    //立即重算-利润报表数据
    const QUERY_PROFIT_RECALCULATE = '/bd/profit/report/open/report/settle/compute/manual';
    //查询请款单列表
    const QUERY_BILLING_LIST = '/basicOpen/finance/requestFunds/order/list';
    //查询请款池 - 贷款现结
    const QUERY_BILLING_POOL = '/basicOpen/finance/requestFundsPool/purchase/list';
    //查询请款池 - 贷款月结
    const QUERY_BILLING_POOL_MONTH = '/basicOpen/finance/requestFundsPool/inbound/list';
    //查询请款池 - 贷款预付款
    const QUERY_BILLING_POOL_PREPAYMENT = '/basicOpen/finance/requestFundsPool/prepay/list';
    //查询请款池-物流请款
    const QUERY_BILLING_POOL_LOGISTICS = '/basicOpen/finance/requestFundsPool/logistics/list';
    //查询请款池-其他应付款
    const QUERY_BILLING_POOL_OTHER = '/basicOpen/finance/requestFundsPool/customFee/list';

    //采购订单
    const QUERY_PURCHASE_ORDER = '/erp/sc/routing/data/local_inventory/purchaseOrderList';
}