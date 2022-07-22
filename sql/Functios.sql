----------------------------------------------------------------------------------------------------------------------
--Calcular ano bissexo por procedimento
CREATE OR REPLACE PROCEDURE sp_anobissexto
IS
BEGIN
    FOR iAux IN 2000..2100
    LOOP
        IF (MOD(iAux, 4) = 0) AND (MOD(iAux, 100) <> 0) THEN
            DBMS_OUTPUT.PUT_LINE(iAux || ' é ano bissexto');
        END IF;
    END LOOP;
END;
EXEC sp_anobissexto;

--Calcular ano bissexto por function//

CREATE OR REPLACE FUNCTION fn_anobissexto (p_ano IN NUMBER) RETURN VARCHAR2
IS
    v_retorno VARCHAR2(50);
BEGIN
    IF (MOD(p_ano, 4) = 0) AND (MOD(p_ano, 100) <> 0) THEN
        v_retorno:= p_ano || ' é ano bissexto';
    ELSE
        v_retorno:= p_ano || ' não é ano bissexto';
    END IF;
    RETURN v_retorno;
END;
--TEST FUNCTION fn_anobissexto
BEGIN
    FOR iAux IN 2000..2100
    LOOP
        DBMS_OUTPUT.PUT_LINE(fn_anobissexto(iAux));
    END LOOP;
END;

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------

--Criar datatable de aluno para procedure
CREATE TABLE aluno
(
    NR_MATRICULA NUMBER(10) NOT NULL,
    NOME VARCHAR2(50) NOT NULL,
    a1 NUMBER(10) NOT NULL,
    a2 NUMBER(10) NOT NULL,
    a3 NUMBER(10) NOT NULL,
    a4 NUMBER(10) NOT NULL,
    media NUMBER(10) NOT NULL,
    resultado VARCHAR2(50) NOT NULL
);
--Calcular media de notas dos alunos procedimento
CREATE OR REPLACE PROCEDURE sp_media_notas
    (pNR_MATRICULA aluno.NR_MATRICULA%type,
    pNome aluno.NOME%type,
    pA1 aluno.a1%type,
    pA2 aluno.a2%type,
    pA3 aluno.a3%type,
    pA4 aluno.a4%type
    )
IS 
    v_media aluno.media%type;
    v_retorno aluno.retorno%type;
BEGIN
    v_media:= (pA1 + pA2 + pA3 + pA4) / 4;
    IF v_media >= 6 THEN
        v_retorno:= 'Aprovado';
    ELSE
        v_retorno:= 'Reprovado';
    END IF;
    DBMS_OUTPUT.PUT_LINE(pNR_MATRICULA || ' - ' || pNome || ' - ' || v_media || ' - ' || v_retorno);

    INSERT INTO aluno VALUES (pNR_MATRICULA, pNome, pA1, pA2, pA3, pA4, v_media, v_retorno);
END;
--TEST PROCEDURE sp_media_notas COM RANDON NOTAS E NOMES
EXEC sp_media_notas(1, 'Joao', 7, 8, 9, 10);
EXEC sp_media_notas(2, 'Maria', 4, 3, 9, 10);
EXEC sp_media_notas(3, 'Pedro', 7, 8, 9, 1);
EXEC sp_media_notas(4, 'Ana', 4, 3, 9, 10);

-----------------------------------------------------------------------------------------------------------
--Considerando o cálculo do IMC, elabore uma função em PL/SQL que tenha o peso e a altura como parâmetro de entrada e que retorne o valor calculado e a classificação conforme a tabela.
CREATE OR REPLACE FUNCTION fn_imc (p_peso NUMBER, p_altura NUMBER) RETURN VARCHAR2
IS
    v_imc NUMBER(10,2);
    v_classificacao VARCHAR2(50);
