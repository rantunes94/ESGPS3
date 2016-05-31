namespace projeto
{
    partial class Medicamento_anterior
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
            this.components = new System.ComponentModel.Container();
            this.baseDadosDataSet = new projeto.BaseDadosDataSet();
            this.medicamentoBindingSource = new System.Windows.Forms.BindingSource(this.components);
            this.medicamentoTableAdapter = new projeto.BaseDadosDataSetTableAdapters.medicamentoTableAdapter();
            this.tableAdapterManager = new projeto.BaseDadosDataSetTableAdapters.TableAdapterManager();
            this.label1 = new System.Windows.Forms.Label();
            this.dataGridView1 = new System.Windows.Forms.DataGridView();
            this.Nome = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Dose = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.Frequencia = new System.Windows.Forms.DataGridViewTextBoxColumn();
            this.listView1 = new System.Windows.Forms.ListView();
            this.Id = ((System.Windows.Forms.ColumnHeader)(new System.Windows.Forms.ColumnHeader()));
            ((System.ComponentModel.ISupportInitialize)(this.baseDadosDataSet)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.medicamentoBindingSource)).BeginInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).BeginInit();
            this.SuspendLayout();
            // 
            // baseDadosDataSet
            // 
            this.baseDadosDataSet.DataSetName = "BaseDadosDataSet";
            this.baseDadosDataSet.SchemaSerializationMode = System.Data.SchemaSerializationMode.IncludeSchema;
            // 
            // medicamentoBindingSource
            // 
            this.medicamentoBindingSource.DataMember = "medicamento";
            this.medicamentoBindingSource.DataSource = this.baseDadosDataSet;
            // 
            // medicamentoTableAdapter
            // 
            this.medicamentoTableAdapter.ClearBeforeFill = true;
            // 
            // tableAdapterManager
            // 
            this.tableAdapterManager.analiseTableAdapter = null;
            this.tableAdapterManager.BackupDataSetBeforeUpdate = false;
            this.tableAdapterManager.consultaTableAdapter = null;
            this.tableAdapterManager.medicamentoTableAdapter = this.medicamentoTableAdapter;
            this.tableAdapterManager.pacienteTableAdapter = null;
            this.tableAdapterManager.r_cons_sintTableAdapter = null;
            this.tableAdapterManager.sintomaTableAdapter = null;
            this.tableAdapterManager.UpdateOrder = projeto.BaseDadosDataSetTableAdapters.TableAdapterManager.UpdateOrderOption.InsertUpdateDelete;
            this.tableAdapterManager.utilizadoresTableAdapter = null;
            // 
            // label1
            // 
            this.label1.AutoSize = true;
            this.label1.Location = new System.Drawing.Point(283, 34);
            this.label1.Name = "label1";
            this.label1.Size = new System.Drawing.Size(46, 17);
            this.label1.TabIndex = 0;
            this.label1.Text = "label1";
            // 
            // dataGridView1
            // 
            this.dataGridView1.ColumnHeadersHeightSizeMode = System.Windows.Forms.DataGridViewColumnHeadersHeightSizeMode.AutoSize;
            this.dataGridView1.Columns.AddRange(new System.Windows.Forms.DataGridViewColumn[] {
            this.Nome,
            this.Dose,
            this.Frequencia});
            this.dataGridView1.Location = new System.Drawing.Point(238, 144);
            this.dataGridView1.Name = "dataGridView1";
            this.dataGridView1.RowTemplate.Height = 24;
            this.dataGridView1.Size = new System.Drawing.Size(554, 307);
            this.dataGridView1.TabIndex = 1;
            // 
            // Nome
            // 
            this.Nome.HeaderText = "Nome";
            this.Nome.Name = "Nome";
            // 
            // Dose
            // 
            this.Dose.HeaderText = "Dose";
            this.Dose.Name = "Dose";
            // 
            // Frequencia
            // 
            this.Frequencia.HeaderText = "Frequencia";
            this.Frequencia.Name = "Frequencia";
            // 
            // listView1
            // 
            this.listView1.Columns.AddRange(new System.Windows.Forms.ColumnHeader[] {
            this.Id});
            this.listView1.Location = new System.Drawing.Point(40, 144);
            this.listView1.Name = "listView1";
            this.listView1.Size = new System.Drawing.Size(150, 307);
            this.listView1.TabIndex = 3;
            this.listView1.UseCompatibleStateImageBehavior = false;
            this.listView1.View = System.Windows.Forms.View.Details;
            this.listView1.SelectedIndexChanged += new System.EventHandler(this.listView1_SelectedIndexChanged);
            // 
            // Id
            // 
            this.Id.Text = "Id";
            // 
            // Medicamento_anterior
            // 
            this.AutoScaleDimensions = new System.Drawing.SizeF(8F, 16F);
            this.AutoScaleMode = System.Windows.Forms.AutoScaleMode.Font;
            this.ClientSize = new System.Drawing.Size(830, 512);
            this.Controls.Add(this.listView1);
            this.Controls.Add(this.dataGridView1);
            this.Controls.Add(this.label1);
            this.Name = "Medicamento_anterior";
            this.Text = "Medicamento_anterior";
            ((System.ComponentModel.ISupportInitialize)(this.baseDadosDataSet)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.medicamentoBindingSource)).EndInit();
            ((System.ComponentModel.ISupportInitialize)(this.dataGridView1)).EndInit();
            this.ResumeLayout(false);
            this.PerformLayout();

        }

        #endregion

        private BaseDadosDataSet baseDadosDataSet;
        private System.Windows.Forms.BindingSource medicamentoBindingSource;
        private BaseDadosDataSetTableAdapters.medicamentoTableAdapter medicamentoTableAdapter;
        private BaseDadosDataSetTableAdapters.TableAdapterManager tableAdapterManager;
        private System.Windows.Forms.Label label1;
        private System.Windows.Forms.DataGridView dataGridView1;
        private System.Windows.Forms.ListView listView1;
        private System.Windows.Forms.ColumnHeader Id;
        private System.Windows.Forms.DataGridViewTextBoxColumn Nome;
        private System.Windows.Forms.DataGridViewTextBoxColumn Dose;
        private System.Windows.Forms.DataGridViewTextBoxColumn Frequencia;
    }
}