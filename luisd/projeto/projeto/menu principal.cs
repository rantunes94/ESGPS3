using System;
using System.Collections.Generic;
using System.ComponentModel;
using System.Data;
using System.Drawing;
using System.Linq;
using System.Text;
using System.Threading.Tasks;
using System.Windows.Forms;

namespace projeto
{
    public partial class menu_principal : Form
    {
        public menu_principal()
        {
            InitializeComponent();
        }

        private void button1_Click(object sender, EventArgs e)
        {
            Medico_menu mm = new Medico_menu(1);
            mm.Show();
        }

        private void button2_Click(object sender, EventArgs e)
        {
            Pesquisa_enfermeiro pe = new Pesquisa_enfermeiro();
            pe.Show();
        }
    }
}
