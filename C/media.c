#include <stdio.h>
#include <stdlib.h>

void calcMedia(float *media){
    float nota = 0,total = 0;


    for (int i = 0; i < 3; i++)
    {
        printf("Digite a nota %d de 3: ",i+1);
        scanf("%f",&nota);
        total+=nota;
    }
    *media=total/3;
}

void calcConceito(char *conceito, float media){

    if (media < 5)
    {
        *conceito = 'D';
    }
    else if(media >= 5 && media < 7)
    {
        *conceito = 'C';
    }
    else if(media >= 7 && media < 9) 
    {
        *conceito = 'B';
    }
    else
    {
        *conceito = 'A';
    }
}

int main(void){
    char conceito;
    char opcao;
    do{
        float media=0;
        calcMedia(&media);
        calcConceito(&conceito,media);
        printf("\nMedia calculada: %f\nConceito Calculado: %c\n",media,conceito);
        printf("Deseja  encerrar? Precione [S] para Sim e [N] para Nao.\n[S] - Sim\n[N] - Nao\n");
        scanf(" %c",&opcao);
    }while (opcao == 'S');
}