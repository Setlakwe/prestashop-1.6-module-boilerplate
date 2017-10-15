<?php

require_once(__DIR__ . '/vendor/autoload.php');

/**
 * Class MyModule
 *
 * @property bool $bootstrap
 */
class MyModule extends Module
{
    /** Keys for module configuration options. */
    const OPT_TEXT_1 = 'OPT_TEXT_1';
    const OPT_TEXT_2 = 'OPT_TEXT_2';

    /**
     * MyModule constructor.
     */
    public function __construct()
    {
        $this->name = 'mymodule';
        $this->tab = 'others';
        /**
         * @TODO Choose module tab
         *
         * administration      advertising_marketing  analytics_stats    billing_invoicing
         * checkout            content_management     emailing export    front_office_features
         * i18n_localization   market_place           merchandizing      migration_tools
         * mobile              others                 payments_gateways  payment_security
         * pricing_promotion   quick_bulk_update      search_filter      seo
         * shipping_logistics  slideshows             smart_shopping     social_networks
         */
        $this->version = '1.0.0';
        $this->author = 'PrestaShop Module Developer';
        $this->need_instance = 0;
        $this->bootstrap = true;

        $this->ps_versions_compliancy = ['min' => '1.6.0.4', 'max' => _PS_VERSION_];

        parent::__construct();

        $this->displayName = $this->l('MyModule');
        $this->description = $this->l('Customisations for Silhouette.');

        // @TODO This is a good place to add any Shop::addTableAssociation(...)
    }

    /**
     * Installs module to PrestaShop.
     *
     * @return bool
     */
    public function install()
    {
        try {
            parent::install();
            $installer = new \MyModule\Module\Installer($this);
            $installer->installModule();
            return true;
        } catch (Exception $e) {
            $this->_errors[] = get_class($e) . ': ' . $e->getMessage();
            $this->uninstall();
            return false;
        }
    }

    /**
     * Uninstalls module from PrestaShop.
     *
     * @return bool
     */
    public function uninstall()
    {
        try {
            parent::uninstall();
            $installer = new \MyModule\Module\Installer($this);
            $installer->uninstallModule();
            return true;
        } catch (Exception $e) {
            $this->_errors[] = get_class($e) . ': ' . $e->getMessage();
            return false;
        }
    }

    /**
     * Redirects administrator to module configuration page.
     */
    public function getContent()
    {
        Tools::redirectAdmin($this->context->link->getAdminLink('AdminMyModuleConfiguration'));
    }

    /**
     * hookDisplayHeader
     *
     * Header of pages
     * A hook which allow you to do things in the header of each pages
     *
     * Adds JS scripts, JS variables and CSS stylesheets to the page.
     *
     * @return void
     */
    public function hookDisplayHeader()
    {
        $this->context->controller->addCSS($this->getLocalPath() . 'views/css/style.css');
        $this->context->controller->addJS([
            $this->getLocalPath() . 'views/js/front/feature1.js',
        ]);

        $jsVariables = [
            'ajax_url' => $this->context->link->getModuleLink($this->name, 'ajax'),
        ];

        $jsTranslations = [
            'TITLE_MY_ELEMENT' => $this->l('My Element Title'),
        ];

        Media::addJsDef([
            $this->name => [
                'variables'    => $jsVariables,
                'translations' => $jsTranslations,
            ],
        ]);
    }

    /**
     * hookActionAdminLanguagesControllerStatusBefore
     *
     * actionAdminLanguagesControllerStatusBefore
     * @return void
     **/
    public function hookActionAdminLanguagesControllerStatusBefore()
    {

    }

    /**
     * hookActionAdminMetaControllerUpdate_optionsBefore
     *
     * actionAdminMetaControllerUpdate_optionsBefore
     * @return void
     **/
    public function hookActionAdminMetaControllerUpdate_optionsBefore()
    {

    }

    /**
     * hookActionAdminMetaSave
     *
     * After save configuration in AdminMeta
     * @return void
     **/
    public function hookActionAdminMetaSave()
    {

    }

