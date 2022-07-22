/*4. Faça um programa que receba do usuário o tamanho de uma string e chame uma
função para alocar dinamicamente essa string. Em seguida, o usuário devera informar o
conteudo dessa string. O programa imprime a string sem suas vogais.*/
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

int main (void){
    int tamanho;
        
    printf("Informe o tamanho da string: ");
    scanf("%d",&tamanho);
    char* vetstr = (char*) malloc(tamanho*sizeof(char));
    printf("\nDigite a frase: ");
    scanf(" %s", vetstr);
    for(int i=0;i<tamanho;i++){
        if (!(vetstr[i] == 'a' || vetstr[i] == 'e'|| vetstr[i] == 'i'|| vetstr[i] == 'o' || vetstr[i] == 'u')){
            printf("%c",vetstr[i]);
        }        
    }
}