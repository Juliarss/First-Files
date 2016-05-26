<%@ Page Language="C#" MasterPageFile="~/AdminMasterPage.master" MaintainScrollPositionOnPostback="true" AutoEventWireup="true" CodeFile="AdminAddNewItem.aspx.cs" Inherits="AdminPage" Title="Yahya's Cameras" %>

<asp:Content ID="Content1" ContentPlaceHolderID="head" Runat="Server">
    <style type="text/css">
        .style9
        {
            text-decoration: underline;
        }
    </style>
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="ContentPlaceHolder1" Runat="Server">
    <hr>
    <p>
        <span __designer:mapid="16c" class="style9">Adding New Item:</span>
            <br __designer:mapid="d3" />
            <br __designer:mapid="d4" />
            <br __designer:mapid="d5" />
            Product&#39;s Name:
            </p>
                        <p>
            <asp:TextBox ID="txtProductName" runat="server"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator1" runat="server" 
            ControlToValidate="txtProductName" ErrorMessage="Product's Name is Requierd">*</asp:RequiredFieldValidator>
            <br __designer:mapid="169" />
        <br __designer:mapid="16a" />
        Product&#39;s Short Description:</p>
                        <p>
        &nbsp;<asp:TextBox ID="txtShortDescription" runat="server" Height="62px" 
            TextMode="MultiLine" Width="326px"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator2" runat="server" 
            ControlToValidate="txtShortDescription" ErrorMessage="Description is Reqiuerd">*</asp:RequiredFieldValidator>
</p>
                        <p>
            <br __designer:mapid="d7" />
            <br __designer:mapid="d8" />
            Product&#39;s Description:
            </p>
                        <p>
            <asp:TextBox ID="txtProductDescription" runat="server" Height="156px" 
            TextMode="MultiLine" Width="375px"></asp:TextBox>
            <asp:RequiredFieldValidator ID="RequiredFieldValidator3" runat="server" 
            ControlToValidate="txtProductDescription" 
            ErrorMessage="Description is Requierd">*</asp:RequiredFieldValidator>
            <br __designer:mapid="da" />
            <br __designer:mapid="db" />
            Catogery:
            <asp:DropDownList ID="dropCatInsert" runat="server" 
                DataSourceID="SqlDataSource2" DataTextField="Catogery" 
                DataValueField="Catogery">
            </asp:DropDownList>
            <asp:SqlDataSource ID="SqlDataSource2" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                SelectCommand="SELECT * FROM [ProductCatogery] WHERE ([CatogeryID] &gt; @CatogeryID)">
                <SelectParameters>
                    <asp:Parameter DefaultValue="1" Name="CatogeryID" Type="Int32" />
                </SelectParameters>
                            </asp:SqlDataSource>
</p>
                        <p>
            Price:
            <asp:TextBox ID="txtPrice" runat="server"></asp:TextBox>
                            <asp:RequiredFieldValidator ID="RequiredFieldValidator4" runat="server" 
                                ControlToValidate="txtPrice" ErrorMessage="Price is reqiuerd">*</asp:RequiredFieldValidator>
                            <asp:CompareValidator ID="CompareValidator1" runat="server" 
                                ControlToValidate="txtPrice" ErrorMessage="Onlt numbers are accepted" 
                                Operator="DataTypeCheck" Type="Integer">*</asp:CompareValidator>
</p>
                        <p>
                            &nbsp;</p>
                        <hr />
                        <p>
            <br __designer:mapid="167" />
        Upload Product Full Size Image:
        </p>
                        <p>
        <asp:FileUpload ID="FileUpload1" runat="server" ondatabinding="btnsaveProduct_Click" />
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator5" runat="server" 
                                ControlToValidate="FileUpload1" 
                                ErrorMessage="you must enter product full size image">*</asp:RequiredFieldValidator>
                            &nbsp;<asp:Label ID="lblFullSizeImage" runat="server" style="color: #FFFFFF"></asp:Label>
