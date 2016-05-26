#include "StdAfx.h"
#include "Setup.h"

#define MAP_ID 0   // Change to map ID of your mall
#define X 0   // Change to X coordinate of your mall's teleport location
#define Y 0   // Change to Y coordinate of your mall's teleport location
#define Z 0   // Change to Z coordinate of your mall's teleport location

static string rezzcmd = "!Revive"; //Revive Player-command
bool rezzon = true; //Will be switchable later ingame via GMCommand

void PlayerCommands(Player * pPlayer, uint32 Type, uint32 Lang, const char * Message, const char * Misc)
{
 //!Revive-Command - Start
  if(Message == !Revive)
	{
		if (pPlayer->getDeathState() == 1)													// Just died
			pPlayer->RemoteRevive();
                                           pPlayer->pPlayer->AddAura(40370)
                                                  pPlayer->EventTeleport(MAP_ID, X, Y, Z); 
		if (pPlayer->getDeathState() != 0)	
												// Not alive
			pPlayer->ResurrectPlayer();
                                           pPlayer->AddAura(40370);
                                          pPlayer->EventTeleport(MAP_ID, X, Y, Z);  
	}																						//!Revive-Command end
}

void SetupReviver(ScriptMgr * mgr)
{
   mgr->register_hook(OnDeath(Player * pPlayer);, (void *) PlayerCommands);