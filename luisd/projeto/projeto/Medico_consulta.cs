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
    public partial class Medico_consulta : Form
    {
        SqlConnection sqlConnection1 = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\luis_\\OneDrive\\Documentos\\Visual Studio 2015\\Projects\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
        SqlCommand cmd = new SqlCommand();
        SqlDataReader reader;
        int consulta_id;
        int id_paciente;

        public Medico_consulta(int consulta_id)
        {
            InitializeComponent();
            this.consulta_id = consulta_id;
            cmd.CommandText = "SELECT id_paciente FROM consulta where id =" + consulta_id;
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            reader = cmd.ExecuteReader();
            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    id_paciente = reader.GetInt32(0);
                }
            }
            else
            {
                Console.WriteLine("No rows found.");
            }
            reader.Close();
            sqlConnection1.Close();

            //------------

            cmd.CommandText = "SELECT * FROM paciente where id =" + id_paciente;
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            reader = cmd.ExecuteReader();
            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    label2.Text = reader.GetString(1);
                    label4.Text = reader.GetString(2);
                    label6.Text = reader.GetString(3);
                    label6.Text = reader.GetString(3);
                }
            }
            else
            {
                Console.WriteLine("No rows found.");
            }
            reader.Close();
            sqlConnection1.Close();

        }

        private void button1_Click(object sender, EventArgs e)
        {
            Analise an = new Analise(consulta_id);
            an.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Sintomas s = new Sintomas(consulta_id);
            s.Show();
        }

        private void button3_Click(object sender, EventArgs e)
        {
            Medicamento me = new Medicamento(consulta_id);
            me.Show();
        }

        private void button4_Click(object sender, EventArgs e)
        {
            SqlConnection sqlConn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\luis_\\OneDrive\\Documentos\\Visual Studio 2015\\Projects\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand sqlComm = new SqlCommand();
            sqlComm = sqlConn.CreateCommand();

            sqlComm.CommandText = "UPDATE consulta SET estado = 1 WHERE Id = '" + consulta_id + "';";

            sqlConn.Open();
            sqlComm.ExecuteNonQuery();
            sqlConn.Close();
        }

        private void button5_Click(object sender, EventArgs e)
        {
            string nome = label2.Text;
            Medicamento_anterior ma = new Medicamento_anterior(id_paciente, nome);
            ma.Show();
        }

        private void button8_Click(object sender, EventArgs e)
        {
            Console.WriteLine("ola");
            string nome = label2.Text;
            Analise_anterior ana = new Analise_anterior(id_paciente, nome);
            ana.Show();
        }

        private void button6_Click(object sender, EventArgs e)
        {
            string nome = label2.Text;
            Sintomas_anteriores sa = new Sintomas_anteriores(id_paciente, nome);
            sa.Show();
        }
    }
}