BEGIN
    v_imc:= p_peso / (p_altura * p_altura);
    
    IF v_imc < 18.5 THEN
        v_classificacao:='MAGREZA';
    ELSIF v_imc >= 18.5 AND v_imc <= 24.9 THEN
        v_classificacao:='NORMAL';
    ELSIF v_imc >= 25 AND v_imc <= 29.9 THEN
        v_classificacao:='SOBREPESO';
    ELSIF v_imc >= 30 AND v_imc <= 34.9 THEN
        v_classificacao:='OBESIDADE I';
    ELSIF v_imc >= 35 AND v_imc <= 39.9 THEN
        v_classificacao:='OBESIDADE II';
    ELSE
        v_classificacao:='OBESIDADE GRAVE III';
    END IF;
    RETURN v_imc || ' - ' || v_classificacao;
END;
--TEST FUNCTION fn_imc
BEGIN
    DBMS_OUTPUT.PUT_LINE(fn_imc(80, 1.80));
    DBMS_OUTPUT.PUT_LINE(fn_imc(180, 1.80));
    DBMS_OUTPUT.PUT_LINE(fn_imc(280, 1.80));
    DBMS_OUTPUT.PUT_LINE(fn_imc(80, 1.50));
    DBMS_OUTPUT.PUT_LINE(fn_imc(70, 1.80));
END;


--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--Criar clone da tabela employees da base de dados HR Oracle
CREATE TABLE employees_prova
(
    employee_id NUMBER(10) NOT NULL,
    first_name VARCHAR2(50) NOT NULL,
    last_name VARCHAR2(50) NOT NULL,
    email VARCHAR2(50) NOT NULL,
    phone_number VARCHAR2(50) NOT NULL,
    hire_date DATE NOT NULL,
    job_id VARCHAR2(50) NOT NULL,
    salary NUMBER(10) NOT NULL,
    commission_pct NUMBER(10) NOT NULL,
    manager_id NUMBER(10) NOT NULL,
    department_id NUMBER(10) NOT NULL
);

--Criar table de salary history 
create table SALARY_HISTORY (
    employee_id int not null,
    full_name varchar(50),
    old_salary decimal(10,2),
    new_salary decimal(10,2),
    history_dt date
);

-- Criar um procedimento em PL/SQL que tenha como parâmetro de entrada o percentual de aumento (valor inteiro de 1 a 100). Este procedimento deverá aplicar o aumento de salário para todos os funcionários da empresa atualizando o campo salary. Após a atualização do salário dos funcionários, deve ser inserida uma tupla na tabela salary_history com os dados apropriados da atualização do salário.

CREATE OR REPLACE PROCEDURE sp_aumento_salario (p_percentual NUMBER)
IS
    v_salario_atual NUMBER(10,2);
    v_salario_novo NUMBER(10,2);
    v_dt_atual DATE;
BEGIN
    FOR r IN (SELECT * FROM employees_prova) LOOP
        v_salario_atual:= r.salary;
        v_salario_novo:= v_salario_atual * (1 + p_percentual / 100);
        v_dt_atual:= SYSDATE;
        UPDATE employees_prova SET salary=v_salario_novo WHERE employee_id=r.employee_id;
        INSERT INTO SALARY_HISTORY VALUES (r.employee_id, r.first_name || ' ' || r.last_name, v_salario_atual, v_salario_novo, v_dt_atual);
    END LOOP;
END;

-- TESTE PROCEDURE sp_aumento_salario
INSERT INTO employees_prova VALUES (1, 'Joao', 'Silva', 'JOAO.SILVA@DB.COM', '9999-9999', TO_DATE('01/01/2000', 'DD/MM/YYYY'), 'MANAGER', 2000, 0, 1, 1);
EXEC sp_aumento_salario(10);
SELECT * FROM employees_prova;
SELECT * FROM SALARY_HISTORY;
--aumento esperado: 2000.00 -> 2200.00 ok



--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--Considere a tabela employees_prova criada na questão anterior e crie um procedimento em PL/SQL que gere uma lista de aniversariantes do mês. O procedimento deverá ter como parâmetro de entrada o mês de aniversário (pode ser numérico de 1 a 12) e deverá retornar uma lista com o nome completo dos funcionários e a data do aniversário. Ordenar a lista pela data de aniversário.

