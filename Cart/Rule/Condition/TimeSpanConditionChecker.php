<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 */

declare(strict_types=1);

namespace CoreShop\Component\Order\Cart\Rule\Condition;

use Carbon\Carbon;
use CoreShop\Component\Order\Model\CartPriceRuleInterface;
use CoreShop\Component\Order\Model\CartPriceRuleVoucherCodeInterface;
use CoreShop\Component\Order\Model\OrderInterface;

class TimeSpanConditionChecker extends AbstractConditionChecker
{
    public function isCartRuleValid(OrderInterface $cart, CartPriceRuleInterface $cartPriceRule, ?CartPriceRuleVoucherCodeInterface $voucher, array $configuration): bool
    {
        $dateFrom = Carbon::createFromTimestamp($configuration['dateFrom'] / 1000);
        $dateTo = Carbon::createFromTimestamp($configuration['dateTo'] / 1000);

        $date = Carbon::now();

        if ($configuration['dateFrom'] > 0) {
            if ($date->getTimestamp() < $dateFrom->getTimestamp()) {
                return false;
            }
        }

        if ($configuration['dateTo'] > 0) {
            if ($date->getTimestamp() > $dateTo->getTimestamp()) {
                return false;
            }
        }

        return true;
    }
}
