using System;
using System.Collections.Generic;
using System.Linq;
using System.Text;
using System.Threading.Tasks;

namespace OOP
{
    public class pessoa
    {
        string nome;
        //endereco end;
        public pessoa(string nome)
        {
            this.nome = nome;
        }
        public string getNome()
        {
            return nome;
        }
        public void alteraNome(string nome)
        {
            this.nome = nome;
        }
    }
}
