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

public partial class AdminSalesMaintenance : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        MultiView1.ActiveViewIndex = RadioButtonList1.SelectedIndex;
    }


    protected void FormView2_ItemUpdated(object sender, FormViewUpdatedEventArgs e)
    {
        this.GridView3.DataBind();
    }
    protected void FormView3_ItemUpdated(object sender, FormViewUpdatedEventArgs e)
    {
        this.GridView2.DataBind();
    }
}
