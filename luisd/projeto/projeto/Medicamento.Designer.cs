namespace projeto
{
    partial class Medicamento
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
            System.Windows.Forms.Label doseLabel;
            System.Windows.Forms.Label frequenciaLabel;
            this.nomeTextBox = new System.Windows.Forms.TextBox();
            this.doseTextBox = new System.Windows.Forms.TextBox();
            this.frequenciaTextBox = new System.Windows.Forms.TextBox();
            this.button1 = new System.Windows.Forms.Button();
            nomeLabel = new System.Windows.Forms.Label();
            doseLabel = new System.Windows.Forms.Label();
            frequenciaLabel = new System.Windows.Forms.Label();
            this.SuspendLayout();
            // 
            // nomeLabel
            // 
            nomeLabel.AutoSize = true;
            nomeLabel.Location = new System.Drawing.Point(28, 31);
            nomeLabel.Name = "nomeLabel";
            nomeLabel.Size = new System.Drawing.Size(47, 17);
            nomeLabel.TabIndex = 13;
            nomeLabel.Text = "nome:";
            // 
            // doseLabel
            // 
            doseLabel.AutoSize = true;
            doseLabel.Location = new System.Drawing.Point(28, 59);
            doseLabel.Name = "doseLabel";
            doseLabel.Size = new System.Drawing.Size(43, 17);
            doseLabel.TabIndex = 15;
            doseLabel.Text = "dose:";
            // 
            // frequenciaLabel
            // 
            frequenciaLabel.AutoSize = true;
            frequenciaLabel.Location = new System.Drawing.Point(28, 87);
            frequenciaLabel.Name = "frequenciaLabel";
            frequenciaLabel.Size = new System.Drawing.Size(79, 17);
            frequenciaLabel.TabIndex = 17;
            frequenciaLabel.Text = "frequencia:";
            // 
            // nomeTextBox
            // 
            this.nomeTextBox.Location = new System.Drawing.Point(114, 28);
            this.nomeTextBox.Name = "nomeTextBox";
            this.nomeTextBox.Size = new System.Drawing.Size(100, 22);
            this.nomeTextBox.TabIndex = 14;
            // 
            // doseTextBox
            // 
            this.doseTextBox.Location = new System.Drawing.Point(114, 56);
            this.doseTextBox.Name = "doseTextBox";
            this.doseTextBox.Size = new System.Drawing.Size(100, 22);
            this.doseTextBox.TabIndex = 16;
            // 
            // frequenciaTextBox
            // 
            this.frequenciaTextBox.Location = new System.Drawing.Point(114, 84);
            this.frequenciaTextBox.Name = "frequenciaTextBox";
            this.frequenciaTextBox.Size = new System.Drawing.Size(100, 22);
            this.frequenciaTextBox.TabIndex = 18;
            // 
            // button1
            // 
            this.button1.Location = new System.Drawing.Point(114, 147);
            this.button1.Name = "button1";
            this.button1.Size = new System.Drawing.Size(75, 23);
            this.button1.TabIndex = 21;
            this.button1.Text = "Criar";
            this.button1.UseVisualStyleBackColor = true;
            this.button1.Click += new System.EventHandler(this.button1_Click);
            // 
            // Medicamento
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(289, 219);
            this.Controls.Add(this.button1);
            this.Controls.Add(nomeLabel);
            this.Controls.Add(this.nomeTextBox);
            this.Controls.Add(doseLabel);
            this.Controls.Add(this.doseTextBox);
            this.Controls.Add(frequenciaLabel);
            this.Controls.Add(this.frequenciaTextBox);
            this.Name = "Medicamento";
            this.Text = "Medicamento";
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion
        private System.Windows.Forms.TextBox nomeTextBox;
        private System.Windows.Forms.TextBox doseTextBox;
        private System.Windows.Forms.TextBox frequenciaTextBox;
        private System.Windows.Forms.Button button1;
    }
}