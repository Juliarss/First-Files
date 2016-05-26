<%@ Page Language="C#" MasterPageFile="~/AdminMasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="AdminMaintainItems.aspx.cs" Inherits="AdminMaintainItems" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style9
        {
            width: 100%;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <hr />
    <p>
        Maintain Items:</p>
    <p>
        Select Catogery:
        <asp:DropDownList ID="DropSearchCat" runat="server" AutoPostBack="True" 
            DataSourceID="SqlDataSource1" DataTextField="Catogery" 
            DataValueField="Catogery" 
            onselectedindexchanged="DropSearchCat_SelectedIndexChanged">
        </asp:DropDownList>
        <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            SelectCommand="SELECT [Catogery] FROM [ProductCatogery]">
        </asp:SqlDataSource>
    </p>
    <p>
        <asp:GridView ID="GridView1" runat="server" AutoGenerateColumns="False" 
            CellPadding="4" DataKeyNames="ProductID" DataSourceID="SqlDataSource2" 
            ForeColor="#333333" GridLines="None">
            <FooterStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <RowStyle BackColor="#EFF3FB" />
            <Columns>
                <asp:CommandField ButtonType="Button" ShowSelectButton="True" />
                <asp:BoundField DataField="ProductID" HeaderText="ProductID" 
                    InsertVisible="False" ReadOnly="True" SortExpression="ProductID" />
                <asp:BoundField DataField="ProductName" HeaderText="ProductName" 
                    SortExpression="ProductName" />
                <asp:BoundField DataField="ProductShortDescription" 
                    HeaderText="ProductShortDescription" SortExpression="ProductShortDescription" />
                <asp:BoundField DataField="Price" HeaderText="Price" SortExpression="Price" />
                <asp:BoundField DataField="Category" HeaderText="Category" 
                    SortExpression="Category" />
                <asp:BoundField DataField="ProductImage" HeaderText="ProductImage" 
                    SortExpression="ProductImage" />
            </Columns>
            <PagerStyle BackColor="#2461BF" ForeColor="White" HorizontalAlign="Center" />
            <SelectedRowStyle BackColor="#D1DDF1" Font-Bold="True" ForeColor="#333333" />
            <HeaderStyle BackColor="#507CD1" Font-Bold="True" ForeColor="White" />
            <EditRowStyle BackColor="#2461BF" />
            <AlternatingRowStyle BackColor="White" />
        </asp:GridView>
        <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            DeleteCommand="DELETE FROM [ProductTable] WHERE [ProductID] = @ProductID" 
            InsertCommand="INSERT INTO [ProductTable] ([ProductName], [ProductDescription], [ProductShortDescription], [Price], [Category], [ProductImage]) VALUES (@ProductName, @ProductDescription, @ProductShortDescription, @Price, @Category, @ProductImage)" 
            SelectCommand="SELECT * FROM [ProductTable] WHERE ([Category] = @Category)" 
            UpdateCommand="UPDATE [ProductTable] SET [ProductName] = @ProductName, [ProductDescription] = @ProductDescription, [ProductShortDescription] = @ProductShortDescription, [Price] = @Price, [Category] = @Category, [ProductImage] = @ProductImage WHERE [ProductID] = @ProductID">
            <SelectParameters>
                <asp:ControlParameter ControlID="DropSearchCat" Name="Category" 
                    PropertyName="SelectedValue" Type="String" />
            </SelectParameters>
            <DeleteParameters>
                <asp:Parameter Name="ProductID" Type="Int32" />
            </DeleteParameters>
            <UpdateParameters>
                <asp:Parameter Name="ProductName" Type="String" />
                <asp:Parameter Name="ProductDescription" Type="String" />
                <asp:Parameter Name="ProductShortDescription" Type="String" />
                <asp:Parameter Name="Price" Type="Double" />
                <asp:Parameter Name="Category" Type="String" />
                <asp:Parameter Name="ProductImage" Type="String" />
                <asp:Parameter Name="ProductID" Type="Int32" />
            </UpdateParameters>
            <InsertParameters>
                <asp:Parameter Name="ProductName" Type="String" />
                <asp:Parameter Name="ProductDescription" Type="String" />
                <asp:Parameter Name="ProductShortDescription" Type="String" />
                <asp:Parameter Name="Price" Type="Double" />
                <asp:Parameter Name="Category" Type="String" />
                <asp:Parameter Name="ProductImage" Type="String" />
            </InsertParameters>
        </asp:SqlDataSource>
    </p>
    <p>
        <asp:FormView ID="FormView2" runat="server" 
            DataKeyNames="ProductID" DataSourceID="SqlDataSource3" 
            onitemupdated="FormView2_ItemUpdated" Width="532px">
            <EditItemTemplate>
                <table class="style9">
                    <tr>
                        <td>
                            ProductID:</td>
                        <td>
                            <asp:Label ID="ProductIDLabel" runat="server" Text='<%# Eval("ProductID") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Name:</td>
                        <td>
                            <asp:TextBox ID="ProductNameTextBox" runat="server" 
                                Text='<%# Bind("ProductName") %>' />
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
                                ControlToValidate="ProductNameTextBox" 
                                ErrorMessage="Product's Name is requierd">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Description:</td>
                        <td>
                            <asp:TextBox ID="ProductDescriptionTextBox" runat="server" Height="62px" 
                                Text='<%# Bind("ProductDescription") %>' TextMode="MultiLine" Width="190px" />
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
                                ControlToValidate="ProductDescriptionTextBox" 
                                ErrorMessage="Description is requierd">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Short Description:</td>
                        <td>
                            <asp:TextBox ID="ProductShortDescriptionTextBox" runat="server" 
                                Text='<%# Bind("ProductShortDescription") %>' TextMode="MultiLine" 
                                Width="188px" />
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
                                ControlToValidate="ProductShortDescriptionTextBox" 
                                ErrorMessage="Description is requierd">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Price:</td>
                        <td>
                            <asp:TextBox ID="PriceTextBox" runat="server" Text='<%# Bind("Price") %>' />
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                                ControlToValidate="PriceTextBox" ErrorMessage="image is requierd">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Category:</td>
                        <td>
                            <asp:DropDownList ID="DropDownList1" runat="server" 
                                DataSourceID="SqlDataSource1" DataTextField="Catogery" 
                                DataValueField="Catogery" SelectedValue='<%# Bind("Category") %>'>
                            </asp:DropDownList>
                            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                                SelectCommand="SELECT * FROM [ProductCatogery]"></asp:SqlDataSource>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image:</td>
                        <td>
                            <asp:TextBox ID="ProductImageTextBox" runat="server" 
                                Text='<%# Bind("ProductImage") %>' />
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                                ControlToValidate="ProductImageTextBox" 
                                ErrorMessage="Product's Name is requierd">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;ImageThumb:</td>
                        <td>
                            <asp:TextBox ID="ProductImageThumbTextBox" runat="server" 
                                Text='<%# Bind("ProductImageThumb") %>' />
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                                ControlToValidate="ProductImageThumbTextBox" ErrorMessage="image is requierd">*</asp:RequiredFieldValidator>
                        </td>
                    </tr>
                </table>
                <asp:LinkButton ID="UpdateButton" runat="server" CausesValidation="True" 
                    CommandName="Update" Text="Update" />
                &nbsp;<asp:LinkButton ID="UpdateCancelButton" runat="server" 
                    CausesValidation="False" CommandName="Cancel" Text="Cancel" />
                <br />
                <asp:ValidationSummary ID="ValidationSummary1" runat="server" />
            </EditItemTemplate>
            <InsertItemTemplate>
                ProductName:
                <asp:TextBox ID="ProductNameTextBox" runat="server" 
                    Text='<%# Bind("ProductName") %>' />
                <br />
                ProductDescription:
                <asp:TextBox ID="ProductDescriptionTextBox" runat="server" 
                    Text='<%# Bind("ProductDescription") %>' />
                <br />
                ProductShortDescription:
                <asp:TextBox ID="ProductShortDescriptionTextBox" runat="server" 
                    Text='<%# Bind("ProductShortDescription") %>' />
                <br />
                Price:
                <asp:TextBox ID="PriceTextBox" runat="server" Text='<%# Bind("Price") %>' />
                <br />
                Category:
                <asp:TextBox ID="CategoryTextBox" runat="server" 
                    Text='<%# Bind("Category") %>' />
                <br />
                ProductImage:
                <asp:TextBox ID="ProductImageTextBox" runat="server" 
                    Text='<%# Bind("ProductImage") %>' />
                <br />
                ProductImageThumb:
                <asp:TextBox ID="ProductImageThumbTextBox" runat="server" 
                    Text='<%# Bind("ProductImageThumb") %>' />
                <br />
                <asp:LinkButton ID="InsertButton" runat="server" CausesValidation="True" 
                    CommandName="Insert" Text="Insert" />
                &nbsp;<asp:LinkButton ID="InsertCancelButton" runat="server" 
                    CausesValidation="False" CommandName="Cancel" Text="Cancel" />
            </InsertItemTemplate>
            <ItemTemplate>
                <table class="style9">
                    <tr>
                        <td>
                            ProductID:</td>
                        <td>
                            <asp:Label ID="ProductIDLabel" runat="server" Text='<%# Eval("ProductID") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Product Name:</td>
                        <td>
                            <asp:Label ID="ProductNameLabel" runat="server" 
                                Text='<%# Bind("ProductName") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Description:</td>
                        <td>
                            <asp:Label ID="ProductDescriptionLabel" runat="server" 
                                Text='<%# Bind("ProductDescription") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Short Description:</td>
                        <td>
                            <asp:Label ID="ProductShortDescriptionLabel" runat="server" 
                                Text='<%# Bind("ProductShortDescription") %>' />
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
                            Category:</td>
                        <td>
                            <asp:Label ID="CategoryLabel" runat="server" Text='<%# Bind("Category") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            Image:</td>
                        <td>
                            <asp:Label ID="ProductImageLabel" runat="server" 
                                Text='<%# Bind("ProductImage") %>' />
                        </td>
                    </tr>
                    <tr>
                        <td>
                            &nbsp;ImageThumb:</td>
                        <td>
                            <asp:Label ID="ProductImageThumbLabel" runat="server" 
                                Text='<%# Bind("ProductImageThumb") %>' />
                        </td>
                    </tr>
                </table>
                <asp:LinkButton ID="EditButton" runat="server" CausesValidation="False" 
                    CommandName="Edit" Text="Edit" />
                &nbsp;<asp:LinkButton ID="DeleteButton" runat="server" CausesValidation="False" 
                    CommandName="Delete" Text="Delete" />
                &nbsp;<asp:LinkButton ID="NewButton" runat="server" CausesValidation="False" 
                    CommandName="New" Text="New" />
            </ItemTemplate>
        </asp:FormView>
    </p>
    <p>
        <asp:SqlDataSource ID="SqlDataSource3" runat="server" 
            ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
            DeleteCommand="DELETE FROM [ProductTable] WHERE [ProductID] = @ProductID" 
            InsertCommand="INSERT INTO [ProductTable] ([ProductName], [ProductDescription], [ProductShortDescription], [Price], [Category], [ProductImage], [ProductImageThumb]) VALUES (@ProductName, @ProductDescription, @ProductShortDescription, @Price, @Category, @ProductImage, @ProductImageThumb)" 
            SelectCommand="SELECT * FROM [ProductTable] Where ProductID = @ProductID" 
            UpdateCommand="UPDATE [ProductTable] SET [ProductName] = @ProductName, [ProductDescription] = @ProductDescription, [ProductShortDescription] = @ProductShortDescription, [Price] = @Price, [Category] = @Category, [ProductImage] = @ProductImage, [ProductImageThumb] = @ProductImageThumb WHERE [ProductID] = @ProductID">
            <SelectParameters>
                <asp:ControlParameter ControlID="GridView1" Name="ProductID" 
                    PropertyName="SelectedValue" />
            </SelectParameters>
            <DeleteParameters>
                <asp:Parameter Name="ProductID" Type="Int32" />
            </DeleteParameters>
            <UpdateParameters>
                <asp:Parameter Name="ProductName" Type="String" />
                <asp:Parameter Name="ProductDescription" Type="String" />
                <asp:Parameter Name="ProductShortDescription" Type="String" />
                <asp:Parameter Name="Price" Type="Double" />
                <asp:Parameter Name="Category" Type="String" />
                <asp:Parameter Name="ProductImage" Type="String" />
                <asp:Parameter Name="ProductImageThumb" Type="String" />
                <asp:Parameter Name="ProductID" Type="Int32" />
            </UpdateParameters>
            <InsertParameters>
                <asp:Parameter Name="ProductName" Type="String" />
                <asp:Parameter Name="ProductDescription" Type="String" />
                <asp:Parameter Name="ProductShortDescription" Type="String" />
                <asp:Parameter Name="Price" Type="Double" />
                <asp:Parameter Name="Category" Type="String" />
                <asp:Parameter Name="ProductImage" Type="String" />
                <asp:Parameter Name="ProductImageThumb" Type="String" />
            </InsertParameters>
        </asp:SqlDataSource>
        <br />
    </p>
    </asp:Content>

