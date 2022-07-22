#include <stdio.h>
#include <stdlib.h>
struct parte
{
    int comprimento;
    int largura;
    int area;
    char nome [30];
}; 

struct parte IncluirParte();
int CalcularTotal(struct parte dicComodo,int totalArea);
void ImprimeComodo(struct parte dicComodo);

int main(void)
{
    int totalArea=0,op;
    struct parte comodo;
    struct parte dicParte[100];
    for (int i = 0; i < 100; i++)
    {
        do
        {
            printf("------------Selecione uma opcao------------\n----- [1] Incluir Comodo ------------------\n----- [2] Calcular Total ------------------\n----- [3] Finalizar ------------------\n-------------------------------------------\n");
            scanf("%d",&op);
            switch (op)
            {
            case 1:
                comodo = IncluirParte();
                dicParte[i] = comodo;
                break;
            case 2:
                totalArea=CalcularTotal(comodo,totalArea);
                break;
            case 3:
                printf("\nArea total do imovel: %d",totalArea);
                return(0);
            default:
                printf("\nOpcao invalida! Por favor tente novamente");
                break;
            }
        } while (!(op == 1 || op ==2 || op == 3));
    }
}
struct parte IncluirParte()
{
    struct parte prt;
    printf("\nComodo o nome:");
    scanf("%s",prt.nome);
    printf("\nInforme a Largura:");
    scanf("%d",&prt.largura);
    printf("\nInforme o Compromento:");
    scanf("%d",&prt.comprimento);
    prt.area=prt.comprimento*prt.largura;
    return prt;
}

int CalcularTotal(struct parte dicComodo,int totalArea)
{
    int Area = totalArea;
    printf("%d",Area);
    Area = totalArea + dicComodo.area;
    ImprimeComodo(dicComodo);
    return (Area);
    
}

void ImprimeComodo(struct parte dicComodo)
{
    printf("\nNome do comodo: %s\nArea: %d\n",dicComodo.nome,dicComodo.area);
    return;
}

int CalculaFinal(struct parte dicComodo[100])
{
    return;
}