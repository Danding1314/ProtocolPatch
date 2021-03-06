<?php

/*
 *  ____                           _   _  ___
 * |  _ \ _ __ ___  ___  ___ _ __ | |_| |/ (_)_ __ ___
 * | |_) | '__/ _ \/ __|/ _ \ '_ \| __| ' /| | '_ ` _ \
 * |  __/| | |  __/\__ \  __/ | | | |_| . \| | | | | | |
 * |_|   |_|  \___||___/\___|_| |_|\__|_|\_\_|_| |_| |_|
 *
 * This program is free software: you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation, either version 3 of the License, or
 * (at your option) any later version.
 *
 * @author  PresentKim (debe3721@gmail.com)
 * @link    https://github.com/PresentKim
 * @license https://www.gnu.org/licenses/gpl-3.0 GPL-3.0 License
 *
 *   (\ /)
 *  ( . .) ♥
 *  c(")(")
 */

declare(strict_types=1);

namespace kim\present\protocol\patch;

use kim\present\protocol\ProtocolPatch;

trait StartGamePacketPatch{
    /** @var string|null */
    private static $itemTableCache = null;

    protected function encodePayload(){
        $this->putEntityUniqueId($this->entityUniqueId);
        $this->putEntityRuntimeId($this->entityRuntimeId);
        $this->putVarInt($this->playerGamemode);

        $this->putVector3($this->playerPosition);

        $this->putLFloat($this->pitch);
        $this->putLFloat($this->yaw);

        $this->putVarInt($this->seed);
        $this->spawnSettings->write($this);
        $this->putVarInt($this->generator);
        $this->putVarInt($this->worldGamemode);
        $this->putVarInt($this->difficulty);
        $this->putBlockPosition($this->spawnX, $this->spawnY, $this->spawnZ);
        $this->putBool($this->hasAchievementsDisabled);
        $this->putVarInt($this->time);
        $this->putVarInt($this->eduEditionOffer);
        $this->putBool($this->hasEduFeaturesEnabled);
        $this->putString($this->eduProductUUID);
        $this->putLFloat($this->rainLevel);
        $this->putLFloat($this->lightningLevel);
        $this->putBool($this->hasConfirmedPlatformLockedContent);
        $this->putBool($this->isMultiplayerGame);
        $this->putBool($this->hasLANBroadcast);
        $this->putVarInt($this->xboxLiveBroadcastMode);
        $this->putVarInt($this->platformBroadcastMode);
        $this->putBool($this->commandsEnabled);
        $this->putBool($this->isTexturePacksRequired);
        $this->putGameRules($this->gameRules);
        $this->putLInt(0);     // added: Experiment count
        $this->putBool(false); // added: Were experiments previously toggled
        $this->putBool($this->hasBonusChestEnabled);
        $this->putBool($this->hasStartWithMapEnabled);
        $this->putVarInt($this->defaultPlayerPermission);
        $this->putLInt($this->serverChunkTickRadius);
        $this->putBool($this->hasLockedBehaviorPack);
        $this->putBool($this->hasLockedResourcePack);
        $this->putBool($this->isFromLockedWorldTemplate);
        $this->putBool($this->useMsaGamertagsOnly);
        $this->putBool($this->isFromWorldTemplate);
        $this->putBool($this->isWorldTemplateOptionLocked);
        $this->putBool($this->onlySpawnV1Villagers);
        $this->putString($this->vanillaVersion);
        $this->putLInt($this->limitedWorldWidth);
        $this->putLInt($this->limitedWorldLength);
        $this->putBool($this->isNewNether);
        $this->putBool($this->experimentalGameplayOverride !== null);
        // removed: $this->putBool($this->experimentalGameplayOverride);

        $this->putString($this->levelId);
        $this->putString($this->worldName);
        $this->putString($this->premiumWorldTemplateId);
        $this->putBool($this->isTrial);
        $this->putBool($this->isMovementServerAuthoritative);
        $this->putLLong($this->currentTick);

        $this->putVarInt($this->enchantmentSeed);

        $this->putUnsignedVarInt(0); // added: Custom blocks
        // removed: $this->put((new NetworkLittleEndianNBTStream())->write($this->blockTable));
        $this->put(ProtocolPatch::$itemTableCache);

        $this->putString($this->multiplayerCorrelationId);
        $this->putBool($this->enableNewInventorySystem);
    }
}