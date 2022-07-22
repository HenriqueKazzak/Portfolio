using System;
using System.Collections.Generic;

namespace OOP
{
    class Program
    {
        static void Main(string[] args)
        {
            string [] nomes = {"joao","maria","ana","henrique","romulo"};
            List<pessoa> arrayList = new List<pessoa>();
            int i = 0;
            foreach (var item in nomes)
            {
                arrayList.Add( new pessoa(item));
                Console.WriteLine(arrayList[i].getNome());
                i++;
            }
        }
    }
}
