/*Disabled Due To Compiling Issues
#include "StdAfx.h"
#include "Setup.h"

#ifdef WIN32
#pragma warning(disable:4305)
#endif

///Editing stuff///
int timer = 1800000; //in MS 30 Min
///////////////////


int STAGE = 0;
int LASTSTAGE = 0;
int PRESTAGE = 0;
bool spawned = false;


class SCRIPT_DECL ArenaEvent : public GossipScript
{
public:
    void GossipHello(Object * pObject, Player* Plr, bool AutoSend);
    void GossipSelectOption(Object * pObject, Player* Plr, uint32 Id, uint32 IntId, const char * Code);
    void GossipEnd(Object * pObject, Player* Plr);
	void Clean(Creature* pCreature);
	void Destroy()
	{
		delete this;
	}
};





void ArenaEvent::GossipHello(Object * pObject, Player* Plr, bool AutoSend)
    {
        GossipMenu *Menu;
        objmgr.CreateGossipMenuForPlayer(&Menu, pObject->GetGUID(), 1, Plr);
	
	if(spawned == false)
	{
	if(LASTSTAGE != 1)
	Menu->AddItem(0, "Forest Theme", 1);

	if(LASTSTAGE != 2)
	Menu->AddItem(0, "Marsh Theme", 2);

	if(LASTSTAGE != 3)
	Menu->AddItem(0, "Ocean Theme", 3);

	if(LASTSTAGE != 4)
	Menu->AddItem(0, "Horde Theme", 4);

	if(LASTSTAGE != 5)
	Menu->AddItem(0, "Normal (no theme)", 5);
	}
	else
	{
	Menu->AddItem(0, "There is already a theme spawned, you must wait to spawn a new one!", 999);
	}
		
		if(AutoSend)
        Menu->SendTo(Plr);
    }

void ArenaEvent::GossipSelectOption(Object * pObject, Player* Plr, uint32 Id, uint32 IntId, const char * Code)
    {
	Creature * pCreature = (pObject->GetTypeId()==TYPEID_UNIT)?((Creature*)pObject):NULL;
	if(pCreature==NULL)
		return;

        GossipMenu * Menu;
        switch(IntId)
        {	

	    case 1: 
            {
			if(spawned == true)
			{
				Plr->Gossip_Complete();
				return;
			}

			ArenaEvent dt;
			TimedEvent *te = TimedEvent::Allocate(&dt, new CallbackP1<ArenaEvent, Creature*>(&dt, &ArenaEvent::Clean, pCreature), 0, timer, 1);
			Plr->event_AddEvent(te);

			spawned = true;
			STAGE = 1;
			LASTSTAGE = 1;
			Plr->Gossip_Complete();
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30000,-13213.6,305.464,21.858,4.84185, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30000,-13172.7,268.138,21.858,0.242687, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30000,-13208.6,244.124,21.858,1.22051, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30000,-13213.9,277.515,21.858,0.200561, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13213.4,271.912,21.8571,1.75389, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13211.8,272.494,21.8571,2.05783, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13215.2,272.05,21.8571,1.37847, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13213.6,300.406,21.8571,1.86934, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13212.9,300.537,21.8571,1.76567, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13175.8,271.679,21.8571,5.41614, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13176.3,271.227,21.8571,5.4397, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13174.8,272.873,21.8571,5.35174, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13176.4,272.202,21.8571,4.50351, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13202.8,243.211,21.8571,3.12121, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13202.9,244.207,21.8571,3.23116, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13211.2,248.314,21.858,5.39022, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13212.1,247.563,21.858,5.28027, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30001,-13213,246.845,21.858,5.43735, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30002,-13236.2,280.967,21.857,0.479923, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13191.8,289.481,21.8567,5.86461, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13195.3,292.13,21.8567,5.14519, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13187.2,288.549,21.8567,4.70223, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13179.3,266.729,21.8567,5.53475, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13176.7,261.065,21.8567,1.46717, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13203.4,249.716,21.8567,3.76053, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13209.4,250.895,21.8567,1.94626, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13221.8,308.571,21.8567,0.842777, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13217.4,312.036,21.8567,6.06568, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13207.7,312.2,21.8567,2.49997, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13219.4,281.345,21.8576,5.03288, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13220.3,275.993,21.8576,0.948807, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13188.8,297.035,21.8571,1.2072, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30003,-13183.2,292.458,21.8571,3.02342, true, 0, 0);
			}
		break;

		case 2: 
            {
			if(spawned == true)
			{
				Plr->Gossip_Complete();
				return;
			}

			ArenaEvent dt;
			TimedEvent *te = TimedEvent::Allocate(&dt, new CallbackP1<ArenaEvent, Creature*>(&dt, &ArenaEvent::Clean, pCreature), 0, timer, 1);
			Plr->event_AddEvent(te);

			spawned = true;
			STAGE = 2;
			LASTSTAGE = 2;
			Plr->Gossip_Complete();
			GameObject * MarshGrass1 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13187.7,239.463,21.8582,3.77539, false, 0, 0);
			GameObject * MarshGrass2 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13180.5,291.8,21.8582,3.22953, false, 0, 0);
			GameObject * MarshGrass3 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13178.4,283.759,21.8579,4.64874, false, 0, 0);
			GameObject * MarshGrass4 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13227.1,278.129,21.8582,5.76243, false, 0, 0);
			GameObject * MarshGrass5 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13173.3,295.848,21.8579,4.20499, false, 0, 0);
			GameObject * MarshGrass6 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13202.6,244.986,21.8579,2.8816, false, 0, 0);
			GameObject * MarshGrass7 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13186.4,291.49,21.8579,5.90144, false, 0, 0);
			GameObject * MarshGrass8 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13192.9,235.159,21.8582,3.5437, false, 0, 0);
			GameObject * MarshGrass9 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13173.4,255.883,21.8582,4.31731, false, 0, 0);
			GameObject * MarshGrass10 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13205.5,250.809,21.8582,2.8329, false, 0, 0);
			GameObject * MarshGrass11 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13218.7,268.308,21.8582,5.81348, false, 0, 0);
			GameObject * MarshGrass12 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13170.4,287.805,21.8582,2.30276, false, 0, 0);
			GameObject * MarshGrass13 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13228,249.127,21.8582,5.77814, false, 0, 0);
			GameObject * MarshGrass14 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13215.8,312.145,21.8582,0.928307, false, 0, 0);
			GameObject * MarshGrass15 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13180.1,239.075,21.8579,5.35167, false, 0, 0);
			GameObject * MarshGrass16 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13221.7,274.7,21.8571,4.26782, false, 0, 0);
			GameObject * MarshGrass17 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13167.4,256.948,21.8579,6.12921, false, 0, 0);
			GameObject * MarshGrass18 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13170.8,249.312,21.8579,5.68546, false, 0, 0);
			GameObject * MarshGrass19 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13184.4,274.314,21.8582,5.65248, false, 0, 0);
			GameObject * MarshGrass20 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13210.4,283.529,21.8582,5.86061, false, 0, 0);
			GameObject * MarshGrass21 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13198.1,271.543,21.8582,2.64048, false, 0, 0);
			GameObject * MarshGrass22 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13193.6,258.863,21.8582,2.69153, false, 0, 0);
			GameObject * MarshGrass23 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13199.2,314.904,21.8582,1.06968, false, 0, 0);
			GameObject * MarshGrass24 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13203.6,298.728,21.8582,6.15121, false, 0, 0);
			GameObject * MarshGrass25 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13231.4,261.383,21.8571,4.62517, false, 0, 0);
			GameObject * MarshGrass26 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13175.7,274.391,21.8579,5.77107, false, 0, 0);
			GameObject * MarshGrass27 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13177.2,267.055,21.8579,0.591363, false, 0, 0);
			GameObject * MarshGrass28 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13180.3,245.738,21.8582,3.9521, false, 0, 0);
			GameObject * MarshGrass29 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13210.4,302.124,21.8582,4.39192, false, 0, 0);
			GameObject * MarshGrass30 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13233.7,262.174,21.8582,4.16415, false, 0, 0);
			GameObject * MarshGrass31 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13173.5,260.887,21.8582,5.30691, false, 0, 0);
			GameObject * MarshGrass32 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13186.7,282.938,21.8582,4.39585, false, 0, 0);
			GameObject * MarshGrass33 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13242.4,276.602,21.8573,0.159389, false, 0, 0);
			GameObject * MarshGrass34 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13238.3,281.879,21.8573,0.921225, false, 0, 0);
			GameObject * MarshGrass35 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13225.4,300.29,21.8573,3.53268, false, 0, 0);
			GameObject * MarshGrass36 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13214.3,292.125,21.8573,4.3652, false, 0, 0);
			GameObject * MarshGrass37 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13220.4,307.884,21.8573,1.96581, false, 0, 0);
			GameObject * MarshGrass38 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30004,-13176.7,304.866,21.8573,1.06653, false, 0, 0);
			GameObject * MarshWater1 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30005,-13205.5,274.828,28.9149,4.27407, false, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30006,-13205.8,274.844,27.6802,4.30156, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30008,-13168.6,275.081,21.8574,2.72372, true, 0, 0);
			pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30007,-13233.6,293.37,21.8573,5.66896, true, 0, 0);
			float wscale = 13;
			float gscale = 2.5;
			MarshWater1->SetFloatValue(OBJECT_FIELD_SCALE_X, wscale);
			MarshGrass1->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass2->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass3->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass4->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass5->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass6->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass7->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass8->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass9->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass10->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass11->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass12->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass13->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass14->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass15->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass16->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass17->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass18->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass19->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass20->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass21->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass22->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass23->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass24->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass25->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass26->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass27->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass28->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass29->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass30->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass31->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass32->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass33->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass34->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass35->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass36->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass37->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);
			MarshGrass38->SetFloatValue(OBJECT_FIELD_SCALE_X, gscale);

			MarshWater1->PushToWorld(pCreature->GetMapMgr());
			MarshGrass1->PushToWorld(pCreature->GetMapMgr());
			MarshGrass2->PushToWorld(pCreature->GetMapMgr());
			MarshGrass3->PushToWorld(pCreature->GetMapMgr());
			MarshGrass4->PushToWorld(pCreature->GetMapMgr());
			MarshGrass5->PushToWorld(pCreature->GetMapMgr());
			MarshGrass6->PushToWorld(pCreature->GetMapMgr());
			MarshGrass7->PushToWorld(pCreature->GetMapMgr());
			MarshGrass8->PushToWorld(pCreature->GetMapMgr());
			MarshGrass9->PushToWorld(pCreature->GetMapMgr());
			MarshGrass10->PushToWorld(pCreature->GetMapMgr());
			MarshGrass11->PushToWorld(pCreature->GetMapMgr());
			MarshGrass12->PushToWorld(pCreature->GetMapMgr());
			MarshGrass13->PushToWorld(pCreature->GetMapMgr());
			MarshGrass14->PushToWorld(pCreature->GetMapMgr());
			MarshGrass15->PushToWorld(pCreature->GetMapMgr());
			MarshGrass16->PushToWorld(pCreature->GetMapMgr());
			MarshGrass17->PushToWorld(pCreature->GetMapMgr());
			MarshGrass18->PushToWorld(pCreature->GetMapMgr());
			MarshGrass19->PushToWorld(pCreature->GetMapMgr());
			MarshGrass20->PushToWorld(pCreature->GetMapMgr());
			MarshGrass21->PushToWorld(pCreature->GetMapMgr());
			MarshGrass22->PushToWorld(pCreature->GetMapMgr());
			MarshGrass23->PushToWorld(pCreature->GetMapMgr());
			MarshGrass24->PushToWorld(pCreature->GetMapMgr());
			MarshGrass25->PushToWorld(pCreature->GetMapMgr());
			MarshGrass26->PushToWorld(pCreature->GetMapMgr());
			MarshGrass27->PushToWorld(pCreature->GetMapMgr());
			MarshGrass28->PushToWorld(pCreature->GetMapMgr());
			MarshGrass29->PushToWorld(pCreature->GetMapMgr());
			MarshGrass30->PushToWorld(pCreature->GetMapMgr());
			MarshGrass31->PushToWorld(pCreature->GetMapMgr());
			MarshGrass32->PushToWorld(pCreature->GetMapMgr());
			MarshGrass33->PushToWorld(pCreature->GetMapMgr());
			MarshGrass34->PushToWorld(pCreature->GetMapMgr());
			MarshGrass35->PushToWorld(pCreature->GetMapMgr());
			MarshGrass36->PushToWorld(pCreature->GetMapMgr());
			MarshGrass37->PushToWorld(pCreature->GetMapMgr());
			MarshGrass38->PushToWorld(pCreature->GetMapMgr());
			}
		break;

		case 3:
			{
				if(spawned == true)
				{
				Plr->Gossip_Complete();
				return;
				}

				ArenaEvent dt;
				TimedEvent *te = TimedEvent::Allocate(&dt, new CallbackP1<ArenaEvent, Creature*>(&dt, &ArenaEvent::Clean, pCreature), 0, timer, 1);
				Plr->event_AddEvent(te);

				spawned = true;
				STAGE = 3;
				LASTSTAGE = 3;
				Plr->Gossip_Complete();
				GameObject * OceanWater = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30010,-13206.5,275.269,37.9933,4.24822, false, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30011,-13195.5,278.584,22.0169,4.09114, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30011,-13199.7,274.619,21.8572,4.22073, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30011,-13192.9,272.035,21.9394,2.42216, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13176.6,279.44,21.8575,2.01925, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13229.4,271.519,21.8575,5.45144, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13164.8,256.585,21.8575,0.376984, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13206.9,254.713,21.8575,0.296088, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13226.7,250.354,21.8575,5.45144, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13220.6,293.657,21.8575,4.73516, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13184.1,247.726,21.8575,0.140579, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13211.2,311.107,21.8575,4.90088, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13202.5,289.774,21.8575,3.59633, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30012,-13183.6,297.988,21.8575,2.87533, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30013,-13204.8,269.917,21.8582,3.97977, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13171,258.625,30.0242,3.61221, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13230.3,270.862,23.0879,6.02417, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13188.2,278.39,29.0579,4.97331, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13214.2,261.639,28.8775,5.76027, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13225.4,242.14,30.0242,5.76027, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13178.3,295.883,29.1114,2.5582, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13220.6,299.088,29.1114,5.54743, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30014,-13195.3,245.248,30.0242,1.5906, true, 0, 0);
				pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30015,-13217.1,251.336,31.2398,5.3927, true, 0, 0);
				float wscale = 13;
				OceanWater->SetFloatValue(OBJECT_FIELD_SCALE_X, wscale);
				OceanWater->PushToWorld(pCreature->GetMapMgr());

			}
			break;

		case 4:
			{
				
				if(spawned == true)
				{
				Plr->Gossip_Complete();
				return;
				}

				ArenaEvent dt;
				TimedEvent *te = TimedEvent::Allocate(&dt, new CallbackP1<ArenaEvent, Creature*>(&dt, &ArenaEvent::Clean, pCreature), 0, timer, 1);
				Plr->event_AddEvent(te);

				spawned = true;
				STAGE = 4;
				LASTSTAGE = 4;
				Plr->Gossip_Complete();
				GameObject * Horde1 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13195.2,278.438,21.8573,1.54162, false, 0, 0);
				GameObject * Horde2 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13203.1,285.581,21.8575,2.63725, false, 0, 0);
				GameObject * Horde3 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13213.9,282.499,21.8573,3.64705, false, 0, 0);
				GameObject * Horde4 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13208.9,285.838,21.8577,3.66309, false, 0, 0);
				GameObject * Horde5 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13197.8,282.83,21.8574,2.63725, false, 0, 0);
				GameObject * Horde6 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13216.6,277.711,21.858,4.7318, false, 0, 0);
				GameObject * Horde7 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13216.5,271.729,21.8577,4.7318, false, 0, 0);
				GameObject * Horde8 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13213.8,266.83,21.8573,5.82186, false, 0, 0);
				GameObject * Horde9 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30016,-13208.4,264.131,21.8581,5.82186, false, 0, 0);
				GameObject * Horde10 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30017,-13205.7,275.016,7.16591,4.23756, true, 0, 0);
				GameObject * Horde11 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30019,-13232.3,239.939,33.4345,1.0336, false, 0, 0);
				GameObject * Horde12 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30019,-13216.6,231.872,33.419,1.03282, false, 0, 0);
				GameObject * Horde13 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30018,-13237.2,273.418,21.8574,5.14202, false, 0, 0);
				GameObject * Horde14 = pCreature->GetMapMgr()->GetInterface()->SpawnGameObject(30018,-13176.9,254.606,21.8578,3.58929, false, 0, 0);

				Horde1->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.696715);
				Horde2->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.968373);
				Horde3->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.968234);
				Horde4->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.966197);
				Horde5->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.968373);
				Horde6->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.700211);
				Horde7->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.700211);
				Horde8->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.228621);
				Horde9->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.228621);
				Horde11->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.494102);
				Horde12->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.49376);
				Horde13->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.540121);
				Horde14->SetFloatValue(GAMEOBJECT_PARENTROTATION_02,0.97505);

				Horde1->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,0.717348);
				Horde2->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,0.249509);
				Horde3->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.250047);
				Horde4->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.257803);
				Horde5->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,0.249509);
				Horde6->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.713936);
				Horde7->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.713936);
				Horde8->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.973515);
				Horde9->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.973515);
				Horde11->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,0.869404);
				Horde12->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,0.869598);
				Horde13->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.841588);
				Horde14->SetFloatValue(GAMEOBJECT_PARENTROTATION_03,-0.221984);
				

				Horde1->PushToWorld(pCreature->GetMapMgr());
				Horde2->PushToWorld(pCreature->GetMapMgr());
				Horde3->PushToWorld(pCreature->GetMapMgr());
				Horde4->PushToWorld(pCreature->GetMapMgr());
				Horde5->PushToWorld(pCreature->GetMapMgr());
				Horde6->PushToWorld(pCreature->GetMapMgr());
				Horde7->PushToWorld(pCreature->GetMapMgr());
				Horde8->PushToWorld(pCreature->GetMapMgr());
				Horde9->PushToWorld(pCreature->GetMapMgr());
				Horde11->PushToWorld(pCreature->GetMapMgr());
				Horde12->PushToWorld(pCreature->GetMapMgr());
				Horde13->PushToWorld(pCreature->GetMapMgr());
				Horde14->PushToWorld(pCreature->GetMapMgr());
			}	
			break;

		case 5:
			{
				if(spawned == true)
				{
				Plr->Gossip_Complete();
				return;
				}

				ArenaEvent dt;
				TimedEvent *te = TimedEvent::Allocate(&dt, new CallbackP1<ArenaEvent, Creature*>(&dt, &ArenaEvent::Clean, pCreature), 0, timer, 1);
				Plr->event_AddEvent(te);

				spawned = true;
				STAGE = 5;
				LASTSTAGE = 5;

				Plr->Gossip_Complete();
			}

		}
		}



		void ArenaEvent::Clean(Creature* pCreature)
		{
			spawned = false;
			if(STAGE == 1)
				{
					GameObject* ForestTree1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213.6,305.464,21.858,30000);
					GameObject* ForestTree2 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13172.7,268.138,21.858,30000);
					GameObject* ForestTree3 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13208.6,244.124,21.858,30000);
					GameObject* ForestTree4 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213.9,277.515,21.858,30000);
					GameObject* ForestBush1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213.4,271.912,21.8571,30001);
					GameObject* ForestBush2 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13211.8,272.494,21.8571,30001);
					GameObject* ForestBush3 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13215.2,272.05,21.8571,30001);
					GameObject* ForestBush4 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213.6,300.406,21.8571,30001);
					GameObject* ForestBush5 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13212.9,300.537,21.8571,30001);
					GameObject* ForestBush6 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13175.8,271.679,21.8571,30001);
					GameObject* ForestBush7 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13176.3,271.227,21.8571,30001);
					GameObject* ForestBush8 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13174.8,272.873,21.8571,30001);
					GameObject* ForestBush9 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13176.4,272.202,21.8571,30001);
					GameObject* ForestBush10 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13202.8,243.211,21.8571,30001);
					GameObject* ForestBush11 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13202.9,244.207,21.8571,30001);
					GameObject* ForestBush12 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13211.2,248.314,21.858,30001);
					GameObject* ForestBush13 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13212.1,247.563,21.858,30001);
					GameObject* ForestBush14 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213,246.845,21.858,30001);
					GameObject* ForestRock1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13236.2,280.967,21.857,30002);
					GameObject* ForestGrass1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13191.8,289.481,21.8567,30003);
					GameObject* ForestGrass2 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13195.3,292.13,21.8567,30003);
					GameObject* ForestGrass3 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13187.2,288.549,21.8567,30003);
					GameObject* ForestGrass4 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13179.3,266.729,21.8567,30003);
					GameObject* ForestGrass5 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13176.7,261.065,21.8567,30003);
					GameObject* ForestGrass6 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13203.4,249.716,21.8567,30003);
					GameObject* ForestGrass7 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13209.4,250.895,21.8567,30003);
					GameObject* ForestGrass8 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13221.8,308.571,21.8567,30003);
					GameObject* ForestGrass9 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13217.4,312.036,21.8567,30003);
					GameObject* ForestGrass10 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13207.7,312.2,21.8567,30003);
					GameObject* ForestGrass11= pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13219.4,281.345,21.8576,30003);
					GameObject* ForestGrass12 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13220.3,275.993,21.8576,30003);
					GameObject* ForestGrass13 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13188.8,297.035,21.8571,30003);
					GameObject* ForestGrass14 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13183.2,292.458,21.8571,30003);

					ForestTree1->GetMapMgr()->GetInterface()->DeleteGameObject(ForestTree1);
					ForestTree2->GetMapMgr()->GetInterface()->DeleteGameObject(ForestTree2);
					ForestTree3->GetMapMgr()->GetInterface()->DeleteGameObject(ForestTree3);
					ForestTree4->GetMapMgr()->GetInterface()->DeleteGameObject(ForestTree4);
					ForestBush1->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush1);
					ForestBush2->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush2);
					ForestBush3->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush3);
					ForestBush4->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush4);
					ForestBush5->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush5);
					ForestBush6->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush6);
					ForestBush7->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush7);
					ForestBush8->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush8);
					ForestBush9->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush9);
					ForestBush10->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush10);
					ForestBush11->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush11);
					ForestBush12->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush12);
					ForestBush13->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush13);
					ForestBush14->GetMapMgr()->GetInterface()->DeleteGameObject(ForestBush14);
					ForestRock1->GetMapMgr()->GetInterface()->DeleteGameObject(ForestRock1);
					ForestGrass1->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass1);
					ForestGrass2->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass2);
					ForestGrass3->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass3);
					ForestGrass4->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass4);
					ForestGrass5->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass5);
					ForestGrass6->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass6);
					ForestGrass7->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass7);
					ForestGrass8->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass8);
					ForestGrass9->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass9);
					ForestGrass10->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass10);
					ForestGrass11->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass11);
					ForestGrass12->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass12);
					ForestGrass13->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass13);
					ForestGrass14->GetMapMgr()->GetInterface()->DeleteGameObject(ForestGrass14);
					return;
				}

				if(STAGE == 2)
				{
					GameObject* MarshGrass1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13187.7,239.463,21.8582,30004);
					GameObject* MarshGrass2 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13180.5,291.8,21.8582,30004);
					GameObject* MarshGrass3 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13178.4,283.759,21.8579,30004);
					GameObject* MarshGrass4 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13227.1,278.129,21.8582,30004);
					GameObject* MarshGrass5 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13173.3,295.848,21.8579,30004);
					GameObject* MarshGrass6 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13202.6,244.986,21.8579,30004);
					GameObject* MarshGrass7 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13186.4,291.49,21.8579,30004);
					GameObject* MarshGrass8 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13192.9,235.159,21.8582,30004);
					GameObject* MarshGrass9 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13173.4,255.883,21.8582,30004);
					GameObject* MarshGrass10 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13205.5,250.809,21.8582,30004);
					GameObject* MarshGrass11 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13218.7,268.308,21.8582,30004);
					GameObject* MarshGrass12 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13170.4,287.805,21.8582,30004);
					GameObject* MarshGrass13 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13228,249.127,21.8582,30004);
					GameObject* MarshGrass14 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13215.8,312.145,21.8582,30004);
					GameObject* MarshGrass15 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13180.1,239.075,21.8579,30004);
					GameObject* MarshGrass16 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13221.7,274.7,21.8571,30004);
					GameObject* MarshGrass17 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13167.4,256.948,21.8579,30004);
					GameObject* MarshGrass18 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13170.8,249.312,21.8579,30004);
					GameObject* MarshGrass19 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13184.4,274.314,21.8582,30004);
					GameObject* MarshGrass20 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13210.4,283.529,21.8582,30004);
					GameObject* MarshGrass21 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13198.1,271.543,21.8582,30004);
					GameObject* MarshGrass22 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13193.6,258.863,21.8582,30004);
					GameObject* MarshGrass23 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13199.2,314.904,21.8582,30004);
					GameObject* MarshGrass24 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13203.6,298.728,21.8582,30004);
					GameObject* MarshGrass25 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13231.4,261.383,21.8571,30004);
					GameObject* MarshGrass26 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13180.3,245.738,21.8582,30004);
					GameObject* MarshGrass27 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13175.7,274.391,21.8579,30004);
					GameObject* MarshGrass28 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13177.2,267.055,21.8579,30004);
					GameObject* MarshGrass29 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13210.4,302.124,21.8582,30004);
					GameObject* MarshGrass30 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13233.7,262.174,21.8582,30004);
					GameObject* MarshGrass31 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13173.5,260.887,21.8582,30004);
					GameObject* MarshGrass32 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13186.7,282.938,21.8582,30004);
					GameObject* MarshGrass33 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13242.4,276.602,21.8573,30004);
					GameObject* MarshGrass34 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13238.3,281.879,21.8573,30004);
					GameObject* MarshGrass35 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13225.4,300.29,21.8573,30004);
					GameObject* MarshGrass36 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13214.3,292.125,21.8573,30004);
					GameObject* MarshGrass37 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13220.4,307.884,21.8573,30004);
					GameObject* MarshGrass38 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13176.7,304.866,21.8573,30004);

					GameObject* MarshWater1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13205.5,274.828,28.9149,30005);
					GameObject* MarshBridge1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13205.8,274.844,27.6802,30006);
					GameObject* MarshLog1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13168.6,275.081,21.8574,30008);
					GameObject* MarshBoat1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13233.6,293.37,21.8573,30007);

					MarshWater1->GetMapMgr()->GetInterface()->DeleteGameObject(MarshWater1);

					MarshGrass1->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass1);
					MarshGrass2->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass2);
					MarshGrass3->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass3);
					MarshGrass4->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass4);
					MarshGrass5->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass5);
					MarshGrass6->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass6);
					MarshGrass7->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass7);
					MarshGrass8->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass8);
					MarshGrass9->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass9);
					MarshGrass10->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass10);
					MarshGrass11->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass11);
					MarshGrass12->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass12);
					MarshGrass13->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass13);
					MarshGrass14->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass14);
					MarshGrass15->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass15);
					MarshGrass16->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass16);
					MarshGrass17->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass17);
					MarshGrass18->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass18);
					MarshGrass19->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass19);
					MarshGrass20->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass20);
					MarshGrass21->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass21);
					MarshGrass22->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass22);
					MarshGrass23->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass23);
					MarshGrass24->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass24);
					MarshGrass25->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass25);
					MarshGrass26->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass26);
					MarshGrass27->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass27);
					MarshGrass28->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass28);
					MarshGrass29->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass29);
					MarshGrass30->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass30);
					MarshGrass31->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass31);
					MarshGrass32->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass32);
					MarshGrass33->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass33);
					MarshGrass34->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass34);
					MarshGrass35->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass35);
					MarshGrass36->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass36);
					MarshGrass37->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass37);
					MarshGrass38->GetMapMgr()->GetInterface()->DeleteGameObject(MarshGrass38);

					MarshBridge1->GetMapMgr()->GetInterface()->DeleteGameObject(MarshBridge1);
					MarshLog1->GetMapMgr()->GetInterface()->DeleteGameObject(MarshLog1);
					MarshBoat1->GetMapMgr()->GetInterface()->DeleteGameObject(MarshBoat1);
					return;
				}

				if(STAGE == 3)
				{
					GameObject* Ocean1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13206.5,275.269,37.9933,30010);
					GameObject* Ocean2 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13195.5,278.584,22.0169,30011);
					GameObject* Ocean3 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13199.7,274.619,21.8572,30011);
					GameObject* Ocean4 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13192.9,272.035,21.9394,30011);
					GameObject* Ocean5 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13176.6,279.44,21.8575,30012);
					GameObject* Ocean6 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13229.4,271.519,21.8575,30012);
					GameObject* Ocean7 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13164.8,256.585,21.8575,30012);
					GameObject* Ocean8 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13206.9,254.713,21.8575,30012);
					GameObject* Ocean9 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13226.7,250.354,21.8575,30012);
					GameObject* Ocean10 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13220.6,293.657,21.8575,30012);
					GameObject* Ocean11 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13184.1,247.726,21.8575,30012);
					GameObject* Ocean12 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13211.2,311.107,21.8575,30012);
					GameObject* Ocean13 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13202.5,289.774,21.8575,30012);
					GameObject* Ocean14 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13183.6,297.988,21.8575,30012);
					GameObject* Ocean15 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13204.8,269.917,21.8582,30013);
					GameObject* Ocean16 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13171,258.625,30.0242,30014);
					GameObject* Ocean17 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13230.3,270.862,23.0879,30014);
					GameObject* Ocean18 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13188.2,278.39,29.0579,30014);
					GameObject* Ocean19 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13214.2,261.639,28.8775,30014);
					GameObject* Ocean20 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13225.4,242.14,30.0242,30014);
					GameObject* Ocean21 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13178.3,295.883,29.1114,30014);
					GameObject* Ocean22 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13220.6,299.088,29.1114,30014);
					GameObject* Ocean23 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13195.3,245.248,30.0242,30014);
					GameObject* Ocean24 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13217.1,251.336,31.2398,30015);

					Ocean1->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean1);
					Ocean2->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean2);
					Ocean3->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean3);
					Ocean4->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean4);
					Ocean5->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean5);
					Ocean6->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean6);
					Ocean7->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean7);
					Ocean8->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean8);
					Ocean9->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean9);
					Ocean10->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean10);
					Ocean11->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean11);
					Ocean12->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean12);
					Ocean13->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean13);
					Ocean14->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean14);
					Ocean15->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean15);
					Ocean16->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean16);
					Ocean17->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean17);
					Ocean18->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean18);
					Ocean19->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean19);
					Ocean20->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean20);
					Ocean21->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean21);
					Ocean22->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean22);
					Ocean23->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean23);
					Ocean24->GetMapMgr()->GetInterface()->DeleteGameObject(Ocean24);
				}

				if(STAGE == 4)
				{
					GameObject* Horde1 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13195.2,278.438,21.8573,30016);
					GameObject* Horde2 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13203.1,285.581,21.8575,30016);
					GameObject* Horde3 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213.9,282.499,21.8573,30016);
					GameObject* Horde4 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13208.9,285.838,21.8577,30016);
					GameObject* Horde5 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13197.8,282.83,21.8574,30016);
					GameObject* Horde6 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13216.6,277.711,21.858,30016);
					GameObject* Horde7 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13216.5,271.729,21.8577,30016);
					GameObject* Horde8 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13213.8,266.83,21.8573,30016);
					GameObject* Horde9 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13208.4,264.131,21.8581,30016);
					GameObject* Horde10 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13205.7,275.016,7.16591,30017);
					GameObject* Horde11 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13232.3,239.939,33.4345,30019);	
					GameObject* Horde12 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13216.6,231.872,33.419,30019);
					GameObject* Horde13 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13237.2,273.418,21.8574,30018);
					GameObject* Horde14 = pCreature->GetMapMgr()->GetInterface()->GetGameObjectNearestCoords(-13176.9,254.606,21.8578,30018);

					Horde1->GetMapMgr()->GetInterface()->DeleteGameObject(Horde1);
					Horde2->GetMapMgr()->GetInterface()->DeleteGameObject(Horde2);
					Horde3->GetMapMgr()->GetInterface()->DeleteGameObject(Horde3);
					Horde4->GetMapMgr()->GetInterface()->DeleteGameObject(Horde4);
					Horde5->GetMapMgr()->GetInterface()->DeleteGameObject(Horde5);
					Horde6->GetMapMgr()->GetInterface()->DeleteGameObject(Horde6);
					Horde7->GetMapMgr()->GetInterface()->DeleteGameObject(Horde7);
					Horde8->GetMapMgr()->GetInterface()->DeleteGameObject(Horde8);
					Horde9->GetMapMgr()->GetInterface()->DeleteGameObject(Horde9);
					Horde10->GetMapMgr()->GetInterface()->DeleteGameObject(Horde10);
					Horde11->GetMapMgr()->GetInterface()->DeleteGameObject(Horde11);
					Horde12->GetMapMgr()->GetInterface()->DeleteGameObject(Horde12);
					Horde13->GetMapMgr()->GetInterface()->DeleteGameObject(Horde13);
					Horde14->GetMapMgr()->GetInterface()->DeleteGameObject(Horde14);
					return;
				}

				if(STAGE == 5)
				{
					return;
				}

		}






void ArenaEvent::GossipEnd(Object * pObject, Player* Plr)
{
    GossipScript::GossipEnd(pObject, Plr);
}

void SetupArenaEvent(ScriptMgr * mgr)
{
	GossipScript * gs = (GossipScript*) new ArenaEvent();
    mgr->register_gossip_script(123213, gs);
}*/