<%@ Page Language="C#" MasterPageFile="~/login.master" AutoEventWireup="true" CodeFile="Login.aspx.cs" Inherits="Login" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style9
        {
            width: 58%;
        }
    .style10
    {
        width: 100%;
    }
    .style11
    {
        width: 92px;
    }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <table class="style9" 
    style="border-style: groove; border-width: thin thin thick thin">
        <tr>
            <td>
                <table class="style10">
                    <tr>
                        <td class="style2" colspan="2" 
                            style="border-width: thin; border-bottom-style: groove; background-color: #7A9BDE;">
                            Login</td>
                    </tr>
                    <tr>
                        <td class="style11">
                            User Name:</td>
                        <td>
                    <asp:TextBox ID="TextBox1" runat="server"></asp:TextBox>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                ControlToValidate="TextBox1" ErrorMessage="Please Enter the username">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr style="border-bottom-style: groove">
                        <td class="style11">
                            Password</td>
                        <td>
                    <asp:TextBox ID="TextBox2" runat="server" TextMode="Password"></asp:TextBox>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                                ControlToValidate="TextBox2" ErrorMessage="Please Enter The password">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            &nbsp;</td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <asp:ValidationSummary ID="ValidationSummary1" runat="server" />
                    <asp:Label ID="Label1" runat="server" ForeColor="#FF3300"></asp:Label>
                        </td>
                    </tr>
                    <tr>
                        <td colspan="2">
                            <asp:Button ID="Button1" runat="server" onclick="Button1_Click" style="text-align: center" 
                        Text="Login" />
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</asp:Content>

