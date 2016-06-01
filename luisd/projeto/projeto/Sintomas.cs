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
    public partial class Sintomas : Form
    {
        int id_consulta;
        Int32 newId;

        public Sintomas(int id_consulta)
        {
            this.id_consulta = id_consulta;
            InitializeComponent();
        }

        private void adicionar_Click(object sender, EventArgs e)
        {
            if (!string.IsNullOrWhiteSpace(sTextBox.Text))
            {
                int id_sintoma = verificar(id_consulta);
                if (id_sintoma == 0)
                {
                    adicionar1();
                    adicionarc(newId);
                }
                else
                {
                    adicionarc(id_sintoma);
                }
            }
        }

        private int verificar(int id_consulta)
        {
            SqlConnection sqlConnection1 = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\Projeto\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand cmd = new SqlCommand();
            SqlDataReader reader;

            cmd.CommandText = "SELECT Id FROM sintoma WHERE sintoma ='" + sTextBox.Text + "';";
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            reader = cmd.ExecuteReader();

            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    Console.WriteLine("{0}", reader.GetInt32(0));
                    return (reader.GetInt32(0));
                }
            }
            reader.Close();
            sqlConnection1.Close();
            return (0);
        }

        private void adicionar1()
        {
            SqlConnection sqlConn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\Projeto\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand sqlComm = new SqlCommand();
            sqlComm = sqlConn.CreateCommand();

            sqlComm.CommandText = "INSERT INTO sintoma (sintoma) OUTPUT INSERTED.Id VALUES ('" + sTextBox.Text + "');";

            sqlConn.Open();
            //sqlComm.ExecuteNonQuery();
            newId = (Int32)sqlComm.ExecuteScalar();
            Console.WriteLine("teste:");
            Console.WriteLine(newId);

            sqlConn.Close();
        }

        private void adicionarc(int id_sintoma)
        {
            SqlConnection sqlConn = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\Projeto\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand sqlComm = new SqlCommand();
            sqlComm = sqlConn.CreateCommand();

            sqlComm.CommandText = "INSERT INTO r_cons_sint (id_sintoma, id_consulta) VALUES ('" + id_sintoma + "','" + id_consulta + "');";

            sqlConn.Open();
            sqlComm.ExecuteNonQuery();
            sqlConn.Close();
        }
    }
}
