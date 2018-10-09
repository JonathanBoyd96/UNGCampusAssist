using System;
using System.Collections.Generic;
using System.Linq;
using System.Web;
using System.Web.Security;
using System.Web.SessionState;
using System.Web.UI;

namespace FA17
{
    public class Global : System.Web.HttpApplication
    {

        protected void Application_Start(object sender, EventArgs e)
        {
            string JQueryVer = "3.2.1";
            ScriptManager.ScriptResourceMapping.AddDefinition("jquery", new ScriptResourceDefinition
            {
                Path = "https://ajax.googleapis.com/ajax/libs/jquery/" + JQueryVer + "jquery.min.js",
                DebugPath = "https://ajax.googleapis.com/ajax/libs/jquery/" + JQueryVer + "jquery.min.js",
                CdnPath = "https://ajax.googleapis.com/ajax/libs/jquery/" + JQueryVer + "jquery.min.js",
                CdnDebugPath = "https://ajax.googleapis.com/ajax/libs/jquery/" + JQueryVer + "jquery.min.js",
                CdnSupportsSecureConnection = true,
                LoadSuccessExpression = "window.jQuery"
            });

        }

        protected void Session_Start(object sender, EventArgs e)
        {

        }

        protected void Application_BeginRequest(object sender, EventArgs e)
        {

        }

        protected void Application_AuthenticateRequest(object sender, EventArgs e)
        {

        }

        protected void Application_Error(object sender, EventArgs e)
        {

        }

        protected void Session_End(object sender, EventArgs e)
        {

        }

        protected void Application_End(object sender, EventArgs e)
        {

        }
    }
}