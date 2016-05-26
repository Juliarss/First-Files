var menus = 3;
var currentMenu = 0;
var selectedMenu = 0;
var clicked = false;

function nothing()
        {
        // dummy function providing a dead link
        // replace with real links
        }

function selectMenu(m) // click on a menu header
        {
        if(clicked) // the menu is already active
                {
                clicked=false;
                selectedMenu=0;
                currentMenu=m;
                hideAll(-1)
                }
        else
                {
                clicked=true;
                selectedMenu=m;
                currentMenu=m;

                hideAll(m); // except m
                if(document.getElementById)
                        {
                        var themenu=document.getElementById("menu"+m);
                        themenu.style.visibility="visible";
                        }
                }
        }


function showMenu(m) // display a full menu on rollover
        {
        if(clicked)
                {
                hideAll(m);
                if(document.getElementById)
                        {
                        var themenubaritem=document.getElementById("menubaritem"+m);
                        themenubaritem.style.background="#cccfcc";
                        var thermenu=document.getElementById("menu"+m);
                        thermenu.style.visibility="visible";
                        }
                }
                selectedMenu=0;
                currentMenu=m;
        }


function doMenuChoice(m,n) // click a menu item
        {
        selectedMenu=0;
        currentMenu=-1;
        hideAll(currentMenu);
        clicked=false;
        //alert("You chose menu "+m+" item "+n);
        return false;
        }


function hideAll(e) // hide all menus except e
        {

                for(i=1;i<=menus;i++)
                        {
                        if(e!=i)
                                {
                                if(document.getElementById)
                                        {
                                        var themenubaritem=document.getElementById("menubaritem"+i);
                                        themenubaritem.style.background="transparent";
                                        var themenu=document.getElementById("menu"+i);
                                        themenu.style.visibility="hidden";
                                        }
                                }
                        }
        }