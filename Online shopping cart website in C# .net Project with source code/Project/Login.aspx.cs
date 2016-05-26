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

public partial class Login : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {

    }
    protected void Button1_Click(object sender, EventArgs e)
    {
        // Data source control that works with Sql databases

        SqlDataSource sds = new SqlDataSource();



        // Get connection string from application's default configuration

        sds.ConnectionString = ConfigurationManager.ConnectionStrings["ConnectionString"].ToString();



        // Create parameters with specified names and values

        sds.SelectParameters.Add("Username", TypeCode.String, this.TextBox1.Text);

        sds.SelectParameters.Add("Password", TypeCode.String, this.TextBox2.Text);





        // Set the SQL string to retrieve data from the underlying database

        sds.SelectCommand = "SELECT * FROM [UserTable] WHERE [Username] = @Username AND [Password] = @Password";



        // Retrieve data

        DataView dv = (DataView)sds.Select(DataSourceSelectArguments.Empty);



        // Display error message and return if the number of record is zero

        if (dv.Count == 0)
        {

            this.Label1.ForeColor = System.Drawing.Color.Red;

            this.Label1.Text = "Login Failed!";

            return;

        }



        // Create session variables

        this.Session["Username"] = dv[0].Row["Username"].ToString();

        this.Session["UserType"] = dv[0].Row["UserType"].ToString();



        // Redirect to respective page based on user type

        if (this.Session["UserType"].ToString().Equals("user"))

            Response.Redirect("MainPageUsers.aspx");

        else if (this.Session["UserType"].ToString().Equals("admin"))

            Response.Redirect("MainPageAdmin.aspx");




    }
}
