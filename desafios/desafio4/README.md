# power_bi_analyst módulo 4 - Star Schema coma base em apenas uma tabela


Criação das tabelas com base na tabela original(Financial Sample). A partir da cópia serão selecionadas as colunas que irão compor a visão da nova tabela. 

Sendo assim, a partir da tabela principal foram criadas as tabelas:
 - Financials_origem (modo oculto – apenas para backup)
 - D_Produtos
    - ID_produto
    - Produto
    - Média de Unidades Vendidas
    - Médias do valor de vendas
    - Mediana do valor de vendas
    - Valor máximo de Venda
    - Valor mínimo de Venda
 - D_Produtos_Detalhes
    - ID_produtos
    - Discount Band
    - Sale Price
    - Units Sold
    - Manufactoring Price
 - D_Descontos
    - ID_produto
    - Discount
    - Discount Band
 - D_Detalhes
    - 
    - 
 - D_Calendário
    - 
    - 
 - F_Vendas
    - SK_ID
    - ID_Produto
    - Produto
    - Units Sold
    - Sales Price
    - Discount Band
    - Segment
    - Country
    - Salers
    - Profit
    - Date (campos)