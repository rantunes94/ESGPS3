using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;
using System.Data.Sql;
using System.Data.OleDb;
using System.Data.SqlClient;

namespace projeto
{
    public partial class Analise : Form
    {
        int id_consulta;

        public Analise(int id_consulta)
        {
            this.id_consulta = id_consulta;
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            if (!string.IsNullOrWhiteSpace(TextBoxm.Text) && !string.IsNullOrWhiteSpace(textBoxc.Text) && !string.IsNullOrWhiteSpace(TextBoxp.Text) && !string.IsNullOrWhiteSpace(textBoxh.Text)) 
            {
                SqlConnection sqlConn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\Projeto\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
                SqlCommand sqlComm = new SqlCommand();
                sqlComm = sqlConn.CreateCommand();

                sqlComm.CommandText = "INSERT INTO analise (motivo, condicao, problema, historial, id_consulta) VALUES ('" + TextBoxm.Text + "','" + textBoxc.Text + "','" + TextBoxp.Text + "','" + textBoxh.Text + "','" + id_consulta + "');";

                sqlConn.Open();
                sqlComm.ExecuteNonQuery();
                sqlConn.Close();
            }
        }
    }
}
