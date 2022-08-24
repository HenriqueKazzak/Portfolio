/*9. Faça um programa que leia uma quantidade qualquer de números armazenando-os na
memória e pare a leitura quando o usuário entrar um número negativo. Em seguida,
imprima o vetor lido*/
#include <stdio.h>
#include <stdlib.h>

int main (void){
    int contZero=0,x=0,num;
    int* vetInt = (int*) calloc(1,sizeof(int));

    do{
        printf("Digite um valor: ");
        scanf(" %d",&num);
        if(num>0){
            vetInt = (int*) realloc(vetInt,1*sizeof(int));
            vetInt[x]=num;
        }
        x++;
    }while(num>0);
    for (int i = 0; i < x-1; i++)
    {
        printf("\n%d",vetInt[i]);
    }
    
}