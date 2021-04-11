<?php namespace Codecycler\NotifyShopaholic\NotifyRules\Conditions;

use RainLab\Notify\Classes\ConditionBase;
use Lovata\OrdersShopaholic\Models\Order;
use Lovata\OrdersShopaholic\Models\Status;

class OrderStatus extends ConditionBase
{
    public function getConditionType()
    {
        return ConditionBase::TYPE_ANY;
    }

    public function getName()
    {
        return 'Order status attribute';
    }

    public function getText()
    {
        return 'Order status attribute';
    }

    public function isTrue(&$params)
    {
        if (!$order = array_get($params, 'order')) {
            throw new ApplicationException('Error evaluating the order attribute condition: the order object is not found in the condition parameters.');
        }

        return $order->status_id == $this->host->status_id;
    }

    public function getStatusIdOptions()
    {
        return Status::all()->pluck('name', 'id')->toArray();
    }

    public function defineFormFields()
    {
        return 'fields.yaml';
    }
}