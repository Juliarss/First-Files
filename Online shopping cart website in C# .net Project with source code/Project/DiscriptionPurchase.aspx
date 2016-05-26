<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="DiscriptionPurchase.aspx.cs" Inherits="test2" Title="Yahya's Cameras" %>

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
            height: 21px;
        }
        .style19
        {
            height: 21px;
        }
        .style20
        {
            height: 36px;
        }
        .style21
        {
            width: 135px;
            font-weight: bold;
            font-size: medium;
            color: #0033CC;
            height: 58px;
        }
        .style22
        {
            height: 58px;
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
        &nbsp;&nbsp;&nbsp;&nbsp;
        <asp:Label ID="lblProductID" runat="server" Text="Label" style="color: #FFFFFF" 
            Font-Names="Andalus" ForeColor="#666666"></asp:Label>
                    <asp:Label ID="lblusernam" runat="server" ForeColor="White"></asp:Label>
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
                <td class="style21">
                    Product&#39;s Image:</td>
                <td class="style22">
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
                        InsertCommand="INSERT INTO [ShoppingCart] ([ProductIDNo], [UserID], [SalesStatus]) VALUES (@ProductIDNo, @UserID, @SalesStatus)" 
                        SelectCommand="SELECT * FROM [ShoppingCart]" 
                        
                        
                        
                        UpdateCommand="UPDATE [ShoppingCart] SET [ProductIDNo] = @ProductIDNo, [UserID] = @UserID, [SalesStatus] = @SalesStatus WHERE [ShoppingID] = @ShoppingID">
                        <DeleteParameters>
                            <asp:Parameter Name="ShoppingID" Type="Int32" />
                        </DeleteParameters>
                        <UpdateParameters>
                            <asp:Parameter Name="ProductIDNo" Type="String" />
                            <asp:Parameter Name="UserID" Type="String" />
                            <asp:Parameter Name="SalesStatus" Type="String" />
                            <asp:Parameter Name="ShoppingID" Type="Int32" />
                        </UpdateParameters>
                        <InsertParameters>
                            <asp:QueryStringParameter Name="ProductIDNo" QueryStringField="ProductID" 
                                Type="String" />
                            <asp:ControlParameter ControlID="lblusernam" Name="UserID" 
                                PropertyName="Text" Type="String" />
                            <asp:Parameter Name="SalesStatus" DefaultValue="Open" />
                        </InsertParameters>
                    </asp:SqlDataSource>
                </td>
            </tr>
        </table>
    </p>
<p>
        <asp:LinkButton ID="LinkButton2" runat="server" onclick="LinkButton2_Click1">Write 
        a product review</asp:LinkButton>
&nbsp;or
        <asp:LinkButton ID="LinkButton3" runat="server" onclick="LinkButton3_Click">view 
        all reviews</asp:LinkButton>
    </p>
<p>
        <asp:TextBox ID="txtReview" runat="server" Height="186px" TextMode="MultiLine" 
            Width="301px">write the review here</asp:TextBox>
    </p>
<p>
        <asp:Button ID="Button1" runat="server" onclick="Button1_Click1" 
            Text="Submit" />
        <asp:Label ID="Label2" runat="server" 
            Text="you review have been submitted thank you.." ForeColor="#003399"></asp:Label>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            DeleteCommand="DELETE FROM [Reviews] WHERE [ReviewID] = @ReviewID" 
            InsertCommand="INSERT INTO [Reviews] ([Username], [Review], [ProductID]) VALUES (@Username, @Review, @ProductID)" 
            SelectCommand="SELECT * FROM [Reviews]" 
            UpdateCommand="UPDATE [Reviews] SET [Username] = @Username, [Review] = @Review, [ProductID] = @ProductID WHERE [ReviewID] = @ReviewID">
            <DeleteParameters>
                <asp:Parameter Name="ReviewID" Type="Int32" />
            </DeleteParameters>
            <UpdateParameters>
                <asp:Parameter Name="Username" Type="String" />
                <asp:Parameter Name="Review" Type="String" />
                <asp:Parameter Name="ProductID" Type="String" />
                <asp:Parameter Name="ReviewID" Type="Int32" />
            </UpdateParameters>
            <InsertParameters>
                <asp:ControlParameter ControlID="lblusernam" Name="Username" 
                    PropertyName="Text" Type="String" />
                <asp:ControlParameter ControlID="txtReview" Name="Review" PropertyName="Text" 
                    Type="String" />
                <asp:ControlParameter ControlID="lblProductID" Name="ProductID" 
                    PropertyName="Text" Type="String" />
            </InsertParameters>
        </asp:SqlDataSource>
    </p>
<asp:ListView ID="ListView1" runat="server" DataSourceID="SqlDataSource3">
    <AlternatingItemTemplate>
        <asp:Label ID="UsernameLabel" runat="server" Text='<%# Eval("Username") %>'></asp:Label>
        <br />
        Review:
        <asp:Label ID="ReviewLabel" runat="server" Text='<%# Eval("Review") %>'></asp:Label>
        <br />
    </AlternatingItemTemplate>
    <LayoutTemplate>
        <ul ID="itemPlaceholderContainer" runat="server" 
            style="font-family: Verdana, Arial, Helvetica, sans-serif;">
            <li style="background-color: #FAFAD2; color: #284775;" >
                User Name:
                <li ID="itemPlaceholder" runat="server"></li>
            </li>
            </ul>
            <div style="text-align: center; background-color: #FFCC66; font-family: Verdana, Arial, Helvetica, sans-serif; color: #333333;">
            </div>
        </LayoutTemplate>
        <InsertItemTemplate>
            <li style="">Username:
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
            </li>
        </InsertItemTemplate>
        <SelectedItemTemplate>
            <li style="background-color: #FFCC66; font-weight: bold; color: #000080;">Username:
                <asp:Label ID="UsernameLabel" runat="server" Text='<%# Eval("Username") %>' />
                <br />
                Review:
                <asp:Label ID="ReviewLabel" runat="server" Text='<%# Eval("Review") %>' />
                <br />
            </li>
        </SelectedItemTemplate>
        <EmptyDataTemplate>
            No data was returned.
        </EmptyDataTemplate>
        <EditItemTemplate>
            <li style="background-color: #FFCC66; color: #000080;">Username:
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
            </li>
        </EditItemTemplate>
        <ItemTemplate>
            <li style="background-color: #FFFBD6; color: #333333;">Username:
                <asp:Label ID="UsernameLabel" runat="server" Text='<%# Eval("Username") %>' />
                <br />
                Review:
                <asp:Label ID="ReviewLabel" runat="server" Text='<%# Eval("Review") %>' />
                <br />
            </li>
        </ItemTemplate>
        <ItemSeparatorTemplate>
            <br />
        </ItemSeparatorTemplate>
    </asp:ListView>
    <p>
        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            SelectCommand="SELECT [Username], [Review] FROM [Reviews] WHERE ([ProductID] = @ProductID)">
            <SelectParameters>
                <asp:ControlParameter ControlID="lblProductID" Name="ProductID" 
                    PropertyName="Text" Type="String" />
            </SelectParameters>
        </asp:SqlDataSource>
    </p>
    <p>
        <br />
    </p>
    </asp:Content>

