/**
 * Deutschland API c# client Beispielanwendung
 *
 * @category             Deutschland API
 * @package              client
 * @copyright            Copyright (c) 2009 Compuccino (http://www.compuccino.com)
 * @license
 * @version              $Id$
 * @author               $Author$
 * @LastChangedDate      $LastChangedDate$
 * @LastChangedRevision  $LastChangedRevision$
 * @LastChangedBy        $LastChangedBy$
 */

using System;
using System.Drawing;
using System.Collections;
using System.ComponentModel;
using System.Windows.Forms;
using System.Data;
using System.Net;
using System.IO;
using System.Diagnostics;
using System.Text;
using System.Security.Cryptography.X509Certificates;
using System.Xml;

namespace CSharpHTTP
{
	/// <summary>
	/// Summary description for Form1.
	/// </summary>
	public class Form1 : System.Windows.Forms.Form
    {
		private System.Windows.Forms.Label label10;
		private System.Windows.Forms.TextBox txtURL;
        private System.Windows.Forms.StatusBar sbrMain;
		private System.Windows.Forms.Button btnSendRequest;
        private System.Windows.Forms.Button btnClear;
		/// <summary>
		/// Required designer variable.
		/// </summary>
        private System.ComponentModel.Container components;

		//my vars
        HttpWebResponse HttpWResponse;
        private TabPage tabPage3;
        private TextBox txtRawHtml;
        private TabPage tabPage2;
        private Label label23;
        private TextBox txtReqHeaders;
        private TextBox txtReqMethod;
        private TextBox txtUserAgent;
        private TextBox txtReqCookies;
        private Label label16;
        private Label label15;
        private Label label14;
        private Label label13;
        private TabPage tabPage1;
        private TextBox txtStatusCode;
        private TextBox txtRespMethod;
        private TextBox txtReturnHeaders;
        private TextBox txtServer;
        private TextBox txtEncoding;
        private TextBox txtText;
        private TextBox txtVersion;
        private TextBox txtLastMod;
        private TextBox txtFoward;
        private TextBox txtContentLen;
        private TextBox txtContentType;
        private Label label22;
        private Label label21;
        private Label label9;
        private Label label8;
        private Label label7;
        private Label label6;
        private Label label5;
        private Label label4;
        private Label label3;
        private Label label2;
        private Label label1;
        private TabControl tabControl1;
        private LinkLabel linkLabel1;
        private PictureBox pictureBox1;
        private TabPage tabPage4;
        private TreeView treeView2;
		//create a container to hold request cookies
		CookieContainer CookieJar = new CookieContainer();

		public Form1()
		{
			//
			// Required for Windows Form Designer support
			//
			InitializeComponent();

			//
			// TODO: Add any constructor code after InitializeComponent call
			//
            txtURL.Text = "http://deutschland-api.light.compuccino.net/help?output_type=xml";
		}

		/// <summary>
		/// Clean up any resources being used.
		/// </summary>
		protected override void Dispose( bool disposing )
		{
			if( disposing )
			{
				if (this.components != null) 
				{
                    this.components.Dispose();
				}
			}
			base.Dispose( disposing );
		}


