using System;
using System.Collections;
using System.Configuration;
using System.Data;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.UI;
using System.Web.UI.HtmlControls;
using System.Web.UI.WebControls;
using System.Web.UI.WebControls.WebParts;
using System.Xml.Linq;

public partial class test : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void DropDownList1_SelectedIndexChanged(object sender, EventArgs e)
    {
       //// Label1.Text = ("");
       // int log1;
       // log1 = GridView3.Rows.Count;
       // if (log1 < 1)
       // {
       //     Label1.Text = ("no data");
       // }
       // else
       // {
       //     Label1.Text = ("DATA");
       // }
    }
    protected void GridView3_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void GridView2_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    protected void txtItemSearch_TextChanged(object sender, EventArgs e)
    {

    }
    //protected void linkCat_Click(object sender, EventArgs e)
    //{
    //    DropDownList1.Visible = true;
    //   // GridView2.Visible = false;
    //}
    //protected void LinkButton1_Click(object sender, EventArgs e)
    //{
    //    txtItemSearch.Visible = true;
    //  //  GridView3.Visible = false;
    //}
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        MultiView1.ActiveViewIndex = RadioButtonList1.SelectedIndex;
    }
}