    /**
     * hookActionAttributeDelete
     *
     * On deleting attribute feature value
     * @return void
     **/
    public function hookActionAttributeDelete()
    {

    }

    /**
     * hookActionAttributeGroupDelete
     *
     * On deleting attribute group
     * @return void
     **/
    public function hookActionAttributeGroupDelete()
    {

    }

    /**
     * hookActionAttributeGroupSave
     *
     * On saving attribute group
     * @return void
     **/
    public function hookActionAttributeGroupSave()
    {

    }

    /**
     * hookActionAttributePostProcess
     *
     * On post-process in admin feature value
     * @return void
     **/
    public function hookActionAttributePostProcess()
    {

    }

    /**
     * hookActionAttributeSave
     *
     * On saving attribute feature value
     * @return void
     **/
    public function hookActionAttributeSave()
    {

    }

    /**
     * hookActionCarrierProcess
     *
     * Carrier Process
     * @return void
     **/
    public function hookActionCarrierProcess()
    {

    }

    /**
     * hookActionCarrierUpdate
     *
     * Carrier Update
     * This hook is called when a carrier is updated
     **/
    public function hookActionCarrierUpdate()
    {

    }

    /**
     * hookActionCartSave
     *
     * Cart creation and update
     * @return void
     **/
    public function hookActionCartSave()
    {

    }

    /**
     * hookActionCategoryAdd
     *
     * Category creation
     * @return void
     **/
    public function hookActionCategoryAdd()
    {

    }

    /**
     * hookActionCategoryDelete
     *
     * Category removal
     * @return void
     **/
    public function hookActionCategoryDelete()
    {

    }

    /**
     * hookActionCategoryUpdate
     *
     * Category modification
     * @return void
     **/
    public function hookActionCategoryUpdate()
    {

    }

    /**
     * hookActionCustomerAccountAdd
     *
     * Successful customer create account
     * Called when new customer create account successfuled
     **/
    public function hookActionCustomerAccountAdd()
    {

    }

    /**
     * hookActionFeatureDelete
     *
     * On deleting attribute feature
     *
     **/
    public function hookActionFeatureDelete()
    {

    }

    /**
     * hookActionFeatureSave
     *
     * On saving attribute feature
     * @return void
     **/
    public function hookActionFeatureSave()
    {

    }

    /**
     * hookActionFeatureValueDelete
     *
     * On deleting attribute feature value
     * @return void
     **/
    public function hookActionFeatureValueDelete()
    {

    }

    /**
     * hookActionFeatureValueSave
     *
     * On saving attribute feature value
     * @return void
     **/
    public function hookActionFeatureValueSave()
    {

    }

    /**
     * hookActionHtaccessCreate
     *
     * After htaccess creation
     * @return void
     **/
    public function hookActionHtaccessCreate()
    {

    }

    /**
     * hookActionObjectCategoryDeleteAfter
     *
     * actionObjectCategoryDeleteAfter
     * @return void
     **/
    public function hookActionObjectCategoryDeleteAfter()
    {

    }

    /**
     * hookActionObjectCategoryUpdateAfter
     *
     * actionObjectCategoryUpdateAfter
     * @return void
     **/
    public function hookActionObjectCategoryUpdateAfter()
    {

    }

    /**
     * hookActionObjectCmsDeleteAfter
     *
     * actionObjectCmsDeleteAfter
     * @return void
     **/
    public function hookActionObjectCmsDeleteAfter()
    {

    }

    /**
     * hookActionObjectCmsUpdateAfter
     *
     * actionObjectCmsUpdateAfter
     * @return void
     **/
    public function hookActionObjectCmsUpdateAfter()
    {

    }

    /**
     * hookActionObjectManufacturerDeleteAfter
     *
     * actionObjectManufacturerDeleteAfter
     * @return void
     **/
    public function hookActionObjectManufacturerDeleteAfter()
    {

    }

    /**
     * hookActionObjectManufacturerUpdateAfter
     *
     * actionObjectManufacturerUpdateAfter
     * @return void
     **/
    public function hookActionObjectManufacturerUpdateAfter()
    {

    }

