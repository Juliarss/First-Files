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

public partial class AdminUserMaintenance : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
        MultiView1.ActiveViewIndex = RadioButtonList1.SelectedIndex;
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        SqlDataSource sds = new SqlDataSource();
        sds.ConnectionString = ConfigurationManager.ConnectionStrings["ConnectionString"].ToString();

        sds.SelectParameters.Add("Username", TypeCode.String, this.txtUserName.Text);
        sds.SelectParameters.Add("Email", TypeCode.String, this.txtEmail1.Text);

        sds.SelectCommand = "SELECT * FROM [UserTable] WHERE [Username] = @Username OR [Email] = @Email";

        DataView dv = (DataView)sds.Select(DataSourceSelectArguments.Empty);

        if (dv.Count != 0)
        {

            this.Label1.ForeColor = System.Drawing.Color.Red;

            this.Label1.Text = "The user already Exist!";

            return;

        }


        else
        {

            this.SqlDataSource2.Insert();
            this.Label1.Text = "New User Profile has been created you can login now";
            Button1.Enabled = false;
            txtAddress.Enabled = false;
            txtEmail1.Enabled = false;
            txtEmail2.Enabled = false;
            txtName.Enabled = false;
            txtpassportNumber.Enabled = false;
            txtPassword1.Enabled = false;
            txtpassword2.Enabled = false;
            txtUserName.Enabled = false;
        }
    }

    protected void FormView2_ItemUpdated(object sender, FormViewUpdatedEventArgs e)
    {
        this.GridView1.DataBind();
    }
    protected void FormView3_ItemUpdated(object sender, FormViewUpdatedEventArgs e)
    {
        this.GridView2.DataBind();
    }
}
