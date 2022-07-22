
#include <stdio.h>
#include <stdlib.h>

struct cadastro
{
    char nomedoProduto[30];
    float precoUnitario;
};

void fazerCadastro (struct cadastro *fCadastro)
{
    printf ("Digite nome do produto: \n");
    scanf (" %c", &fCadastro->nomedoProduto);
    printf ("Digite valor unitario: \n");
    scanf (" %f", &fCadastro->precoUnitario);
}

void procurarProduto (struct cadastro *vetorCadastro)
{    
    printf ("Digite o nome do produto: ");
    printf("%s",vetorCadastro->nomedoProduto);
}

int main(void)
{
    int opcao, cont;
    struct cadastro *vetorCadastro = (struct cadastro*) malloc(1*sizeof(struct cadastro));

    do
    {
        fazerCadastro (&vetorCadastro);
        
        printf ("Para encerrar programa digite 0 \nPara adicionar novo cadastro digite 1 \n Para buscar cadastros digite 2");
        scanf (" %d", &opcao);

        if (opcao==1)
        {
            vetorCadastro = (struct cadastro*) realloc(vetorCadastro,(1+cont)*sizeof(struct cadastro));
            cont++;
        }
        else if (opcao==2)
        {
            printf ("Digiteb");
            for (int x=0; x<cont; x++);
            {

            }
        }
    } while (opcao!=0);
    return (0);
}


