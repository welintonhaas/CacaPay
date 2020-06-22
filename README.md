<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>


## Sobre o CaçaPay

Em meio à pandemia de COVID-19, um dos setores que mais provou que é essencial são os meios de pagamento online. Buscando se tornar um centralizador dos meios de pagamento na cidade de Caçador, surgiu a startup CaçaPay

Endereço para acessar o Sistema do CaçaPay
- [Acessar CaçaPay](http://webalunos.cacador.ifsc.edu.br/CacaPay).


## Primeiro Passo

Primeiramente solicite ao desenvolvedores Welinton ou Rui para que seja criado a sua empresa. Para o cadastro, favor informar Razão Social, CNPJ, Telefone e Email, após o cadastro será disponibilizado um Token de acesso para comunicação com a API.

## Como utilizar a API

Para comunicar com a API, utilize o endereço http://webalunos.cacador.ifsc.edu.br/CacaPay/public/api/pagamentos
- Utilize o método POST 
- No corpo da requisição envie os parâmetros "token" e "cpf"

Os seguintes dados são opcionais:
- nome
- senha
- email 

- Caso não for informado email será cadastrado o e-mail: cpf_do_clinte@cacapay.com 
- Caso não for informada a senha, será cadastrado a senha: 123456 

