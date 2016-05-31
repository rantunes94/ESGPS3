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
    public partial class Medicamento : Form
    {
        int id_consulta;

        public Medicamento(int id_consulta)
        {
            this.id_consulta = id_consulta;
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

            SqlConnection sqlConn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\luis_\\OneDrive\\Documentos\\Visual Studio 2015\\Projects\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand sqlComm = new SqlCommand();
            sqlComm = sqlConn.CreateCommand();

            sqlComm.CommandText = "INSERT INTO medicamento (nome, dose, frequencia, id_consulta) VALUES ('" + nomeTextBox.Text + "','" + doseTextBox.Text + "','" + frequenciaTextBox.Text + "','" + id_consulta + "');";

            sqlConn.Open();
            sqlComm.ExecuteNonQuery();
            sqlConn.Close();
        }
    }
}
