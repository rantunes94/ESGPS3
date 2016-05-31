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
    public partial class Medicamento_anterior : Form
    {
        SqlConnection sqlConnection1 = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\luis_\\OneDrive\\Documentos\\Visual Studio 2015\\Projects\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
        SqlCommand cmd = new SqlCommand();
        SqlDataReader reader;
        int id_consulta;


        public Medicamento_anterior(int id, string nome)
        {
            InitializeComponent();

            label1.Text = nome;
            id_consulta = id;
            iniciarpesquisa();
        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {
            int index = listView1.FocusedItem.Index;
            Console.WriteLine(index);

            cmd.CommandText = "SELECT * FROM medicamento where id_consulta =" + listView1.Items[index].SubItems[0].Text;
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
                    Console.WriteLine("{0}\t{1}\t{2}\t{3}\t{4}", reader.GetInt32(0), reader.GetString(1), reader.GetString(2), reader.GetString(3), reader.GetInt32(4));
                    dataGridView1.Rows.Add();  
                    dataGridView1.Rows[contador].Cells[0].Value = reader.GetString(1);
                    dataGridView1.Rows[contador].Cells[1].Value = reader.GetString(2);
                    dataGridView1.Rows[contador].Cells[2].Value = reader.GetString(3);
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

        public void iniciarpesquisa(){       
            cmd.CommandText = "SELECT * FROM consulta where id_paciente =" + id_consulta.ToString();
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;
            sqlConnection1.Open();
            reader = cmd.ExecuteReader();
            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    Console.WriteLine("{0}\t{1}\t{2}\t{3}\t{4}\t{5}", reader.GetInt32(0), reader.GetString(1), reader.GetDateTime(2), reader.GetInt32(3), reader.GetInt32(4), reader.GetString(5));
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
    }
}
