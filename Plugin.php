<?php namespace Codecycler\NotifyShopaholic;

use Event;
use Backend;
use System\Classes\PluginBase;
use RainLab\Notify\Classes\Notifier;
use Lovata\OrdersShopaholic\Classes\Processor\OrderProcessor;
use Codecycler\NotifyShopaholic\NotifyRules\Events\OrderCreated;
use Codecycler\NotifyShopaholic\NotifyRules\Events\OrderUpdated;
use Codecycler\NotifyShopaholic\Classes\Events\ExtendOrderModel;
use Codecycler\NotifyShopaholic\NotifyRules\Conditions\OrderStatus;

/**
 * NotifyShopaholic Plugin Information File
 */
class Plugin extends PluginBase
{
    public $require = [
        'Lovata.Shopaholic',
        'Lovata.OrdersShopaholic',
    ];

    /**
     * Returns information about this plugin.
     *
     * @return array
     */
    public function pluginDetails()
    {
        return [
            'name'        => 'codecycler.notifyshopaholic::lang.plugin.name',
            'description' => 'codecycler.notifyshopaholic::lang.plugin.description',
            'author'      => 'Codecycler',
            'icon'        => 'icon-bell-o'
        ];
    }

    public function boot()
    {
        Event::subscribe(ExtendOrderModel::class);
    }

    public function register()
    {
        $this->bindNotificationEvents();
    }

    public function registerNotificationRules()
    {
        return [
            'groups' => [
                'shopaholic' => [
                    'label' => 'Shopaholic',
                    'icon' => 'icon-shopping-cart'
                ],
            ],
            'events' => [
                OrderCreated::class,
                OrderUpdated::class,
            ],
            'actions' => [],
            'conditions' => [
                OrderStatus::class,
            ],
        ];
    }

    public function bindNotificationEvents()
    {
        if (! class_exists(Notifier::class)) {
            return;
        }

        Notifier::bindEvents([
            OrderProcessor::EVENT_ORDER_CREATED => OrderCreated::class,
            ExtendOrderModel::EVENT_ORDER_UPDATED => OrderUpdated::class,
        ]);
    }
}
