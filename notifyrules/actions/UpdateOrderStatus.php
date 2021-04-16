<?php namespace Codecycler\NotifyShopaholic\NotifyRules\Actions;

use RainLab\Notify\Classes\ActionBase;
use Lovata\OrdersShopaholic\Models\Order;
use Lovata\OrdersShopaholic\Models\Status;

class UpdateOrderStatus extends ActionBase
{
    public function actionDetails()
    {
        return [
            'name' => 'Update order status',
            'description' => 'Updates an order status for the given order',
            'icon' => 'icon-bars',
        ];
    }

    public function triggerAction($params)
    {
        $sOrderNumber = $params['order_number'];

        $obOrder = Order::getByNumber($sOrderNumber)->first();

        if ($obOrder->status_id !== $this->host->status) {
            $obOrder->status_id = $this->host->status;

            $obOrder->save();
        }
    }

    public function defineFormFields()
    {
        return 'fields.yaml';
    }

    public function getStatusOptions()
    {
        return Status::all()
            ->pluck('name', 'id')
            ->toArray();
    }
}