		#region Windows Form Designer generated code
		/// <summary>
		/// Required method for Designer support - do not modify
		/// the contents of this method with the code editor.
		/// </summary>
		private void InitializeComponent()
		{
            System.ComponentModel.ComponentResourceManager resources = new System.ComponentModel.ComponentResourceManager(typeof(Form1));
            this.btnClear = new System.Windows.Forms.Button();
            this.btnSendRequest = new System.Windows.Forms.Button();
            this.label10 = new System.Windows.Forms.Label();
            this.txtURL = new System.Windows.Forms.TextBox();
            this.sbrMain = new System.Windows.Forms.StatusBar();
            this.tabPage3 = new System.Windows.Forms.TabPage();
            this.txtRawHtml = new System.Windows.Forms.TextBox();
            this.tabPage2 = new System.Windows.Forms.TabPage();
            this.label23 = new System.Windows.Forms.Label();
            this.txtReqHeaders = new System.Windows.Forms.TextBox();
            this.txtReqMethod = new System.Windows.Forms.TextBox();
            this.txtUserAgent = new System.Windows.Forms.TextBox();
            this.txtReqCookies = new System.Windows.Forms.TextBox();
            this.label16 = new System.Windows.Forms.Label();
            this.label15 = new System.Windows.Forms.Label();
            this.label14 = new System.Windows.Forms.Label();
            this.label13 = new System.Windows.Forms.Label();
            this.tabPage1 = new System.Windows.Forms.TabPage();
            this.txtStatusCode = new System.Windows.Forms.TextBox();
            this.txtRespMethod = new System.Windows.Forms.TextBox();
            this.txtReturnHeaders = new System.Windows.Forms.TextBox();
            this.txtServer = new System.Windows.Forms.TextBox();
            this.txtEncoding = new System.Windows.Forms.TextBox();
            this.txtText = new System.Windows.Forms.TextBox();
            this.txtVersion = new System.Windows.Forms.TextBox();
            this.txtLastMod = new System.Windows.Forms.TextBox();
            this.txtFoward = new System.Windows.Forms.TextBox();
            this.txtContentLen = new System.Windows.Forms.TextBox();
            this.txtContentType = new System.Windows.Forms.TextBox();
            this.label22 = new System.Windows.Forms.Label();
            this.label21 = new System.Windows.Forms.Label();
            this.label9 = new System.Windows.Forms.Label();
            this.label8 = new System.Windows.Forms.Label();
            this.label7 = new System.Windows.Forms.Label();
            this.label6 = new System.Windows.Forms.Label();
            this.label5 = new System.Windows.Forms.Label();
            this.label4 = new System.Windows.Forms.Label();
            this.label3 = new System.Windows.Forms.Label();
            this.label2 = new System.Windows.Forms.Label();
            this.label1 = new System.Windows.Forms.Label();
            this.tabControl1 = new System.Windows.Forms.TabControl();
            this.tabPage4 = new System.Windows.Forms.TabPage();
            this.treeView2 = new System.Windows.Forms.TreeView();
            this.linkLabel1 = new System.Windows.Forms.LinkLabel();
            this.pictureBox1 = new System.Windows.Forms.PictureBox();
            this.tabPage3.SuspendLayout();
            this.tabPage2.SuspendLayout();
            this.tabPage1.SuspendLayout();
            this.tabControl1.SuspendLayout();
            this.tabPage4.SuspendLayout();
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).BeginInit();
            this.SuspendLayout();
            // 
            // btnClear
            // 
            this.btnClear.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("btnClear.BackgroundImage")));
            this.btnClear.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.btnClear.Location = new System.Drawing.Point(122, 537);
            this.btnClear.Name = "btnClear";
            this.btnClear.Size = new System.Drawing.Size(74, 32);
            this.btnClear.TabIndex = 7;
            this.btnClear.Text = "Clear";
            this.btnClear.Click += new System.EventHandler(this.btnClear_Click);
            // 
            // btnSendRequest
            // 
            this.btnSendRequest.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("btnSendRequest.BackgroundImage")));
            this.btnSendRequest.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Stretch;
            this.btnSendRequest.Location = new System.Drawing.Point(11, 537);
            this.btnSendRequest.Name = "btnSendRequest";
            this.btnSendRequest.Size = new System.Drawing.Size(105, 32);
            this.btnSendRequest.TabIndex = 3;
            this.btnSendRequest.Text = "Send Request";
            this.btnSendRequest.Click += new System.EventHandler(this.btnSendRequest_Click);
            // 
            // label10
            // 
            this.label10.BackColor = System.Drawing.Color.Transparent;
            this.label10.Location = new System.Drawing.Point(8, 16);
            this.label10.Name = "label10";
            this.label10.Size = new System.Drawing.Size(40, 16);
            this.label10.TabIndex = 3;
            this.label10.Text = "URI: ";
            this.label10.Click += new System.EventHandler(this.label10_Click);
            // 
            // txtURL
            // 
            this.txtURL.Location = new System.Drawing.Point(44, 12);
            this.txtURL.Name = "txtURL";
            this.txtURL.ScrollBars = System.Windows.Forms.ScrollBars.Vertical;
            this.txtURL.Size = new System.Drawing.Size(564, 20);
            this.txtURL.TabIndex = 4;
            this.txtURL.Text = "http://deutschland-api.light.compuccino.net/help?output_type=xml";
            this.txtURL.TextChanged += new System.EventHandler(this.txtURL_TextChanged);
            // 
            // sbrMain
            // 
            this.sbrMain.Location = new System.Drawing.Point(0, 575);
            this.sbrMain.Name = "sbrMain";
            this.sbrMain.Size = new System.Drawing.Size(616, 24);
            this.sbrMain.SizingGrip = false;
            this.sbrMain.TabIndex = 5;
            this.sbrMain.Text = "deutschland-api  Copyright (c) 2009 by compuccino ";
            this.sbrMain.PanelClick += new System.Windows.Forms.StatusBarPanelClickEventHandler(this.sbrMain_PanelClick);
            // 
            // tabPage3
            // 
            this.tabPage3.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("tabPage3.BackgroundImage")));
            this.tabPage3.Controls.Add(this.txtRawHtml);
            this.tabPage3.Location = new System.Drawing.Point(4, 22);
            this.tabPage3.Name = "tabPage3";
            this.tabPage3.Size = new System.Drawing.Size(624, 442);
            this.tabPage3.TabIndex = 2;
            this.tabPage3.Text = "Raw Response Data";
            this.tabPage3.UseVisualStyleBackColor = true;
            this.tabPage3.Click += new System.EventHandler(this.tabPage3_Click);
            // 
            // txtRawHtml
            // 
            this.txtRawHtml.BackColor = System.Drawing.SystemColors.ButtonHighlight;
            this.txtRawHtml.Font = new System.Drawing.Font("Microsoft Sans Serif", 8.25F, System.Drawing.FontStyle.Regular, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.txtRawHtml.ForeColor = System.Drawing.SystemColors.InfoText;
            this.txtRawHtml.Location = new System.Drawing.Point(8, 15);
            this.txtRawHtml.Multiline = true;
            this.txtRawHtml.Name = "txtRawHtml";
            this.txtRawHtml.ReadOnly = true;
            this.txtRawHtml.ScrollBars = System.Windows.Forms.ScrollBars.Both;
            this.txtRawHtml.Size = new System.Drawing.Size(601, 417);
            this.txtRawHtml.TabIndex = 1;
            this.txtRawHtml.TextChanged += new System.EventHandler(this.txtRawHtml_TextChanged);
            // 
            // tabPage2
            // 
            this.tabPage2.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("tabPage2.BackgroundImage")));
            this.tabPage2.Controls.Add(this.label23);
            this.tabPage2.Controls.Add(this.txtReqHeaders);
            this.tabPage2.Controls.Add(this.txtReqMethod);
            this.tabPage2.Controls.Add(this.txtUserAgent);
            this.tabPage2.Controls.Add(this.txtReqCookies);
            this.tabPage2.Controls.Add(this.label16);
            this.tabPage2.Controls.Add(this.label15);
            this.tabPage2.Controls.Add(this.label14);
            this.tabPage2.Controls.Add(this.label13);
            this.tabPage2.Location = new System.Drawing.Point(4, 22);
            this.tabPage2.Name = "tabPage2";
            this.tabPage2.Size = new System.Drawing.Size(624, 442);
            this.tabPage2.TabIndex = 1;
            this.tabPage2.Text = "Request Headers";
            this.tabPage2.UseVisualStyleBackColor = true;
            this.tabPage2.Click += new System.EventHandler(this.tabPage2_Click);
            // 
            // label23
            // 
            this.label23.BackColor = System.Drawing.Color.Transparent;
            this.label23.Location = new System.Drawing.Point(16, 8);
            this.label23.Name = "label23";
            this.label23.Size = new System.Drawing.Size(416, 24);
            this.label23.TabIndex = 8;
            this.label23.Text = "These are the Headers that went with your reqeust. You cannot change them on this" +
                " Tab";
            this.label23.Click += new System.EventHandler(this.label23_Click);
            // 
            // txtReqHeaders
            // 
            this.txtReqHeaders.Location = new System.Drawing.Point(19, 208);
            this.txtReqHeaders.Multiline = true;
            this.txtReqHeaders.Name = "txtReqHeaders";
            this.txtReqHeaders.ReadOnly = true;
            this.txtReqHeaders.ScrollBars = System.Windows.Forms.ScrollBars.Vertical;
            this.txtReqHeaders.Size = new System.Drawing.Size(569, 223);
            this.txtReqHeaders.TabIndex = 7;
            this.txtReqHeaders.TextChanged += new System.EventHandler(this.txtReqHeaders_TextChanged);
            // 
            // txtReqMethod
            // 
            this.txtReqMethod.Location = new System.Drawing.Point(128, 152);
            this.txtReqMethod.Name = "txtReqMethod";
            this.txtReqMethod.ReadOnly = true;
            this.txtReqMethod.Size = new System.Drawing.Size(128, 20);
            this.txtReqMethod.TabIndex = 6;
            this.txtReqMethod.TextChanged += new System.EventHandler(this.txtReqMethod_TextChanged);
            // 
            // txtUserAgent
            // 
            this.txtUserAgent.Location = new System.Drawing.Point(128, 112);
            this.txtUserAgent.Name = "txtUserAgent";
            this.txtUserAgent.ReadOnly = true;
            this.txtUserAgent.Size = new System.Drawing.Size(128, 20);
            this.txtUserAgent.TabIndex = 5;
            this.txtUserAgent.TextChanged += new System.EventHandler(this.txtUserAgent_TextChanged);
            // 
            // txtReqCookies
            // 
            this.txtReqCookies.Location = new System.Drawing.Point(128, 48);
            this.txtReqCookies.Multiline = true;
            this.txtReqCookies.Name = "txtReqCookies";
            this.txtReqCookies.ReadOnly = true;
            this.txtReqCookies.ScrollBars = System.Windows.Forms.ScrollBars.Vertical;
            this.txtReqCookies.Size = new System.Drawing.Size(248, 48);
            this.txtReqCookies.TabIndex = 1;
            this.txtReqCookies.TextChanged += new System.EventHandler(this.txtReqCookies_TextChanged);
            // 
            // label16
            // 
            this.label16.BackColor = System.Drawing.Color.Transparent;
            this.label16.Location = new System.Drawing.Point(16, 189);
            this.label16.Name = "label16";
            this.label16.Size = new System.Drawing.Size(128, 16);
            this.label16.TabIndex = 4;
            this.label16.Text = "Request Headers:";
            this.label16.Click += new System.EventHandler(this.label16_Click);
            // 
            // label15
            // 
            this.label15.BackColor = System.Drawing.Color.Transparent;
            this.label15.Location = new System.Drawing.Point(16, 152);
            this.label15.Name = "label15";
            this.label15.Size = new System.Drawing.Size(96, 16);
            this.label15.TabIndex = 3;
            this.label15.Text = "Request Method:";
            this.label15.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label15.Click += new System.EventHandler(this.label15_Click);
            // 
            // label14
            // 
            this.label14.BackColor = System.Drawing.Color.Transparent;
            this.label14.Location = new System.Drawing.Point(16, 112);
            this.label14.Name = "label14";
            this.label14.Size = new System.Drawing.Size(96, 16);
            this.label14.TabIndex = 2;
            this.label14.Text = "User Agent:";
            this.label14.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label14.Click += new System.EventHandler(this.label14_Click);
            // 
            // label13
            // 
            this.label13.BackColor = System.Drawing.Color.Transparent;
            this.label13.Location = new System.Drawing.Point(16, 48);
            this.label13.Name = "label13";
            this.label13.Size = new System.Drawing.Size(96, 16);
            this.label13.TabIndex = 0;
            this.label13.Text = "Cookies:";
            this.label13.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label13.Click += new System.EventHandler(this.label13_Click);
            // 
            // tabPage1
            // 
            this.tabPage1.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("tabPage1.BackgroundImage")));
            this.tabPage1.Controls.Add(this.txtStatusCode);
            this.tabPage1.Controls.Add(this.txtRespMethod);
            this.tabPage1.Controls.Add(this.txtReturnHeaders);
            this.tabPage1.Controls.Add(this.txtServer);
            this.tabPage1.Controls.Add(this.txtEncoding);
            this.tabPage1.Controls.Add(this.txtText);
            this.tabPage1.Controls.Add(this.txtVersion);
            this.tabPage1.Controls.Add(this.txtLastMod);
            this.tabPage1.Controls.Add(this.txtFoward);
            this.tabPage1.Controls.Add(this.txtContentLen);
            this.tabPage1.Controls.Add(this.txtContentType);
            this.tabPage1.Controls.Add(this.label22);
            this.tabPage1.Controls.Add(this.label21);
            this.tabPage1.Controls.Add(this.label9);
            this.tabPage1.Controls.Add(this.label8);
            this.tabPage1.Controls.Add(this.label7);
            this.tabPage1.Controls.Add(this.label6);
            this.tabPage1.Controls.Add(this.label5);
            this.tabPage1.Controls.Add(this.label4);
            this.tabPage1.Controls.Add(this.label3);
            this.tabPage1.Controls.Add(this.label2);
            this.tabPage1.Controls.Add(this.label1);
            this.tabPage1.Location = new System.Drawing.Point(4, 22);
            this.tabPage1.Name = "tabPage1";
            this.tabPage1.Size = new System.Drawing.Size(624, 442);
            this.tabPage1.TabIndex = 0;
            this.tabPage1.Text = "Response Headers";
            this.tabPage1.UseVisualStyleBackColor = true;
            this.tabPage1.Click += new System.EventHandler(this.tabPage1_Click);
            // 
            // txtStatusCode
            // 
            this.txtStatusCode.Location = new System.Drawing.Point(344, 48);
            this.txtStatusCode.Name = "txtStatusCode";
            this.txtStatusCode.ReadOnly = true;
            this.txtStatusCode.Size = new System.Drawing.Size(80, 20);
            this.txtStatusCode.TabIndex = 22;
            this.txtStatusCode.TextChanged += new System.EventHandler(this.txtStatusCode_TextChanged);
            // 
            // txtRespMethod
            // 
            this.txtRespMethod.Location = new System.Drawing.Point(344, 16);
            this.txtRespMethod.Name = "txtRespMethod";
            this.txtRespMethod.ReadOnly = true;
            this.txtRespMethod.Size = new System.Drawing.Size(80, 20);
            this.txtRespMethod.TabIndex = 21;
            this.txtRespMethod.TextChanged += new System.EventHandler(this.txtRespMethod_TextChanged);
            // 
            // txtReturnHeaders
            // 
            this.txtReturnHeaders.Location = new System.Drawing.Point(112, 272);
            this.txtReturnHeaders.Multiline = true;
            this.txtReturnHeaders.Name = "txtReturnHeaders";
            this.txtReturnHeaders.ReadOnly = true;
            this.txtReturnHeaders.ScrollBars = System.Windows.Forms.ScrollBars.Vertical;
            this.txtReturnHeaders.Size = new System.Drawing.Size(478, 120);
            this.txtReturnHeaders.TabIndex = 18;
            this.txtReturnHeaders.TextChanged += new System.EventHandler(this.txtReturnHeaders_TextChanged);
            // 
            // txtServer
            // 
            this.txtServer.Location = new System.Drawing.Point(112, 240);
            this.txtServer.Name = "txtServer";
            this.txtServer.ReadOnly = true;
            this.txtServer.Size = new System.Drawing.Size(320, 20);
            this.txtServer.TabIndex = 16;
            this.txtServer.TextChanged += new System.EventHandler(this.txtServer_TextChanged);
            // 
            // txtEncoding
            // 
            this.txtEncoding.Location = new System.Drawing.Point(112, 208);
            this.txtEncoding.Name = "txtEncoding";
            this.txtEncoding.ReadOnly = true;
            this.txtEncoding.Size = new System.Drawing.Size(320, 20);
            this.txtEncoding.TabIndex = 14;
            this.txtEncoding.TextChanged += new System.EventHandler(this.txtEncoding_TextChanged);
            // 
            // txtText
            // 
            this.txtText.Location = new System.Drawing.Point(112, 176);
            this.txtText.Name = "txtText";
            this.txtText.ReadOnly = true;
            this.txtText.Size = new System.Drawing.Size(192, 20);
            this.txtText.TabIndex = 12;
            this.txtText.TextChanged += new System.EventHandler(this.txtText_TextChanged);
            // 
            // txtVersion
            // 
            this.txtVersion.Location = new System.Drawing.Point(112, 144);
            this.txtVersion.Name = "txtVersion";
            this.txtVersion.ReadOnly = true;
            this.txtVersion.Size = new System.Drawing.Size(192, 20);
            this.txtVersion.TabIndex = 9;
            this.txtVersion.TextChanged += new System.EventHandler(this.txtVersion_TextChanged);
            // 
            // txtLastMod
            // 
            this.txtLastMod.Location = new System.Drawing.Point(112, 112);
            this.txtLastMod.Name = "txtLastMod";
            this.txtLastMod.ReadOnly = true;
            this.txtLastMod.Size = new System.Drawing.Size(192, 20);
            this.txtLastMod.TabIndex = 7;
            this.txtLastMod.TextChanged += new System.EventHandler(this.txtLastMod_TextChanged);
            // 
            // txtFoward
            // 
            this.txtFoward.Location = new System.Drawing.Point(112, 80);
            this.txtFoward.Name = "txtFoward";
            this.txtFoward.ReadOnly = true;
            this.txtFoward.Size = new System.Drawing.Size(312, 20);
            this.txtFoward.TabIndex = 5;
            this.txtFoward.TextChanged += new System.EventHandler(this.txtFoward_TextChanged);
            // 
            // txtContentLen
            // 
            this.txtContentLen.Location = new System.Drawing.Point(112, 48);
            this.txtContentLen.Name = "txtContentLen";
            this.txtContentLen.ReadOnly = true;
            this.txtContentLen.Size = new System.Drawing.Size(104, 20);
            this.txtContentLen.TabIndex = 3;
            this.txtContentLen.TextChanged += new System.EventHandler(this.txtContentLen_TextChanged);
            // 
            // txtContentType
            // 
            this.txtContentType.Location = new System.Drawing.Point(112, 16);
            this.txtContentType.Name = "txtContentType";
            this.txtContentType.ReadOnly = true;
            this.txtContentType.Size = new System.Drawing.Size(104, 20);
            this.txtContentType.TabIndex = 1;
            this.txtContentType.TextChanged += new System.EventHandler(this.txtContentType_TextChanged);
            // 
            // label22
            // 
            this.label22.BackColor = System.Drawing.Color.Transparent;
            this.label22.Location = new System.Drawing.Point(232, 48);
            this.label22.Name = "label22";
            this.label22.Size = new System.Drawing.Size(96, 16);
            this.label22.TabIndex = 20;
            this.label22.Text = "Status Code:";
            this.label22.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label22.Click += new System.EventHandler(this.label22_Click);
            // 
            // label21
            // 
            this.label21.BackColor = System.Drawing.Color.Transparent;
            this.label21.Location = new System.Drawing.Point(232, 16);
            this.label21.Name = "label21";
            this.label21.Size = new System.Drawing.Size(104, 16);
            this.label21.TabIndex = 19;
            this.label21.Text = "Request Method:";
            this.label21.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label21.Click += new System.EventHandler(this.label21_Click);
            // 
            // label9
            // 
            this.label9.BackColor = System.Drawing.Color.Transparent;
            this.label9.Location = new System.Drawing.Point(8, 272);
            this.label9.Name = "label9";
            this.label9.Size = new System.Drawing.Size(96, 16);
            this.label9.TabIndex = 17;
            this.label9.Text = "Headers:";
            this.label9.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label9.Click += new System.EventHandler(this.label9_Click);
            // 
            // label8
            // 
            this.label8.BackColor = System.Drawing.Color.Transparent;
            this.label8.Location = new System.Drawing.Point(8, 240);
            this.label8.Name = "label8";
            this.label8.Size = new System.Drawing.Size(96, 16);
            this.label8.TabIndex = 15;
            this.label8.Text = "Server:";
            this.label8.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label8.Click += new System.EventHandler(this.label8_Click);
            // 
            // label7
            // 
            this.label7.BackColor = System.Drawing.Color.Transparent;
            this.label7.Location = new System.Drawing.Point(8, 200);
            this.label7.Name = "label7";
            this.label7.Size = new System.Drawing.Size(96, 32);
            this.label7.TabIndex = 13;
            this.label7.Text = "Content Encoding:";
            this.label7.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label7.Click += new System.EventHandler(this.label7_Click);
            // 
            // label6
            // 
            this.label6.BackColor = System.Drawing.Color.Transparent;
            this.label6.Location = new System.Drawing.Point(8, 176);
            this.label6.Name = "label6";
            this.label6.Size = new System.Drawing.Size(96, 16);
            this.label6.TabIndex = 11;
            this.label6.Text = "Status Text:";
            this.label6.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label6.Click += new System.EventHandler(this.label6_Click);
            // 
            // label5
            // 
            this.label5.BackColor = System.Drawing.Color.Transparent;
            this.label5.Location = new System.Drawing.Point(8, 144);
            this.label5.Name = "label5";
            this.label5.Size = new System.Drawing.Size(96, 16);
            this.label5.TabIndex = 8;
            this.label5.Text = "HTTP Version:";
            this.label5.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label5.Click += new System.EventHandler(this.label5_Click);
            // 
            // label4
            // 
            this.label4.BackColor = System.Drawing.Color.Transparent;
            this.label4.Location = new System.Drawing.Point(8, 112);
            this.label4.Name = "label4";
            this.label4.Size = new System.Drawing.Size(96, 16);
            this.label4.TabIndex = 6;
            this.label4.Text = "Last Modified: ";
            this.label4.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label4.Click += new System.EventHandler(this.label4_Click);
            // 
            // label3
            // 
            this.label3.BackColor = System.Drawing.Color.Transparent;
            this.label3.Location = new System.Drawing.Point(8, 80);
            this.label3.Name = "label3";
            this.label3.Size = new System.Drawing.Size(96, 16);
            this.label3.TabIndex = 4;
            this.label3.Text = "Fowarded:";
            this.label3.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label3.Click += new System.EventHandler(this.label3_Click);
            // 
            // label2
            // 
            this.label2.BackColor = System.Drawing.Color.Transparent;
            this.label2.Location = new System.Drawing.Point(8, 48);
            this.label2.Name = "label2";
            this.label2.Size = new System.Drawing.Size(96, 16);
            this.label2.TabIndex = 2;
            this.label2.Text = "Content Length:";
            this.label2.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label2.Click += new System.EventHandler(this.label2_Click);
            // 
            // label1
            // 
            this.label1.BackColor = System.Drawing.Color.Transparent;
            this.label1.Location = new System.Drawing.Point(8, 16);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(96, 16);
            this.label1.TabIndex = 0;
            this.label1.Text = "Content Type:";
            this.label1.TextAlign = System.Drawing.ContentAlignment.TopRight;
            this.label1.Click += new System.EventHandler(this.label1_Click);
            // 
            // tabControl1
            // 
            this.tabControl1.Controls.Add(this.tabPage1);
            this.tabControl1.Controls.Add(this.tabPage2);
            this.tabControl1.Controls.Add(this.tabPage3);
            this.tabControl1.Controls.Add(this.tabPage4);
            this.tabControl1.ImeMode = System.Windows.Forms.ImeMode.NoControl;
            this.tabControl1.Location = new System.Drawing.Point(-5, 48);
            this.tabControl1.Name = "tabControl1";
            this.tabControl1.SelectedIndex = 0;
            this.tabControl1.ShowToolTips = true;
            this.tabControl1.Size = new System.Drawing.Size(632, 468);
            this.tabControl1.TabIndex = 0;
            this.tabControl1.SelectedIndexChanged += new System.EventHandler(this.tabControl1_SelectedIndexChanged);
            // 
            // tabPage4
            // 
            this.tabPage4.Controls.Add(this.treeView2);
            this.tabPage4.Location = new System.Drawing.Point(4, 22);
            this.tabPage4.Name = "tabPage4";
            this.tabPage4.Size = new System.Drawing.Size(624, 442);
            this.tabPage4.TabIndex = 3;
            this.tabPage4.Text = "XML Example";
            this.tabPage4.UseVisualStyleBackColor = true;
            // 
            // treeView2
            // 
            this.treeView2.Location = new System.Drawing.Point(1, 0);
            this.treeView2.Name = "treeView2";
            this.treeView2.Size = new System.Drawing.Size(616, 442);
            this.treeView2.TabIndex = 1;
            this.treeView2.AfterSelect += new System.Windows.Forms.TreeViewEventHandler(this.treeView2_AfterSelect);
            // 
            // linkLabel1
            // 
            this.linkLabel1.AutoSize = true;
            this.linkLabel1.BackColor = System.Drawing.Color.Transparent;
            this.linkLabel1.Font = new System.Drawing.Font("Microsoft Sans Serif", 11.25F, System.Drawing.FontStyle.Bold, System.Drawing.GraphicsUnit.Point, ((byte)(0)));
            this.linkLabel1.Location = new System.Drawing.Point(361, 578);
            this.linkLabel1.Name = "linkLabel1";
            this.linkLabel1.Size = new System.Drawing.Size(222, 18);
            this.linkLabel1.TabIndex = 9;
            this.linkLabel1.TabStop = true;
            this.linkLabel1.Text = "http://www.compuccino.com";
            this.linkLabel1.LinkClicked += new System.Windows.Forms.LinkLabelLinkClickedEventHandler(this.linkLabel1_LinkClicked);
            // 
            // pictureBox1
            // 
            this.pictureBox1.BackgroundImageLayout = System.Windows.Forms.ImageLayout.Center;
            this.pictureBox1.Image = ((System.Drawing.Image)(resources.GetObject("pictureBox1.Image")));
            this.pictureBox1.Location = new System.Drawing.Point(398, 537);
            this.pictureBox1.Name = "pictureBox1";
            this.pictureBox1.Size = new System.Drawing.Size(154, 21);
            this.pictureBox1.TabIndex = 10;
            this.pictureBox1.TabStop = false;
            this.pictureBox1.Click += new System.EventHandler(this.pictureBox1_Click);
            // 
            // Form1
            // 
            this.AutoScaleBaseSize = new System.Drawing.Size(5, 13);
            this.BackgroundImage = ((System.Drawing.Image)(resources.GetObject("$this.BackgroundImage")));
            this.ClientSize = new System.Drawing.Size(616, 599);
            this.Controls.Add(this.pictureBox1);
            this.Controls.Add(this.linkLabel1);
            this.Controls.Add(this.btnSendRequest);
            this.Controls.Add(this.btnClear);
            this.Controls.Add(this.sbrMain);
            this.Controls.Add(this.txtURL);
            this.Controls.Add(this.label10);
            this.Controls.Add(this.tabControl1);
            this.DoubleBuffered = true;
            this.ForeColor = System.Drawing.SystemColors.ActiveCaptionText;
            this.FormBorderStyle = System.Windows.Forms.FormBorderStyle.FixedToolWindow;
            this.Name = "Form1";
            this.Text = "deutschland-api | beta Democlient by compuccino";
            this.Load += new System.EventHandler(this.Form1_Load);
            this.tabPage3.ResumeLayout(false);
            this.tabPage3.PerformLayout();
            this.tabPage2.ResumeLayout(false);
            this.tabPage2.PerformLayout();
            this.tabPage1.ResumeLayout(false);
            this.tabPage1.PerformLayout();
            this.tabControl1.ResumeLayout(false);
            this.tabPage4.ResumeLayout(false);
            ((System.ComponentModel.ISupportInitialize)(this.pictureBox1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

		}
		#endregion

		/// <summary>
		/// The main entry point for the application.
		/// </summary>
		[STAThread]
		static void Main() 
		{
			Application.Run(new Form1());
		}

		private void btnSendRequest_Click(object sender, System.EventArgs e)
		{
			//this is where we will send the selected request for the URL specifided
			string sRequestType = "GET"; //default is GET
			string sURL = txtURL.Text;
			Uri requestURL;
			if ( sURL.Length > 0)//just set the URL to microsoft.com
			{
				//to do parse the URL to see if it has http or https if the in it
				//MessageBox.Show(sURL);
				string temp = sURL.ToLower();
				if (-1 == temp.IndexOf("http"))
				{
					//add http:// to the string
					sURL = "http://" +sURL;
				}
				
				try
				   {
					   requestURL = new Uri(sURL);
				   }
				catch (UriFormatException UriExcp)
				{
					MessageBox.Show(UriExcp.Message.ToString());
					return;
				}
			}
			else
			{
                requestURL = new Uri("http://deutschland-api.light.compuccino.net/help?output_type=xml");
                txtURL.Text = "http://deutschland-api.light.compuccino.net/help?output_type=xml";
			}
			

			//Call a function that does the work to get the request.
			if (!MakeWebRequest(requestURL, sRequestType))
			{
                txtRawHtml.Text = "failed";
                return; // the call failed
			}
			
			//we want to enable and disable some buttons.
		    
          
			tabControl1.SelectedTab= tabPage3;
			//btnSendRequest.Enabled = false;
            //Read the raw HTML from the request
            StreamReader sr = new StreamReader(HttpWResponse.GetResponseStream(), Encoding.ASCII);
            //Convert the stream to a string
            string s = sr.ReadToEnd();
            sr.Close();
            txtRawHtml.Text = s; /**/
            this.load();
		}

		private void btnClear_Click()
		{
		}

		private void btnClear_Click(object sender, System.EventArgs e)
		{
			//To do make sure we clear all the text boxes and enable or disable buttons
			
			btnSendRequest.Enabled = true;
			// we want to clear all the controls on the form
			ClearControls();
		}

		private void ClearControls()
		{
			//ToDo: It would be nice to use loop through all the controls
			// to clear them instead of coding each control I want to clear.
			// to do this I will need to loop through all the controls and also check
			// to see if a control contains other controls

			txtContentType.Text = "";
			txtContentLen.Text = "";
			txtFoward.Text = "";
			txtLastMod.Text = "";
			txtVersion.Text = "";
			txtText.Text = "";
			txtServer.Text = "";
			txtReturnHeaders.Text = "";
			txtURL.Text = "";
			txtReqCookies.Text = "";
			txtUserAgent.Text = "";
			txtReqMethod.Text = "";
			txtReqHeaders.Text = "";
			txtRawHtml.Text = "";

			// left to do. Check to see if we have a connection and clear it. 
		}
		bool MakeWebRequest(Uri URL, string Method)
		{
			// this function will try to make a connection and then fill out the 
			// different controls with their correct values based on the request
			// it will return a false if it fails.
			
			// declare a WebProxy class object to use.
			
			//try catch block to catch any errors
			try
			{
				//check to see if we need to set a proxy
				
				//Create a new request
				HttpWebRequest HttpWRequest = (HttpWebRequest)WebRequest.Create(URL);
				// set the HttpWebRequest objects cookie container
				// if you have any cookies that you want to go with the request you can add them 
				// to the cookiecontainer. If you had made a previous request that returned any cookies
				// that needed to be sent on subsequent request this will make sure that they are sent. 
				HttpWRequest.CookieContainer = CookieJar;
				// check to see if the user added user name and password for Basic authentication.
				// you can also use digest and Kerbeors authentication
				
				// the default credentials are usually the Windows credentials (user name, password, and domain) of the user running the application
				HttpWRequest.Credentials = CredentialCache.DefaultCredentials;
			
				// set the name of the user agent. This is the client name that is passed to IIS
				HttpWRequest.UserAgent = "CSharp HTTP Sample";
				// set the connection keep-alive
				HttpWRequest.KeepAlive = true; //this is the default
				//we don't want caching to take place so we need
				// to set the pragma header to say we don't want caching
				HttpWRequest.Headers.Set("Pragma", "no-cache");
				//set the request timeout to 5 min.
				HttpWRequest.Timeout = 300000;
				// set the request method
				HttpWRequest.Method = Method;
				// See what the Method is a POST 
				
				//check to see if we have previously created a response object
				if(null != HttpWResponse)
				{
					HttpWResponse.Close(); // close any previous connection
					HttpWResponse = null; // clear the object. 
				}
				//get the response. This is where we make the connection to the server
				HttpWResponse = (HttpWebResponse)HttpWRequest.GetResponse();
				// Fill out the data on the Response Header Tab
				// check for headers. We don't have the CRLF vs non CRLF headers
				// we get a headers collection. However the following code
				// will output all the Headers in the collection.
				// note they next line of code may be oblolete check when we release. 
				txtReturnHeaders.Text = HttpWResponse.Headers.ToString();
				//Get the content Type 
				txtContentType.Text = HttpWResponse.ContentType.ToString();
				//Get the Content Length 
				txtContentLen.Text = HttpWResponse.ContentLength.ToString();
				//Get the Request Method
				txtRespMethod.Text = HttpWResponse.Method.ToString();
				// Get the Status code
				int iStatCode =  (int)HttpWResponse.StatusCode;
				txtStatusCode.Text = iStatCode.ToString();
				// Get last modified
				txtLastMod.Text = HttpWResponse.LastModified.ToLongDateString();
				// Get HTTP version
				txtVersion.Text = HttpWResponse.ProtocolVersion.ToString();
				// Get the status text
				txtText.Text = HttpWResponse.StatusCode.ToString();
				// Get what the server is
				txtServer.Text = HttpWResponse.Server.ToString();
				// Get the Content Encoding if any
				txtEncoding.Text = HttpWResponse.ContentEncoding.ToString();
				// write the request info to the controls on the
				// Request Header tab
				// Get the request headers
				txtReqHeaders.Text = HttpWRequest.Headers.ToString();
				// Get the request method
				txtReqMethod.Text = HttpWRequest.Method.ToString();
				// Get the user agent name
				txtUserAgent.Text = HttpWRequest.UserAgent.ToString();
				// Get any request cookies
				txtReqCookies.Text = HttpWRequest.CookieContainer.GetCookieHeader(URL).ToString();
				// you can check to see if any cookies were returned using a cookiecollection. It is the developer's job
				// to persist any cookies that need to be persisted see Serialization in online help
				// example to get the return cookies. 
				/*
				 CookieCollection cookies = Response.Cookies;
				Debug.WriteLine("cookie count: " + cookies.Count.ToString());
				// you could use a for loop to loop through the cookies
				Debug.WriteLine("cookie name: " + cookies[0].Name.ToString());
				Debug.WriteLine("cookie expires: " + cookies[0].Expires.ToString());
				Debug.WriteLine("cookie path: " + cookies[0].Path.ToString());
				Debug.WriteLine("cookie domain: " + cookies[0].Domain.ToString());
				Debug.WriteLine("cookie value: " + cookies[0].Value.ToString());
				 */
				return true;
			}
			catch (WebException WebExcp)
			{
				MessageBox.Show(WebExcp.Message.ToString());
				ICertificatePolicy CertPolicy = ServicePointManager.CertificatePolicy;
				
				return false;
			}
			catch (Exception e) // get any other error
			{
				MessageBox.Show(e.Message.ToString());
				return false;
			}
			
		}

		private void btnGetUrl_Click(object sender, System.EventArgs e)
		{
			//get the response URL.
			MessageBox.Show (HttpWResponse.ResponseUri.ToString());
		}

		private void btnExit_Click(object sender, System.EventArgs e)
		{
			//quit the app
			Application.Exit();
		}

		private void rbGet_CheckedChanged(object sender, System.EventArgs e)
		{

		}

        private void Form1_Load(object sender, EventArgs e)
        {
            this.btnSendRequest_Click(sender, e);
           
        }

        private void txtURL_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtRawHtml_TextChanged(object sender, EventArgs e)
        {

        }

        private void sbrMain_PanelClick(object sender, StatusBarPanelClickEventArgs e)
        {

        }

        private void pictureBox2_Click(object sender, EventArgs e)
        {

        }

        private void tabPage2_Click(object sender, EventArgs e)
        {

        }

        private void label10_Click(object sender, EventArgs e)
        {

        }

        private void tabPage3_Click(object sender, EventArgs e)
        {

        }

        private void label23_Click(object sender, EventArgs e)
        {

        }

        private void txtReqHeaders_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtReqMethod_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtUserAgent_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtReqCookies_TextChanged(object sender, EventArgs e)
        {

        }

        private void label16_Click(object sender, EventArgs e)
        {

        }

        private void label15_Click(object sender, EventArgs e)
        {

        }

        private void label14_Click(object sender, EventArgs e)
        {

        }

        private void label13_Click(object sender, EventArgs e)
        {

        }

        private void tabPage1_Click(object sender, EventArgs e)
        {

        }

        private void txtStatusCode_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtRespMethod_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtReturnHeaders_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtServer_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtEncoding_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtText_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtVersion_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtLastMod_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtFoward_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtContentLen_TextChanged(object sender, EventArgs e)
        {

        }

        private void txtContentType_TextChanged(object sender, EventArgs e)
        {

        }

        private void label22_Click(object sender, EventArgs e)
        {

        }

        private void label21_Click(object sender, EventArgs e)
        {

        }

        private void label9_Click(object sender, EventArgs e)
        {

        }

        private void label8_Click(object sender, EventArgs e)
        {

        }

        private void label7_Click(object sender, EventArgs e)
        {

        }

        private void label6_Click(object sender, EventArgs e)
        {

        }

        private void label5_Click(object sender, EventArgs e)
        {

        }

        private void label4_Click(object sender, EventArgs e)
        {

        }

        private void label3_Click(object sender, EventArgs e)
        {

        }

        private void label2_Click(object sender, EventArgs e)
        {

        }

        private void label1_Click(object sender, EventArgs e)
        {

        }

        private void tabControl1_SelectedIndexChanged(object sender, EventArgs e)
        {

        }

        private void linkLabel1_LinkClicked(object sender, LinkLabelLinkClickedEventArgs e)
        {

        }

        private void pictureBox1_Click(object sender, EventArgs e)
        {

        }

        private void radioButton2_CheckedChanged(object sender, EventArgs e)
        {

        }

        private void radioButton1_CheckedChanged(object sender, EventArgs e)
        {

        }

        private void treeView1_AfterSelect(object sender, TreeViewEventArgs e)
        {

            
            
        }

       
        //////////////EXAMPLE/////////////////
        
        public void load() 
        {
            this.treeView2.Nodes.Clear();

            // Load the XML Document
            XmlDocument doc = new XmlDocument();
           
            try {

                doc.LoadXml( this.txtRawHtml.Text );
            }catch (Exception err) {
                MessageBox.Show("Das XML Beispiel Funktioniert nicht bei anderen Datentypen (" + err + ")");
                return;
            }

            ConvertXmlNodeToTreeNode(doc, this.treeView2.Nodes);
            this.treeView2.Nodes[0].ExpandAll();
         }

        private void ConvertXmlNodeToTreeNode(XmlNode xmlNode, 
          TreeNodeCollection treeNodes) {

            TreeNode newTreeNode = treeNodes.Add(xmlNode.Name);

            switch (xmlNode.NodeType) {
                case XmlNodeType.ProcessingInstruction:
                case XmlNodeType.XmlDeclaration:
                    newTreeNode.Text = "<?" + xmlNode.Name + " " + 
                      xmlNode.Value + "?>";
                    break;
                case XmlNodeType.Element:
                    newTreeNode.Text = "<" + xmlNode.Name + ">";
                    break;
                case XmlNodeType.Attribute:
                    newTreeNode.Text = "ATTRIBUTE: " + xmlNode.Name;
                    break;
                case XmlNodeType.Text:
                case XmlNodeType.CDATA:
                    newTreeNode.Text = xmlNode.Value;
                    break;
                case XmlNodeType.Comment:
                    newTreeNode.Text = "<!--" + xmlNode.Value + "-->";
                    break;
            }

            if (xmlNode.Attributes != null) {
                foreach (XmlAttribute attribute in xmlNode.Attributes) {
                    ConvertXmlNodeToTreeNode(attribute, newTreeNode.Nodes);
                }
            }
            foreach (XmlNode childNode in xmlNode.ChildNodes) {
                ConvertXmlNodeToTreeNode(childNode, newTreeNode.Nodes);
            }
        }

        private void treeView2_AfterSelect(object sender, TreeViewEventArgs e)
        {

        }

     
	}
	//Implement the ICertificatePolicy interface
	class CertPolicy: ICertificatePolicy
	{
		public bool CheckValidationResult(ServicePoint srvPoint, X509Certificate certificate,
				   WebRequest request,	int certificateProblem)
		{
			// you can do your own certificate checking here
			// you can get the error values from WinError.h, all the certificate errors start with Cert_
			/*
			if(unchecked((int)(0x800B0109L)) == certificateProblem) //A certificate chain processed correctly, but terminated in a root certificate which is not trusted by the trust provider. 
			{
				return true;
			}  */
			// we just return true so any certificate will work with this sample
			return true;
		}
	}

}
