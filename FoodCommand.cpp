#include "StdAfx.h"
#include "Setup.h"

#define Food    ItemID
#define STACK_COUNT        20
static string food = "#food";

void FoodCommand(Player * Plr, uint32 Type, uint32 Lang, const char * Message, const char * Misc)
{
    if(Message == food)
    {
        ItemPrototype *proto;
        ItemPrototype* it = ItemPrototypeStorage.LookupEntry(Food);
        SlotResult slot;
        Item * pItem = objmgr.CreateItem(Food, Plr);
        proto = pItem->GetProto();
        slot = Plr->GetItemInterface()->FindFreeInventorySlot(proto);
        if(slot.Result)
        {
            pItem->SetUInt32Value(ITEM_FIELD_STACK_COUNT, STACK_COUNT);
            pItem->SetOwner(Plr);
            if (pItem->GetProto()->Bonding == ITEM_BIND_ON_PICKUP) 
                pItem->SoulBind();
            pItem->m_isDirty = true;
            Plr->GetItemInterface()->SafeAddItem(pItem,slot.ContainerSlot,slot.Slot);
            if(Plr->IsInWorld() && !pItem->IsInWorld())
            {
                pItem->PushToWorld(Plr->GetMapMgr());

                ByteBuffer buf(2500);
                uint32 count = pItem->BuildCreateUpdateBlockForPlayer(&buf, Plr);
                Plr->PushCreationData(&buf, count);
            }
        }
    }
}

void SetupFoodCommand(ScriptMgr * mgr)
{
    mgr->register_hook(SERVER_HOOK_EVENT_ON_CHAT, (void *) FoodCommand);
}