<?php

declare(strict_types=1);

namespace wavycraft\windcharge\item;

use wavycraft\windcharge\item\WindCharge;

use pocketmine\item\Item;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds;
use pocketmine\utils\CloningRegistryTrait;

/**
 * @method static WindCharge WIND_CHARGE()
 */
class WCVanillaItems
{
    use CloningRegistryTrait;

    private function __construct()
    {
        //NOOP
    }

    /**
     * @param string $name
     * @param Item $item
     * @return void
     */
    protected static function register(string $name, Item $item): void
    {
        self::_registryRegister($name, $item);
    }

    /**
     * @return Item[]
     */
    public static function getAll(): array
    {
        /** @var Item[] $result */
        $result = self::_registryGetAll();
        return $result;
    }

    /**
     * @return void
     */
    protected static function setup(): void
    {
        self::register(
            "wind_charge",
            new WindCharge(new ItemIdentifier(ItemTypeIds::newId()), "Wind Charge")
        );
    }
}