--!!!!!!!!!! OBS: A tabela informada nao possui data de aniversario, entao a data de aniversario sera a data de admissao. !!!!!!!!!!!

CREATE OR REPLACE PROCEDURE sp_aniversariantesCompany (p_mes NUMBER)
IS
    v_dt_admissao DATE;
BEGIN

    DBMS_OUTPUT.PUT_LINE('Aniversariantes do mês ' || p_mes);
    FOR r IN (SELECT * FROM employees_prova ORDER BY hire_date) LOOP
        v_dt_admissao:= r.hire_date;
        IF TO_CHAR(v_dt_admissao, 'MM') = p_mes THEN
            DBMS_OUTPUT.PUT_LINE(r.first_name || ' ' || r.last_name || ' - ' || TO_CHAR(v_dt_admissao, 'DD/MM'));
        END IF;
    END LOOP;
END;

-- TESTE PROCEDURE sp_aniversariantesCompany
INSERT INTO employees_prova VALUES (3, 'jose', 'hernandes','j.h@g.com', '9999-9999', TO_DATE('21/05/2000', 'DD/MM/YYYY'), 'MANAGER', 2000, 0, 1, 1);
INSERT INTO employees_prova VALUES (4, 'ricardo', 'silva','r.s@g.com', '9999-9999', TO_DATE('12/05/2000', 'DD/MM/YYYY'), 'MANAGER', 2000, 0, 1, 1);

exec sp_aniversariantesCompany(05);
--Lista esperada: RICARDO SILVA - 12/05 ;JOSE HERNANDES - 21/05; OK

--------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------
--A condição de existência de um triângulo é um conjunto de relações entre as medidas de seus lados que possibilitam decidir se, com as medidas propostas, é possível construí-lo. Essa condição pode ser vista como uma propriedade e é conhecida como desigualdade triangular.
--Condição de existência de um triângulo:
--Dados três segmentos de reta distintos a, b e c, se a soma das medidas de dois deles é sempre maior que a medida do terceiro, então, eles podem formar um triângulo. Por exemplo, dados os segmentos a = 16 cm, b = 20 cm e c = 30 cm, é possível usá-los para construir um triângulo, pois as somas abaixo são verdadeiras:
--16 + 20 = 36 > 30

--16 + 30 = 46 > 20

--30 + 20 = 50 > 16

--Considerando a explicação dada acima, elabore uma função em PL/SQL que tenha como parâmetros de entrada três segmentos de reta (podem ser valores inteiros ou decimais) e retorne TRUE caso os segmentos formem um triângulo e FALSE caso os segmentos não formem um triângulo.

CREATE OR REPLACE FUNCTION fc_triangulo (p_seg1 NUMBER, p_seg2 NUMBER, p_seg3 NUMBER) RETURN VARCHAR2
IS
    v_soma_seg1 NUMBER;
    v_soma_seg2 NUMBER;
    v_soma_seg3 NUMBER;
BEGIN
    v_soma_seg1:= p_seg1 + p_seg2;
    v_soma_seg2:= p_seg2 + p_seg3;
    v_soma_seg3:= p_seg3 + p_seg1;
    IF v_soma_seg1 > p_seg3 THEN
        IF v_soma_seg2 > p_seg1 THEN
            IF v_soma_seg3 > p_seg2 THEN
                RETURN 'TRUE';
            ELSE
                RETURN 'FALSE';
            END IF;
        ELSE
            RETURN 'FALSE';
        END IF;
    ELSE
        RETURN 'FALSE';
    END IF;
END;
-- TESTE FUNCTION fc_triangulo
BEGIN
    DBMS_OUTPUT.PUT_LINE(fc_triangulo(16, 20, 30));
    DBMS_OUTPUT.PUT_LINE(fc_triangulo(16, 30, 20));
    DBMS_OUTPUT.PUT_LINE(fc_triangulo(30, 2, 16));
END;
--Resultado esperado: TRUE; TRUE; FALSE; OK

 