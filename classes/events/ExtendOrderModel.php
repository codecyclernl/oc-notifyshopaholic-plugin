<?php namespace Codecycler\NotifyShopaholic\Classes\Events;

use Event;
use Lovata\OrdersShopaholic\Models\Order;

class ExtendOrderModel
{
    const EVENT_ORDER_UPDATED = 'shopaholic.order.updated';

    public function subscribe()
    {
        Order::extend(function ($obOrder) {
            $obOrder->bindEvent('model.afterUpdate', function () use ($obOrder) {
                Event::fire(self::EVENT_ORDER_UPDATED, $obOrder);
            });
        });
    }
}