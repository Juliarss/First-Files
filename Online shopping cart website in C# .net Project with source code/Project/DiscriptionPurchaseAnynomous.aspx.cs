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

public partial class test2 : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        ListView1.Visible = false;
        lblItem.Visible = false;
        Linklogin.Visible = false;
        if (Session["UserType"] == null)
        {

            Linklogin.Visible = true;
        
        

        btnAddToCart.Visible = false;
        lblItem.Visible = false;
        Label1.Visible = false;
        }


        if (Request.QueryString["ProductID"] != null)
        {
            string ProductID;
            ProductID = Request.QueryString["ProductID"].ToString();
            string connectionString = "Data Source=.\\SQLEXPRESS;"
                + "AttachDbFilename=\"F:\\6TH\\ONLINE SHOPPING WEBSITE\\DILIP\\APP_DATA\\EWAPP.MDF\";"
                + "Integrated Security=True;"
                + "Connect Timeout=30;"
                + "User Instance=True";

            System.Data.SqlClient.SqlConnection conn = new System.Data.SqlClient.SqlConnection(connectionString);
            System.Data.SqlClient.SqlCommand cmd = conn.CreateCommand();

            cmd.CommandText = "SELECT * FROM [ProductTable] where ProductID='" + ProductID + "'";
           

            conn.Open();

            System.Data.SqlClient.SqlDataReader dr = cmd.ExecuteReader();

            this.lblProductID.Text = "";


            while (dr.Read())
            {

         
                this.lblProductID.Text = dr["ProductID"].ToString();
                this.lblDescription.Text = dr["productDescription"].ToString();
                this.lblPrice.Text = dr["Price"].ToString();
                this.lblProductName.Text = dr["ProductName"].ToString();
                this.Image2.ImageUrl = dr["ProductImage"].ToString();
                Image2.ImageUrl = "uploadedpix/" + dr["ProductImage"].ToString(); 

            }

            dr.Close();
            conn.Close();
        }
        else
            Response.Redirect("UserMainPage.aspx");
    }
    protected void Button1_Click(object sender, EventArgs e)
    {
    //    txtAddress.Visible = true;
        btnAddToCart.Visible = true;
        Label1.Visible = true;
    }
    protected void btnAddToCart_Click(object sender, EventArgs e)
    {
    
            //SqlDataSource1.Insert();
            btnAddToCart.Visible = false;
            lblItem.Visible = true;
            Label1.Visible = false;
        
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        Response.Redirect("login.aspx");
    }

    protected void LinkButton2_Click1(object sender, EventArgs e)
    {
        ListView1.Visible = true;
    }
}

