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

namespace CoreShop\Component\Order\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;

interface PriceRuleItemInterface extends ResourceInterface
{
    public function getCartPriceRule(): ?CartPriceRuleInterface;

    public function setCartPriceRule(?CartPriceRuleInterface $cartPriceRule);

    public function getVoucherCode(): ?string;

    public function setVoucherCode(?string $voucherCode);

    public function getDiscount(bool $withTax = true): int;

    public function setDiscount(int $discount, bool $withTax = true);
}
