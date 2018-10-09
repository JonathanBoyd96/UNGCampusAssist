using System;
using System.Collections.Generic;
using System.Configuration;
using System.Data.SqlClient;
using System.Linq;
using System.Web;
using System.Web.UI;
using System.Web.UI.WebControls;

namespace FA17
{
    public partial class Form : System.Web.UI.Page
    {
        protected void Page_Load(object sender, EventArgs e)
        {

        }

        protected void submit_Click(object sender, EventArgs e)
        {
            if (Page.IsValid)
            {
                SqlConnection conn = new SqlConnection(ConfigurationManager.ConnectionStrings["MSSQL"].ConnectionString);
                try
                {
                    conn.Open();
                    SqlCommand cmd = conn.CreateCommand();
                    cmd.CommandText = "INSERT INTO mssql(first, last, age, gender, GAResident, USCitizen, BorninUS) VALUES('"+First.Text +"', '"+Last.Text + "','" + List.Text + "', '" + RBList.Text + "', '" + GAResident.Checked + "', '" + USCitizen.Checked + "', '" + BorninUS.Checked + "')";
                    try
                    {
                        cmd.ExecuteNonQuery();
                        status.Text = "Insert Success";
                        MyDataGrid.DataBind();
                    }
                    catch (Exception ex2)
                    {
                        status.Text = "Failed insert" +ex2.Message;
                    }
                    conn.Close();

                    conn.Dispose();
                }
                catch (Exception ex)
                {
                    status.Text = "Failed to connect" +ex.Message;
                }

            }
        }

    }
}