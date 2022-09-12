<?php
declare(strict_types=1);

/*
 * CoreShop
 *
 * This source file is available under two different licenses:
 *  - GNU General Public License version 3 (GPLv3)
 *  - CoreShop Commercial License (CCL)
 * Full copyright and license information is available in
 * LICENSE.md which is distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GPLv3 and CCL
 *
 */

namespace CoreShop\Component\Order\CartItem\Rule\Condition;

use CoreShop\Component\Order\Model\CartPriceRuleInterface;
use CoreShop\Component\Order\Model\CartPriceRuleVoucherCodeInterface;
use CoreShop\Component\Order\Model\OrderItemInterface;

class AmountConditionChecker extends AbstractConditionChecker
{
    public function isValidForOrderItem(OrderItemInterface $orderItem, CartPriceRuleInterface $cartPriceRule, ?CartPriceRuleVoucherCodeInterface $voucher, array $configuration): bool
    {
        if ($configuration['minAmount'] > 0) {
            $minAmount = $configuration['minAmount'];

            $cartTotal = $orderItem->getSubtotal();

            if ($minAmount > $cartTotal) {
                return false;
            }
        }

        if ($configuration['maxAmount'] > 0) {
            $maxAmount = $configuration['maxAmount'];

            $cartTotal = $orderItem->getSubtotal();

            if ($maxAmount < $cartTotal) {
                return false;
            }
        }

        return true;
    }
}
