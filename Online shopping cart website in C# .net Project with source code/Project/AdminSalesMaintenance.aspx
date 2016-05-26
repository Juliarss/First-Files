<%@ Page Language="C#" MasterPageFile="~/AdminMasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="AdminSalesMaintenance.aspx.cs" Inherits="AdminSalesMaintenance" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style9
        {
            width: 100%;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <p>
&nbsp;<asp:RadioButtonList ID="RadioButtonList1" runat="server" AutoPostBack="True" 
            onselectedindexchanged="RadioButtonList1_SelectedIndexChanged">
            <asp:ListItem Value="0">Show All Open Orders</asp:ListItem>
            <asp:ListItem Value="1">Show All Closed Orders</asp:ListItem>
            <asp:ListItem Value="2">Search For Order</asp:ListItem>
        </asp:RadioButtonList>
    </p>
    <p>
        <asp:MultiView ID="MultiView1" runat="server">
            <asp:View ID="View1" runat="server">
                <hr />
                <br />
                All open Orders:<br />
                <asp:GridView ID="GridView3" runat="server" AutoGenerateColumns="False" 
                    BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" 
                    CellPadding="3" DataKeyNames="ShoppingID" DataSourceID="SqlDataSource1" 
                    GridLines="Vertical">
                    <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                    <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
                    <Columns>
                        <asp:CommandField ButtonType="Button" ShowSelectButton="True" />
                        <asp:BoundField DataField="ShoppingID" HeaderText="ShoppingID" 
                            InsertVisible="False" ReadOnly="True" SortExpression="ShoppingID" />
                        <asp:BoundField DataField="ProductIDNo" HeaderText="ProductIDNo" 
                            SortExpression="ProductIDNo" />
                        <asp:BoundField DataField="UserID" HeaderText="UserID" 
                            SortExpression="UserID" />
                        <asp:BoundField DataField="SalesStatus" HeaderText="SalesStatus" 
                            SortExpression="SalesStatus" />
                        <asp:BoundField DataField="qty" HeaderText="qty" SortExpression="qty" />
                    </Columns>
                    <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                    <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                    <AlternatingRowStyle BackColor="#DCDCDC" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    SelectCommand="SELECT * FROM [ShoppingCart] WHERE (([SalesStatus] = @SalesStatus) OR ([SalesStatus] = @SalesStatus2))">
                    <SelectParameters>
                        <asp:Parameter DefaultValue="Open" Name="SalesStatus" Type="String" />
                        <asp:Parameter DefaultValue="Pending" Name="SalesStatus2" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    DeleteCommand="DELETE FROM [ShoppingCart] WHERE [ShoppingID] = @ShoppingID" 
                    InsertCommand="INSERT INTO [ShoppingCart] ([ProductIDNo], [UserID], [SalesStatus], [qty]) VALUES (@ProductIDNo, @UserID, @SalesStatus, @qty)" 
                    SelectCommand="SELECT ShoppingCart.ShoppingID, ShoppingCart.ProductIDNo, ShoppingCart.UserID, ShoppingCart.SalesStatus, ShoppingCart.qty, ProductTable.Price, ProductTable.ProductName, UserTable.Email, UserTable.Address, UserTable.Name FROM ShoppingCart INNER JOIN UserTable ON ShoppingCart.UserID = UserTable.Username INNER JOIN ProductTable ON ShoppingCart.ProductIDNo = ProductTable.ProductID WHERE (ShoppingCart.ShoppingID = @ShoppingID)" 
                    UpdateCommand="UPDATE [ShoppingCart] SET [ProductIDNo] = @ProductIDNo, [UserID] = @UserID, [SalesStatus] = @SalesStatus, [qty] = @qty WHERE [ShoppingID] = @ShoppingID">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="GridView3" Name="ShoppingID" 
                            PropertyName="SelectedValue" />
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
                <asp:FormView ID="FormView2" runat="server" BackColor="White" 
                    BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                    DataKeyNames="ShoppingID" DataSourceID="SqlDataSource4" GridLines="Both" 
                    onitemupdated="FormView2_ItemUpdated" Width="205px">
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <RowStyle ForeColor="#000066" />
                    <EditItemTemplate>
                        <table class="style9" 
                            style="border-bottom-style: solid; border-bottom-color: #000080;">
                            <tr>
                                <td>
                                    ShoppingID:</td>
                                <td>
                                    <asp:Label ID="ShoppingIDLabel" runat="server" 
                                        Text='<%# Eval("ShoppingID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductIDNo:</td>
                                <td>
                                    <asp:Label ID="ProductIDNoLabel0" runat="server" 
                                        Text='<%# Bind("ProductIDNo") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    UserID:</td>
                                <td>
                                    <asp:Label ID="UserIDLabel0" runat="server" Text='<%# Bind("UserID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SalesStatus:</td>
                                <td>
                                    <asp:DropDownList ID="DropDownList1" runat="server" 
                                        SelectedValue='<%# Bind("SalesStatus") %>'>
                                        <asp:ListItem>Open</asp:ListItem>
                                        <asp:ListItem>Pending</asp:ListItem>
                                        <asp:ListItem>Completed</asp:ListItem>
                                    </asp:DropDownList>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    qty:</td>
                                <td>
                                    <asp:Label ID="qtyLabel0" runat="server" Text='<%# Bind("qty") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:</td>
                                <td>
                                    <asp:Label ID="PriceLabel0" runat="server" Text='<%# Bind("Price") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductName:</td>
                                <td>
                                    <asp:Label ID="ProductNameLabel0" runat="server" 
                                        Text='<%# Bind("ProductName") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:</td>
                                <td>
                                    <asp:Label ID="EmailLabel0" runat="server" Text='<%# Bind("Email") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address:</td>
                                <td>
                                    <asp:Label ID="AddressLabel0" runat="server" Text='<%# Bind("Address") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:</td>
                                <td>
                                    <asp:Label ID="NameLabel0" runat="server" Text='<%# Bind("Name") %>' />
                                </td>
                            </tr>
                        </table>
                        <asp:LinkButton ID="EditButton" runat="server" CausesValidation="False" 
                            CommandName="Edit" Text="Edit" />
                        &nbsp;<asp:LinkButton ID="DeleteButton" runat="server" CausesValidation="False" 
                            CommandName="Delete" Text="Delete" />
                        &nbsp;<br />
                        <asp:LinkButton ID="UpdateButton" runat="server" CausesValidation="True" 
                            CommandName="Update" Text="Update" />
                        &nbsp;<asp:LinkButton ID="UpdateCancelButton" runat="server" 
                            CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                    </EditItemTemplate>
                    <InsertItemTemplate>
                        ProductIDNo:
                        <asp:TextBox ID="ProductIDNoTextBox" runat="server" 
                            Text='<%# Bind("ProductIDNo") %>' />
                        <br />
                        UserID:
                        <asp:TextBox ID="UserIDTextBox" runat="server" Text='<%# Bind("UserID") %>' />
                        <br />
                        SalesStatus:
                        <asp:TextBox ID="SalesStatusTextBox" runat="server" 
                            Text='<%# Bind("SalesStatus") %>' />
                        <br />
                        qty:
                        <asp:TextBox ID="qtyTextBox" runat="server" Text='<%# Bind("qty") %>' />
                        <br />
                        Price:
                        <asp:TextBox ID="PriceTextBox" runat="server" Text='<%# Bind("Price") %>' />
                        <br />
                        ProductName:
                        <asp:TextBox ID="ProductNameTextBox" runat="server" 
                            Text='<%# Bind("ProductName") %>' />
                        <br />
                        Email:
                        <asp:TextBox ID="EmailTextBox" runat="server" Text='<%# Bind("Email") %>' />
                        <br />
                        Address:
                        <asp:TextBox ID="AddressTextBox" runat="server" Text='<%# Bind("Address") %>' />
                        <br />
                        Name:
                        <asp:TextBox ID="NameTextBox" runat="server" Text='<%# Bind("Name") %>' />
                        <br />
                        <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" 
                            CommandName="Insert" Text="Insert" />
                        &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" 
                            CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                    </InsertItemTemplate>
                    <ItemTemplate>
                        <table class="style9" style="border-bottom-style: solid; border-color: #000080">
                            <tr>
                                <td>
                                    ShoppingID:</td>
                                <td>
                                    <asp:Label ID="ShoppingIDLabel" runat="server" 
                                        Text='<%# Eval("ShoppingID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductIDNo:</td>
                                <td>
                                    <asp:Label ID="ProductIDNoLabel" runat="server" 
                                        Text='<%# Bind("ProductIDNo") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    UserID:</td>
                                <td>
                                    <asp:Label ID="UserIDLabel" runat="server" Text='<%# Bind("UserID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SalesStatus:</td>
                                <td>
                                    <asp:Label ID="SalesStatusLabel" runat="server" 
                                        Text='<%# Bind("SalesStatus") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    qty:</td>
                                <td>
                                    <asp:Label ID="qtyLabel" runat="server" Text='<%# Bind("qty") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:</td>
                                <td>
                                    <asp:Label ID="PriceLabel" runat="server" Text='<%# Bind("Price") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductName:</td>
                                <td>
                                    <asp:Label ID="ProductNameLabel" runat="server" 
                                        Text='<%# Bind("ProductName") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:</td>
                                <td>
                                    <asp:Label ID="EmailLabel" runat="server" Text='<%# Bind("Email") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address:</td>
                                <td>
                                    <asp:Label ID="AddressLabel" runat="server" Text='<%# Bind("Address") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:</td>
                                <td>
                                    <asp:Label ID="NameLabel" runat="server" Text='<%# Bind("Name") %>' />
                                </td>
                            </tr>
                        </table>
                        &nbsp;<asp:LinkButton ID="EditButton" runat="server" CausesValidation="False" 
                            CommandName="Edit" Text="Edit" />
                        &nbsp;<asp:LinkButton ID="DeleteButton" runat="server" CausesValidation="False" 
                            CommandName="Delete" Text="Delete" />
                        &nbsp;
                    </ItemTemplate>
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
                    <EditRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                </asp:FormView>
                <br />
            </asp:View>
            <br />
            <br />
            <asp:View ID="View2" runat="server">
                <hr />
                All Closed Orders:<br />
                <br />
                <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                    DataKeyNames="ShoppingID" DataSourceID="SqlDataSource2" BackColor="White" 
                    BorderColor="#999999" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                    GridLines="Vertical">
                    <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                    <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
                    <Columns>
                        <asp:CommandField ShowSelectButton="True" />
                        <asp:BoundField DataField="ShoppingID" HeaderText="ShoppingID" 
                            InsertVisible="False" ReadOnly="True" SortExpression="ShoppingID" />
                        <asp:BoundField DataField="ProductIDNo" HeaderText="ProductIDNo" 
                            SortExpression="ProductIDNo" />
                        <asp:BoundField DataField="UserID" HeaderText="UserID" 
                            SortExpression="UserID" />
                        <asp:BoundField DataField="SalesStatus" HeaderText="SalesStatus" 
                            SortExpression="SalesStatus" />
                        <asp:BoundField DataField="qty" HeaderText="qty" 
                            SortExpression="qty" />
                    </Columns>
                    <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                    <EmptyDataTemplate>
                        <span class="style10"><b>No Closed orders</b></span>
                    </EmptyDataTemplate>
                    <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                    <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                    <AlternatingRowStyle BackColor="#DCDCDC" />
                </asp:GridView>
                <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    
                    SelectCommand="SELECT * FROM [ShoppingCart] WHERE ([SalesStatus] = @SalesStatus)">
                    <SelectParameters>
                        <asp:Parameter DefaultValue="Completed" Name="SalesStatus" Type="String" />
                    </SelectParameters>
                </asp:SqlDataSource>
                <br />
                <br />
                <asp:FormView ID="FormView3" runat="server" BackColor="White" 
                    BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                    DataKeyNames="ShoppingID" DataSourceID="SqlDataSource5" GridLines="Both" 
                    onitemupdated="FormView2_ItemUpdated" Width="205px">
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <RowStyle ForeColor="#000066" />
                    <EditItemTemplate>
                        <table class="style9" 
                            style="border-bottom-style: solid; border-bottom-color: #000080;">
                            <tr>
                                <td>
                                    ShoppingID:</td>
                                <td>
                                    <asp:Label ID="ShoppingIDLabel0" runat="server" 
                                        Text='<%# Eval("ShoppingID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductIDNo:</td>
                                <td>
                                    <asp:Label ID="ProductIDNoLabel1" runat="server" 
                                        Text='<%# Bind("ProductIDNo") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    UserID:</td>
                                <td>
                                    <asp:Label ID="UserIDLabel1" runat="server" Text='<%# Bind("UserID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SalesStatus:</td>
                                <td>
                                    <asp:DropDownList ID="DropDownList2" runat="server" 
                                        SelectedValue='<%# Bind("SalesStatus") %>'>
                                        <asp:ListItem>Open</asp:ListItem>
                                        <asp:ListItem>Pending</asp:ListItem>
                                        <asp:ListItem>Completed</asp:ListItem>
                                    </asp:DropDownList>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    qty:</td>
                                <td>
                                    <asp:Label ID="qtyLabel1" runat="server" Text='<%# Bind("qty") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:</td>
                                <td>
                                    <asp:Label ID="PriceLabel1" runat="server" Text='<%# Bind("Price") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductName:</td>
                                <td>
                                    <asp:Label ID="ProductNameLabel1" runat="server" 
                                        Text='<%# Bind("ProductName") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:</td>
                                <td>
                                    <asp:Label ID="EmailLabel1" runat="server" Text='<%# Bind("Email") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address:</td>
                                <td>
                                    <asp:Label ID="AddressLabel1" runat="server" Text='<%# Bind("Address") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:</td>
                                <td>
                                    <asp:Label ID="NameLabel1" runat="server" Text='<%# Bind("Name") %>' />
                                </td>
                            </tr>
                        </table>
                        <asp:LinkButton ID="UpdateCancelButton" runat="server" CausesValidation="False" 
                            CommandName="Cancel" Text="Cancel" />
                        &nbsp;<asp:LinkButton ID="UpdateButton0" runat="server" CausesValidation="True" 
                            CommandName="Update" Text="Update" />
                        &nbsp;
                    </EditItemTemplate>
                    <InsertItemTemplate>
                        ProductIDNo:
                        <asp:TextBox ID="ProductIDNoTextBox" runat="server" 
                            Text='<%# Bind("ProductIDNo") %>' />
                        <br />
                        UserID:
                        <asp:TextBox ID="UserIDTextBox" runat="server" Text='<%# Bind("UserID") %>' />
                        <br />
                        SalesStatus:
                        <asp:TextBox ID="SalesStatusTextBox" runat="server" 
                            Text='<%# Bind("SalesStatus") %>' />
                        <br />
                        qty:
                        <asp:TextBox ID="qtyTextBox" runat="server" Text='<%# Bind("qty") %>' />
                        <br />
                        Price:
                        <asp:TextBox ID="PriceTextBox" runat="server" Text='<%# Bind("Price") %>' />
                        <br />
                        ProductName:
                        <asp:TextBox ID="ProductNameTextBox" runat="server" 
                            Text='<%# Bind("ProductName") %>' />
                        <br />
                        Email:
                        <asp:TextBox ID="EmailTextBox" runat="server" Text='<%# Bind("Email") %>' />
                        <br />
                        Address:
                        <asp:TextBox ID="AddressTextBox" runat="server" Text='<%# Bind("Address") %>' />
                        <br />
                        Name:
                        <asp:TextBox ID="NameTextBox" runat="server" Text='<%# Bind("Name") %>' />
                        <br />
                        <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" 
                            CommandName="Insert" Text="Insert" />
                        &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" 
                            CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                    </InsertItemTemplate>
                    <ItemTemplate>
                        <table class="style9" style="border-bottom-style: solid; border-color: #000080">
                            <tr>
                                <td>
                                    ShoppingID:</td>
                                <td>
                                    <asp:Label ID="ShoppingIDLabel1" runat="server" 
                                        Text='<%# Eval("ShoppingID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductIDNo:</td>
                                <td>
                                    <asp:Label ID="ProductIDNoLabel2" runat="server" 
                                        Text='<%# Bind("ProductIDNo") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    UserID:</td>
                                <td>
                                    <asp:Label ID="UserIDLabel2" runat="server" Text='<%# Bind("UserID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SalesStatus:</td>
                                <td>
                                    <asp:Label ID="SalesStatusLabel0" runat="server" 
                                        Text='<%# Bind("SalesStatus") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    qty:</td>
                                <td>
                                    <asp:Label ID="qtyLabel2" runat="server" Text='<%# Bind("qty") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:</td>
                                <td>
                                    <asp:Label ID="PriceLabel2" runat="server" Text='<%# Bind("Price") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductName:</td>
                                <td>
                                    <asp:Label ID="ProductNameLabel2" runat="server" 
                                        Text='<%# Bind("ProductName") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:</td>
                                <td>
                                    <asp:Label ID="EmailLabel2" runat="server" Text='<%# Bind("Email") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address:</td>
                                <td>
                                    <asp:Label ID="AddressLabel2" runat="server" Text='<%# Bind("Address") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:</td>
                                <td>
                                    <asp:Label ID="NameLabel2" runat="server" Text='<%# Bind("Name") %>' />
                                </td>
                            </tr>
                        </table>
                        <asp:LinkButton ID="EditButton0" runat="server" CausesValidation="False" 
                            CommandName="Edit" Text="Edit" />
                        &nbsp;<asp:LinkButton ID="DeleteButton1" runat="server" CausesValidation="False" 
                            CommandName="Delete" Text="Delete" />
                        &nbsp;
                    </ItemTemplate>
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
                    <EditRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                </asp:FormView>
                <asp:SqlDataSource ID="SqlDataSource5" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    DeleteCommand="DELETE FROM [ShoppingCart] WHERE [ShoppingID] = @ShoppingID" 
                    InsertCommand="INSERT INTO [ShoppingCart] ([ProductIDNo], [UserID], [SalesStatus], [qty]) VALUES (@ProductIDNo, @UserID, @SalesStatus, @qty)" 
                    SelectCommand="SELECT ShoppingCart.ShoppingID, ShoppingCart.ProductIDNo, ShoppingCart.UserID, ShoppingCart.SalesStatus, ShoppingCart.qty, ProductTable.Price, ProductTable.ProductName, UserTable.Email, UserTable.Address, UserTable.Name FROM ShoppingCart INNER JOIN UserTable ON ShoppingCart.UserID = UserTable.Username INNER JOIN ProductTable ON ShoppingCart.ProductIDNo = ProductTable.ProductID where ShoppingID = @ShoppingID" 
                    UpdateCommand="UPDATE [ShoppingCart] SET [ProductIDNo] = @ProductIDNo, [UserID] = @UserID, [SalesStatus] = @SalesStatus, [qty] = @qty WHERE [ShoppingID] = @ShoppingID">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="GridView2" Name="ShoppingID" 
                            PropertyName="SelectedValue" />
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
            </asp:View>
            <br />
            <asp:View ID="View3" runat="server">
                <hr />
                Enter Order Number:
                <asp:TextBox ID="txtSearchSerial" runat="server"></asp:TextBox>
                <br />
                <br />
                <asp:FormView ID="FormView4" runat="server" BackColor="White" 
                    BorderColor="#CCCCCC" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
                    DataKeyNames="ShoppingID" DataSourceID="SqlDataSource3" GridLines="Both" 
                    onitemupdated="FormView2_ItemUpdated" Width="205px">
                    <FooterStyle BackColor="White" ForeColor="#000066" />
                    <RowStyle ForeColor="#000066" />
                    <EditItemTemplate>
                        <table class="style9" 
                            style="border-bottom-style: solid; border-bottom-color: #000080;">
                            <tr>
                                <td>
                                    ShoppingID:</td>
                                <td>
                                    <asp:Label ID="ShoppingIDLabel2" runat="server" 
                                        Text='<%# Eval("ShoppingID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductIDNo:</td>
                                <td>
                                    <asp:Label ID="ProductIDNoLabel3" runat="server" 
                                        Text='<%# Bind("ProductIDNo") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    UserID:</td>
                                <td>
                                    <asp:Label ID="UserIDLabel3" runat="server" Text='<%# Bind("UserID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SalesStatus:</td>
                                <td>
                                    <asp:DropDownList ID="DropDownList3" runat="server" 
                                        SelectedValue='<%# Bind("SalesStatus") %>'>
                                        <asp:ListItem>Open</asp:ListItem>
                                        <asp:ListItem>Pending</asp:ListItem>
                                        <asp:ListItem>Completed</asp:ListItem>
                                    </asp:DropDownList>
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    qty:</td>
                                <td>
                                    <asp:Label ID="qtyLabel3" runat="server" Text='<%# Bind("qty") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:</td>
                                <td>
                                    <asp:Label ID="PriceLabel3" runat="server" Text='<%# Bind("Price") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductName:</td>
                                <td>
                                    <asp:Label ID="ProductNameLabel3" runat="server" 
                                        Text='<%# Bind("ProductName") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:</td>
                                <td>
                                    <asp:Label ID="EmailLabel3" runat="server" Text='<%# Bind("Email") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address:</td>
                                <td>
                                    <asp:Label ID="AddressLabel3" runat="server" Text='<%# Bind("Address") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:</td>
                                <td>
                                    <asp:Label ID="NameLabel3" runat="server" Text='<%# Bind("Name") %>' />
                                </td>
                            </tr>
                        </table>
                        <asp:LinkButton ID="UpdateCancelButton0" runat="server" 
                            CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                        &nbsp;<asp:LinkButton ID="UpdateButton1" runat="server" CausesValidation="True" 
                            CommandName="Update" Text="Update" />
                        &nbsp;
                    </EditItemTemplate>
                    <InsertItemTemplate>
                        ProductIDNo:
                        <asp:TextBox ID="ProductIDNoTextBox0" runat="server" 
                            Text='<%# Bind("ProductIDNo") %>' />
                        <br />
                        UserID:
                        <asp:TextBox ID="UserIDTextBox0" runat="server" Text='<%# Bind("UserID") %>' />
                        <br />
                        SalesStatus:
                        <asp:TextBox ID="SalesStatusTextBox0" runat="server" 
                            Text='<%# Bind("SalesStatus") %>' />
                        <br />
                        qty:
                        <asp:TextBox ID="qtyTextBox0" runat="server" Text='<%# Bind("qty") %>' />
                        <br />
                        Price:
                        <asp:TextBox ID="PriceTextBox0" runat="server" Text='<%# Bind("Price") %>' />
                        <br />
                        ProductName:
                        <asp:TextBox ID="ProductNameTextBox0" runat="server" 
                            Text='<%# Bind("ProductName") %>' />
                        <br />
                        Email:
                        <asp:TextBox ID="EmailTextBox0" runat="server" Text='<%# Bind("Email") %>' />
                        <br />
                        Address:
                        <asp:TextBox ID="AddressTextBox0" runat="server" 
                            Text='<%# Bind("Address") %>' />
                        <br />
                        Name:
                        <asp:TextBox ID="NameTextBox0" runat="server" Text='<%# Bind("Name") %>' />
                        <br />
                        <asp:LinkButton ID="InsertButton0" runat="server" CausesValidation="True" 
                            CommandName="Insert" Text="Insert" />
                        &nbsp;<asp:LinkButton ID="InsertCancelButton0" runat="server" 
                            CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                    </InsertItemTemplate>
                    <ItemTemplate>
                        <table class="style9" style="border-bottom-style: solid; border-color: #000080">
                            <tr>
                                <td>
                                    ShoppingID:</td>
                                <td>
                                    <asp:Label ID="ShoppingIDLabel3" runat="server" 
                                        Text='<%# Eval("ShoppingID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductIDNo:</td>
                                <td>
                                    <asp:Label ID="ProductIDNoLabel4" runat="server" 
                                        Text='<%# Bind("ProductIDNo") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    UserID:</td>
                                <td>
                                    <asp:Label ID="UserIDLabel4" runat="server" Text='<%# Bind("UserID") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    SalesStatus:</td>
                                <td>
                                    <asp:Label ID="SalesStatusLabel1" runat="server" 
                                        Text='<%# Bind("SalesStatus") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    qty:</td>
                                <td>
                                    <asp:Label ID="qtyLabel4" runat="server" Text='<%# Bind("qty") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Price:</td>
                                <td>
                                    <asp:Label ID="PriceLabel4" runat="server" Text='<%# Bind("Price") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    ProductName:</td>
                                <td>
                                    <asp:Label ID="ProductNameLabel4" runat="server" 
                                        Text='<%# Bind("ProductName") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Email:</td>
                                <td>
                                    <asp:Label ID="EmailLabel4" runat="server" Text='<%# Bind("Email") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Address:</td>
                                <td>
                                    <asp:Label ID="AddressLabel4" runat="server" Text='<%# Bind("Address") %>' />
                                </td>
                            </tr>
                            <tr>
                                <td>
                                    Name:</td>
                                <td>
                                    <asp:Label ID="NameLabel4" runat="server" Text='<%# Bind("Name") %>' />
                                </td>
                            </tr>
                        </table>
                        <asp:LinkButton ID="EditButton1" runat="server" CausesValidation="False" 
                            CommandName="Edit" Text="Edit" />
                        &nbsp;<asp:LinkButton ID="DeleteButton2" runat="server" CausesValidation="False" 
                            CommandName="Delete" Text="Delete" />
                        &nbsp;
                    </ItemTemplate>
                    <PagerStyle BackColor="White" ForeColor="#000066" HorizontalAlign="Left" />
                    <HeaderStyle BackColor="#006699" Font-Bold="True" ForeColor="White" />
                    <EditRowStyle BackColor="#669999" Font-Bold="True" ForeColor="White" />
                </asp:FormView>
                <br />
                <br />
                <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                    SelectCommand="SELECT ShoppingCart.ShoppingID, ShoppingCart.ProductIDNo, ShoppingCart.UserID, ShoppingCart.SalesStatus, ShoppingCart.qty, ProductTable.Price, ProductTable.ProductName, UserTable.Email, UserTable.Address, UserTable.Name FROM ShoppingCart INNER JOIN UserTable ON ShoppingCart.UserID = UserTable.Username INNER JOIN ProductTable ON ShoppingCart.ProductIDNo = ProductTable.ProductID WHERE ([ShoppingID] = @ShoppingID)" 
                    
                    
                    UpdateCommand="UPDATE [ShoppingCart] SET [ProductIDNo] = @ProductIDNo, [UserID] = @UserID, [SalesStatus] = @SalesStatus, [qty] = @qty WHERE [ShoppingID] = @ShoppingID">
                    <SelectParameters>
                        <asp:ControlParameter ControlID="txtSearchSerial" Name="ShoppingID" 
                            PropertyName="Text" Type="Int32" />
                    </SelectParameters>
                </asp:SqlDataSource>
            </asp:View>
            <br />
            <br />
        </asp:MultiView>
    </p>
    <p>
        &nbsp;</p>
</asp:Content>

