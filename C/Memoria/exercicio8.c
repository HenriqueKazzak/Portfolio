/*8. Faça um programa para armazenar em memória um vetor de dados contendo 1500
valores do tipo int, usando a função de alocação dinâmica de memória CALLOC:
(a) Faça um loop e verifique se o vetor contém realmente os 1500 valores inicializados
com zero (conte os 1500 zeros do vetor).
(b) Atribua para cada elemento do vetor o valor do seu indice junto a este vetor.
(c) Exibir na tela os 10 primeiros e os 10 últimos elementos do vetor.*/
#include <stdio.h>
#include <stdlib.h>

int main (void){
    int contZero=0;
    int* vetInt = (int*) calloc(1500,sizeof(int));

    for(int i=0;i<1500;i++){
        printf("\nvalor: %d",vetInt[i]);
    }
    for(int i=0;i<1500;i++){
        vetInt[i] = i;
        if (vetInt[i]=0)
        {
            contZero++;
        }
    }
    for(int i=0;i<10;i++){
        printf("\nPosicao %d contem %d: ",i,vetInt[i]);    
    }
    for(int i=1489;i<1500;i++){
        printf("\nPosicao %d contem %d: ",i,vetInt[i]);    
    }
}