    /**
     * hookActionObjectProductDeleteAfter
     *
     * actionObjectProductDeleteAfter
     * @return void
     **/
    public function hookActionObjectProductDeleteAfter()
    {

    }

    /**
     * hookActionObjectProductUpdateAfter
     *
     * actionObjectProductUpdateAfter
     * @return void
     **/
    public function hookActionObjectProductUpdateAfter()
    {

    }

    /**
     * hookActionObjectSupplierDeleteAfter
     *
     * actionObjectSupplierDeleteAfter
     * @return void
     **/
    public function hookActionObjectSupplierDeleteAfter()
    {

    }

    /**
     * hookActionObjectSupplierUpdateAfter
     *
     * actionObjectSupplierUpdateAfter
     * @return void
     **/
    public function hookActionObjectSupplierUpdateAfter()
    {

    }

    /**
     * hookActionOrderDetail
     *
     * Order Detail
     * To set the follow-up in smarty when order detail is called
     * @return void
     **/
    public function hookActionOrderDetail()
    {

    }

    /**
     * hookActionOrderReturn
     *
     * Product returned
     * @return void
     **/
    public function hookActionOrderReturn()
    {

    }

    /**
     * hookActionOrderSlipAdd
     *
     * Called when a order slip is created
     * Called when a quantity of one product change in an order.
     * @return void
     **/
    public function hookActionOrderSlipAdd()
    {

    }

    /**
     * hookActionOrderStatusPostUpdate
     *
     * Post update of order status
     * @return void
     **/
    public function hookActionOrderStatusPostUpdate()
    {

    }

    /**
     * hookActionOrderStatusUpdate
     *
     * Order's status update event
     * Launch modules when the order's status of an order change.
     * @return void
     **/
    public function hookActionOrderStatusUpdate()
    {

    }

    /**
     * hookActionPaymentCCAdd
     *
     * Payment CC added
     * @return void
     **/
    public function hookActionPaymentCCAdd()
    {

    }

    /**
     * hookActionProductAdd
     *
     * Product creation
     * @return void
     **/
    public function hookActionProductAdd()
    {

    }

    /**
     * hookActionProductAttributeDelete
     *
     * Product Attribute Deletion
     * @return void
     **/
    public function hookActionProductAttributeDelete()
    {

    }

    /**
     * hookActionProductAttributeUpdate
     *
     * Product attribute update
     * @return void
     **/
    public function hookActionProductAttributeUpdate()
    {

    }

    /**
     * hookActionProductCancel
     *
     * Product cancelled
     * This hook is called when you cancel a product in an order
     * @return void
     **/
    public function hookActionProductCancel()
    {

    }

    /**
     * hookActionProductDelete
     *
     * Product deletion
     * This hook is called when a product is deleted
     * @return void
     **/
    public function hookActionProductDelete()
    {

    }

    /**
     * hookActionProductListOverride
     *
     * Assign product list to a category
     * @return void
     **/
    public function hookActionProductListOverride()
    {

    }

    /**
     * hookActionProductOutOfStock
     *
     * Product out of stock
     * Make action while product is out of stock
     * @return void
     **/
    public function hookActionProductOutOfStock()
    {

    }

    /**
     * hookActionProductSave
     *
     * On saving products
     * @return void
     **/
    public function hookActionProductSave()
    {

    }

    /**
     * hookActionProductUpdate
     *
     * Product Update
     * @return void
     **/
    public function hookActionProductUpdate()
    {

    }

    /**
     * hookActionShopDataDuplication
     *
     * actionShopDataDuplication
     * @return void
     **/
    public function hookActionShopDataDuplication()
    {

    }

    /**
     * hookActionTaxManager
     *
     * Tax Manager Factory
     * @return void
     **/
    public function hookActionTaxManager()
    {

    }

    /**
     * hookActionUpdateQuantity
     *
     * Quantity update
     * Quantity is updated only when the customer effectively place his order.
     * @return void
     **/
    public function hookActionUpdateQuantity()
    {

    }

