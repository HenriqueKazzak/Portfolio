/*2. Faça um programa que leia do usuario o tamanho de um vetor a ser lido e faça a
alocação dinamica de memoria. Em seguida, leia do usuario seus valores e imprima o
vetor lido.*/
#include <stdio.h>
#include <stdlib.h>

int main (void){

    int tam;
    printf("Informe o tamanho: ");
    scanf(" %d",&tam);
    int* vetInt = (int*) calloc(tam,sizeof(int));

    for(int i=0;i<tam;i++){
        printf("\nDigite o valor:");
        scanf(" %d",vetInt[i]);
    }
    for(int i=0;i<tam;i++){
        printf("\nPosicao %d contem %d: ",i,vetInt[i]);    
    }

}