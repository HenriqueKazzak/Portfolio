#include <stdio.h>
#include <stdlib.h>

struct Pessoa
{
    char nome[20];
    float Peso;
    int Idade;
    float Altura;
};


struct Pessoa BuscaPessoa();
void ImprimePessoa( struct Pessoa aPessoa);

int main()
{
    struct Pessoa p1;
    struct Pessoa ListaP[3];
    int i;

    for (i=0; i<3; i++){

        p1 = BuscaPessoa();
        ListaP[i] = p1;
    }

    printf("\n\n");
    for (i=0; i<3; i++){

        ImprimePessoa(ListaP[i]);
    }


    return 0;
}

struct Pessoa BuscaPessoa()
{
    struct Pessoa aPessoa;

    printf("\nInforme o nome:");
    scanf("%s",aPessoa.nome);
    printf("\nInforme a idade:");
    scanf("%d",&aPessoa.Idade);
    printf("\nInforme o peso:");
    scanf("%f",&aPessoa.Peso);
    printf("\nInforme a altura:");
    scanf("%f",&aPessoa.Altura);

    return aPessoa;
}

void ImprimePessoa( struct Pessoa *aPessoa)
{
    aPessoa->Peso=23.5;
    printf("Nome: %15s  Idade: %3d  Peso: %4.2f Altura: %4.2f\n", aPessoa.nome, aPessoa.Idade, aPessoa.Peso, aPessoa.Altura);
}