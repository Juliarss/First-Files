<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="SearchItems.aspx.cs" Inherits="test" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    </asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
    </p>
    <p>
        Search For Items by:</p>
    <p>
        <asp:RadioButtonList ID="RadioButtonList1" runat="server" AutoPostBack="True" 
            onselectedindexchanged="RadioButtonList1_SelectedIndexChanged">
            <asp:ListItem Value="0">Search by Catogery</asp:ListItem>
            <asp:ListItem Value="1">Search By Name</asp:ListItem>
        </asp:RadioButtonList>
    </p>
    <p>
        <asp:MultiView ID="MultiView1" runat="server">
            <br />
            <br />
            <asp:View ID="View1" runat="server">
                <hr width="100%" />
                <p>
                    Chose a Catogery &nbsp;<asp:DropDownList ID="DropDownList1" runat="server" 
                        AutoPostBack="True" DataSourceID="SqlDataSource2" DataTextField="Catogery" 
                        DataValueField="Catogery" 
                        onselectedindexchanged="DropDownList1_SelectedIndexChanged">
                    </asp:DropDownList>
                    &nbsp;<asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                        SelectCommand="SELECT * FROM [ProductCatogery]"></asp:SqlDataSource>
                </p>
                <asp:GridView ID="GridView3" runat="server" AutoGenerateColumns="False" 
                    CellPadding="4" DataKeyNames="ProductID" DataSourceID="SqlDataSource1" 
                    ForeColor="#333333" GridLines="None">
                    <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
                    <RowStyle BackColor="#EFF3FB" />
                    <Columns>
                        <asp:HyperLinkField DataNavigateUrlFields="ProductID" 
                            DataNavigateUrlFormatString="DiscriptionPurchase.aspx?ProductID={0}" 
                            Text="Click For Description" />
                        <asp:BoundField DataField="ProductName" HeaderText="ProductName" 
                            SortExpression="ProductName" />
                        <asp:BoundField DataField="ProductShortDescription" 
                            HeaderText="ProductShortDescription" SortExpression="ProductShortDescription" />
                        <asp:BoundField DataField="Price" HeaderText="Price" SortExpression="Price" />
                        <asp:ImageField DataImageUrlField="ProductImageThumb" 
                            NullDisplayText="Image is Not Available" 
                            DataImageUrlFormatString="thumbnails/{0}">
                        </asp:ImageField>
                    </Columns>
                    <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
                    <SelectedRowStyle BackColor="#D1DDF1" Font-Bold="True" ForeColor="#333333" />
                    <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
                    <EditRowStyle BackColor="#2461BF" />
                    <AlternatingRowStyle BackColor="White" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    DeleteCommand="DELETE FROM [ProductTable] WHERE [ProductID] = @ProductID" 
                    InsertCommand="INSERT INTO [ProductTable] ([ProductName], [ProductDescription], [Price], [Category]) VALUES (@ProductName, @ProductDescription, @Price, @Category)" 
                    SelectCommand="SELECT * FROM [ProductTable] WHERE ([Category] = @Category2)" 
                    UpdateCommand="UPDATE [ProductTable] SET [ProductName] = @ProductName, [ProductDescription] = @ProductDescription, [Price] = @Price, [Category] = @Category WHERE [ProductID] = @ProductID">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="DropDownList1" Name="Category2" 
                            PropertyName="SelectedValue" Type="String" />
                    </SelectParameters>
                    <DeleteParameters>
                        <asp:Parameter Name="ProductID" Type="Int32" />
                    </DeleteParameters>
                    <UpdateParameters>
                        <asp:Parameter Name="ProductName" Type="String" />
                        <asp:Parameter Name="ProductDescription" Type="String" />
                        <asp:Parameter Name="Price" Type="Double" />
                        <asp:Parameter Name="Category" Type="String" />
                        <asp:Parameter Name="ProductID" Type="Int32" />
                    </UpdateParameters>
                    <InsertParameters>
                        <asp:Parameter Name="ProductName" Type="String" />
                        <asp:Parameter Name="ProductDescription" Type="String" />
                        <asp:Parameter Name="Price" Type="Double" />
                        <asp:Parameter Name="Category" Type="String" />
                    </InsertParameters>
                </asp:SqlDataSource>
            </asp:View>
            <br />
            <br />
            <br />
            <asp:View ID="View2" runat="server">
                <hr width="100%" />
                <p>
                    Enter product name:
                    <asp:TextBox ID="txtItemSearch" runat="server" 
                        ontextchanged="txtItemSearch_TextChanged"></asp:TextBox>
                </p>
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    CellPadding="4" DataKeyNames="ProductID" DataSourceID="SqlDataSource3" 
                    ForeColor="#333333" GridLines="None" 
                    onselectedindexchanged="GridView2_SelectedIndexChanged">
                    <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
                    <RowStyle BackColor="#EFF3FB" />
                    <Columns>
                        <asp:HyperLinkField DataNavigateUrlFields="ProductID" 
                            DataNavigateUrlFormatString="DiscriptionPurchase.aspx?ProductID={0}" 
                            Text="Click For Description" />
                        <asp:BoundField DataField="ProductName" HeaderText="ProductName" 
                            SortExpression="ProductName" />
                        <asp:BoundField DataField="ProductShortDescription" 
                            HeaderText="ProductShortDescription" SortExpression="ProductShortDescription" />
                        <asp:BoundField DataField="Price" HeaderText="Price" SortExpression="Price" />
                        <asp:ImageField DataAlternateTextField="ProductImageThumb" 
                            DataImageUrlField="ProductImageThumb" 
                            NullDisplayText="Image Is Not Available" 
                            DataImageUrlFormatString="thumbnails/{0}">
                        </asp:ImageField>
                    </Columns>
                    <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
                    <SelectedRowStyle BackColor="#D1DDF1" Font-Bold="True" ForeColor="#333333" />
                    <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
                    <EditRowStyle BackColor="#2461BF" />
                    <AlternatingRowStyle BackColor="White" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    SelectCommand="SELECT * FROM [ProductTable] WHERE ([ProductName] LIKE '%' + @ProductName + '%')">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="txtItemSearch" Name="ProductName" 
                            PropertyName="Text" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </asp:View>
            <br />
            <br />
        </asp:MultiView>
    </p>
    <p>
        &nbsp;</p>
    <p>
        &nbsp;</p>
    <p>
        <br />
    </p>
</asp:Content>

