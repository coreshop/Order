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

namespace CoreShop\Component\Order\Model;

use CoreShop\Component\Resource\Model\ResourceInterface;

interface AdjustmentInterface extends ResourceInterface
{
    public const SHIPPING = 'shipping';

    public const CART_PRICE_RULE = 'cart_price_rule';

    public function getAdjustable(): ?AdjustableInterface;

    public function getTypeIdentifier(): ?string;

    public function setTypeIdentifier(?string $typeIdentifier);

    public function getLabel(): ?string;

    public function setLabel(?string $label);

    public function getAmount(bool $withTax = true): int;

    public function setAmount(int $grossAmount, int $netAmount);

    public function getNeutral(): bool;

    public function setNeutral(bool $neutral);

    /**
     * Adjustments with amount < 0 are called "charges".
     */
    public function isCharge(): bool;

    /**
     * Adjustments with amount > 0 are called "credits".
     */
    public function isCredit(): bool;
}
