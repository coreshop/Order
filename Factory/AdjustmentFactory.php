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

namespace CoreShop\Component\Order\Factory;

use CoreShop\Component\Order\Model\AdjustmentInterface;
use CoreShop\Component\Resource\Factory\FactoryInterface;

class AdjustmentFactory implements AdjustmentFactoryInterface
{
    public function __construct(private FactoryInterface $adjustmentFactory)
    {
    }

    public function createNew()
    {
        return $this->adjustmentFactory->createNew();
    }

    public function createWithData(string $type, string $label, int $amountGross, int $amountNet, bool $neutral = false): AdjustmentInterface
    {
        $adjustment = $this->createNew();
        $adjustment->setTypeIdentifier($type);
        $adjustment->setLabel($label);
        $adjustment->setAmount($amountGross, $amountNet);
        $adjustment->setNeutral($neutral);

        return $adjustment;
    }
}
