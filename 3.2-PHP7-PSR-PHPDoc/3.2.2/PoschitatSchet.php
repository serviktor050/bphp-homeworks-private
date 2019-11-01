<?php
    /**
     * Функция для формирования счета по заказу.
     * @param int $a пункты в меню.
     * @param int $b количество порций.
     */

    function PoschitatSchet($a, $b) {
        /**
         * @var int $accountNumber номер заказа (случайное целое число).
         * @var string $purch необходимый html для размещения на странице.
         * @var float $finalSum общая стоимость заказа, два знака после запятой.
         */

        $accountNumber = random_int(1000, 9999);
        $purch = "<div class=\"order322-line order322-title\">Счёт № $accountNumber</div>";
        $finalSum = 0;
        /**
         * @var int $quantity количество порций.
         * @var float $cost стоимость за выбранное количество порций, выбранного пункта меню, два знака после запятой.
         * @var float $worth цена, выбранного пункта меню, два знака после запятой.
         */

        foreach ($a as $i) {
            $quantity = $b[$i->id];
            if ($quantity > 0) {
                $cost = number_format($i->price * $quantity,2);
                $worth =  number_format($i->price,2);
                $purch .= "<div class=\"order322-line\"><div>$i->name</div><div>$quantity * $worth ₽ = $cost ₽</div></div>";
                $finalSum += $quantity * $i->price;
            };
        };
        /**
         * Блок для корректировки окончательной стоимости заказа исходя из выбора допольнительных услуг.
         * @var int $orderingService номер услуги в списке, целое число.
         * @var float $correctedFinalSum корректировка в расчете на финальную стоимость, которую необходимо произвести.
         */

        $orderingService = (int)$b['service'];
        if ($finalSum > 0) {
            if ($orderingService === 1) {
                $purch .= "<div class=\"order322-line\"><div>Доставка</div><div>200.00 ₽</div></div>";
                $finalSum = $finalSum + 200;
            } elseif ($orderingService === 2) {
                $correctedFinalSum = number_format($finalSum * 0.10,2);
                $purch .= "<div class=\"order322-line\"><div>Скидка 10% (самовывоз)</div><div>-$correctedFinalSum ₽</div></div>";
                $finalSum = $finalSum - (float)$correctedFinalSum;
            } elseif ($orderingService === 3) {
                $purch .= "<div class=\"order322-line\"><div>Самообслуживание в кафе</div><div>0.00 ₽</div></div>";
            } elseif ($orderingService === 4) {
                $correctedFinalSum = number_format($finalSum * 0.10,2);
                $purch .= "<div class=\"order322-line\"><div>Чаевые 10%</div><div>$correctedFinalSum ₽</div></div>";
                $finalSum = $finalSum + (float)$correctedFinalSum;
            };
        };
        $finalSum = number_format($finalSum,2);
        $purch .= "<div class=\"order322-total\"><div>Итого: $finalSum ₽</div></div>";
        return $purch;
    };