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

public partial class AdminPage : System.Web.UI.Page
{
    protected void Page_Load(object sender, EventArgs e)
    {
        btnInsert.Visible = false;
  //      btnsaveProduct.Visible = false;

    }
    protected void RadioButtonList1_SelectedIndexChanged(object sender, EventArgs e)
    {
//        MultiView1.ActiveViewIndex = RadioButtonList1.SelectedIndex;
    }
    protected void btnsaveProduct_Click(object sender, EventArgs e)
    {


        if (FileUpload1.HasFile)
        {
            FileUpload1.SaveAs("F:/Documents and Settings/shift/Desktop/EWAPP/Uploadedpix/" + FileUpload1.FileName);
            lblFullSizeImage.Text = FileUpload1.FileName;
        }
        if (FileUpload2.HasFile)
        {
            FileUpload2.SaveAs("F:/Documents and Settings/shift/Desktop/EWAPP/Thumbnails/" + FileUpload2.FileName);
        }

        
        
        lblThumbSizeImage.Text = FileUpload2.FileName;

        btnsaveProduct.Visible = true;   
        
        
        SqlDataSource1.Insert();
           this.lblAddingNewItem.Text = "Item Has Been Added into the Database";
           btnsaveProduct.Visible = false;
           btnInsert.Visible = true;
           txtPrice.Enabled = false;
           txtShortDescription.Enabled = false;
           txtProductDescription.Enabled = false;
           txtProductName.Enabled = false;
           dropCatInsert.Enabled = false;
    }
    protected void btnInsert_Click(object sender, EventArgs e)
    {
        txtPrice.Text = "";
        txtProductDescription.Text = "";
        txtProductName.Text = "";
        txtPrice.Enabled = true;
        txtProductDescription.Enabled = true;
        txtProductName.Enabled = true;
        btnsaveProduct.Visible = true;
        dropCatInsert.Enabled = true;
    }
    protected void LinkButton1_Click(object sender, EventArgs e)
    {
//        txtsearchUser.Visible = true;
        //btn1.Visible = true;

        //txtUserIDSearch.Visible = false;
//        btn2.Visible = false;
      //  LinkButton1.Visible = false;
    }
    protected void LinkButton2_Click(object sender, EventArgs e)
    {
        //txtUserIDSearch.Visible = true;
//        btn2.Visible = true;

//        txtsearchUser.Visible = false;
        //btn1.Visible = false;
      //  LinkButton2.Visible = false;
    }


    protected void DropSearchItems_SelectedIndexChanged(object sender, EventArgs e)
    {

    }
    //protected void btnuploadImages_Click(object sender, EventArgs e)
    //{
    //    if (FileUpload1.HasFile)
    //    {
    //        FileUpload1.SaveAs("F:/Documents and Settings/shift/Desktop/EWAPP/Uploadedpix/" + FileUpload1.FileName);
    //    }
    //    if (FileUpload2.HasFile)
    //    {
    //        FileUpload2.SaveAs("F:/Documents and Settings/shift/Desktop/EWAPP/Thumbnails/" + FileUpload2.FileName);
    //    }

    //    txtFimage.Text = FileUpload1.FileName;
    //    txtTimage.Text = FileUpload2.FileName;
    //    Label1.Visible = false;
    // //   btnsaveProduct.Visible = true;
    //}
}
