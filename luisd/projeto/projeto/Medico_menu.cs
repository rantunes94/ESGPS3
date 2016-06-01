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
    public partial class Medico_menu : Form
    {
        int medico_id;
        String medico_nome = "Luis";

        public Medico_menu(int medico_id)
        {
            InitializeComponent();
            this.medico_id = medico_id;
            label1.Text = medico_nome;
            selecionarConsultas();
        }

        private void selecionarConsultas()
        {
            SqlConnection sqlConnection1 = new SqlConnection("Data Source=(LocalDB)\\MSSQLLocalDB;AttachDbFilename='C:\\Users\\Projeto\\BaseDados.mdf';Integrated Security=True;Connect Timeout=30");
            SqlCommand cmd = new SqlCommand();
            SqlDataReader reader;

            cmd.CommandText = "SELECT * FROM consulta where id_medico =" + medico_id;
            cmd.CommandType = CommandType.Text;
            cmd.Connection = sqlConnection1;

            sqlConnection1.Open();

            reader = cmd.ExecuteReader();

            if (reader.HasRows)
            {
                while (reader.Read())
                {
                    Console.WriteLine("{0}\t{1}\t{2}\t{3}\t{4}", reader.GetInt32(0), reader.GetString(1), reader.GetDateTime(2), reader.GetInt32(3), reader.GetString(5));
                    ListViewItem item = new ListViewItem(new[] { reader.GetInt32(0).ToString(), reader.GetString(1).ToString(), reader.GetDateTime(2).ToString(), reader.GetInt32(3).ToString(), reader.GetString(5).ToString() });
                    listView1.Items.Add(item);
                }
            }
        }

        private void transferir(int id)
        {
            Medico_consulta medi = new Medico_consulta(id);
            medi.Show();
        }

        private void listView1_SelectedIndexChanged(object sender, EventArgs e)
        {
            int index = listView1.FocusedItem.Index;
            string text = listView1.Items[index].Text;
            int num = int.Parse(text);
            transferir(num);
            
        }

    }
}
