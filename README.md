# oc-notifyshopaholic-plugin
This plugin can be used for automating Shopaholic using the `RainLab.Notify` plugin.

## Installation
You can easily install this plugin by requiring it as a dependency in your composer project. Just run `composer require codecycler/oc-notifyshopaholic-plugin` or manually add it to your `composer.json` file to install this plugin.

## Events
### OrderCreated
Binded to `OrderProcessor::EVENT_ORDER_CREATED`

### OrderUpdated
Binded to `Codecycler\NotifyShopaholic\Classes\Events\ExtendOrderModel::EVENT_ORDER_UPDATED` which listens to the `afterUpdate` event for the `Order` model.

## Roadmap
More events, conditions and actions will be developed when needed by our projects.

## Contribution
Please feel free to contribute by creating a PR and submitting it to the **develop** branch.

## License
&copy; 2021, [Codecycler](https://codecycler.com) under [GNU GPL v3](https://opensource.org/licenses/GPL-3.0). <br />

<i>This plugin is sponsored by [Codecycler](https://codecycler.com)</i>