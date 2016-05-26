<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="ViewStatusPurchase.aspx.cs" Inherits="ViewStatusPurchase" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
    BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" 
    CellPadding="3" DataKeyNames="ShoppingID" DataSourceID="SqlDataSource1" 
    GridLines="Vertical">
    <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
    <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
    <Columns>
        <asp:ImageField DataImageUrlField="ProductImageThumb" 
            DataImageUrlFormatString="Thumbnails/{0}">
        </asp:ImageField>
        <asp:BoundField DataField="ProductName" HeaderText="Product" 
            SortExpression="ProductName" />
        <asp:BoundField DataField="Price" HeaderText="Price" 
            SortExpression="Price" />
        <asp:BoundField DataField="SalesStatus" HeaderText="Delivery Status" 
            SortExpression="SalesStatus" />
        <asp:BoundField DataField="ShoppingID" HeaderText="Serial Number" 
            InsertVisible="False" ReadOnly="True" SortExpression="ShoppingID" />
    </Columns>
    <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
    <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
    <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
    <AlternatingRowStyle BackColor="#DCDCDC" />
</asp:GridView>
<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
    
        SelectCommand="SELECT ShoppingCart.ShoppingID, ShoppingCart.SalesStatus, ProductTable.ProductName, ProductTable.Price, ProductTable.ProductImageThumb FROM ShoppingCart INNER JOIN ProductTable ON ShoppingCart.ProductIDNo = ProductTable.ProductID WHERE (ShoppingCart.SalesStatus = @SalesStatus OR ShoppingCart.SalesStatus = @SalesStatus2) AND (ShoppingCart.UserID = @Username)">
    <SelectParameters>
        <asp:Parameter DefaultValue="Pending" Name="SalesStatus" Type="String" />
        <asp:Parameter DefaultValue="Completed" Name="SalesStatus2" Type="String" />
        <asp:SessionParameter DefaultValue="" Name="Username" SessionField="Username" />
    </SelectParameters>
</asp:SqlDataSource>
</asp:Content>

