<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="ShoppingCart.aspx.cs" Inherits="ShoppingCart" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    </asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
  
  
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
    DataKeyNames="ShoppingID" DataSourceID="SqlDataSource1" BackColor="White" 
        BorderColor="#999999" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
        GridLines="Vertical" style="margin-right: 0px" 
        onrowupdated="GridView1_RowUpdated" ShowFooter="True">
        <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
        <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
    <Columns>
        <asp:ImageField DataImageUrlField="ProductImageThumb" 
            DataImageUrlFormatString="Thumbnails/{0}" ReadOnly="True">
        </asp:ImageField>
        <asp:BoundField DataField="ProductName" HeaderText="Product" ReadOnly="True" 
            SortExpression="ProductName" />
        <asp:BoundField DataField="ProductShortDescription" HeaderText="Description" 
            ReadOnly="True" SortExpression="ProductShortDescription" />
        <asp:BoundField DataField="Price" HeaderText="Price" ReadOnly="True" 
            SortExpression="Price" />
        <asp:CommandField ButtonType="Image" DeleteImageUrl="~/Images/Delete.jpg" 
            DeleteText="Remove From Shopping Cart" ShowDeleteButton="True" />

       
    </Columns>
        <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
        <EmptyDataTemplate>
            <b><span class="style17">Shopping cart is empty</span></b>
        </EmptyDataTemplate>
        <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
        <AlternatingRowStyle BackColor="#DCDCDC" />
    </asp:GridView>
    <br />
    
    
<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
    DeleteCommand="DELETE FROM [ShoppingCart] WHERE [ShoppingID] = @ShoppingID" 
    InsertCommand="INSERT INTO [ShoppingCart] ([ProductIDNo], [UserID], [SalesStatus], [qty]) VALUES (@ProductIDNo, @UserID, @SalesStatus, @qty)" 
    SelectCommand="SELECT ShoppingCart.ShoppingID, ShoppingCart.ProductIDNo, ShoppingCart.UserID, ShoppingCart.SalesStatus, ShoppingCart.qty, ProductTable.ProductName, ProductTable.Price, ProductTable.ProductImageThumb, ProductTable.ProductShortDescription FROM ShoppingCart INNER JOIN ProductTable ON ShoppingCart.ProductIDNo = ProductTable.ProductID WHERE (ShoppingCart.SalesStatus = @SalesStatus) AND (ShoppingCart.UserID = @username)" 
    
        
        UpdateCommand="UPDATE [ShoppingCart] SET [ProductIDNo] = @ProductIDNo, [UserID] = @UserID, [SalesStatus] = @SalesStatus, [qty] = @qty WHERE [ShoppingID] = @ShoppingID">
    <SelectParameters>
        <asp:Parameter DefaultValue="Open" Name="SalesStatus" Type="String" />
        <asp:SessionParameter DefaultValue="" Name="Username" SessionField="Username" />
    </SelectParameters>
    <DeleteParameters>
        <asp:Parameter Name="ShoppingID" Type="Int32" />
    </DeleteParameters>
    <UpdateParameters>
        <asp:Parameter Name="ProductIDNo" Type="String" />
        <asp:Parameter Name="UserID" Type="String" />
        <asp:Parameter Name="SalesStatus" Type="String" />
        <asp:Parameter Name="qty" Type="Int32" />
        <asp:Parameter Name="ShoppingID" Type="Int32" />
    </UpdateParameters>
    <InsertParameters>
        <asp:Parameter Name="ProductIDNo" Type="String" />
        <asp:Parameter Name="UserID" Type="String" />
        <asp:Parameter Name="SalesStatus" Type="String" />
        <asp:Parameter Name="qty" Type="Int32" />
    </InsertParameters>
</asp:SqlDataSource>
    <br />
</asp:Content>

