<%@ Page Language="C#" MasterPageFile="~/login.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="DiscriptionPurchaseAnynomous.aspx.cs" Inherits="test2" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style9
        {
            width: 100%;
        }
        .style11
        {
            width: 135px;
            font-weight: bold;
            font-size: medium;
            color: #0033CC;
            height: 36px;
        }
        .style14
        {
            width: 135px;
            font-weight: bold;
            font-size: medium;
            color: #0033CC;
            height: 45px;
        }
        .style15
        {
            height: 45px;
        }
        .style16
        {
            width: 135px;
            font-weight: bold;
            font-size: medium;
            color: #0033CC;
            height: 54px;
        }
        .style17
        {
            height: 54px;
        }
        .style18
        {
            width: 135px;
            font-weight: bold;
            font-size: medium;
            color: #0033CC;
            height: 43px;
        }
        .style19
        {
            height: 43px;
        }
        .style20
        {
            height: 36px;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
<p>
        <table class="style9" style="border-style: groove; vertical-align: text-top">
            <tr style="border-style: groove">
                <td class="style14">
                    Product&#39;s Name:</td>
                <td class="style15">
        <asp:Label ID="lblProductName" runat="server" Text="Label"></asp:Label>
        <asp:Label ID="lblProductID" runat="server" Text="Label" style="color: #FFFFFF" 
            Font-Names="Andalus" ForeColor="#666666"></asp:Label>
                </td>
            </tr>
            <tr>
                <td class="style16">
                    Description:</td>
                <td class="style17">
        <asp:Label ID="lblDescription" runat="server" Text="Label"></asp:Label>
                </td>
            </tr>
            <tr>
                <td class="style18">
                    Price:</td>
                <td class="style19">
        <asp:Label ID="lblPrice" runat="server" Text="Label"></asp:Label>
                    rm</td>
            </tr>
            <tr>
                <td class="style11">
                    Product&#39;s Image:</td>
                <td class="style20">
                    <asp:Image ID="Image2" runat="server" />
                </td>
            </tr>
            <tr>
                <td class="style11">
                    &nbsp;</td>
                <td class="style20">
                    <asp:LinkButton ID="Linklogin" runat="server" onclick="LinkButton2_Click">Login 
                    To purchase the item</asp:LinkButton>
                    <br />
                    <br />
                    <asp:Label ID="Label1" runat="server" Text="Enter Delivery Address:"></asp:Label>
                    <br />
                    <br />
                    <asp:Button ID="btnAddToCart" runat="server" onclick="btnAddToCart_Click" 
                        Text="Add To Cart" />
                    <asp:Label ID="lblItem" runat="server" ForeColor="#FF3300" 
                        Text="Item Has Been Added to your Shopping Cart"></asp:Label>
                    <br />
                    <br />
                    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                        DeleteCommand="DELETE FROM [ShoppingCart] WHERE [ShoppingID] = @ShoppingID" 
                        InsertCommand="INSERT INTO [ShoppingCart] ([ProductID], [UserID], [SalesStatus]) VALUES (@ProductID, @UserID, @SalesStatus)" 
                        SelectCommand="SELECT * FROM [ShoppingCart]" 
                        
                        
                        UpdateCommand="UPDATE [ShoppingCart] SET [ProductID] = @ProductID, [UserID] = @UserID, [SalesStatus] = @SalesStatus WHERE [ShoppingID] = @ShoppingID">
                        <DeleteParameters>
                            <asp:Parameter Name="ShoppingID" Type="Int32" />
                        </DeleteParameters>
                        <UpdateParameters>
                            <asp:Parameter Name="ProductID" Type="String" />
                            <asp:Parameter Name="UserID" Type="String" />
                            <asp:Parameter Name="SalesStatus" Type="String" />
                            <asp:Parameter Name="ShoppingID" Type="Int32" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:ControlParameter ControlID="lblProductID" Name="ProductID" 
                                PropertyName="Text" Type="String" />
                            <asp:SessionParameter DefaultValue="" Name="UserID" SessionField="Username" 
                                Type="String" />
                            <asp:ControlParameter ControlID="lblProductID" Name="ProductID" 
                                PropertyName="Text" Type="String" />
                            <asp:Parameter Name="ProductID" Type="String" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
        <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click1">View 
        Product&#39;s Review</asp:LinkButton>
    </p>
    <asp:ListView ID="ListView1" runat="server" DataSourceID="SqlDataSource2">
        <AlternatingItemTemplate>
            <span style="background-color: #FFFFFF;color: #284775;">Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Eval("Username") %>' />
            <br />
            Review:
            <asp:Label ID="ReviewLabel" runat="server" Text='<%# Eval("Review") %>' />
            <br />
            <br />
            </span>
        </AlternatingItemTemplate>
        <LayoutTemplate>
            <div ID="itemPlaceholderContainer" runat="server" 
                style="font-family: Verdana, Arial, Helvetica, sans-serif;">
                <span ID="itemPlaceholder" runat="server" />
            </div>
            <div style="text-align: center;background-color: #5D7B9D;font-family: Verdana, Arial, Helvetica, sans-serif;color: #FFFFFF;">
            </div>
        </LayoutTemplate>
        <InsertItemTemplate>
            <span style="">Username:
            <asp:TextBox ID="UsernameTextBox" runat="server" 
                Text='<%# Bind("Username") %>' />
            <br />
            Review:
            <asp:TextBox ID="ReviewTextBox" runat="server" Text='<%# Bind("Review") %>' />
            <br />
            <asp:Button ID="InsertButton" runat="server" CommandName="Insert" 
                Text="Insert" />
            <asp:Button ID="CancelButton" runat="server" CommandName="Cancel" 
                Text="Clear" />
            <br />
            <br />
            </span>
        </InsertItemTemplate>
        <SelectedItemTemplate>
            <span style="background-color: #E2DED6;font-weight: bold;color: #333333;">
            Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Eval("Username") %>' />
            <br />
            Review:
            <asp:Label ID="ReviewLabel" runat="server" Text='<%# Eval("Review") %>' />
            <br />
            <br />
            </span>
        </SelectedItemTemplate>
        <EmptyDataTemplate>
            <span>No data was returned.</span>
        </EmptyDataTemplate>
        <EditItemTemplate>
            <span style="background-color: #999999;">Username:
            <asp:TextBox ID="UsernameTextBox" runat="server" 
                Text='<%# Bind("Username") %>' />
            <br />
            Review:
            <asp:TextBox ID="ReviewTextBox" runat="server" Text='<%# Bind("Review") %>' />
            <br />
            <asp:Button ID="UpdateButton" runat="server" CommandName="Update" 
                Text="Update" />
            <asp:Button ID="CancelButton" runat="server" CommandName="Cancel" 
                Text="Cancel" />
            <br />
            <br />
            </span>
        </EditItemTemplate>
        <ItemTemplate>
            <span style="background-color: #E0FFFF;color: #333333;">Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Eval("Username") %>' />
            <br />
            Review:
            <asp:Label ID="ReviewLabel" runat="server" Text='<%# Eval("Review") %>' />
            <br />
            <br />
            </span>
        </ItemTemplate>
    </asp:ListView>
    <p>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            SelectCommand="SELECT [Username], [Review] FROM [Reviews] WHERE ([ProductID] = @ProductID)">
            <SelectParameters>
                <asp:ControlParameter ControlID="lblProductID" Name="ProductID" 
                    PropertyName="Text" Type="String" />
            </SelectParameters>
        </asp:SqlDataSource>
        <br />
    </p>
    </asp:Content>