    /**
     * hookActionValidateOrder
     *
     * New orders
     * @return void
     **/
    public function hookActionValidateOrder()
    {

    }

    /**
     * hookActionWatermark
     *
     * Watermark
     * @return void
     **/
    public function hookActionWatermark()
    {

    }

    /**
     * hookDisplayAdminCustomers
     *
     * Display in Back-Office, tab AdminCustomers
     * Launch modules when the tab AdminCustomers is displayed on back-office.
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAdminCustomers($params)
    {
        return $this->display(__FILE__, 'views/templates/admin/hook/customers.tpl');
    }

    /**
     * hookDisplayAdminOrder
     *
     * Display in Back-Office, tab AdminOrder
     * Launch modules when the tab AdminOrder is displayed on back-office.
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAdminOrder($params)
    {
        return $this->display(__FILE__, 'views/templates/admin/hook/order.tpl');
    }

    /**
     * hookDisplayAdminStatsGraphEngine
     *
     * Graph Engines
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAdminStatsGraphEngine($params)
    {
        return $this->display(__FILE__, 'views/templates/admin/hook/statsgraphengine.tpl');
    }

    /**
     * hookDisplayAdminStatsGridEngine
     *
     * Grid Engines
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAdminStatsGridEngine($params)
    {
        return $this->display(__FILE__, 'views/templates/admin/hook/statsgridengine.tpl');
    }

    /**
     * hookDisplayAdminStatsModules
     *
     * Stats - Modules
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAdminStatsModules($params)
    {
        return $this->display(__FILE__, 'views/templates/admin/hook/statsmodules.tpl');
    }

    /**
     * hookDisplayAttributeForm
     *
     * Add fields to the form "attribute value"
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAttributeForm($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/attributeform.tpl');
    }

    /**
     * hookDisplayAttributeGroupForm
     *
     * Add fields to the form "attribute group"
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAttributeGroupForm($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/attributegroupform.tpl');
    }

    /**
     * hookDisplayAttributeGroupPostProcess
     *
     * On post-process in admin attribute group
     * @param $params
     * @return mixed
     **/
    public function hookDisplayAttributeGroupPostProcess($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/attributegrouppostprocess.tpl');
    }

    /**
     * hookDisplayBackOfficeFooter
     *
     * Administration panel footer
     * @param $params
     * @return mixed
     **/
    public function hookDisplayBackOfficeFooter($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/backofficefooter.tpl');
    }

    /**
     * hookDisplayBackOfficeHeader
     *
     * Administration panel header
     * @param $params
     * @return mixed
     **/
    public function hookDisplayBackOfficeHeader($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/backofficeheader.tpl');
    }

    /**
     * hookDisplayBackOfficeHome
     *
     * Administration panel homepage
     * @param $params
     * @return mixed
     **/
    public function hookDisplayBackOfficeHome($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/backofficehome.tpl');
    }

    /**
     * hookDisplayBackOfficeTop
     *
     * Administration panel hover the tabs
     * @param $params
     * @return mixed
     **/
    public function hookDisplayBackOfficeTop($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/backofficetop.tpl');
    }

    /**
     * hookDisplayCarrierList
     *
     * Extra carrier (module mode)
     * @param $params
     * @return mixed
     **/
    public function hookDisplayCarrierList($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/carrierlist.tpl');
    }

    /**
     * hookDisplayFeatureForm
     *
     * Add fields to the form "feature"
     * @param $params
     * @return mixed
     **/
    public function hookDisplayFeatureForm($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/featureform.tpl');
    }

    /**
     * hookDisplayFeaturePostProcess
     *
     * On post-process in admin feature
     * @param $params
     * @return mixed
     **/
    public function hookDisplayFeaturePostProcess($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/featurepostprocess.tpl');
    }

    /**
     * hookDisplayFeatureValueForm
     *
     * Add fields to the form "feature value"
     * @param $params
     * @return mixed
     **/
    public function hookDisplayFeatureValueForm($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/featurevalueform.tpl');
    }

