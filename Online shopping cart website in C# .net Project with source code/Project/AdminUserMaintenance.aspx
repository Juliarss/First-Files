<%@ Page Language="C#" MasterPageFile="~/AdminMasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="AdminUserMaintenance.aspx.cs" Inherits="AdminUserMaintenance" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">

        .style17
        {
            width: 129%;
        }
        .style19
        {
            text-align: center;
            font-weight: bold;
            font-size: medium;
        }
        .style18
        {
            width: 156px;
        }
        .style20
        {
            width: 132px;
        }
        </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <asp:RadioButtonList ID="RadioButtonList1" runat="server" AutoPostBack="True" 
        onselectedindexchanged="RadioButtonList1_SelectedIndexChanged">
        <asp:ListItem Value="0">Add New Account</asp:ListItem>
        <asp:ListItem Value="1">View / modify My account</asp:ListItem>
        <asp:ListItem Value="2">View / Modify All User Accounts</asp:ListItem>
    </asp:RadioButtonList>
    <asp:MultiView ID="MultiView1" runat="server">
        <asp:View ID="View1" runat="server">
            <table class="style17">
                <tr>
                    <td class="style19" colspan="2" 
                        style="border-color: #000080; background-color: #AABFEA; border-bottom-style: solid;">
                        Add New Administrator Account</td>
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
                            ControlToValidate="txtEmail1" ErrorMessage="RegularExpressionValidator" 
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
                            ControlToValidate="txtAddress" 
                            ErrorMessage="accepted format is name@domain.ooo">*</asp:RequiredFieldValidator>
                    </td>
                </tr>
                <tr>
                    <td class="style18">
                        Chose the user Role</td>
                    <td>
                        <asp:ListBox ID="ListBox1" runat="server" AutoPostBack="True">
                            <asp:ListItem>admin</asp:ListItem>
                            <asp:ListItem>user</asp:ListItem>
                        </asp:ListBox>
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
                        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
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
                                <asp:ControlParameter ControlID="ListBox1" Name="UserType" 
                                    PropertyName="SelectedValue" Type="String" />
                            </InsertParameters>
                        </asp:SqlDataSource>
                    </td>
                    <td>
                        <asp:Button ID="Button1" runat="server" onclick="Button1_Click" 
                            Text="Register" />
                    </td>
                </tr>
            </table>
        </asp:View>
        <br />
        <br />
        <asp:View ID="View2" runat="server">
            <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
                CellPadding="3" DataKeyNames="ID" DataSourceID="SqlDataSource3" 
                GridLines="Vertical" BackColor="White" BorderColor="#999999" BorderStyle="None" 
                BorderWidth="1px">
                <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
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
                </Columns>
                <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                <AlternatingRowStyle BackColor="#DCDCDC" />
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                
                SelectCommand="SELECT * FROM [UserTable] WHERE ([UserType] = @UserType) AND ([Username] = @Username)">
                <SelectParameters>
                    <asp:Parameter DefaultValue="admin" Name="UserType" Type="String" />
                    <asp:SessionParameter DefaultValue="" Name="Username" SessionField="Username" />
                </SelectParameters>
            </asp:SqlDataSource>
            <asp:FormView ID="FormView2" runat="server" DataKeyNames="ID" 
                DataSourceID="SqlDataSource4" onitemupdated="FormView2_ItemUpdated">
                <EditItemTemplate>
                    <table class="style17">
                        <tr>
                            <td class="style20">
                                ID:</td>
                            <td>
                                <asp:Label ID="IDLabel" runat="server" Text='<%# Eval("ID") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Username:</td>
                            <td>
                                <asp:Label ID="UsernameLabel" runat="server" Text='<%# Bind("Username") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Password:</td>
                            <td>
                                <asp:TextBox ID="PasswordTextBox" runat="server" 
                                    Text='<%# Bind("Password") %>' />
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator9" runat="server" 
                                    ControlToValidate="PasswordTextBox" ErrorMessage="Password Is reqierd">*</asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Email:</td>
                            <td>
                                <asp:TextBox ID="EmailTextBox" runat="server" Text='<%# Bind("Email") %>' />
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator10" runat="server" 
                                    ControlToValidate="EmailTextBox" ErrorMessage="Address is Reqiuerd">*</asp:RequiredFieldValidator>
                                <asp:RegularExpressionValidator ID="RegularExpressionValidator3" runat="server" 
                                    ControlToValidate="EmailTextBox" 
                                    ErrorMessage="Email is not in the correct format" 
                                    ValidationExpression="\w+([-+.']\w+)*@\w+([-.]\w+)*\.\w+([-.]\w+)*">*</asp:RegularExpressionValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Address:</td>
                            <td>
                                <asp:TextBox ID="AddressTextBox" runat="server" Text='<%# Bind("Address") %>' />
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator11" runat="server" 
                                    ControlToValidate="AddressTextBox" ErrorMessage="Address is requierd">*</asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Name:</td>
                            <td>
                                <asp:Label ID="NameLabel" runat="server" Text='<%# Bind("Name") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Passport number:</td>
                            <td>
                                <asp:Label ID="IDnumberLabel" runat="server" Text='<%# Bind("IDnumber") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                UserType:</td>
                            <td>
                                <asp:DropDownList ID="DropDownList1" runat="server" 
                                    SelectedValue='<%# Bind("UserType") %>'>
                                    <asp:ListItem>admin</asp:ListItem>
                                    <asp:ListItem>user</asp:ListItem>
                                </asp:DropDownList>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                &nbsp;</td>
                        </tr>
                    </table>
                    <asp:LinkButton ID="UpdateButton" runat="server" CausesValidation="True" 
                        CommandName="Update" Text="Update" />
                    &nbsp;<asp:LinkButton ID="UpdateCancelButton" runat="server" 
                        CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                    <br />
                    <asp:ValidationSummary ID="ValidationSummary2" runat="server" />
                </EditItemTemplate>
                <InsertItemTemplate>
                    Username:
                    <asp:TextBox ID="UsernameTextBox" runat="server" 
                        Text='<%# Bind("Username") %>' />
                    <br />
                    Password:
                    <asp:TextBox ID="PasswordTextBox" runat="server" 
                        Text='<%# Bind("Password") %>' />
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
                    IDnumber:
                    <asp:TextBox ID="IDnumberTextBox" runat="server" 
                        Text='<%# Bind("IDnumber") %>' />
                    <br />
                    UserType:
                    <asp:TextBox ID="UserTypeTextBox" runat="server" 
                        Text='<%# Bind("UserType") %>' />
                    <br />
                    <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" 
                        CommandName="Insert" Text="Insert" />
                    &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" 
                        CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                </InsertItemTemplate>
                <ItemTemplate>
                    <table class="style17">
                        <tr>
                            <td class="style20">
                                ID:</td>
                            <td>
                                <asp:Label ID="IDLabel" runat="server" Text='<%# Eval("ID") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Username:</td>
                            <td>
                                <asp:Label ID="UsernameLabel" runat="server" Text='<%# Bind("Username") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Password:</td>
                            <td>
                                <asp:Label ID="PasswordLabel" runat="server" Text='<%# Bind("Password") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Email:</td>
                            <td>
                                <asp:Label ID="EmailLabel" runat="server" Text='<%# Bind("Email") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Address:</td>
                            <td>
                                <asp:Label ID="AddressLabel" runat="server" Text='<%# Bind("Address") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Name:</td>
                            <td>
                                <asp:Label ID="NameLabel" runat="server" Text='<%# Bind("Name") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Passport number:</td>
                            <td>
                                <asp:Label ID="IDnumberLabel" runat="server" Text='<%# Bind("IDnumber") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                UserType:</td>
                            <td>
                                <asp:Label ID="UserTypeLabel" runat="server" Text='<%# Bind("UserType") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                &nbsp;</td>
                        </tr>
                    </table>
                    <asp:LinkButton ID="EditButton" runat="server" CausesValidation="False" 
                        CommandName="Edit" Text="Edit" />
                    &nbsp;<asp:LinkButton ID="DeleteButton" runat="server" CausesValidation="False" 
                        CommandName="Delete" Text="Delete" />
                    &nbsp;
                </ItemTemplate>
            </asp:FormView>
            <asp:SqlDataSource ID="SqlDataSource4" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                DeleteCommand="DELETE FROM [UserTable] WHERE [ID] = @ID" 
                InsertCommand="INSERT INTO [UserTable] ([Username], [Password], [Email], [Address], [Name], [IDnumber], [UserType]) VALUES (@Username, @Password, @Email, @Address, @Name, @IDnumber, @UserType)" 
                SelectCommand="SELECT * FROM [UserTable] WHERE ID = @ID" 
                
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
        </asp:View>
        <br />
        <br />
        <asp:View ID="View3" runat="server">
            <asp:GridView ID="GridView2" runat="server" AutoGenerateColumns="False" 
                BackColor="White" BorderColor="#999999" BorderStyle="None" BorderWidth="1px" 
                CellPadding="3" DataKeyNames="ID" DataSourceID="SqlDataSource10" 
                GridLines="Vertical">
                <FooterStyle BackColor="#CCCCCC" ForeColor="Black" />
                <RowStyle BackColor="#EEEEEE" ForeColor="Black" />
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
                <PagerStyle BackColor="#999999" ForeColor="Black" HorizontalAlign="Center" />
                <SelectedRowStyle BackColor="#008A8C" Font-Bold="True" ForeColor="White" />
                <HeaderStyle BackColor="#000084" Font-Bold="True" ForeColor="White" />
                <AlternatingRowStyle BackColor="#DCDCDC" />
            </asp:GridView>
            <asp:SqlDataSource ID="SqlDataSource10" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                DeleteCommand="DELETE FROM [UserTable] WHERE [ID] = @ID" 
                InsertCommand="INSERT INTO [UserTable] ([Username], [Password], [Email], [Address], [Name], [IDnumber], [UserType]) VALUES (@Username, @Password, @Email, @Address, @Name, @IDnumber, @UserType)" 
                SelectCommand="SELECT * FROM [UserTable] WHERE ([UserType] = @UserType)" 
                UpdateCommand="UPDATE [UserTable] SET [Username] = @Username, [Password] = @Password, [Email] = @Email, [Address] = @Address, [Name] = @Name, [IDnumber] = @IDnumber, [UserType] = @UserType WHERE [ID] = @ID">
                <SelectParameters>
                    <asp:Parameter DefaultValue="user" Name="UserType" Type="String" />
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
            <asp:FormView ID="FormView3" runat="server" DataKeyNames="ID" 
                DataSourceID="SqlDataSource11" onitemupdated="FormView2_ItemUpdated">
                <EditItemTemplate>
                    <table class="style17">
                        <tr>
                            <td class="style20">
                                ID:</td>
                            <td>
                                <asp:Label ID="IDLabel0" runat="server" Text='<%# Eval("ID") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Username:</td>
                            <td>
                                <asp:Label ID="UsernameLabel0" runat="server" Text='<%# Bind("Username") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Password:</td>
                            <td>
                                <asp:TextBox ID="PasswordTextBox0" runat="server" 
                                    Text='<%# Bind("Password") %>' />
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator12" runat="server" 
                                    ControlToValidate="PasswordTextBox0" ErrorMessage="Password is Reqiuerd">*</asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Email:</td>
                            <td>
                                <asp:TextBox ID="EmailTextBox0" runat="server" Text='<%# Bind("Email") %>' />
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator13" runat="server" 
                                    ControlToValidate="EmailTextBox0" ErrorMessage="Email Is reqiured">*</asp:RequiredFieldValidator>
                                <asp:RegularExpressionValidator ID="RegularExpressionValidator4" runat="server" 
                                    ControlToValidate="EmailTextBox0" 
                                    ErrorMessage="Email is not in the correct format">*</asp:RegularExpressionValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Address:</td>
                            <td>
                                <asp:TextBox ID="AddressTextBox0" runat="server" 
                                    Text='<%# Bind("Address") %>' />
                                <asp:RequiredFieldValidator ID="RequiredFieldValidator14" runat="server" 
                                    ControlToValidate="AddressTextBox0" ErrorMessage="Address is reqiuerd">*</asp:RequiredFieldValidator>
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Name:</td>
                            <td>
                                <asp:Label ID="NameLabel0" runat="server" Text='<%# Bind("Name") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Passport number:</td>
                            <td>
                                <asp:Label ID="IDnumberLabel0" runat="server" Text='<%# Bind("IDnumber") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                UserType:</td>
                            <td>
                                <asp:DropDownList ID="DropDownList2" runat="server" 
                                    SelectedValue='<%# Bind("UserType") %>'>
                                    <asp:ListItem>admin</asp:ListItem>
                                    <asp:ListItem>user</asp:ListItem>
                                </asp:DropDownList>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                &nbsp;</td>
                        </tr>
                    </table>
                    <asp:LinkButton ID="UpdateButton0" runat="server" CausesValidation="True" 
                        CommandName="Update" Text="Update" />
                    &nbsp;<asp:LinkButton ID="UpdateCancelButton0" runat="server" 
                        CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                    <br />
                    <asp:ValidationSummary ID="ValidationSummary3" runat="server" />
                </EditItemTemplate>
                <InsertItemTemplate>
                    Username:
                    <asp:TextBox ID="UsernameTextBox0" runat="server" 
                        Text='<%# Bind("Username") %>' />
                    <br />
                    Password:
                    <asp:TextBox ID="PasswordTextBox1" runat="server" 
                        Text='<%# Bind("Password") %>' />
                    <br />
                    Email:
                    <asp:TextBox ID="EmailTextBox1" runat="server" Text='<%# Bind("Email") %>' />
                    <br />
                    Address:
                    <asp:TextBox ID="AddressTextBox1" runat="server" 
                        Text='<%# Bind("Address") %>' />
                    <br />
                    Name:
                    <asp:TextBox ID="NameTextBox0" runat="server" Text='<%# Bind("Name") %>' />
                    <br />
                    IDnumber:
                    <asp:TextBox ID="IDnumberTextBox0" runat="server" 
                        Text='<%# Bind("IDnumber") %>' />
                    <br />
                    UserType:
                    <asp:TextBox ID="UserTypeTextBox0" runat="server" 
                        Text='<%# Bind("UserType") %>' />
                    <br />
                    <asp:LinkButton ID="InsertButton0" runat="server" CausesValidation="True" 
                        CommandName="Insert" Text="Insert" />
                    &nbsp;<asp:LinkButton ID="InsertCancelButton0" runat="server" 
                        CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                </InsertItemTemplate>
                <ItemTemplate>
                    <table class="style17">
                        <tr>
                            <td class="style20">
                                ID:</td>
                            <td>
                                <asp:Label ID="IDLabel1" runat="server" Text='<%# Eval("ID") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Username:</td>
                            <td>
                                <asp:Label ID="UsernameLabel1" runat="server" Text='<%# Bind("Username") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Password:</td>
                            <td>
                                <asp:Label ID="PasswordLabel0" runat="server" Text='<%# Bind("Password") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Email:</td>
                            <td>
                                <asp:Label ID="EmailLabel0" runat="server" Text='<%# Bind("Email") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Address:</td>
                            <td>
                                <asp:Label ID="AddressLabel0" runat="server" Text='<%# Bind("Address") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Name:</td>
                            <td>
                                <asp:Label ID="NameLabel1" runat="server" Text='<%# Bind("Name") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                Passport number:</td>
                            <td>
                                <asp:Label ID="IDnumberLabel1" runat="server" Text='<%# Bind("IDnumber") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td class="style20">
                                UserType:</td>
                            <td>
                                <asp:Label ID="UserTypeLabel0" runat="server" Text='<%# Bind("UserType") %>' />
                            </td>
                        </tr>
                        <tr>
                            <td colspan="2">
                                &nbsp;</td>
                        </tr>
                    </table>
                    <asp:LinkButton ID="EditButton0" runat="server" CausesValidation="False" 
                        CommandName="Edit" Text="Edit" />
                    &nbsp;<asp:LinkButton ID="DeleteButton0" runat="server" CausesValidation="False" 
                        CommandName="Delete" Text="Delete" />
                    &nbsp;
                </ItemTemplate>
            </asp:FormView>
            <br />
            <asp:SqlDataSource ID="SqlDataSource11" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                DeleteCommand="DELETE FROM [UserTable] WHERE [ID] = @ID" 
                InsertCommand="INSERT INTO [UserTable] ([Username], [Password], [Email], [Address], [Name], [IDnumber], [UserType]) VALUES (@Username, @Password, @Email, @Address, @Name, @IDnumber, @UserType)" 
                SelectCommand="SELECT * FROM [UserTable] WHERE ID = @ID" 
                UpdateCommand="UPDATE [UserTable] SET [Username] = @Username, [Password] = @Password, [Email] = @Email, [Address] = @Address, [Name] = @Name, [IDnumber] = @IDnumber, [UserType] = @UserType WHERE [ID] = @ID">
                <SelectParameters>
                    <asp:ControlParameter ControlID="GridView2" Name="ID" 
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
        </asp:View>
        <br />
        <br />
        <br />
    </asp:MultiView>
    <br />
    <br />
</asp:Content>

