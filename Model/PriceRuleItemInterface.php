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

namespace CoreShop\Component\Order\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;

interface PriceRuleItemInterface extends ResourceInterface
{
    public function getId(): ?int;

    public function getCartPriceRule(): ?CartPriceRuleInterface;

    public function setCartPriceRule(?CartPriceRuleInterface $cartPriceRule);

    public function getVoucherCode(): ?string;

    public function setVoucherCode(?string $voucherCode);

    public function getDiscount(bool $withTax = true): int;

    public function setDiscount(int $discount, bool $withTax = true);
}
