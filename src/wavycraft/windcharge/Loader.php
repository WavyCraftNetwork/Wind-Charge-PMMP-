<?php

declare(strict_types=1);

namespace wavycraft\windcharge;

use wavycraft\windcharge\item\WindCharge;
use wavycraft\windcharge\item\WCVanillaItems;
use wavycraft\windcharge\entity\WindChargeEntity;

use pocketmine\entity\EntityDataHelper as Helper;
use pocketmine\entity\EntityFactory;
use pocketmine\item\ItemIdentifier;
use pocketmine\item\ItemTypeIds;
use pocketmine\item\StringToItemParser;
use pocketmine\data\bedrock\item\ItemTypeNames;
use pocketmine\data\bedrock\item\SavedItemData;
use pocketmine\world\format\io\GlobalItemDataHandlers;
use pocketmine\inventory\CreativeInventory;
use pocketmine\nbt\tag\CompoundTag;
use pocketmine\plugin\PluginBase;
use pocketmine\world\World;

class Loader extends PluginBase
{
    public function onEnable(): void
    {
        $itemDeserializer = GlobalItemDataHandlers::getDeserializer();
        $itemSerializer = GlobalItemDataHandlers::getSerializer();
        $stringToItemParser = StringToItemParser::getInstance();
        $creativeInventory = CreativeInventory::getInstance();

        $wind_charge = WCVanillaItems::WIND_CHARGE();
        $itemDeserializer->map(
            ItemTypeNames::WIND_CHARGE,
            static fn() => clone $wind_charge
        );
        $itemSerializer->map(
            $wind_charge,
            static fn() => new SavedItemData(ItemTypeNames::WIND_CHARGE)
        );
        $stringToItemParser->register(
            "wind_charge",
            static fn() => clone $wind_charge
        );
        $creativeInventory->add(WCVanillaItems::WIND_CHARGE());

        EntityFactory::getInstance()->register(WindChargeEntity::class, function(World $world, CompoundTag $nbt) : WindChargeEntity {
			return new WindChargeEntity(Helper::parseLocation($nbt, $world), null, $nbt);
		}, ['Wind Charge', 'minecraft:wind_charge']);
    }
}
