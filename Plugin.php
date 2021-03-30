<?php namespace Codecycler\NotifyShopaholic;

use Backend;
use System\Classes\PluginBase;
use RainLab\Notify\Classes\Notifier;
use Lovata\OrdersShopaholic\Classes\Processor\OrderProcessor;
use Codecycler\NotifyShopaholic\NotifyRules\Events\OrderCreated;

/**
 * NotifyShopaholic Plugin Information File
 */
class Plugin extends PluginBase
{
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
            ],
            'actions' => [],
            'conditions' => [],
        ];
    }

    public function bindNotificationEvents()
    {
        if (! class_exists(Notifier::class)) {
            return;
        }

        Notifier::bindEvents([
            OrderProcessor::EVENT_ORDER_CREATED => OrderCreated::class,
        ]);
    }
}
