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

interface AdjustableInterface
{
    /**
     * @return AdjustmentInterface[]
     */
    public function getAdjustments(string $type = null);

    public function addAdjustment(AdjustmentInterface $adjustment);

    public function removeAdjustment(AdjustmentInterface $adjustment);

    public function getAdjustmentsTotal(?string $type = null, bool $withTax = true): int;

    public function removeAdjustments(string $type = null);

    public function removeAdjustmentsRecursively(string $type = null);

    /**
     * Recalculates adjustments total. Should be used after adjustment change.
     */
    public function recalculateAdjustmentsTotal();
}
