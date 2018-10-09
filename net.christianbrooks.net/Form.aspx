<%@ Page Title="DataBase Testing" Language="C#" MasterPageFile="~/MyTemplate.Master" AutoEventWireup="true" CodeBehind="Form.aspx.cs" Inherits="FA17.Form" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    First Name:<asp:TextBox ID="First" runat="server"></asp:TextBox>
    <asp:RequiredFieldValidator ID="FirstRequired" runat="server" 
        ErrorMessage="Field Required" ControlToValidate="First"></asp:RequiredFieldValidator>
    <br />
    <br />
    Last Name:<asp:TextBox ID="Last" runat="server"></asp:TextBox>
    <asp:RequiredFieldValidator ID="LastRequired" runat="server" 
        ErrorMessage="Field Required" ControlToValidate="Last"></asp:RequiredFieldValidator>
    <br />
    <br />
    Age:<asp:DropDownList ID="List" runat="server">
        <asp:ListItem>Blank</asp:ListItem>
        <asp:ListItem>17-21</asp:ListItem>
        <asp:ListItem>22-26</asp:ListItem>
        <asp:ListItem>27-31</asp:ListItem>
        <asp:ListItem>32-36</asp:ListItem>
        <asp:ListItem>37-41</asp:ListItem>
        <asp:ListItem>42-46</asp:ListItem>
        <asp:ListItem>47-51</asp:ListItem>
        <asp:ListItem>52-56</asp:ListItem>
        <asp:ListItem>57-61</asp:ListItem>
        <asp:ListItem>62+</asp:ListItem>
    </asp:DropDownList>
      <asp:RequiredFieldValidator ID="ListRequired" runat="server" 
        ErrorMessage="Field Required" ControlToValidate="List"></asp:RequiredFieldValidator>
    <br />
    <br />
    Gender: <asp:RadioButtonList ID="RBList" runat="server">
        <asp:ListItem>Male</asp:ListItem>
        <asp:ListItem>Female</asp:ListItem>
    </asp:RadioButtonList>
    <asp:RequiredFieldValidator ID="RadioRequired" runat="server" 
        ErrorMessage="Field Required" ControlToValidate="First"></asp:RequiredFieldValidator>
    <br />
    <br />
    Please Check If It Applies to You:
    <br />
    Georgia Resident:<asp:CheckBox ID="GAResident" runat="server" />
     
    <br />
    US Citizen:<asp:CheckBox ID="USCitizen" runat="server" />
   
    <br />
    Born in US:<asp:CheckBox ID="BorninUS" runat="server" />
    
    <br />
    <br />
    <asp:Button ID="insert" runat="server" Text="Insert" OnClick="submit_Click" /><br />
    <asp:Label ID="status" runat="server" Text=""></asp:Label>
    <asp:GridView ID="MyDataGrid" runat="server" AutoGenerateColumns="False" DataKeyNames="id" DataSourceID="SqlDataSource1">
        <Columns>
            <asp:BoundField DataField="id" HeaderText="id" InsertVisible="False" ReadOnly="True" SortExpression="id" />
            <asp:BoundField DataField="first" HeaderText="first" SortExpression="first" />
            <asp:BoundField DataField="last" HeaderText="last" SortExpression="last" />
            <asp:BoundField DataField="age" HeaderText="age" SortExpression="age" />
            <asp:BoundField DataField="gender" HeaderText="gender" SortExpression="gender" />
            <asp:BoundField DataField="GAResident" HeaderText="GAResident" SortExpression="GAResident" />
            <asp:BoundField DataField="USCitizen" HeaderText="USCitizen" SortExpression="USCitizen" />
            <asp:BoundField DataField="BorninUS" HeaderText="BorninUS" SortExpression="BorninUS" />
            
        </Columns>
    </asp:GridView>
    <asp:SqlDataSource ID="SqlDataSource1" runat="server" ConnectionString="<%$ ConnectionStrings:MSSQL %>" SelectCommand="SELECT * FROM [mssql]"></asp:SqlDataSource>
</asp:Content>