    /**
     * hookDisplayFeatureValuePostProcess
     *
     * On post-process in admin feature value
     * @param $params
     * @return mixed
     **/
    public function hookDisplayFeatureValuePostProcess($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/featurevaluepostprocess.tpl');
    }

    /**
     * hookActionPaymentConfirmation
     *
     * Payment confirmation
     *
     **/
    public function hookActionPaymentConfirmation()
    {

    }

    /**
     * hookActionSearch
     *
     * Search
     *
     **/
    public function hookActionSearch()
    {

    }

    /**
     * hookDisplayBeforeCarrier
     *
     * Before carrier list
     * This hook is display before the carrier list on Front office
     * @param $params
     * @return mixed
     **/
    public function hookDisplayBeforeCarrier($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/beforecarrier.tpl');
    }

    /**
     * hookDisplayBeforePayment
     *
     * Redirect in order process
     * Redirect user to the module instead of displaying payment modules
     * @param $params
     * @return mixed
     **/
    public function hookDisplayBeforePayment($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/beforepayment.tpl');
    }

    /**
     * hookDisplayCustomerAccount
     *
     * Customer account page display in front office
     * Display on page account of the customer
     * @param $params
     * @return mixed
     **/
    public function hookDisplayCustomerAccount($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/customeraccount.tpl');
    }

    /**
     * hookDisplayCustomerAccountForm
     *
     * Customer account creation form
     * Display some information on the form to create a customer account
     * @param $params
     * @return mixed
     **/
    public function hookDisplayCustomerAccountForm($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/customeraccountform.tpl');
    }

    /**
     * hookActionAuthentication
     *
     * Successful customer authentication
     *
     **/
    public function hookActionAuthentication()
    {

    }

    /**
     * hookActionBeforeAuthentication
     *
     * Before Authentication
     * Before authentication
     **/
    public function hookActionBeforeAuthentication()
    {

    }

    /**
     * hookActionBeforeSubmitAccount
     *
     * actionBeforeSubmitAccount
     *
     **/
    public function hookActionBeforeSubmitAccount()
    {

    }

    /**
     * hookDisplayCustomerAccountFormTop
     *
     * Block above the form for create an account
     * @param $params
     * @return mixed
     **/
    public function hookDisplayCustomerAccountFormTop($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/customeraccountformtop.tpl');
    }

    /**
     * hookDisplayFooter
     *
     * Footer
     * Add block in footer
     * @param $params
     * @return mixed
     **/
    public function hookDisplayFooter($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/footer.tpl');
    }

    /**
     * hookDisplayFooterProduct
     *
     * Product footer
     * Add new blocks under the product description
     * @param $params
     * @return mixed
     **/
    public function hookDisplayFooterProduct($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/footerproduct.tpl');
    }


    /**
     * hookDisplayHome
     *
     * Homepage content
     * @param $params
     * @return mixed
     **/
    public function hookDisplayHome($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/home.tpl');
    }

    /**
     * hookDisplayInvoice
     *
     * Invoice
     * Add blocks to invoice (order)
     * @param $params
     * @return mixed
     **/
    public function hookDisplayInvoice($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/invoice.tpl');
    }

    /**
     * hookDisplayLeftColumn
     *
     * Left column blocks
     * @param $params
     * @return mixed
     **/
    public function hookDisplayLeftColumn($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/leftcolumn.tpl');
    }

    /**
     * hookDisplayLeftColumnProduct
     *
     * Extra actions on the product page (left column).
     * @param $params
     * @return mixed
     **/
    public function hookDisplayLeftColumnProduct($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/leftcolumnproduct.tpl');
    }

    /**
     * hookDisplayMobileTopSiteMap
     *
     * displayMobileTopSiteMap
     * @param $params
     * @return mixed
     **/
    public function hookDisplayMobileTopSiteMap($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/mobiletopsitemap.tpl');
    }

