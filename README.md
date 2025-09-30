# 🚀 API teste SafeDataAnalytics 2.0 

Sistema de consultas baseado no SafeDataAnalytics para testes e validações.

## 📋 Visão Geral

A **API TESTE  SafeDataAnalytics** fornece respostas em JSON padronizadas de acordo com os dados enviados pelo usuário. Funciona como um gateway de dados simulado do SDA, retornando informações estruturadas a partir de payloads específicos, sem consultar serviços externos.

### 🏗️ Arquitetura

- **SDA**: API Laravel

## 🚀 Features Principais

### 📊 Consultas Disponíveis
- **Total**: 17 consultas configuradas
   ## Endpoints da API

| Endpoint | Descrição | Payload |
|----------|-----------|---------|
| `/veiculos/1/precificacao-fipe/placa` | Preço da tabela FIPE por placa | `{ "placa": "ABC1234" }` |
| `/veiculos/2/leilao/placa` | Veículo com passagem em leilão por placa | `{ "placa": "ABC1234" }` |
| `/veiculos/4/dados-completos/placa` | Dados completos do veículo e restrições por placa | `{ "placa": "ABC1234" }` |
| `/veiculos/12/precificacao-fipe/placa` | Preço da tabela FIPE por Placa | `{ "placa": "ABC1234" }` |
| `/veiculos/13/leilao/placa` | Veículo com passagem em leilão por placa | `{ "placa": "ABC1234" }` |
| `/veiculos/14/debitos-e-multas/placa` | Débitos e Multas por placa | `{ "placa": "ABC1234" }` |
| `/veiculos/16/dados-completos/chassi` | Dados completos do veículo e restrições por chassi | `{ "chassi": "1XFAK23B9YZ0000000" }` |
| `/veiculos/17/dados-completos/renavam` | Dados completos do veículo e restrições por renavam | `{ "renavam": 12345678901 }` |
| `/veiculos/18/dados-por-proprietario` | Dados completos do veículo e restrições por CPF ou CNPJ | `{ "identificacao": "12345678901" }` ou `{ "identificacao": "12345678910123" }` |
| `/condutores/3/dados/cpf` | Dados do condutor por CPF | `{ "cpf": "12345678901" }` |
| `/infracoes/5/por-veiculo/placa` | Infrações (multas) do veículo por placa | `{ "placa": "ABC1234" }` |
| `/infracoes/19/por-condutor/cpf` | Infrações (multas) do condutor por CPF | `{ "cpf": "12345678901" }` |
| `/dados-cadastrais/6/cpf/básico` | Dados pessoais por CPF Básico | `{ "cpf": "12345678901" }` |
| `/dados-cadastrais/7/cpf/plus` | Dados pessoais por CPF Plus | `{ "cpf": "12345678901" }` |
| `/dados-cadastrais/8/cpf/master` | Dados pessoais por CPF Master | `{ "cpf": "12345678901" }` |
| `/dados-cadastrais/9/cnpj/básico` | Dados empresariais por CNPJ Básico | `{ "cnpj": "12345678910123" }` |
| `/dados-cadastrais/10/cnpj/master` | Dados empresariais por CNPJ Master | `{ "cnpj": "12345678910123" }` |



## 🛠️ Instalação

### Pré-requisitos
- PHP 8.1+
- Composer

### 1. Clone o repositório
```bash
git clone https://github.com/sistemastecnol/api-teste-sda.git
cd api-teste-sda
```

### 2. Instale as dependências
```bash
composer install
```

### 3. Configure o ambiente
```bash
cp .env-example .env
# Configure as variáveis de ambiente
```

## 📚 Uso

### Consumindo API
```bash
Acesse a rota desejada e adicione as informações necessarias no payload, todas as rotas são POST e as informações estão na tabela de consultas.

```



## 🤝 Contribuição

1. Fork o projeto
2. Crie uma branch para sua feature (`git checkout -b feature/AmazingFeature`)
3. Commit suas mudanças (`git commit -m 'Add some AmazingFeature'`)
4. Push para a branch (`git push origin feature/AmazingFeature`)
5. Abra um Pull Request

## 📄 Licença

Este projeto está sob a licença MIT. Veja o arquivo [LICENSE](LICENSE) para mais detalhes.

## 📞 Suporte

Para suporte, entre em contato:
- **Email**: suporte@safedataanalytics.com.br
- **Documentação**: [docs/](docs/)

---

**🚀 Desenvolvido com ❤️ pela equipe TECNOL**

