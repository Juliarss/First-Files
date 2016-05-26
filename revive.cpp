#include "StdAfx.h"
#include "Setup.h"

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
		if (pPlayer->getDeathState() != 0)	
												// Not alive
			pPlayer->ResurrectPlayer();
                                           pPlayer->AddAura(40370);
	}																						//!Revive-Command end
}

void SetupReviver(ScriptMgr * mgr)
{
   mgr->register_hook(OnDeath(Player * pPlayer);, (void *) PlayerCommands);
}