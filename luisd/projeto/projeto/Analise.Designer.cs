namespace projeto
{
    partial class Analise
    {
        /// <summary>
        /// Required designer variable.
        /// </summary>
        private System.ComponentModel.IContainer components = null;

        /// <summary>
        /// Clean up any resources being used.
        /// </summary>
        /// <param name="disposing">true if managed resources should be disposed; otherwise, false.</param>
        protected override void Dispose(bool disposing)
        {
            if (disposing && (components != null))
            {
                components.Dispose();
            }
            base.Dispose(disposing);
        }

        #region Windows Form Designer generated code

        /// <summary>
        /// Required method for Designer support - do not modify
        /// the contents of this method with the code editor.
        /// </summary>
        private void InitializeComponent()
        {
            System.Windows.Forms.Label MotivoLabel;
            System.Windows.Forms.Label CondiLabel;
            System.Windows.Forms.Label proLabel;
            System.Windows.Forms.Label histlabel1;
            this.button1 = new System.Windows.Forms.Button();
            this.TextBoxm = new System.Windows.Forms.TextBox();
            this.textBoxc = new System.Windows.Forms.TextBox();
            this.TextBoxp = new System.Windows.Forms.TextBox();
            this.textBoxh = new System.Windows.Forms.TextBox();
            MotivoLabel = new System.Windows.Forms.Label();
            CondiLabel = new System.Windows.Forms.Label();
            proLabel = new System.Windows.Forms.Label();
            histlabel1 = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(84, 154);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(75, 23);
            this.button1.TabIndex = 28;
            this.button1.Text = "Criar";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // MotivoLabel
            // 
            MotivoLabel.AutoSize = true;
            MotivoLabel.Location = new System.Drawing.Point(26, 35);
            MotivoLabel.Name = "MotivoLabel";
            MotivoLabel.Size = new System.Drawing.Size(53, 17);
            MotivoLabel.TabIndex = 22;
            MotivoLabel.Text = "Motivo:";
            // 
            // TextBoxm
            // 
            this.TextBoxm.Location = new System.Drawing.Point(112, 32);
            this.TextBoxm.Name = "TextBoxm";
            this.TextBoxm.Size = new System.Drawing.Size(100, 22);
            this.TextBoxm.TabIndex = 23;
            // 
            // CondiLabel
            // 
            CondiLabel.AutoSize = true;
            CondiLabel.Location = new System.Drawing.Point(26, 63);
            CondiLabel.Name = "CondiLabel";
            CondiLabel.Size = new System.Drawing.Size(71, 17);
            CondiLabel.TabIndex = 24;
            CondiLabel.Text = "Condição:";
            // 
            // textBoxc
            // 
            this.textBoxc.Location = new System.Drawing.Point(112, 60);
            this.textBoxc.Name = "textBoxc";
            this.textBoxc.Size = new System.Drawing.Size(100, 22);
            this.textBoxc.TabIndex = 25;
            // 
            // proLabel
            // 
            proLabel.AutoSize = true;
            proLabel.Location = new System.Drawing.Point(26, 91);
            proLabel.Name = "proLabel";
            proLabel.Size = new System.Drawing.Size(72, 17);
            proLabel.TabIndex = 26;
            proLabel.Text = "Problema:";
            // 
            // TextBoxp
            // 
            this.TextBoxp.Location = new System.Drawing.Point(112, 88);
            this.TextBoxp.Name = "TextBoxp";
            this.TextBoxp.Size = new System.Drawing.Size(100, 22);
            this.TextBoxp.TabIndex = 27;
            // 
            // histlabel1
            // 
            histlabel1.AutoSize = true;
            histlabel1.Location = new System.Drawing.Point(26, 119);
            histlabel1.Name = "histlabel1";
            histlabel1.Size = new System.Drawing.Size(59, 17);
            histlabel1.TabIndex = 29;
            histlabel1.Text = "Historial";
            // 
            // textBoxh
            // 
            this.textBoxh.Location = new System.Drawing.Point(112, 116);
            this.textBoxh.Name = "textBoxh";
            this.textBoxh.Size = new System.Drawing.Size(100, 22);
            this.textBoxh.TabIndex = 30;
            // 
            // Analise
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(376, 357);
            this.Controls.Add(histlabel1);
            this.Controls.Add(this.textBoxh);
            this.Controls.Add(this.button1);
            this.Controls.Add(MotivoLabel);
            this.Controls.Add(this.TextBoxm);
            this.Controls.Add(CondiLabel);
            this.Controls.Add(this.textBoxc);
            this.Controls.Add(proLabel);
            this.Controls.Add(this.TextBoxp);
            this.Name = "Analise";
            this.Text = "Analise";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button button1;
        private System.Windows.Forms.TextBox TextBoxm;
        private System.Windows.Forms.TextBox textBoxc;
        private System.Windows.Forms.TextBox TextBoxp;
        private System.Windows.Forms.TextBox textBoxh;
    }
}