</p>
                        <p>
        Upload Product Thumbnail Size Image:</p>
                        <p>
                            <asp:FileUpload ID="FileUpload2" runat="server" 
                                ondatabinding="btnsaveProduct_Click" />
            &nbsp;<asp:RequiredFieldValidator ID="RequiredFieldValidator6" runat="server" 
                                ControlToValidate="FileUpload2" 
                                ErrorMessage="you must enter product thubnail size image">*</asp:RequiredFieldValidator>
                            &nbsp;<asp:Label ID="lblThumbSizeImage" runat="server" 
                                style="font-weight: 700; color: #FFFFFF"></asp:Label>
</p>
                        <p>
                            &nbsp;</p>
                        <hr />
                        <p>
            <br __designer:mapid="de" />
</p>
                        <asp:ValidationSummary ID="ValidationSummary1" runat="server" />
                        <p>
            <br __designer:mapid="df" />
            <br __designer:mapid="e1" />
            <br __designer:mapid="e2" />
            <asp:Label ID="lblAddingNewItem" runat="server" ForeColor="#FF3300"></asp:Label>
            <br __designer:mapid="e4" />
            <br __designer:mapid="e5" />
            <asp:Button ID="btnsaveProduct" runat="server" Text="Add The Item" 
                onclick="btnsaveProduct_Click" />
            <asp:Button ID="btnInsert" runat="server" Text="insert another Item" 
                onclick="btnInsert_Click" />
            <br __designer:mapid="e8" />
            <br __designer:mapid="e9" />
            <br __designer:mapid="ea" />
            <br __designer:mapid="eb" />
            <asp:SqlDataSource ID="SqlDataSource1" runat="server" 
                ConnectionString="<%$ ConnectionStrings:ConnectionString %>" 
                DeleteCommand="DELETE FROM [ProductTable] WHERE [ProductID] = @ProductID" 
                InsertCommand="INSERT INTO [ProductTable] ([ProductName], [ProductDescription], [ProductShortDescription], [Price], [Category], [ProductImage], [ProductImageThumb]) VALUES (@ProductName, @ProductDescription, @ProductShortDescription, @Price, @Category, @ProductImage, @ProductImageThumb)" 
                SelectCommand="SELECT * FROM [ProductTable]" 
                
                
                
                
            
                                UpdateCommand="UPDATE [ProductTable] SET [ProductName] = @ProductName, [ProductDescription] = @ProductDescription, [ProductShortDescription] = @ProductShortDescription, [Price] = @Price, [Category] = @Category, [ProductImage] = @ProductImage, [ProductImageThumb] = @ProductImageThumb WHERE [ProductID] = @ProductID">
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
                    <asp:ControlParameter ControlID="txtProductName" Name="ProductName" 
                        PropertyName="Text" Type="String" />
                    <asp:ControlParameter ControlID="txtProductDescription" 
                        Name="ProductDescription" PropertyName="Text" Type="String" />
                    <asp:ControlParameter ControlID="txtProductDescription" 
                        Name="ProductShortDescription" PropertyName="Text" Type="String" />
                    <asp:ControlParameter ControlID="txtPrice" Name="Price" PropertyName="Text" 
                        Type="Double" />
                    <asp:ControlParameter ControlID="dropCatInsert" Name="Category" 
                        PropertyName="SelectedValue" Type="String" />
                    <asp:ControlParameter ControlID="lblFullSizeImage" Name="ProductImage" 
                        PropertyName="Text" Type="String" />
                    <asp:ControlParameter ControlID="lblThumbSizeImage" Name="ProductImageThumb" 
                        PropertyName="Text" Type="String" />
                </InsertParameters>
            </asp:SqlDataSource>
</p>
    <p>
        &nbsp;</p>
    <p>
        
    </p>
    <p>
    <br />
</p>
<p>
</p>
</asp:Content>

