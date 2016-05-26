<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" AutoEventWireup="true" CodeFile="viewMyReviews.aspx.cs" Inherits="viewMyReviews" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style17
        {
            color: #FFFFFF;
        }
        .style19
        {
            color: #003399;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:GridView ID="GridView1" runat="server" AllowSorting="True" 
        AutoGenerateColumns="False" BackColor="White" BorderColor="#999999" 
        BorderStyle="None" BorderWidth="1px" CellPadding="3" DataKeyNames="ReviewID" 
        DataSourceID="SqlDataSource1" GridLines="Vertical">
        <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
        <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
        <Columns>
            <asp:CommandField ShowSelectButton="True" />
            <asp:BoundField DataField="ReviewID" HeaderText="ReviewID" 
                InsertVisible="False" ReadOnly="True" SortExpression="ReviewID" />
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
        SelectCommand="SELECT Reviews.ReviewID, Reviews.Username, Reviews.Review, ProductTable.ProductName FROM Reviews INNER JOIN ProductTable ON Reviews.ProductID = ProductTable.ProductID WHERE (Reviews.Username = @Username)">
        <SelectParameters>
            <asp:SessionParameter Name="Username" SessionField="Username" Type="String" />
        </SelectParameters>
    </asp:SqlDataSource>
    <asp:FormView ID="FormView2" runat="server" DataKeyNames="ReviewID" 
        DataSourceID="SqlDataSource2" onitemupdated="FormView2_ItemUpdated">
        <EditItemTemplate>
            <span class="style17">ReviewID:
            <asp:Label ID="ReviewIDLabel" runat="server" Text='<%# Eval("ReviewID") %>' />
            </span>
            <br class="style17" />
            <span class="style17">Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Bind("Username") %>' />
            </span>
            <br />
            <span class="style19">Review:</span><br />
&nbsp;<asp:TextBox ID="ReviewTextBox" runat="server" Height="120px" 
                Text='<%# Bind("Review") %>' TextMode="MultiLine" Width="220px" />
            <br />
            <span class="style17">ProductID:
            <asp:Label ID="ProductIDLabel" runat="server" Text='<%# Bind("ProductID") %>' />
            </span>
            <br />
            <asp:LinkButton ID="UpdateButton" runat="server" CausesValidation="True" 
                CommandName="Update" Text="Update" />
&nbsp;<asp:LinkButton ID="UpdateCancelButton" runat="server" CausesValidation="False" 
                CommandName="Cancel" Text="Cancel" />
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
            <span class="style17">ReviewID:
            <asp:Label ID="ReviewIDLabel" runat="server" Text='<%# Eval("ReviewID") %>' />
            </span>
            <br class="style17" />
            <span class="style17">Username:
            <asp:Label ID="UsernameLabel" runat="server" Text='<%# Bind("Username") %>' />
            </span>
            <br />
            <span class="style18">Review:</span>
            <br />
            <br />
            <asp:Label ID="ReviewLabel" runat="server" Text='<%# Bind("Review") %>' />
            <br />
            <span class="style17">ProductID:
            <asp:Label ID="ProductIDLabel" runat="server" Text='<%# Bind("ProductID") %>' />
            </span>
            <br />
            <asp:LinkButton ID="EditButton" runat="server" CausesValidation="False" 
                CommandName="Edit" Text="Edit" />
&nbsp;<asp:LinkButton ID="DeleteButton" runat="server" CausesValidation="False" 
                CommandName="Delete" Text="Delete" />
            &nbsp;
        </ItemTemplate>
    </asp:FormView>
<br />
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
        DeleteCommand="DELETE FROM [Reviews] WHERE [ReviewID] = @ReviewID" 
        InsertCommand="INSERT INTO [Reviews] ([Username], [Review], [ProductID]) VALUES (@Username, @Review, @ProductID)" 
        SelectCommand="SELECT * FROM [Reviews] WHERE ([ReviewID] = @ReviewID)" 
        UpdateCommand="UPDATE [Reviews] SET [Username] = @Username, [Review] = @Review, [ProductID] = @ProductID WHERE [ReviewID] = @ReviewID">
        <SelectParameters>
            <asp:ControlParameter ControlID="GridView1" Name="ReviewID" 
                PropertyName="SelectedValue" Type="Int32" />
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
</asp:Content>

