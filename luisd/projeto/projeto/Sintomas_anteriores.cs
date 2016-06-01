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
    public partial class Sintomas_anteriores : Form
    {
        SqlConnection sqlConnection1 = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\luis_\\OneDrive\\Documentos\\Visual Studio 2015\\Projects\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
        SqlCommand cmd = new SqlCommand();
        SqlDataReader reader;
        int id_paciente;

        public Sintomas_anteriores(int id_paciente, string nome)
        {
            InitializeComponent();
            label1.Text = nome;
            this.id_paciente = id_paciente;
            iniciarpesquisa();
        }

        public void iniciarpesquisa()
        {
            cmd.CommandText = "SELECT id FROM consulta where id_paciente =" + id_paciente.ToString();
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;
            sqlConnection1.Open();
            reader = cmd.ExecuteReader();
            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    Console.WriteLine("{0}", reader.GetInt32(0));
                    lista(reader.GetInt32(0));
                }
            }
            else
            {
                Console.WriteLine("No rows found.");
            }
            reader.Close();
            sqlConnection1.Close();
        }
                                                 
        public void lista(int id)
        {
            listView1.Items.Add(id.ToString(), 200);
        }

        public void lista2(int id)
        {
            listView2.Items.Add(id.ToString(), 200);
        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {
            //Console.WriteLine("No rows found.");
           /* int index = listView1.FocusedItem.Index;
            string text = listView1.Items[index].Text;*/
            //int index = listView1.FocusedItem.Index;
            int index = listView1.FocusedItem.Index;

            string text = listView1.Items[index].Text;
            int numindex = int.Parse(text);
            Console.WriteLine(numindex);

            cmd.CommandText = "SELECT * FROM r_cons_sint where id_consulta ='" + numindex + "';";
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            int contador = 0;
            dataGridView1.Rows.Clear();
            reader = cmd.ExecuteReader();

            listView2.Items.Clear();

            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    lista2(reader.GetInt32(1));
                    contador++;
                }
            }
            else
            {
                Console.WriteLine("No rows found.");
            }
            reader.Close();
            sqlConnection1.Close();
        }

        private void listView2_SelectedIndexChanged(object sender, EventArgs e)
        {
            int index = listView2.FocusedItem.Index;
            string text = listView2.Items[index].Text;
            int numindex = int.Parse(text);
            Console.WriteLine(numindex);

            cmd.CommandText = "SELECT sintoma FROM sintoma where id ='" + numindex + "';";
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            reader = cmd.ExecuteReader();
            int contador = 0;
            dataGridView1.Rows.Clear();
            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    dataGridView1.Rows.Add();
                    dataGridView1.Rows[contador].Cells[0].Value = reader.GetString(0);
                    contador++;
                }
            }
            else
            {
                Console.WriteLine("No rows found.");
            }
            reader.Close();
            sqlConnection1.Close();
        }
    }
}
