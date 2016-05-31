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
    public partial class Pesquisa_enfermeiro : Form
    {

        public Pesquisa_enfermeiro()
        {           
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {

            SqlConnection sqlConnection1 = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\luis_\\OneDrive\\Documentos\\Visual Studio 2015\\Projects\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand cmd = new SqlCommand();
            SqlDataReader reader;

            cmd.CommandText = "SELECT * FROM paciente where sns =" + textBox1.Text;
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            reader = cmd.ExecuteReader();
            // Data is accessible through the DataReader object here.



            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    Console.WriteLine("{0}\t{1}\t{2}\t{3}", reader.GetInt32(0), reader.GetString(1), reader.GetString(2), reader.GetString(3));
                    transferir(reader.GetInt32(0), reader.GetString(1));
                }
                
            }
            else
            {
                Console.WriteLine("No rows found.");
            }
            reader.Close();



            sqlConnection1.Close();
        }

        private void transferir(int id, string nome)
        {
            Medicamento_anterior ma = new Medicamento_anterior(id, nome);
            ma.Show();
        }
    }
}
