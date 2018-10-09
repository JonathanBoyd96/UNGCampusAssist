<%@ Page Title="" Language="C#" MasterPageFile="~/MyTemplate.Master" AutoEventWireup="true" CodeBehind="default.aspx.cs" Inherits="FA17._default" %>
<asp:Content ID="Content1" ContentPlaceHolderID="head" runat="server">
</asp:Content>
<asp:Content ID="Content2" ContentPlaceHolderID="MainContent" runat="server">
    First Name:<asp:TextBox ID="First" runat="server"></asp:TextBox>
    <asp:RequiredFieldValidator ID="FirstRequired" runat="server" ErrorMessage="Field Required" ControlToValidate="First"></asp:RequiredFieldValidator>
    <asp:Button ID="submit" runat="server" Text="Submit" OnClick="submit_Click" /><br />
    <asp:Label ID="DATA" runat="server" Text="Label"></asp:Label>
</asp:Content>
