## Ambiente PHP com apache simples e fácil de gerenciar

O objetivo deste repositório é fornecer um ambiente php com apache em um container docker, simples e fácil de subir e gerenciar.

## O que está prepadado?
- Mapeamento de portas ```80:80``` (host - container)
- Redirecionamento apache com ```.htaccess``` (```app/public/.htaccess```)
- Document root apontado para o diretório ```public```
- Extensões ```pdo pdo_mysql``` habilitadas
- Rede
- Volume para o diretório de trabalho (```app```)
- CLI simples para gerenciamento de tarefas ([Taskfile](https://taskfile.dev))


## Como subir o ambiente

- Docker compose: ```docker compose up -d --build```
- Task CLI: ```task build```