    /**
     * hookDisplayMyAccountBlock
     *
     * My account block
     * Display extra informations inside the "my account" block
     * @param $params
     * @return mixed
     **/
    public function hookDisplayMyAccountBlock($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/myaccountblock.tpl');
    }

    /**
     * hookDisplayMyAccountBlockfooter
     *
     * My account block
     * Display extra informations inside the "my account" block
     * @param $params
     * @return mixed
     **/
    public function hookDisplayMyAccountBlockfooter($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/myaccountblockfooter.tpl');
    }

    /**
     * hookDisplayOrderConfirmation
     *
     * Order confirmation page
     * Called on order confirmation page
     * @param $params
     * @return mixed
     **/
    public function hookDisplayOrderConfirmation($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/orderconfirmation.tpl');
    }

    /**
     * hookDisplayOrderDetail
     *
     * Order detail displayed
     * Displayed on order detail on front office
     * @param $params
     * @return mixed
     **/
    public function hookDisplayOrderDetail($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/orderdetail.tpl');
    }

    /**
     * hookDisplayPDFInvoice
     *
     * PDF Invoice
     * Allow the display of extra informations into the PDF invoice
     * @param $params
     * @return mixed
     **/
    public function hookDisplayPDFInvoice($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/pdfinvoice.tpl');
    }

    /**
     * hookDisplayPayment
     *
     * Payment
     * @param $params
     * @return mixed
     **/
    public function hookDisplayPayment($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/payment.tpl');
    }

    /**
     * hookDisplayPaymentReturn
     *
     * Payment return
     * @param $params
     * @return mixed
     **/
    public function hookDisplayPaymentReturn($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/paymentreturn.tpl');
    }

    /**
     * hookDisplayPaymentTop
     *
     * Top of payment page
     * @param $params
     * @return mixed
     **/
    public function hookDisplayPaymentTop($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/paymenttop.tpl');
    }

    /**
     * hookDisplayProductButtons
     *
     * Product actions
     * Put new action buttons on product page
     * @param $params
     * @return mixed
     **/
    public function hookDisplayProductButtons($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/productbuttons.tpl');
    }

    /**
     * hookDisplayProductComparison
     *
     * Extra Product Comparison
     * @param $params
     * @return mixed
     *
     **/
    public function hookDisplayProductComparison($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/productcomparison.tpl');
    }

    /**
     * hookDisplayProductTab
     *
     * Tabs on product page
     * Called on order product page tabs
     * @param $params
     * @return mixed
     **/
    public function hookDisplayProductTab($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/producttab.tpl');
    }

    /**
     * hookDisplayProductTabContent
     *
     * Content of tabs on product page
     * Called on order product page tabs
     * @param $params
     * @return mixed
     **/
    public function hookDisplayProductTabContent($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/producttabcontent.tpl');
    }

    /**
     * hookDisplayRightColumn
     *
     * Right column blocks
     *
     * @param $params
     * @return mixed
     **/
    public function hookDisplayRightColumn($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/rightcolumn.tpl');
    }

    /**
     * hookDisplayRightColumnProduct
     *
     * Extra actions on the product page (right column).
     *
     * @param $params
     * @return mixed
     **/
    public function hookDisplayRightColumnProduct($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/rightcolumnproduct.tpl');
    }

    /**
     * hookDisplayShoppingCart
     *
     * Shopping cart extra button
     * Display some specific informations
     * @param $params
     * @return mixed
     **/
    public function hookDisplayShoppingCart($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/shoppingcart.tpl');
    }

    /**
     * hookDisplayShoppingCartFooter
     *
     * Shopping cart footer
     * Display some specific informations on the shopping cart page
     * @param $params
     * @return mixed
     **/
    public function hookDisplayShoppingCartFooter($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/shoppingcartfooter.tpl');
    }

    /**
     * hookDisplayTop
     *
     * Top of pages
     * A hook which allow you to do things a the top of each pages.
     * @param $params
     * @return mixed
     **/
    public function hookDisplayTop($params)
    {
        return $this->display(__FILE__, 'views/templates/front/hook/top.tpl');
    }

}
