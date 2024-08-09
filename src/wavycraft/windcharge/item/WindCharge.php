<?php

declare(strict_types=1);

namespace wavycraft\windcharge\item;

use wavycraft\windcharge\entity\WindChargeEntity;

use pocketmine\entity\Location;
use pocketmine\entity\projectile\Throwable;
use pocketmine\player\Player;
use pocketmine\item\ProjectileItem;

class WindCharge extends ProjectileItem{

	public function getMaxStackSize() : int{
		return 64;
	}

	protected function createEntity(Location $location, Player $thrower) : Throwable{
		return new WindChargeEntity($location, $thrower);
	}

	public function getThrowForce() : float{
		return 1.5;
	}

	public function getCooldownTicks() : int{
		return 10;
	}
}
