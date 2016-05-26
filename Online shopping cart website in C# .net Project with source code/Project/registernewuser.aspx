<%@ Page Language="C#" MasterPageFile="~/login.master" AutoEventWireup="true" CodeFile="registernewuser.aspx.cs" Inherits="registernewuser" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style17
        {
            width: 100%;
        }
        .style18
        {
            width: 156px;
        }
        .style19
        {
            text-align: center;
            font-weight: bold;
            font-size: medium;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table class="style17">
        <tr>
            <td class="style19" colspan="2" 
                style="border-color: #000080; background-color: #AABFEA; border-bottom-style: solid;">
        Register New User</td>
        </tr>
        <tr>
            <td class="style18">
                Name</td>
            <td>
    <asp:TextBox ID="txtName" runat="server" Width="139px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                    ControlToValidate="txtName" ErrorMessage="Name Is requierd">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                Passport Number</td>
            <td>
    <asp:TextBox ID="txtpassportNumber" runat="server" Width="139px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                    ControlToValidate="txtpassportNumber" 
                    ErrorMessage="Please Enter your Passport Number">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                UserName</td>
            <td>
    <asp:TextBox ID="txtUserName" runat="server" Width="139px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                    ControlToValidate="txtUserName" ErrorMessage="Please Enter your username">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                Password</td>
            <td>
    <asp:TextBox ID="txtPassword1" runat="server" Width="139px" TextMode="Password"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                    ControlToValidate="txtPassword1" ErrorMessage="please enter your password">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                Re-Type Password</td>
            <td>
    <asp:TextBox ID="txtpassword2" runat="server" Width="137px" TextMode="Password"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                    ControlToValidate="txtpassword2" ErrorMessage="please enter The password again">*</asp:RequiredFieldValidator>
                <asp:CompareValidator ID="CompareValidator1" runat="server" 
                    ControlToCompare="txtPassword1" ControlToValidate="txtpassword2" 
                    ErrorMessage="Password is not matched">*</asp:CompareValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                Email</td>
            <td>
    <asp:TextBox ID="txtEmail1" runat="server" Width="136px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                    ControlToValidate="txtEmail1" ErrorMessage="Please Enter your Email">*</asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator1" runat="server" 
                    ControlToValidate="txtEmail1" ErrorMessage="Email Formate is not Accepted" 
                    ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*">*</asp:RegularExpressionValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                Confirm your Email</td>
            <td>
    <asp:TextBox ID="txtEmail2" runat="server" Width="138px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator7" runat="server" 
                    ControlToValidate="txtEmail2" ErrorMessage="Please Enter your Email">*</asp:RequiredFieldValidator>
                <asp:RegularExpressionValidator ID="RegularExpressionValidator2" runat="server" 
                    ControlToValidate="txtEmail2" ErrorMessage="accepted format is name@domain.ooo" 
                    ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*">*</asp:RegularExpressionValidator>
                <asp:CompareValidator ID="CompareValidator2" runat="server" 
                    ControlToCompare="txtEmail1" ControlToValidate="txtEmail2" 
                    ErrorMessage="The Email address does not matched">*</asp:CompareValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                Address:</td>
            <td>
    <asp:TextBox ID="txtAddress" runat="server" TextMode="MultiLine" Width="141px"></asp:TextBox>
                <asp:RequiredFieldValidator ID="RequiredFieldValidator8" runat="server" 
                    ErrorMessage="accepted format is name@domain.ooo" 
                    ControlToValidate="txtAddress">*</asp:RequiredFieldValidator>
            </td>
        </tr>
        <tr>
            <td class="style18">
                &nbsp;</td>
            <td>
                <asp:Label ID="Label1" runat="server" ForeColor="#000066"></asp:Label>
                <asp:ValidationSummary ID="ValidationSummary1" runat="server" />
            </td>
        </tr>
        <tr>
            <td class="style18">
                &nbsp;</td>
            <td>
    <asp:Button ID="Button1" runat="server" onclick="Button1_Click" Text="Register" />
            </td>
        </tr>
    </table>
<p>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
        ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
        DeleteCommand="DELETE FROM [UserTable] WHERE [ID] = @ID" 
        InsertCommand="INSERT INTO [UserTable] ([Username], [Password], [Email], [Address], [Name], [IDnumber], [UserType]) VALUES (@Username, @Password, @Email, @Address, @Name, @IDnumber, @UserType)" 
        SelectCommand="SELECT * FROM [UserTable]" 
        
        UpdateCommand="UPDATE [UserTable] SET [Username] = @Username, [Password] = @Password, [Email] = @Email, [Address] = @Address, [Name] = @Name, [IDnumber] = @IDnumber, [UserType] = @UserType WHERE [ID] = @ID">
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
            <asp:ControlParameter ControlID="txtUserName" Name="Username" 
                PropertyName="Text" Type="String" />
            <asp:ControlParameter ControlID="txtPassword1" Name="Password" 
                PropertyName="Text" Type="String" />
            <asp:ControlParameter ControlID="txtEmail1" Name="Email" PropertyName="Text" 
                Type="String" />
            <asp:ControlParameter ControlID="txtAddress" Name="Address" PropertyName="Text" 
                Type="String" />
            <asp:ControlParameter ControlID="txtName" Name="Name" PropertyName="Text" 
                Type="String" />
            <asp:ControlParameter ControlID="txtpassportNumber" Name="IDnumber" 
                PropertyName="Text" Type="String" />
            <asp:Parameter DefaultValue="user" Name="UserType" />
        </InsertParameters>
    </asp:SqlDataSource>
</p>
</asp:Content>

