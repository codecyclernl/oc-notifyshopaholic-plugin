<?php namespace Codecycler\NotifyShopaholic\NotifyRules\Events;

use RainLab\Notify\Classes\EventBase;

class OrderCreated extends EventBase
{
    public $conditions = [];

    public function eventDetails()
    {
        return [
            'name'          => e(trans('codecycler.notifyshopaholic::lang.events.order_created.name')),
            'description'   => e(trans('codecycler.notifyshopaholic::lang.events.order_created.description')),
            'group'         => e(trans('codecycler.notifyshopaholic::lang.events.order_created.group')),
        ];
    }

    public function defineParams()
    {
        return [
            'order_number' => [
                'title' => e(trans('codecycler.notifyshopaholic::lang.rules.title.order_number')),
                'label' => e(trans('codecycler.notifyshopaholic::lang.rules.label.order_number')),
            ],
            'name' => [
                'title' => e(trans('codecycler.notifyshopaholic::lang.rules.title.name')),
                'label' => e(trans('codecycler.notifyshopaholic::lang.rules.label.name')),
            ],
            'last_name' => [
                'title' => e(trans('codecycler.notifyshopaholic::lang.rules.title.last_name')),
                'label' => e(trans('codecycler.notifyshopaholic::lang.rules.label.last_name')),
            ],
            'email' => [
                'title' => e(trans('codecycler.notifyshopaholic::lang.rules.title.email')),
                'label' => e(trans('codecycler.notifyshopaholic::lang.rules.label.email')),
            ],
        ];
    }

    public static function makeParamsFromEvent(array $args, $eventName = null)
    {
        $obOrder = array_get($args, 0);

        $data = [
            'order_number'  => $obOrder->order_number,
            'name'          => $obOrder->getProperty('name'),
            'last_name'     => $obOrder->getProperty('last_name'),
            'email'         => $obOrder->getProperty('email'),
            'user'          => $obOrder->getProperty('email'),
        ];

        return $data;
    }
}
