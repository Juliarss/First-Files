<%@ Page Language="C#" MasterPageFile="~/MasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="ViewUserProfile.aspx.cs" Inherits="ViewUserProfile" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <br />
    <br />
<asp:DetailsView ID="DetailsView1" runat="server" AutoGenerateRows="False" 
    CellPadding="4" DataKeyNames="ID" DataSourceID="SqlDataSource1" 
    ForeColor="#333333" GridLines="None" Height="50px" Width="153px">
    <FooterStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
    <CommandRowStyle BackColor="#E2DED6" Font-Bold="True" />
    <RowStyle BackColor="#F7F6F3" ForeColor="#333333" />
    <FieldHeaderStyle BackColor="#E9ECF1" Font-Bold="True" />
    <PagerStyle BackColor="#284775" ForeColor="White" HorizontalAlign="Center" />
    <Fields>
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
        <asp:CommandField ShowEditButton="True" />
    </Fields>
    <HeaderStyle BackColor="#5D7B9D" Font-Bold="True" ForeColor="White" />
    <EditRowStyle BackColor="#999999" />
    <AlternatingRowStyle BackColor="White" ForeColor="#284775" />
</asp:DetailsView>
<asp:SqlDataSource ID="SqlDataSource1" runat="server" 
    ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
    DeleteCommand="DELETE FROM [UserTable] WHERE [ID] = @ID" 
    InsertCommand="INSERT INTO [UserTable] ([Username], [Password], [Email], [Address], [Name], [IDnumber], [UserType]) VALUES (@Username, @Password, @Email, @Address, @Name, @IDnumber, @UserType)" 
    SelectCommand="SELECT * FROM [UserTable] WHERE [Username] = @Username" 
    UpdateCommand="UPDATE [UserTable] SET [Username] = @Username, [Password] = @Password, [Email] = @Email, [Address] = @Address, [Name] = @Name, [IDnumber] = @IDnumber, [UserType] = @UserType WHERE [ID] = @ID">
    <SelectParameters>
        <asp:SessionParameter DefaultValue="" Name="Username" SessionField="Username" />
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
</asp:Content>

