<%@ Page Language="C#" MasterPageFile="~/Login.master" AutoEventWireup="true" CodeFile="test.aspx.cs" Inherits="test" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
        SelectCommand="SELECT * FROM [UserTable]"></asp:SqlDataSource>
    <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
        DeleteCommand="DELETE FROM [UserTable] WHERE [ID] = @ID" 
        InsertCommand="INSERT INTO [UserTable] ([Username], [Password], [Email], [Address], [Name], [IDnumber], [UserType]) VALUES (@Username, @Password, @Email, @Address, @Name, @IDnumber, @UserType)" 
        SelectCommand="SELECT * FROM [UserTable] Where ID = @ID" 
        UpdateCommand="UPDATE [UserTable] SET [Username] = @Username, [Password] = @Password, [Email] = @Email, [Address] = @Address, [Name] = @Name, [IDnumber] = @IDnumber, [UserType] = @UserType WHERE [ID] = @ID">
        <SelectParameters>
            <asp:ControlParameter ControlID="GridView1" Name="ID" 
                PropertyName="SelectedValue" />
        </SelectParameters>
        <DeleteParameters>
            <asp:Parameter Name="ID" Type="Int32" />
        </DeleteParameters>
        <UpdateParameters>
            <asp:Parameter Name="Username" Type="String" />
            <asp:Parameter Name="Password" Type="String" />
            <asp:Parameter Name="Email" Type="String" />
            <asp:Parameter Name="Address" Type="String" />
            <asp:Parameter Name="Name" Type="String" />
            <asp:Parameter Name="IDnumber" Type="String" />
            <asp:Parameter Name="UserType" Type="String" />
            <asp:Parameter Name="ID" Type="Int32" />
        </UpdateParameters>
        <InsertParameters>
            <asp:Parameter Name="Username" Type="String" />
            <asp:Parameter Name="Password" Type="String" />
            <asp:Parameter Name="Email" Type="String" />
            <asp:Parameter Name="Address" Type="String" />
            <asp:Parameter Name="Name" Type="String" />
            <asp:Parameter Name="IDnumber" Type="String" />
            <asp:Parameter Name="UserType" Type="String" />
        </InsertParameters>
    </asp:SqlDataSource>
    <br />
    <asp:GridView ID="GridView1" runat="server" AllowPaging="True" 
        AllowSorting="True" AutoGenerateColumns="False" DataKeyNames="ID" 
        DataSourceID="SqlDataSource2">
        <Columns>
            <asp:CommandField ShowSelectButton="True" />
            <asp:BoundField DataField="ID" HeaderText="ID" InsertVisible="False" 
                ReadOnly="True" SortExpression="ID" />
            <asp:BoundField DataField="Username" HeaderText="Username" 
                SortExpression="Username" />
            <asp:BoundField DataField="Password" HeaderText="Password" 
                SortExpression="Password" />
            <asp:BoundField DataField="Email" HeaderText="Email" SortExpression="Email" />
            <asp:BoundField DataField="Address" HeaderText="Address" 
                SortExpression="Address" />
            <asp:BoundField DataField="Name" HeaderText="Name" SortExpression="Name" />
            <asp:BoundField DataField="IDnumber" HeaderText="IDnumber" 
                SortExpression="IDnumber" />
            <asp:BoundField DataField="UserType" HeaderText="UserType" 
                SortExpression="UserType" />
        </Columns>
    </asp:GridView>
    <br />
    <asp:DetailsView ID="DetailsView1" runat="server" DataSourceID="SqlDataSource3" 
        Height="50px" onitemupdated="DetailsView1_ItemUpdated" Width="125px">
        <Fields>
            <asp:CommandField ShowEditButton="True" />
        </Fields>
    </asp:DetailsView>
    <br />
</asp:Content>

