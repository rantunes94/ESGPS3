namespace projeto
{
    partial class Sintomas
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
            System.Windows.Forms.Label nomeLabel;
            this.adicionar = new System.Windows.Forms.Button();
            this.sTextBox = new System.Windows.Forms.TextBox();
            nomeLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // nomeLabel
            // 
            nomeLabel.AutoSize = true;
            nomeLabel.Location = new System.Drawing.Point(24, 44);
            nomeLabel.Name = "nomeLabel";
            nomeLabel.Size = new System.Drawing.Size(61, 17);
            nomeLabel.TabIndex = 15;
            nomeLabel.Text = "sintoma:";
            // 
            // adicionar
            // 
            this.adicionar.Location = new System.Drawing.Point(27, 88);
            this.adicionar.Name = "adicionar";
            this.adicionar.Size = new System.Drawing.Size(75, 23);
            this.adicionar.TabIndex = 0;
            this.adicionar.Text = "adicionar";
            this.adicionar.UseVisualStyleBackColor = true;
            this.adicionar.Click += new System.EventHandler(this.adicionar_Click);
            // 
            // sTextBox
            // 
            this.sTextBox.Location = new System.Drawing.Point(110, 41);
            this.sTextBox.Name = "sTextBox";
            this.sTextBox.Size = new System.Drawing.Size(100, 22);
            this.sTextBox.TabIndex = 16;
            // 
            // Sintomas
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(325, 150);
            this.Controls.Add(nomeLabel);
            this.Controls.Add(this.sTextBox);
            this.Controls.Add(this.adicionar);
            this.Name = "Sintomas";
            this.Text = "Sintomas";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private System.Windows.Forms.Button adicionar;
        private System.Windows.Forms.TextBox sTextBox;
    }
}