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

namespace CoreShop\Component\Order\Context;

use CoreShop\Component\Order\Model\OrderInterface;
use CoreShop\Component\Resource\Factory\FactoryInterface;

final class CartContext implements CartContextInterface
{
    public function __construct(
        private FactoryInterface $cartFactory,
    ) {
    }

    public function getStorageList(): OrderInterface
    {
        return $this->getCart();
    }

    public function getCart(): OrderInterface
    {
        return $this->cartFactory->createNew();
    }
}
