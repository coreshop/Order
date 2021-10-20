<?php
/**
 * CoreShop.
 *
 * This source file is subject to the GNU General Public License version 3 (GPLv3)
 * For the full copyright and license information, please view the LICENSE.md and gpl-3.0.txt
 * files that are distributed with this source code.
 *
 * @copyright  Copyright (c) CoreShop GmbH (https://www.coreshop.org)
 * @license    https://www.coreshop.org/license     GNU General Public License version 3 (GPLv3)
 */

declare(strict_types=1);

namespace CoreShop\Component\Order\Calculator;

use CoreShop\Component\Order\Exception\NoPurchasableDiscountPriceFoundException;
use CoreShop\Component\Order\Model\PurchasableInterface;
use CoreShop\Component\Product\Exception\NoRetailPriceFoundException;

final class PurchasablePriceCalculator implements PurchasablePriceCalculatorInterface
{
    public function __construct(private PurchasableRetailPriceCalculatorInterface $purchasableRetailPriceCalculator, private PurchasableDiscountPriceCalculatorInterface $purchasableDiscountPriceCalculator, private PurchasableDiscountCalculatorInterface $purchasableDiscountCalculator)
    {
    }

    public function getPrice(PurchasableInterface $purchasable, array $context, bool $includingDiscounts = false): int
    {
        $price = 0;

        try {
            $retailPrice = $this->purchasableRetailPriceCalculator->getRetailPrice($purchasable, $context);
            $price = $retailPrice;
        } catch (NoRetailPriceFoundException) {
        }

        try {
            $discountPrice = $this->purchasableDiscountPriceCalculator->getDiscountPrice($purchasable, $context);

            if ($discountPrice > 0 && $discountPrice < $price) {
                $price = $discountPrice;
            }
        } catch (NoPurchasableDiscountPriceFoundException) {
        }

        if ($includingDiscounts) {
            $price -= $this->purchasableDiscountCalculator->getDiscount($purchasable, $context, $price);
        }

        return $price;
    }
}
