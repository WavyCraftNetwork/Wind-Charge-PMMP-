<?php

declare(strict_types=1);

namespace wavycraft\windcharge\entity\sound;

use pocketmine\math\Vector3;
use pocketmine\network\mcpe\protocol\LevelSoundEventPacket;
use pocketmine\network\mcpe\protocol\types\LevelSoundEvent;
use pocketmine\world\sound\Sound;

final class WindChargeBurstSound implements Sound{
	public function encode(Vector3 $pos) : array{
		return [LevelSoundEventPacket::nonActorSound(LevelSoundEvent::WIND_CHARGE_BURST, $pos, false)];
	}
}
