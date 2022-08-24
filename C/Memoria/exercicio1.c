/*1. Crie um programa que:
(a) Aloque dinamicamente um array de 5 numeros inteiros,
(b) Peça para o usuario digitar os 5 numeros no espaço alocado,
(c) Mostre na tela os 5 numeros,
(d) Libere a memoria alocada.*/
#include <stdio.h>
#include <stdlib.h>

int main (void){
    int x=0;
    int *arrayInt = (int*) malloc(5*sizeof(int));
    for(int i=0;i<5;i++){ 
        for (x; x < 5; x++)
        {
            printf("\n%dDigite um valor: ",x);
            scanf(" %d",&arrayInt[x]);
        }
        printf("\nPosicao %d possui o valor de %d",i+1,arrayInt[i]);
    }
    free(arrayInt);
}