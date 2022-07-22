#include<stdlib.h>
#include<stdio.h>
#include<string.h>

int mat=2,por=2,cie=4,livros=0;
int Check(char tema[20])
{
    if (strcmp(tema,"MATEMATICA") != 0 && strcmp(tema,"CIENCIAS") != 0 && strcmp(tema,"PORTUGUES")!= 0)
    {
        printf("\nHmmm... Desculpe nao possuimos o tema informado\n");
        return(0);//false
    }
    return(1);//true
}
int GetBook(char tema[20])
{
    if (strcmp(tema,"MATEMATICA")==0)
    {
        if (mat==0)
        {
            printf("\nSem livros de Matematica disponiveis, foram emprestados 2 livros sobre o tema\n");
            EXIT_SUCCESS;
        }
        else
        {
            mat-=1;
            livros+=1;
            EXIT_SUCCESS;
        }
    }
    else if (strcmp(tema,"PORTUGUES")==0)
    {
        if (por==0)
        {
            printf("\nSem livros de Portugues disponiveis, foram emprestados 2 livros sobre o tema\n");
            EXIT_SUCCESS;
        }
        else
        {
            por-=1;
            livros+=1;
            EXIT_SUCCESS;
        }
    }
    else //(strcmp(tema,"CIENCIAS")==0)
    {
        if (cie==0)
        {
            printf("\nSem livros de Ciencias disponiveis, foram emprestados 4 livros sobre o tema\n");
        }
        else
        {            
            cie-=1;
            livros+=1;
            EXIT_SUCCESS;
        }
    }
}
int main(void)
{
    char nome[20],tema [20];
    printf("Antes de comecar, informe o seu nome: ");
    gets(nome);
    printf("\nOla %s!",nome);
    do
    {
        do
        {
            printf("\nInforme qual tema voce deseja \nMatematica\nCiencias\nPortugues\n");
            scanf(" %s",&tema);
            strupr(tema);
        }while (Check(tema) == 0);
        GetBook(tema);
    } while (livros < 5);
    printf("\nFoi atigido o limite de 5 livors\nMatematica %d livros\nPortugues %d livros\nCiencias %d livros\n---End Program---",abs(mat-2),abs(cie-4),abs(por-2));
}
