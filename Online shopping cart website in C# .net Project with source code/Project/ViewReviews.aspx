<%@ Page Language="C#" MasterPageFile="~/AdminMasterPage.master" AutoEventWireup="true" CodeFile="ViewReviews.aspx.cs" Inherits="ViewReviews" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style9
        {
            color: #FFFFFF;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:GridView ID="GridView1" runat="server" AllowPaging="True" 
        AllowSorting="True" AutoGenerateColumns="False" BackColor="White" 
        BorderColor="#999999" BorderStyle="None" BorderWidth="1px" CellPadding="3" 
        DataKeyNames="ReviewID" DataSourceID="SqlDataSource1" GridLines="Vertical">
        <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
        <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
        <Columns>
            <asp:CommandField ShowSelectButton="True" />
            <asp:BoundField DataField="ReviewID" HeaderText="ReviewID" 
                InsertVisible="False" ReadOnly="True" SortExpression="ReviewID" />
            <asp:BoundField DataField="Username" HeaderText="Username" 
                SortExpression="Username" />
            <asp:BoundField DataField="Review" HeaderText="Review" 
                SortExpression="Review" />
            <asp:BoundField DataField="ProductName" HeaderText="ProductName" 
                SortExpression="ProductName" />
        </Columns>
        <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
        <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
        <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
        <AlternatingRowStyle BackColor="#DCDCDC" />
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
        DeleteCommand="DELETE FROM [Reviews] WHERE [ReviewID] = @ReviewID" 
        InsertCommand="INSERT INTO [Reviews] ([Username], [Review], [ProductID]) VALUES (@Username, @Review, @ProductID)" 
        SelectCommand="SELECT Reviews.ReviewID, Reviews.Username, Reviews.Review, ProductTable.ProductName FROM Reviews INNER JOIN ProductTable ON Reviews.ProductID = ProductTable.ProductID" 
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
            <asp:Parameter Name="Username" Type="String" />
            <asp:Parameter Name="Review" Type="String" />
            <asp:Parameter Name="ProductID" Type="String" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
    <br />
    <asp:FormView ID="FormView2" runat="server" DataKeyNames="ReviewID" 
        DataSourceID="SqlDataSource2" onitemupdated="FormView2_ItemUpdated" 
        BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" 
        CellPadding="3" GridLines="Vertical">
        <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
        <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
        <EditItemTemplate>
            <span class="style9">ReviewID:
            <asp:Label ID="ReviewIDLabel" runat="server" Text='<%# Eval("ReviewID") %>' />
            </span>
            <br class="style9" />
            <span class="style9">Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Bind("Username") %>' />
            </span>
            <br />
            Review:<br />
&nbsp;<asp:TextBox ID="ReviewTextBox" runat="server" Height="155px" 
                Text='<%# Bind("Review") %>' TextMode="MultiLine" Width="215px" />
            <br />
            <span class="style9">ProductID:
            <asp:Label ID="ProductIDLabel" runat="server" Text='<%# Bind("ProductID") %>' />
            </span>
            <br />
            <br />
            <asp:LinkButton ID="UpdateButton" runat="server" CausesValidation="True" 
                CommandName="Update" Text="Update" />
            &nbsp;<asp:LinkButton ID="UpdateCancelButton" runat="server" 
                CausesValidation="False" CommandName="Cancel" Text="Cancel" />
        </EditItemTemplate>
        <InsertItemTemplate>
            Username:
            <asp:TextBox ID="UsernameTextBox" runat="server" 
                Text='<%# Bind("Username") %>' />
            <br />
            Review:
            <asp:TextBox ID="ReviewTextBox" runat="server" Text='<%# Bind("Review") %>' />
            <br />
            ProductID:
            <asp:TextBox ID="ProductIDTextBox" runat="server" 
                Text='<%# Bind("ProductID") %>' />
            <br />
            <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" 
                CommandName="Insert" Text="Insert" />
            &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" 
                CausesValidation="False" CommandName="Cancel" Text="Cancel" />
        </InsertItemTemplate>
        <ItemTemplate>
            ReviewID:
            <asp:Label ID="ReviewIDLabel" runat="server" Text='<%# Eval("ReviewID") %>' />
            <br />
            Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Bind("Username") %>' />
            <br />
            Review:
            <asp:Label ID="ReviewLabel" runat="server" Text='<%# Bind("Review") %>' />
            <br />
            ProductID:
            <asp:Label ID="ProductIDLabel" runat="server" Text='<%# Bind("ProductID") %>' />
            <br />
            <asp:LinkButton ID="EditButton" runat="server" CausesValidation="False" 
                CommandName="Edit" Text="Edit" />
            &nbsp;<asp:LinkButton ID="DeleteButton" runat="server" CausesValidation="False" 
                CommandName="Delete" Text="Delete" />
            &nbsp;
        </ItemTemplate>
        <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
        <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
        <EditRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
    </asp:FormView>
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
        DeleteCommand="DELETE FROM [Reviews] WHERE [ReviewID] = @ReviewID" 
        InsertCommand="INSERT INTO [Reviews] ([Username], [Review], [ProductID]) VALUES (@Username, @Review, @ProductID)" 
        SelectCommand="SELECT * FROM [Reviews] Where ReviewID = @ReviewID" 
        UpdateCommand="UPDATE [Reviews] SET [Username] = @Username, [Review] = @Review, [ProductID] = @ProductID WHERE [ReviewID] = @ReviewID">
        <SelectParameters>
            <asp:ControlParameter ControlID="GridView1" Name="ReviewID" 
                PropertyName="SelectedValue" />
        </SelectParameters>
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
            <asp:Parameter Name="Username" Type="String" />
            <asp:Parameter Name="Review" Type="String" />
            <asp:Parameter Name="ProductID" Type="String" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
</asp:Content>

